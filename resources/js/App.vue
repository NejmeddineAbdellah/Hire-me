<template>
    <Header/>
    <router-view/>

</template>

<script>
    
    import Header from './components/Header.vue'
    import Details_Annonce from './components/Pages/Details_Annonce.vue'
    import Footer from './components/Footer.vue'
    import Login from './components/Pages/auhtentification/Login.vue'
    import Register from './components/Pages/auhtentification/Register.vue'
    import Home from './components/Pages/Home.vue'
    import Contact from './components/Pages/Contact.vue'
    import Form_annonce from './components/Pages/Form_annonce.vue'
    import About from './components/Pages/About.vue'
    import Annonce_list from './components/Pages/Annonce_list.vue'
    import DashC from './components/Pages/Users/DashboardCandidat.vue'
    import DashR from './components/Pages/Users/DashboardRecruteur.vue'



var headers = {
  'Accept':'application/json',
  'Authorization':'string'
};
    export default {

        name: 'App',
        components: {
            Header,
            Login,
            Register,
            Home,
            Form_annonce,
            Details_Annonce,
            Annonce_list,
            Footer,
            Contact,
            About,
            DashC,
            DashR,

        },

        data() {
            return {
            }
        }
    }

</script>


<style scoped>

</style>