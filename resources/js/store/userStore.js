import {
    ref
} from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router'


export default function useUsers() {

    const router = useRouter()
    const Users = ref([])
    const UsersCandidat = ref([])
    const UsersRecruteur = ref([])
    const CurrentUsers = ref([])
    const Message = ref("")
    const islog = ref(localStorage.isloggedIn)
    let config = {
        headers: { 
            'Authorization': `Bearer ${localStorage.token}`,
            'Accept' : 'appliction/json'
         }
    }

    const getUserByRole = async (role) => {
        let response = await axios.get('http://127.0.0.1:8000/api/getUser/' + role)
        Users.value = response.data;
    }

    const loginUser = async (user) => {

       let response = await axios.post('http://127.0.0.1:8000/api/login', user,config)
        Message.value = response.data.message;
    
        if (response.data[0].role == "recruteur") {
            
            localStorage.token = response.data.Token;
            localStorage.currentUser = JSON.stringify(response.data[0]);
            localStorage.isloggedIn = true;
           window.location.href = '/DashboardRecruteur'

        }else if (response.data[0].role == "candidat") {

            localStorage.token = response.data.Token;
            localStorage.currentUser = JSON.stringify(response.data[0]);
            localStorage.isloggedIn = true;
            window.location.href = '/DashboardCandidat'
           
        }else {
            localStorage.token = response.data.Token;
            localStorage.currentUser = JSON.stringify(response.data[0]);
            localStorage.isloggedIn = true;
            window.location.href = '/admin'
        }
    }

    const logoutUser = async() => {

            await axios.post('http://127.0.0.1:8000/api/logout')
            localStorage.clear()
            await router.push('/login')
    }

    const getUsersCandidat = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/getUser/'+'Candidat',config)
        UsersCandidat.value = response.data
    }

    const getUsersRecruteur = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/getUser/'+'recruteur',config)
        UsersRecruteur.value = response.data
    }

    const storeUser = async (user) => {

        try {
            let response = await axios.post('http://127.0.0.1:8000/api/user/', user, config)
            await router.push('/login')
           Message.value = response.data.message;

        } catch (error) {
            for (const key in error.response.data.errors) {
                
            Message.value += error.response.data.errors[key][0]+ "  |  " ;

            }
           
        }
        

    }

    const destoryUser = async(id) => {
        let response = await axios.delete('http://127.0.0.1:8000/api/user/'+id,config)
        Message.value = response.data.message;

    }

    return {
        Message,
        Users,
        UsersCandidat,
        UsersRecruteur,
        CurrentUsers,
        islog,
        getUserByRole,
        storeUser,
        destoryUser,
        getUsersRecruteur,
        getUsersCandidat,
        loginUser,
        logoutUser,

    }
}
