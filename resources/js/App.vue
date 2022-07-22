<template>
    <TheHeader/>
    <router-view/>
    <TheFooter/>
</template>

<script>
    
    import TheHeader from './components/TheHeader.vue'
    import AnnonceDetails from './components/Pages/AnnonceDetails.vue'
    import TheFooter from './components/TheFooter.vue'
    import Login from './components/Pages/auhtentification/Login.vue'
    import Register from './components/Pages/auhtentification/Register.vue'
    import Home from './components/Pages/PageHome.vue'
    import Contact from './components/Pages/PageContact.vue'
    import FormAnnonce from './components/Pages/AnnonceForm.vue'
    import About from './components/Pages/PageAbout.vue'
    import Cv from './components/Pages/PageCv.vue'
    import Page404 from './components/Pages/Page404.vue'
    import AnnonceList from './components/Pages/AnnonceList.vue'
    import DashboardCandidat from './components/Pages/Users/DashboardCandidat.vue'
    import DashboardRecruteur from './components/Pages/Users/DashboardRecruteur.vue'




    export default {

        name: 'App',
        components: {
            TheHeader,
            Login,
            Cv,
            Page404,
            Register,
            Home,
            FormAnnonce,
            AnnonceDetails,
            AnnonceList,
            TheFooter,
            Contact,
            About,
            DashboardCandidat,
            DashboardRecruteur,

        },
    }

</script>


<style scoped>
</style>