<template>
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparrent">
            <div class="headder-top header-sticky">
                <div class="row align-items-center col-lg-11">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <router-link to="/">
                                            <li><a>Home</a></li>
                                        </router-link>
                                        <router-link to="/Annonce_list">
                                            <li><a>Trouver Annonce</a></li>
                                        </router-link>
                                        <router-link to="/Apropos">
                                            <li><a>About</a></li>
                                        </router-link>
                                        <router-link to="/contact">
                                            <li><a>Contact</a></li>
                                        </router-link>
                                        <div v-if="connectedUser">
                                            <router-link to="/DashC" v-if="logged && connectedUser.role=='candidat'">
                                                <li><a>Mon Espace</a></li>
                                            </router-link>
                                            <router-link to="/DashR" v-if="logged && connectedUser.role=='recruteur'">
                                                <li><a>Mon Espace</a></li>
                                            </router-link>
                                        </div>


                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            <div class="header-btn d-none f-right d-lg-block">
                            <div v-if="!connectedUser">
                             <router-link  to="/Registre"><a class="btn head-btn1"
                                        style="color:#FFF !important;">Register</a></router-link>
                                <router-link to="/Login"><a class="btn head-btn2"
                                        style="color:#FB246A !important;">Login</a></router-link>
                            </div>
                               
                                <router-link v-else to="/login"><a @click="logout" class="btn head-btn2"
                                        style="color:#FB246A !important;">Logout</a></router-link>

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
        reactive
    } from 'vue'
    import useUsers from '../store/userStore.js'


    export default {
        setup() {
            let logged = localStorage.logged
            console.log(logged)
            const connectedUser = localStorage.currentUser
            const {
                CurrentUsers,
                User,
                loginUser
            } = useUsers()
                if(localStorage.currentUser)
                {
                    localStorage.logged=true
                }
            function login() {
                loginUser(User)
            }
            return {
                CurrentUsers,
                User,
                login,
                connectedUser,
                logged
            }
        },
        data() {
            return {
                token: null,
            }
        },

        methods: {

            logout() {
              
               localStorage.logged=false
                axios.post('http://127.0.0.1:8000/api/logout')
                    .then((res) => {
                        localStorage.removeItem('token')
                        localStorage.removeItem('currentUser')

                    })
                    .catch(function (err) {
                        console.log(err);
                    })
            },
        },

    }
</script>
