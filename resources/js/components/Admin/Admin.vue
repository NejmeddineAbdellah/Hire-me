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
                           <div class="d-sm-none d-lg-inline-block">Hi, Admin</div>
                       </a>
                       <div class="dropdown-menu dropdown-menu-right">
                           <a href="features-profile.html" class="dropdown-item has-icon">
                               <i class="far fa-user"></i> Profile
                           </a>

                           <div class="dropdown-divider"></div>
                           <a href="#" class="dropdown-item has-icon text-danger">
                               <i class="fas fa-sign-out-alt"></i> Logout
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
                           <a href="javascript:void(0)" @click="dataform = 'dashboard'"><i class="fas fa-bicycle"></i>
                               <span>Dashboard</span></a>
                       </li>
                       <li class="dropdown">
                           <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Users</span></a>
                           <ul class="dropdown-menu">
                               <li><a href="javascript:void(0)" @click="dataform = 'uscandidat'">Candidats</a></li>
                               <li><a href="javascript:void(0)" @click="dataform = 'usrecruteur'">Recruteurs </a></li>
                           </ul>
                       </li>
                       <li class="dropdown">
                           <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i>
                               <span>Annonces</span></a>
                           <ul class="dropdown-menu">
                               <li><a href="javascript:void(0)" @click="dataform = 'ancandidat'">Annonces Candidat</a>
                               </li>
                               <li><a href="javascript:void(0)" @click="dataform = 'anrecruteur'">Annonces Recruteur</a>
                               </li>
                           </ul>
                       </li>
                       <li class="dropdown">
                           <a href="javascript:void(0)" @click="dataform = 'demande'"><i class="fas fa-bicycle"></i>
                               <span>Demandes</span></a>
                       </li>
                       <li class="dropdown">
                           <a href="javascript:void(0)" @click="dataform = 'secteur'"><i class="fas fa-bicycle"></i>
                               <span>Secteurs
                                   d'activite</span></a>
                       </li>
                   </ul>

                   <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                       <a href="/" class="btn btn-primary btn-lg btn-block btn-icon-split"
                           style="background-color: #DA2461;">
                           <i class="fas fa-rocket"></i> Hire-me
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
       import uscandidat from './Users/Uscandidat.vue'
       import router from '../../router'
       import usrecruteur from './Users/Usrecruteur.vue'
       import ancandidat from './Annonces/Ancandidat.vue'
       import anrecruteur from './Annonces/Anrecruteur.vue'
       import demande from './Demande.vue'
       import secteur from './Secteur.vue'
       import dashboard from './Dashboard.vue'

       var headers = {
           'Accept': 'application/json',
           'Authorization': 'string'
       };
       export default {

           name: 'Admin',
           components: {
               uscandidat,
               usrecruteur,
               ancandidat,
               anrecruteur,
               demande,
               secteur,
               dashboard,
           },
           data() {
               return {
                   dataform: 'dashboard',

               }
           },
       }
   </script>


   <style scoped>


   </style>
