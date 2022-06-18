<template>

    <div id="addcandidatModal" class="modal" tabindex="-1" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-if="!updating">Ajouter Candidat</h5>
                    <h5 class="modal-title" v-else>Modifier Candidat</h5>
                    <button type="button" @click="cleardata" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" v-model="user.username" class="form-control" id="username"
                                aria-describedby="text" placeholder="Entrer Votre Username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" v-model="user.email" class="form-control" id="email"
                                aria-describedby="titre_annonce" placeholder="Entrer Votre email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" v-model="user.password" class="form-control" id="passwword"
                                aria-describedby="password" placeholder="************" autocomplete="on">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Confirmation Password</label>
                            <input type="password" class="form-control" v-model="user.password_confirmation"
                                id="passwordconf" aria-describedby="password" placeholder="************"
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nom candidat</label>
                            <input type="text" v-model="user.nom_candidat" class="form-control" id="nom_candidat"
                                aria-describedby="nom_candidat" placeholder="Entrer Nom Candidat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Prenom Candidat</label>
                            <input type="text" v-model="user.prenom_candidat" class="form-control" id="prenom_candidat"
                                aria-describedby="prenom_candidat" placeholder="Entrer Prenom Candidat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">image Icandidat</label>
                            <input type="file" class="form-control" id="image_candidat"
                                aria-describedby="image_candidat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CV candidat</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter cv">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Niveau Etude</label>
                            <input type="text" v-model="user.niveau_etude" class="form-control" id="niveau_etude"
                                aria-describedby="niveau_etude" placeholder="Entrer Votre Niveau d'etude">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">telephone</label>
                            <input type="text" v-model="user.tele" class="form-control" id="tele"
                                aria-describedby="tele" placeholder="Entrer telephone">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">ville</label>
                            <input type="text" v-model="user.ville" class="form-control" id="ville"
                                aria-describedby="ville" placeholder="Entrer votre ville">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="select-form">
                                    <p>Choisir votre secteur d'activite</p>
                                    <select class="selectpicker" v-model="user.secteur_activite">
                                        <option value="All" selected>All</option>
                                        <option v-for="secteur in secteurs" :key="secteur.id"
                                            v-bind:value="secteur.titre_secteur">
                                            {{secteur.titre_secteur}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" v-if="!updating" @click="addUser" class="btn btn-primary">Enregistrer</button>
                    <button type="button" v-else @click="updateUsercandidat(this.user.id)"
                        class="btn btn-warning">Modifier</button>
                    <button type="button" @click="cleardata" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <h1>List des Candidat</h1>

    <div class="Table_data">
        <vue-good-table :columns="columns" :rows="users" v-on:cell-click="onCellClick"
            :select-options="{ enabled: false }" :pagination-options="{
    enabled: true,
    mode: 'records',
    perPage:10,
    position: 'bottom',
    perPageDropdown: [3, 7, 9],
    dropdownAllowAll: false,
    setCurrentPage: 2,
    nextLabel: 'next',
    prevLabel: 'prev',
    rowsPerPageLabel: 'Rows per page',
    ofLabel: 'of',
    pageLabel: 'page', 
    allLabel: 'All',
    infoFn: (params) => `page ${params.firstRecordOnPage}`, 
    
  }">
            <template #table-actions>
                <button type="button" v-if="!updating" class="btn-success !important" @click="cleardata"
                    data-toggle="modal" data-target="#addcandidatModal">Add New Candidat</button>


            </template>

            <template #table-row="props">

                <span v-if="props.column.field == 'action'">
                    <button type="button" @click="this.getCandidatsbyId(props.row.id),updating=true" data-toggle="modal"
                        data-target="#addcandidatModal" class="btn-warning !important"><i class="fa fa-pencil-square"
                            aria-hidden="true"></i>
                    </button>
                    <button type="button" @click="deleteUsercandidat(props.row.id)" class="btn-danger !important"><i
                            class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </span>
            </template>
        </vue-good-table>

    </div>
</template>

<script>
    
    import useSecteurs from '../../../store/secteurStore.js'
    import { onMounted, ref } from 'vue'
    import 'vue-good-table-next/dist/vue-good-table-next.css'
    import {
        VueGoodTable
    } from 'vue-good-table-next';


    const {Secteurs,getSecteurs}=useSecteurs()


    export default {
         setup() {

            function getAnnoncesByTitre1 (titre) {
                  if(titre=="All"){

                   getAnnonces();

                }else{
                    
                   getAnnoncesBySecteur(titre);
                }
            }
            onMounted(getSecteurs)
            onMounted(getAnnonces)

            return {
                
                Secteurs,
                
            }
        },
        components: {
            VueGoodTable,

        },
        methods: {
            onCellClick(params) {
                this.user = params.row
                // params.row - row object 
                // params.column - column object
                // params.rowIndex - index of this row on the current page.
                // params.event - click event
            },
            cleardata() {
                this.updating = false,
                    this.user = {
                        email: "",
                        password: "",
                        nom_candidat: "",
                        prenom_candidat: "",
                        image_candidat: "",
                        niveau_etude: "",
                        cv_candidat: "",
                        tele: "",
                        username: "",
                        ville: "",
                        secteur_activite: "",
                        role: "candidat",
                    }

            },
            getUsers() {
                axios.get('http://127.0.0.1:8000/api/getUser/' + this.role)
                    .then(res => {
                        this.users = res.data;
                    })
                    .catch(function (err) {
                        console.log(err);
                    })

            },
            getCandidats() {
                axios.get('http://127.0.0.1:8000/api/candidat/')
                    .then(res => {
                        this.candidats = res.data;
                    })
                    .catch(function (err) {
                        console.log(err);
                    })

            },
            getCandidatsbyId(id) {
                axios.get('http://127.0.0.1:8000/api/candidat/' + id)
                    .then(res => {
                        this.user.nom_candidat = res.data.nom_candidat;
                        this.user.prenom_candidat = res.data.prenom_candidat;
                        this.user.image_candidat = res.data.image_candidat;
                        this.user.cv_candidat = res.data.cv_candidat;
                        this.user.niveau_etude = res.data.niveau_etude;



                    })
            },
            addUser() {
                axios.post('http://127.0.0.1:8000/api/user', this.user)
                    .then(res => {
                        this.user = {
                            email: "",
                            password: "",
                            nom_candidat: "",
                            prenom_candidat: "",
                            image_candidat: "",
                            niveau_etude: "",
                            cv_candidat: "",
                            tele: "",
                            username: "",
                            ville: "",
                            secteur_activite: "",
                            role: "candidat",
                        }
                    })
                    .catch(function (err) {
                        console.log(err);
                    })
            },
            updateUsercandidat(id) {
                this.updating = true;
                axios.put('http://127.0.0.1:8000/api/user/' + id, this.user)
                    .then(res => {
                        this.getUsers();
                        this.user = {
                            email: "",
                            password: "",
                            nom_candidat: "",
                            prenom_candidat: "",
                            image_candidat: "",
                            niveau_etude: "",
                            cv_candidat: "",
                            tele: "",
                            username: "",
                            ville: "",
                            secteur_activite: "",
                            role: "candidat",
                        }
                    })
                    .catch(function (err) {
                        console.log(err);
                    })
            },
            deleteUsercandidat(id) {

                axios.delete('http://127.0.0.1:8000/api/us/' + id)
                    .then(res => {
                        this.getUsers();
                    })
            },
            getSecteurs() {
                axios.get('http://127.0.0.1:8000/api/secteur')
                    .then(res => {
                        this.secteurs = res.data.data;
                    })
                    .catch(function (err) {
                        console.log(err);
                    })

            },

        },
        data() {
            return {
                updating: "",
                userselected: "",
                updating: false,
                secteurs: [],
                recruteur: [],
                recruteur: {
                    nom_candidat: "",
                    prenom_candidat: "",
                    image_candidat: "",
                    cv_candidat: "",
                    niveau_etude: "",

                },
                user: {
                    email: "",
                    password: "",
                    nom_candidat: "",
                    prenom_candidat: "",
                    image_candidat: "",
                    niveau_etude: "",
                    cv_candidat: "",
                    tele: "",
                    username: "",
                    ville: "",
                    secteur_activite: "",
                    role: "candidat",
                },
                role: 'candidat',
                users: [],
                columns: [{
                        label: 'Email',
                        field: 'email',
                        type: 'text'
                    },
                    {
                        label: 'Username',
                        field: 'username',
                        type: 'text'
                    },
                    {
                        label: 'telephone',
                        field: 'tele',
                        type: 'text'
                    },
                    {
                        label: 'Ville',
                        field: 'ville',
                        type: 'text'
                    },
                    {
                        label: "Secteur d'activite",
                        field: 'secteur_activite',
                        type: 'text'
                    },
                    {
                        label: 'Action',
                        field: 'action',
                        type: 'input'
                    }
                ],
            }
        },
        mounted() {
            this.getUsers();
            this.getSecteurs();
            this.getCandidats()

        },
    }

</script>

<style scoped>

</style>
