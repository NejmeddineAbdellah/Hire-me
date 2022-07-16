   <template>
       <div class="main-wrapper main-wrapper-1">
           <div class="navbar-bg" style="background-color: #DA2461; height:70px;"></div>
           <nav class="navbar navbar-expand-lg main-navbar">
               <form class="form-inline mr-auto">
                   <ul class="navbar-nav mr-1">
                       <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                   class="fas fa-bars"></i></a></li>
                       <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                   class="fas fa-search"></i></a></li>
                   </ul>
               </form>
               <ul class="navbar-nav navbar-right">
                   <li class="dropdown"><a href="#" data-toggle="dropdown"
                           class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                           <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                           <div class="d-sm-none d-lg-inline-block">Bienvenu</div>
                       </a>
                       <div class="dropdown-menu dropdown-menu-right">
                           <div class="dropdown-divider"></div>
                           <a @click="Logout" class="dropdown-item has-icon text-danger">
                                   <i class="fas fa-sign-out-alt"></i> Deconnecter
                               </a>
                           
                       </div>
                   </li>
               </ul>
           </nav>
           <div class="main-sidebar sidebar-style-2">
               <div id="sidebar-wrapper">
                   <div class="sidebar-brand">
                       <a href="javascript:void(0)">Admin</a>
                   </div>
                   <div class="sidebar-brand sidebar-brand-sm">
                       <a href="javascript:void(0)">AD</a>
                   </div>
                   <ul class="sidebar-menu">
                       <li class="menu-header">Pages</li>
                       <li class="dropdown">
                           <a href="javascript:void(0)" @click="dataform = 'PageDashboard'"><i
                                   class="fa fa-tachometer"></i>
                               <span>Dashboard</span></a>
                       </li>
                       <li class="dropdown">
                           <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i>
                               <span>Utilisateur</span></a>
                           <ul class="dropdown-menu">
                               <li><a href="javascript:void(0)" @click="dataform = 'UserCandidat'">Candidats</a></li>
                               <li><a href="javascript:void(0)" @click="dataform = 'UserRecruteur'">Recruteurs </a></li>
                           </ul>
                       </li>
                       <li class="dropdown">
                           <a href="#" class="nav-link has-dropdown"><i class="fa fa-bullhorn"></i>
                               <span>Annonces</span></a>
                           <ul class="dropdown-menu">
                               <li><a href="javascript:void(0)" @click="dataform = 'AnnonceCandidat'">Annonces
                                       Candidat</a>
                               </li>
                               <li><a href="javascript:void(0)" @click="dataform = 'AnnonceRecruteur'">Annonces
                                       Recruteur</a>
                               </li>
                           </ul>
                       </li>
                       <li class="dropdown">
                           <a href="javascript:void(0)" @click="dataform = 'PageDemande'"><i class="fa fa-envelope"></i>
                               <span>Demandes</span></a>
                       </li>
                       <li class="dropdown">
                           <a href="javascript:void(0)" @click="dataform = 'PageSecteur'"><i
                                   class="fa fa-graduation-cap"></i>
                               <span>Secteurs
                                   d'activités</span></a>
                       </li>
                   </ul>

                   <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                       <a href="/" class="btn btn-primary btn-lg btn-block btn-icon-split"
                           style="background-color: #DA2461;">
                           <i class="fa fa-handshake-o"></i> Hire-me
                       </a>
                   </div>
               </div>
           </div>

           <!-- Main Content -->
           <div class="main-content">
               <section class="section">
                   <div class="row">
                       <!-- des tableaux  -->
                       <div class="container">
                           <component :is="dataform"></component>
                       </div>
                   </div>
               </section>
           </div>
           <footer class="main-footer">
               <div class="footer-left">
                   <a> Non Copyright</a>
               </div>
               <div class="footer-right">

               </div>
           </footer>
       </div>

   </template>

   <script>
       import UserCandidat from './Users/UserCandidat.vue'
       import UserRecruteur from './Users/UserRecruteur.vue'
       import AnnonceCandidat from './Annonces/AnnonceCandidat.vue'
       import AnnonceRecruteur from './Annonces/AnnonceRecruteur.vue'
       import PageDemande from './PageDemande.vue'
       import PageSecteur from './PageSecteur.vue'
       import PageDashboard from './PageDashboard.vue'
       import {
           ref
       } from "vue";
       import useUsers from '../../store/userStore'
import router from '../../router'
       export default {
           setup() {
               const islogged = ref(localStorage.isloggedIn)
               const connectedUser = ref()
               if (localStorage.isloggedIn) {
                   islogged.value = true
                   if (localStorage.currentUser) {

                       connectedUser.value = JSON.parse(localStorage.currentUser)
                   }


               } else {
                   islogged.value = false

               }
               const {
                   User,
                   logoutUser,
               } = useUsers()

               function Logout() {
                   islogged.value = false
                   logoutUser()
                   window.location.href = '/'

               }
               return {
                   User,
                   islogged,
                   connectedUser,
                   Logout,

               }
           },
           name: 'AppAdmin',
           components: {
               UserCandidat,
               UserRecruteur,
               AnnonceCandidat,
               AnnonceRecruteur,
               PageDemande,
               PageSecteur,
               PageDashboard,
           },
           data() {
               return {
                   dataform: 'PageDashboard',

               }
           },
       }
   </script>


   <style scoped>


   </style>
