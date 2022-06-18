import {
    ref
} from 'vue'
import axios from "axios";
import {
    useRouter
} from 'vue-router'


export default function useUsers() {

    const router = useRouter()
    const Users = ref([])
    const User = ref([])
    const CurrentUsers = ref([])

    const getUserByRole = async (role) => {
        let response = await axios.get('http://127.0.0.1:8000/api/getUser/' + role)
        Users.value = response.data;
    }

    const loginUser = async (user) => {
       let response = await axios.post('http://127.0.0.1:8000/api/login', user)
        console.log(response.data[0])
            localStorage.token = response.data.Token;
            localStorage.currentUser = JSON.stringify(response.data[0]);
            

        if (response.data[0].role == "recruteur") {
            this.router.push('/DashR')
        }if (response.data[0].role == "candidat") {
            
            this.router.push('/DashC')
        }
        else {
            window.location.href = '/admin'
        }


    }

    const storeUser = async (user) => {

        await axios.post('http://127.0.0.1:8000/api/user/', user)
        await router.push('/login')


    }





    return {
        Users,
        User,
        CurrentUsers,
        getUserByRole,
        storeUser,
        loginUser,


    }
}
