<template>

    <div id="AnnonceCandidatModal" class="modal" tabindex="-1" data-backdrop="false">
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
                            <label for="exampleInputEmail1">titre_annonce</label>
                            <input type="text" v-model="Annonce.titre_annonce" class="form-control" id="titre_annonce"
                                aria-describedby="text" placeholder="Entrer titre annonce">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">description_annonce</label>
                            <input type="text" v-model="Annonce.description_annonce" class="form-control"
                                id="description_annonce" aria-describedby="text"
                                placeholder="Entrer description annonce">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">niveau_etude</label>
                            <input type="text" v-model="Annonce.niveau_etude" class="form-control" id="niveau_etude"
                                aria-describedby="text" placeholder="Entrer Votre profile">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="select-form">
                                    <p>Choisir votre secteur d'activite</p>
                                    <select class="selectpicker" v-model="Annonce.secteur_activite">
                                        <option value="All" selected>All</option>
                                        <option v-for="secteur in Secteurs" :key="secteur.id"
                                            v-bind:value="secteur.titre_secteur">
                                            {{secteur.titre_secteur}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">type_annonce_candidat</label>
                            <input type="text" v-model="Annonce.type_annonce_candidat" class="form-control"
                                id="type_annonce_candidat" aria-describedby="text" placeholder="Entrer Votre profile">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">cv_candidat</label>
                            <input type="text" v-model="Annonce.cv_candidat" class="form-control"
                                id="cv_candidat" aria-describedby="text" placeholder="Entrer Votre cv_candidat">
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
                </div>
            </div>
        </div>
    </div>

    <h1>List des Candidat</h1>

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
    rowsPerPageLabel: 'Rows per page',
    ofLabel: 'of',
    pageLabel: 'page', 
    allLabel: 'All',
    infoFn: (params) => `page ${params.firstRecordOnPage}`, 
    
  }">

            <template #table-actions>
                <button type="button" class="btn-success mr-3 !important" @click="clear" data-toggle="modal"
                    data-target="#AnnonceCandidatModal">Add New Annonce</button>
            </template>

            <template #table-row="props">
                <span v-if="props.column.field == 'action'">
                    <button type="button" data-toggle="modal" data-target="#AnnonceCandidatModal"
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
    import { onMounted, ref, reactive } from 'vue'
    import useAnnonces from '../../../../store/annonceStore.js'
    import useDemandes from '../../../../store/demandeStore.js'
    import useSecteurs from '../../../../store/secteurStore.js'
    import useUsers from '../../../../store/userStore.js'
    import 'vue-good-table-next/dist/vue-good-table-next.css'
    import { VueGoodTable } from 'vue-good-table-next';

    // add to component
    export default {
        
        setup() {
            let updating = ref(false);

            const {
                Annonces,
                Annonce,
                getAnnonces,
                getAnnoncesBySecteur,
                getAnnoncesByIdUser,
                getAnnonceById,
                getAnnonceCandidat,
                storeAnnonce,
                destroyAnnonce,
                updateAnnonce
                } = useAnnonces()
            
            const {Secteurs,getSecteurs} = useSecteurs()
            const {CurrentUsers} = useUsers()
            const userConnecter = JSON.parse(localStorage.currentUser)
            const token= localStorage.token
            function clear() {
                updating.value = false;
                Annonce.value = {
                    titre_annonce: '',
                    description_annonce: '',
                    niveau_etude: '',
                    secteur_activite: '',
                    type_annonce: 'candidat',
                    user_id: userConnecter.id,
                    type_annonce_candidat: ''
                    }   
            }

            function getAnnoncesByTitre(titre) {
                if (titre == "All") {

                    getAnnonces();
                } else {

                    getAnnoncesBySecteur(titre);
                }
            }
            
            function getSelectedAnnonce(id) {
                updating.value = true;
                getAnnonceCandidat(id)
                getAnnonceById(id) 
            }

            function createAnnonce(){
                storeAnnonce();
                getAnnoncesByIdUser(userConnecter.id)
                console.log({...Annonce.value})
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
                CurrentUsers,
                getAnnoncesByTitre,
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
