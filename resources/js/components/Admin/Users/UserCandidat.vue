<template>
  
    <h1>List des Candidat</h1>

    <div class="Table_data">
        <vue-good-table :columns="columns" :rows="UsersCandidat"
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
                <button type="button" class="btn-success !important" @click="cleardata"
                    data-toggle="modal" data-target="#addcandidatModal">Ajouter un Candidat</button>


            </template>

            <template #table-row="props">

                <span v-if="props.column.field == 'action'">
                    <button type="button" @click="deleteCandidat(props.row.id)" class="btn-danger !important"><i
                            class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </span>
            </template>
        </vue-good-table>

    </div>
</template>

<script>
    import useUsers from '../../../store/userStore.js'
    import {
        onMounted
    } from 'vue'
    import 'vue-good-table-next/dist/vue-good-table-next.css'
    import {
        VueGoodTable
    } from 'vue-good-table-next';

    export default {
        setup() {

            const {
                UsersCandidat,
                getUsersCandidat,
                destoryUser,
                Message,
            } = useUsers()

            function deleteCandidat(id){
                destoryUser(id)
                getUsersCandidat()
            }
            onMounted(getUsersCandidat)

            return {
                Message,
                UsersCandidat,
                getUsersCandidat,
                deleteCandidat,
                
            }
        },
        components: {
            VueGoodTable,

        },
      
        data() {
            return {
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
    }
</script>

<style scoped>

</style>
