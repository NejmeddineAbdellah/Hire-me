<template>
    <div id="viewport">
        <div class="container">
            <!-- Sidebar -->
            <div id="sidebar">
                <header>
                    <a href="#">{{usr.username}}</a>
                </header>
                <ul class="nav">
                    <li>
                        <a  href="javascript:void(0)">
                            <i class="zmdi zmdi-view-dashboard"  @click="actform = 'Profile'">Profile</i> 
                        </a>
                    </li>
                    <li>
                        <a  href="javascript:void(0)">
                            <i class="zmdi zmdi-view-dashboard"  @click="actform = 'Annonce'" >Mes Annonces</i>
                        </a>
                    </li>
                    <li>
                        <a  href="javascript:void(0)">
                            <i class="zmdi zmdi-view-dashboard"  @click="actform = 'Demande'" >Mes Demandes</i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="zmdi zmdi-calendar"></i> Logout
                        </a>
                    </li>

                </ul>
            </div>
            <!-- Content -->
            <div id="content">
                <nav class="navbar navbar-default mt-100">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#"><i class="zmdi zmdi-notifications text-danger"></i>
                                </a>
                            </li>
                               <h1>Bienvenue</h1>
                        </ul>
                    </div>
                </nav>
                <div class="container">
                    <component :is="actform"></component>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
     import Annonce from './Candidat/Addannonce'
     import Profile from './Candidat/Profile.vue'
     import Demande from './Candidat/Demande'
    export default {
 
        name: 'Dashboard',
        components: {
             Annonce,
             Profile,
             Demande,
        },
        data() {
            return {
                usr:[],
                actform:'Profile'
            }
        },
        mounted() {
            this.usr = JSON.parse(localStorage.currentUser);
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

    #sidebar .nav {}

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
