<template>

    <h1>List des Recruteurs</h1>
    <div class="Table_data">


        <vue-good-table :columns="columns" :rows="UsersRecruteur" 
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
                    data-toggle="modal" data-target="#addrecruteurModal">Ajouter un Recruteur</button>


            </template>

            <template #table-row="props">
                <span v-if="props.column.field == 'action'">
                    <button type="button" @click="deleteRecruteur(props.row.id)" class="btn-danger !important"><i
                            class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </span>
            </template>
        </vue-good-table>

    </div>
</template>

<script>
    import useUsers from '../../../store/userStore.js'
    import 'vue-good-table-next/dist/vue-good-table-next.css'
    import { onMounted, ref } from 'vue'
    import { VueGoodTable } from 'vue-good-table-next';
    export default {
        setup() {

            const {
                UsersRecruteur,
                getUsersRecruteur,
                destoryUser,
                Message,
            } = useUsers()

            function deleteRecruteur(id) {
                destoryUser(id)
                getUsersRecruteur()
            }
            onMounted(getUsersRecruteur)

            return {
                Message,
                UsersRecruteur,
                getUsersRecruteur,
                deleteRecruteur,

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
                        type: 'text',
                    },
                    {
                        label: 'Username',
                        field: 'username',
                        type: 'text',
                    },
                    {
                        label: 'telephone',
                        field: 'tele',
                        type: 'text',
                    },
                    {
                        label: 'Ville',
                        field: 'ville',
                        type: 'text',
                    },
                    {
                        label: "Secteur d'activite",
                        field: "secteur_activite",
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
