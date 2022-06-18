<template>


    <div id="addSecteurModal" class="modal" tabindex="-1" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" v-if="!updating">Ajouter Secteur</h5>
                    <h5 class="modal-title" v-else>Modifier Secteur</h5>
                    <button type="button" @click="cleardata" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">titre secteur</label>
                            <input type="text" v-model="secteur.titre_secteur" class="form-control" id="titre_secteur"
                                aria-describedby="text" placeholder="Entrer Votre le titre secteur">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" v-if="!updating" @click="addSecteur"
                        class="btn btn-primary">Enregistrer</button>
                    <button type="button" v-else @click="updateSecteur(this.secteur.id)"
                        class="btn btn-warning">Modifier</button>
                    <button type="button" @click="cleardata" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <h1>List des Secteurs</h1>

    <div class="Table_data">


        <vue-good-table :columns="columns" :rows="secteurs" :select-options="{ enabled: false }" :pagination-options="{
    enabled: true,
    mode: 'records',
    perPage: 10,
    position: 'bottom',
    perPageDropdown: [3, 7, 9],
    dropdownAllowAll: false,
    setCurrentPage: 2,
    nextLabel: 'next',
    prevLabel: 'prev',
    rowsPerPageLabel: 'Rows per page',
    ofLabel: 'of',
    pageLabel: 'page', // for 'pages' mode
    allLabel: 'All',
    infoFn: (params) => `page ${params.firstRecordOnPage}`, 
  }">
            <template #table-actions>
                <button type="button" class="btn-success !important" data-toggle="modal"
                    data-target="#addSecteurModal">Add New Secteur d'activite</button>
            </template>
            <template #table-row="props">

                <span v-if="props.column.field == 'action'">
                    <button type="button" @click="getSecteurSelected(props.row.id),updating=true" data-toggle="modal"
                        data-target="#addSecteurModal" class="btn-warning !important"><i class="fa fa-pencil-square"
                            aria-hidden="true"></i>
                    </button>
                    <button type="button" @click="deleteSecteur(props.row.id)" class="btn-danger !important"><i
                            class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </span>
            </template>
        </vue-good-table>

    </div>
</template>

<script>
    // import the styles
    import 'vue-good-table-next/dist/vue-good-table-next.css'
    import {
        VueGoodTable
    } from 'vue-good-table-next';
    export default {
        components: {
            VueGoodTable,

        },
        methods: {

            getSecteurs() {
                axios.get('http://127.0.0.1:8000/api/secteur')
                    .then(res => {
                        this.secteurs = res.data.data;
                    })
                    .catch(function (err) {
                        console.log(err);
                    })

            },
            addSecteur() {
                axios.post('http://127.0.0.1:8000/api/secteur', this.secteur)
                    .then(res => {
                        this.getSecteurs()
                        this.secteur = {
                            titre_secteur: "",
                        }
                    })
                    .catch(function (err) {
                        console.log(err);
                    })
            },
            deleteSecteur(id) {
                axios.delete('http://127.0.0.1:8000/api/secteur/' + id)
                    .then(res => {
                        this.getSecteurs();
                    })
            },
            updateSecteur(id) {
                this.updating = true;
                console.log(this.secteur.id)
                axios.put('http://127.0.0.1:8000/api/secteur/'+id, this.secteur)
                    .then(res => {
                        this.getSecteurs();
                        this.secteur = {
                            titre_secteur: "",
                        }
                    })
                    .catch(function (err) {
                        console.log(err);
                    })
            },
            getSecteurSelected(id) {
                axios.get('http://127.0.0.1:8000/api/secteur/' + id)
                    .then(res => {
                        this.secteur.titre_secteur = res.data.titre_secteur
                        this.secteur.id = res.data.id
                        console.log(res.data.titre_secteur)


                    })
                    .catch(function (err) {
                        console.log(err);
                    })
            },

        },
        data() {
            return {
                secteur: {
                    titre_secteur: ''
                },
                secteurs: [],
                columns: [{
                        label: 'id secteur',
                        field: 'id',
                        type: 'text',
                    },
                    {
                        label: 'Titre secteur',
                        field: 'titre_secteur',
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
        mounted() {
            this.getSecteurs();
        },
    }

</script>

<style scoped>

</style>
