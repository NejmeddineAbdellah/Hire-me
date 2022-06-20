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
                            <input type="text" v-model="Secteur.titre_secteur" class="form-control" id="titre_secteur"
                                aria-describedby="text" placeholder="Entrer Votre le titre secteur">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" v-if="!updating" @click="createSecteur"
                        class="btn btn-primary">Enregistrer</button>
                    <button type="button" v-else @click="modifierSecteur(Secteur.id),updating=true"
                        class="btn btn-warning" data-dismiss="modal">Modifier</button>
                    <button type="button" @click="cleardata" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <h1>List des Secteurs</h1>

    <div class="Table_data">


        <vue-good-table :columns="columns" :rows="Secteurs" :select-options="{ enabled: false }" :pagination-options="{
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
                <button type="button" class="btn-success !important" data-toggle="modal" @click="clear"
                    data-target="#addSecteurModal">Add New Secteur d'activite</button>
            </template>
            <template #table-row="props">

                <span v-if="props.column.field == 'action'">
                    <button type="button" @click="getSecteurBy(props.row.id)" data-toggle="modal"
                        data-target="#addSecteurModal" class="btn-warning !important ml-3"><i
                            class="fa fa-pencil-square" aria-hidden="true"></i>
                    </button>
                    <button type="button" @click="deleteSecteur(props.row.id)" class="btn-danger !important ml-3"><i
                            class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </span>
            </template>
        </vue-good-table>

    </div>
</template>

<script>
    // import the styles
    import useSecteurs from '../../store/secteurStore.js'
    import {
        onMounted,
        ref
    } from 'vue'
    import 'vue-good-table-next/dist/vue-good-table-next.css'
    import {
        VueGoodTable
    } from 'vue-good-table-next';
    export default {
        setup() {

            let updating = ref(false);

            const {
                Secteurs,
                Secteur,
                getSecteurs,
                getSecteurById,
                storeSecteur,
                destroySecteur,
                updateSecteur
            } = useSecteurs()

            function getSecteurBy(id) {
                updating.value = true;
                getSecteurById(id)
            }

            function deleteSecteur(id) {
                destroySecteur(id)
                getSecteurs()
            }

            function createSecteur() {
                storeSecteur()
                getSecteurs()
                clear
            }

            function modifierSecteur(id) {
                updateSecteur(id)
                getSecteurs()
            }
            function clear() {
                updating.value = false;
                Secteur.value = {
                    titre_secteur: '',
                    }   
            }


            onMounted(getSecteurs)


            return {
                Secteur,
                updating,
                Secteurs,
                createSecteur,
                modifierSecteur,
                deleteSecteur,
                getSecteurBy,
                clear,
            }
        },

        components: {
            VueGoodTable,

        },
        data() {
            return {
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

    }
</script>

<style scoped>

</style>
