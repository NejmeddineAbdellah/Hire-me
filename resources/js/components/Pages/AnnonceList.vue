<template>
    <TheSlider />
    <div class="container">

        <!-- Search Box -->
        <div class="row mt-20">
            <div class="col-xl-8">
                <!-- form -->
                <form action="#" class="search-box">
                    <div class="input-form">
                        <input type="text" placeholder="Choisir le secteur d'activite">
                    </div>
                    <div class="select-form">
                        <select v-model="titre_secteur_selecter" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option>All</option>
                            <option v-for="secteur in Secteurs" :key="secteur.id" v-bind:value="secteur.titre_secteur">
                                {{secteur.titre_secteur}}</option>
                        </select>

                    </div>
                    <div class="search-form">

                        <a v-on:click="getAnnoncesByTitre(titre_secteur_selecter)">Find job</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- End search form -->
        <div class="list-group mt-5 row">
            <p><span>Total d'annonce est :</span>{{Annonces.length}}</p>
            <a v-for="annonce in Annonces" :key="annonce.id"
                class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="col-md">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{annonce.titre_annonce}}</h5>
                        <span>{{annonce.secteur_activite}}</span>
                    </div>
                    <p class="mb-1">{{annonce.description_annonce}}</p>
                    <small>Contract :{{annonce.contrat}}</small><br />
                    <small>Salaire :{{annonce.salaire}}</small>


                </div>
                <div class="col-md mt-20">
                    <router-link v-bind:to="/Postuler/+annonce.annonce_id">
                        <button type="button" @click="" class="btn btn-sm">Postuler</button>
                    </router-link>
                </div>
            </a>
        </div>

    </div>
</template>

<script>
    import useAnnonces from '../../store/annonceStore.js'
    import useSecteurs from '../../store/secteurStore.js'
    import {
        onMounted,
        ref
    } from 'vue'
    import TheSlider from '../TheSlider.vue'


    export default {

        setup() {
            const titre_secteur_selecter = ref('')
            const connectedUser = localStorage.currentUser
            const {
                Annonces,
                getAnnonces,
                getAnnoncesBySecteur,
                getAnnoncebyConnectedUser,
                getAnnoncesRecruteurByTitre,
                getAnnoncesCandidatByTitre
            } = useAnnonces()
            const {
                Secteurs,
                getSecteurs
            } = useSecteurs()

            function getAnnoncesByTitre(titre) {
                if (connectedUser.role == 'recruteur') {
                    if (titre == "All") {
                        getAnnoncesCandidat();
                    } else {
                        getAnnoncesCandidatByTitre(titre);
                    }
                } else if (connectedUser.role == 'candidat') {
                    if (titre == "All") {
                        getAnnoncesRecruteur();
                    } else {
                        getAnnoncesRecruteurByTitre(titre);
                    }
                } else {

                    if (titre == "All") {
                        getAnnonces();
                    } else {
                        getAnnoncesBySecteur(titre);
                    }

                }
            }
            onMounted(getSecteurs)
            onMounted(getAnnoncebyConnectedUser)

            return {
                connectedUser,
                Annonces,
                Secteurs,
                getAnnoncesByTitre,
                titre_secteur_selecter,
                getAnnoncebyConnectedUser,
               
            }
        },
        components: {
            TheSlider,
        },
    }
</script>


<style scoped>
    h5,
    span {
        font-size: 20px;

    }

    p {
        font-size: 17px;
    }

    small {
        font-size: 15px;
    }
</style>
