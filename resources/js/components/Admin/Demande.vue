<template>
    <h1>List des demandes</h1>

    <div class="Table_data">


        <vue-good-table :columns="columns" :rows="demandes" :select-options="{ enabled: false }" :pagination-options="{
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
            selectionChanged(params) {
                //params.selectedRows - all rows that are selected (this page)
                console.log(params.selectedRows)
            },
            getDemandes() {
                axios.get('http://127.0.0.1:8000/api/demande')
                    .then(res => {
                        this.demandes = res.data.data;
                    })
                    .catch(function (err) {
                        console.log(err);
                    })

            },
            deleteDemande(id) {
                axios.delete('http://127.0.0.1:8000/api/demande/' + id)
                    .then(res => {
                        this.getDemandes();
                    })
            },
            updateDemande(id) {
                this.updating = true;
                console.log(this.demande.id)
                axios.put('http://127.0.0.1:8000/api/demande/'+id, this.demande)
                    .then(res => {
                        this.getDemandes();
                        this.demande = {
                             
                            nom_candidat:'',
                            lettre_motivation:'',
                            id_annonce:'',
                            cv_candidat:''
                        }
                    })
                    .catch(function (err) {
                        console.log(err);
                    })
            },

        },
        data() {
            return {
                demande:{
                    nom_candidat:'',
                    id_annonce:'',
                    lettre_motivation:'',
                    cv_candidat:''
                },
                demandes: [],
                columns: [{
                        label: 'Nom candidat',
                        field: 'id_candidat',
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
                        label: 'cv_candidat',
                        field: 'cv_candidat',
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
            this.getDemandes();
        },
    }

</script>

<style scoped>

</style>
