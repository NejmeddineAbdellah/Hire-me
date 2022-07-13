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
                            <i class="zmdi zmdi-view-dashboard" @click="actform = 'CandidatProfile'">Profile</i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="zmdi zmdi-view-dashboard" @click="actform = 'CandidatAnnonce'">Mes Annonces</i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="zmdi zmdi-view-dashboard" @click="actform = 'candidatDemande'">Mes Demandes</i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="zmdi zmdi-view-dashboard" @click="logout">Deconnecter</i>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- Content -->
            <div id="content">
                    <component :is="actform"></component>
            </div>
        </div>
    </div>
</template>

<script>
    import useUsers from '../../../store/userStore.js'

    import {
        ref
    } from 'vue'
    import CandidatAnnonce from './Candidat/CandidatAnnonce'
    import CandidatProfile from './Candidat/CandidatProfile.vue'
    import candidatDemande from './Candidat/candidatDemande'
    export default {

        setup() {
            const {
                logoutUser
            } = useUsers()
            const connectedUser = ref(JSON.parse(localStorage.currentUser))

            function logout() {
                logoutUser()
            }

            return {
                logout,
                connectedUser
            }
        },
        name: 'Dashboard',
        components: {
            CandidatAnnonce,
            CandidatProfile,
            candidatDemande,
        },
        data() {
            return {
                actform: 'CandidatProfile'
            }
        },

    }
</script>

<style scoped>
    .welcome {
        width: max-content;

    }

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
