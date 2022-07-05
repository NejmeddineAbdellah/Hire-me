<template>
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparrent">
            <div class="headder-top header-sticky">
                <div class="row align-items-center col-lg-12">
                    <div class="col-lg-2 col-md-2">
                        <!-- Logo -->
                        <div class="logo ">
                            <a href="/"><img src="/img/logo/Hire-Me4.png" alt="Hire-me Logo"
                                    style="width:130px;height:120px;"></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <div class="container">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-inline">
                                        <ul id="navigation">
                                            <router-link to="/">
                                                <li><a>Home</a></li>
                                            </router-link>
                                            <router-link to="/AnnonceList">
                                                <li><a>Trouver Emploi</a></li>
                                            </router-link>
                                             <router-link to="/CandidatList" v-if="connectedUser && connectedUser.role=='recruteur'">
                                                <li><a>Trouver Candidat</a></li>
                                            </router-link>
                                            <router-link to="/Apropos">
                                                <li><a>About</a></li>
                                            </router-link>
                                            <router-link to="/contact">
                                                <li><a>Contact</a></li>
                                            </router-link>
                                            <span v-if="connectedUser">
                                                <router-link to="/DashboardRecruteur"
                                                    v-if="connectedUser.role=='recruteur'">
                                                    <li><a>Mon Espace</a></li>
                                                </router-link>
                                                <router-link to="/DashboardCandidat"
                                                    v-if="connectedUser.role =='candidat'">
                                                    <li><a>Mon Espace</a></li>
                                                </router-link>

                                            </span>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-flex">

                                    <router-link to="/Registre" v-if="!islogged"><a class="btn head-btn1"
                                            style="color:#FFF;background-color:#DA2461 !important;">Register</a>
                                    </router-link>

                                    <router-link to="/Login" v-if="!islogged"><a class="btn head-btn2"
                                            style="color:#FB246A !important;">Login</a></router-link>

                                    <router-link to="/login" v-else><a @click="Logout" class="btn head-btn2"
                                            style="color:#FB246A !important;">Logout</a></router-link>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Header End -->
    </header>
</template>

<script>
    import {
        onMounted,
        ref,
        watchEffect,
        reactive
    } from 'vue'

    import useUsers from '../store/userStore.js'
    import { useRouter } from 'vue-router'




    export default {
        setup() {
            const connectedUser = ref()
            const router = useRouter()

            const islogged = ref(localStorage.isloggedIn)
            if (localStorage.getItem("isloggedIn") === null) {
                islogged.value = false
                
                connectedUser.value = null

            } else {
                connectedUser.value = JSON.parse(localStorage.currentUser)
                islogged.value = true

            }

            watchEffect(() =>{
                islogged.value = localStorage.isloggedIn
            })

            const {
                User,
                loginUser,
                logoutUser,
            } = useUsers()

            function Logout() {
                islogged.value = ref(false)
                logoutUser()
               
            }

            return {
                User,
                islogged,
                connectedUser,
                Logout,

            }
        },

    }
</script>

<style scoped>
    header {
        padding-bottom: 150px;
    }

    .main-menu {
        width: 100%;
        margin: 0
    }
</style>
