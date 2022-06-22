import {
    createRouter,
    createWebHistory
} from "vue-router"
import Contact from '../components/Pages/Contact.vue'
import Home from '../components/Pages/Home.vue'
import Annonce_list from '../components/Pages/Annonce_list.vue'
import Apropos from '../components/Pages/About.vue'
import Login from '../components/Pages/auhtentification/Login.vue'
import Registre from '../components/Pages/auhtentification/Register.vue'
import DashC from '../components/Pages/Users/DashboardCandidat.vue'
import DashR from '../components/Pages/Users/DashboardRecruteur.vue'


const routes = [
        {path: "/", name: 'Home', component: Home},
        {path: "/contact", name: "Contact", component: Contact},
        {path: "/dashC", name: "DashC", component: DashC},
        {path: "/dashR", name: "DashR", component: DashR},
        {path: "/annonce_list", name: "Annonce_list", component: Annonce_list},
        {path: "/apropos", name: "Apropos", component: Apropos},
        {path: "/login", name: "Login", component: Login},
        {path: "/registre", name: "Registre", component: Registre}
];

const router = createRouter({
    history: createWebHistory(),
    routes,

})


export default router;