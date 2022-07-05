<template>
    <div id="viewport">
        <div class="container">
            <!-- Sidebar -->
            <div id="sidebar">
                <header>
                    <a href="#">{{connectedUser.username}}</a>
                </header>
                <ul class="nav">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="zmdi zmdi-view-dashboard" @click="actform = 'RecruteurProfile'">Profile</i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="zmdi zmdi-view-dashboard" @click="actform = 'RecruteurAnnonce'">Mes Annonces</i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="zmdi zmdi-view-dashboard" @click="actform = 'RecruteurDemande'">Mes Demandes</i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="zmdi zmdi-view-dashboard" @click="logout">Logout</i>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- Content -->
            <div id="content">
                <div class="container">

                    <component :is="actform"></component>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import useUsers from '../../../store/userStore.js'
    import {
        ref,
        onMounted
    } from 'vue'
    import RecruteurAnnonce from './Recruteur/RecruteurAnnonce.vue'
    import RecruteurDemande from './Recruteur/RecruteurDemande.vue'
    import RecruteurProfile from './Recruteur/RecruteurProfile.vue'
    export default {
        setup() {
            const connectedUser = ref(JSON.parse(localStorage.currentUser))
            const {
                logoutUser
            } = useUsers()

            function logout() {
                logoutUser()
            }

            return {
                logout,
                connectedUser
            }
            onMounted()

        },
        name: 'Dashboard',
        components: {
            RecruteurAnnonce,
            RecruteurProfile,
            RecruteurDemande,
        },
        data() {
            return {
                actform: 'RecruteurProfile'
            }
        },
    }
</script>

<style scoped>
    #viewport {
        padding-left: 250px;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
        padding-bottom: 20%;

    }

    #content {
        width: 100%;
        position: relative;
        margin-right: 0;
    }

    /* Sidebar Styles */

    #sidebar {
        z-index: 1000;
        position: fixed;
        left: 250px;
        width: 250px;
        height: 100%;
        margin-left: -250px;

        background: #37474F;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
        position:absolute;
    }

    #sidebar header {
        background-color: #263238;
        font-size: 20px;
        line-height: 52px;
        text-align: center;
    }

    #sidebar header a {
        color: #fff;
        display: block;
        text-decoration: none;
    }

    #sidebar header a:hover {
        color: #fff;
    }

    #sidebar .nav a {
        background: none;
        border-bottom: 1px solid #455A64;
        color: #CFD8DC;
        font-size: 14px;
        padding: 16px 24px;
    }

    #sidebar .nav a:hover {
        background: none;
        color: #ECEFF1;
    }

    #sidebar .nav a i {
        margin-right: 16px;
    }
</style>
