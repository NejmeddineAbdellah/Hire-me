<template>

    <div id="AnnonceRecruteurModal" class="modal" tabindex="-1" data-backdrop="false">
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
                            <label for="exampleInputEmail1">Titre d'annonce</label>
                            <input type="text" v-model="Annonce.titre_annonce" class="form-control" id="titre_annonce"
                                aria-describedby="text" placeholder="Entrer titre annonce" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description d'annonce</label>
                            <input type="text" v-model="Annonce.description_annonce" class="form-control"
                                id="description_annonce" aria-describedby="text"
                                placeholder="Entrer description annonce" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Niveau D'etude</label>
                            <input type="text" v-model="Annonce.niveau_etude" class="form-control" id="niveau_etude"
                                aria-describedby="text" placeholder="Entrer Votre profile" required>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="select-form">
                                    <p>Choisir le secteur d'activite</p>
                                    <select class="selectpicker form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" v-model="Annonce.secteur_activite">
                                        <option value="All" selected>All</option>
                                        <option v-for="secteur in Secteurs" :key="secteur.id"
                                            v-bind:value="secteur.titre_secteur">
                                            {{secteur.titre_secteur}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Type contrat</label>
                            <input type="text" v-model="Annonce.contrat" class="form-control"
                                id="contrat" aria-describedby="text" placeholder="Entrer Type du Contrat" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Salaire</label>
                            <input type="number" step="0.1" v-model="Annonce.salaire" class="form-control"
                                id="Salaire" aria-describedby="text" placeholder="Entrer Salaire" required>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                
                    <button type="button" v-if="!updating" @click="createAnnonce"
                        class="btn btn-primary">Enregistrer</button>
                    <button type="button" v-else @click="modifierAnnonce(Annonce.annonce_id)"
                        class="btn btn-warning" data-dismiss="modal">Modifier</button>
                    <button type="button" @click="clear" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                        <div v-if="createAnnonce && Message!==''" class="alert alert-secondary">
                {{Message}}
                </div>
                </div>
            </div>
        </div>
    </div>

    <h1>List de Vos Annonces</h1>

    <div class="Table_data">
        <vue-good-table :columns="columns" :rows="Annonces" 
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
    rowsPerPageLabel: 'Lignes par page',
    ofLabel: 'of',
    pageLabel: 'page', 
    allLabel: 'All',
    infoFn: (params) => `page ${params.firstRecordOnPage}`, 
    
  }">

            <template #table-actions>
                <button type="button" class="btn-success mr-3 !important btn-lg" @click="clear" data-toggle="modal"
                    data-target="#AnnonceRecruteurModal">Publier Annonce</button>
            </template>

            <template #table-row="props">
                <span v-if="props.column.field == 'action'" class="d-flex">
                    <button type="button" data-toggle="modal" data-target="#AnnonceRecruteurModal"
                            @click="getSelectedAnnonce(props.row.id)" class="btn-warning mr-3 !important"><i
                            class="fa fa-pencil-square" aria-hidden="true"></i>
                    </button>
                    <button type="button" @click="deleteAnnonce(props.row.id)" class="btn-danger !important"><i
                            class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </span>
            </template>
        </vue-good-table>

    </div>
</template>

<script>
    import { onMounted, ref, } from 'vue'
    import useAnnonces from '../../../../store/annonceStore.js'
    import useSecteurs from '../../../../store/secteurStore.js'
    import useUsers from '../../../../store/userStore.js'
    import 'vue-good-table-next/dist/vue-good-table-next.css'
    import { VueGoodTable } from 'vue-good-table-next';

    export default {
        
        setup() {
            const userConnecter = JSON.parse(localStorage.currentUser)
            let updating = ref(false);

            const {
                Annonces,
                Annonce,
                Message,
                getAnnonces,
                getAnnoncesBySecteur,
                getAnnoncesByIdUser,
                getAnnonceById,
                getAnnoncesRecruteur,
                storeAnnonce,
                destroyAnnonce,
                updateAnnonce} = useAnnonces()
            
            const {Secteurs,getSecteurs} = useSecteurs()
            const {CurrentUsers} = useUsers()
            const token= localStorage.token

            function clear() {
                updating.value = false;
                Annonce.value = {
                    titre_annonce: '',
                    description_annonce: '',
                    niveau_etude: '',
                    secteur_activite: '',
                    contrat:'',
                    salaire: '',
                    type_annonce: 'recruteur',
                    user_id: userConnecter.id,
                    }  
                    Message.value="" 
            }
            
            function getSelectedAnnonce(id) {
                updating.value = true;
            
               getAnnonceById(id) 
               getAnnoncesByIdUser(userConnecter.id)
            }

            function createAnnonce(){

                storeAnnonce({...Annonce.value});
                getAnnoncesByIdUser(userConnecter.id)
                clear()
            }

            function modifierAnnonce(id) {
                updateAnnonce(id);
                getAnnoncesByIdUser(userConnecter.id)
                
            }

            function deleteAnnonce(id) {
                destroyAnnonce(id);
                getAnnoncesByIdUser(userConnecter.id)
                

            }           
            onMounted(getAnnoncesByIdUser(userConnecter.id))
            onMounted(getSecteurs)
 


            return {
                Annonces,
                Secteurs,
                Annonce,
                Message,
                CurrentUsers,
                getAnnoncesByIdUser,
                getSelectedAnnonce,
                createAnnonce,
                modifierAnnonce,
                deleteAnnonce,
                updating,
                clear,
                token,
                
              
            }
        },
        components: {
            VueGoodTable,
        },
        name: 'Addannonce',
        data() {
            return {
                columns: [{
                        label: 'Titre annonce',
                        field: 'titre_annonce',
                        type: 'text',
                    },
                    {
                        label: "Secteur d'activite",
                        field: 'secteur_activite',
                        type: 'text',
                    },
                    {
                        label: 'Description annonce',
                        field: 'description_annonce',
                        type: 'text',
                    },
                    {
                        label: 'Niveau Etude',
                        field: 'niveau_etude',
                        type: 'text',
                    },
                    {
                        label: 'Action',
                        field: 'action',
                        type: 'input'
                    }
                ],
            }
        },

    }

</script>

<style scoped>


</style>
