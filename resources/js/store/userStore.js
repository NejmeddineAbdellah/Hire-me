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
    const Message = ref('')

    const getUserByRole = async (role) => {
        let response = await axios.get('http://127.0.0.1:8000/api/getUser/' + role)
        Users.value = response.data;
    }

    const loginUser = async (user) => {
       let response = await axios.post('http://127.0.0.1:8000/api/login', user)

        
        localStorage.token = response.data.Token;
        localStorage.currentUser = JSON.stringify(response.data[0]);
        Message.value = response.data.message;
        

        if (response.data[0].role == "recruteur") {
            router.push('/DashR')
        }else if (response.data[0].role == "candidat") {
            
            router.push('/DashC')
        }
        else {
            window.location.href = '/admin'
        }


    }

    const getUsersCandidat = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/getUser/'+'Candidat')
        UsersCandidat.value = response.data
    }

    const getUsersRecruteur = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/getUser/'+'recruteur')
        UsersRecruteur.value = response.data
    }

    const storeUser = async (user) => {

        await axios.post('http://127.0.0.1:8000/api/user/', user)
        await router.push('/login')


    }





    return {
        Users,
        UsersCandidat,
        UsersRecruteur,
        Message,
        CurrentUsers,
        getUserByRole,
        storeUser,
        getUsersRecruteur,
        getUsersCandidat,
        loginUser,


    }
}
