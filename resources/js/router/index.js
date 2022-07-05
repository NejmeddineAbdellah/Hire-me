import {
    createRouter,
    createWebHistory
} from "vue-router"
import Page404 from '../components/Pages/Page404.vue'
import Contact from '../components/Pages/PageContact.vue'
import AnnonceForm from "../components/Pages/AnnonceForm.vue"
import Home from '../components/Pages/PageHome.vue'
import AnnonceList from '../components/Pages/AnnonceList.vue'
import Apropos from '../components/Pages/PageAbout.vue'
import Login from '../components/Pages/auhtentification/Login.vue'
import Registre from '../components/Pages/auhtentification/Register.vue'
import DashboardCandidat from '../components/Pages/Users/DashboardCandidat.vue'
import DashboardRecruteur from '../components/Pages/Users/DashboardRecruteur.vue'
import CandidatList from '../components/Pages/CandidatList.vue'


const routes = [
        {path: "/", name: 'Home', component: Home},
        {path: "/contact", name: "Contact", component: Contact},
        {path: "/DashboardCandidat", name: "DashboardCandidat", component: DashboardCandidat},
        {path: "/DashboardRecruteur", name: "DashboardRecruteur", component: DashboardRecruteur},
        {path: "/AnnonceList", name: "AnnonceList", component: AnnonceList},
        {path: "/CandidatList", name: "CandidatList", component: CandidatList},
        {path: "/apropos", name: "Apropos", component: Apropos},
        {path: "/login", name: "Login", component: Login},
        {path: "/registre", name: "Registre", component: Registre},
        {path: "/Postuler/:id", name: "Postuler", component: AnnonceForm},
        {path: "/:catchAll(.*)", name: "404", component: Page404}
];

const router = createRouter({
    history: createWebHistory(),
    routes,

})


export default router;