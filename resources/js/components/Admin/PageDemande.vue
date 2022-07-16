<template>
    <h1>List des demandes</h1>

    <div class="Table_data">


        <vue-good-table :columns="columns" :rows="Demandes" :select-options="{ enabled: false }" :pagination-options="{
    enabled: true,
    mode: 'records',
    perPage: 10,
    position: 'bottom',
    perPageDropdown: [3, 7, 9],
    dropdownAllowAll: false,
    setCurrentPage: 2,
    nextLabel: 'next',
    prevLabel: 'prev',
    rowsPerPageLabel: 'Lignes par page',
    ofLabel: 'of',
    pageLabel: 'page', // for 'pages' mode
    allLabel: 'All',
    infoFn: (params) => `page ${params.firstRecordOnPage}`, 
  }">

            <template #table-row="props">

                <span v-if="props.column.field == 'action'">
                    <button type="button" @click="deleteDemande(props.row.id)" class="btn-danger !important"><i
                            class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </span>
            </template>
        </vue-good-table>

    </div>
</template>

<script>
    import { onMounted } from 'vue'
    import useDemandes from '../../store/demandeStore.js'
    import 'vue-good-table-next/dist/vue-good-table-next.css'
    import {
        VueGoodTable
    } from 'vue-good-table-next';
    export default {

        setup() {

                const{Demandes,destroyDemande,getDemandes}=useDemandes()

                function deleteDemande(id){
                    destroyDemande(id)
                    getDemandes()
                }
                onMounted(getDemandes)


            return{
                Demandes,
                deleteDemande,

            }
        },

        components: {
            VueGoodTable,

        },

        data() {
            return {
                columns: [{
                        label: 'Nom candidat',
                        field: 'user_id',
                        type: 'text',
                    },
                    {
                        label: 'Titre annonce',
                        field: 'id_annonce',
                        type: 'text',
                    },
                    {
                        label: 'lettre_motivation',
                        field: 'lettre_motivation',
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
