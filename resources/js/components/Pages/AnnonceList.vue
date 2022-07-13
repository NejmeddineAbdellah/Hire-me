<template>
    <TheSlider />
    <div class="container">

        <!-- Search Box -->
        <div class="row mt-20">
            <div class="col-xl-8">
                <!-- form -->
                <div class="alert alert-info fade show" role="alert" v-if="Message">
                          vous devez connectez pour postuler pour l'annonce !!
                            </div>
                <form action="#" class="search-box">
                    <div class="input-form">
                        <input type="text" placeholder="Choisir le secteur d'activite">
                    </div>
                    <div class="select-form">
                        <select v-model="titre_secteur_selecter" class="form-select" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option>All</option>
                            <option v-for="secteur in Secteurs" :key="secteur.id" v-bind:value="secteur.titre_secteur">
                                {{secteur.titre_secteur}}</option>
                        </select>

                    </div>
                    <div class="search-form">

                        <a href="javascript:void(0)" @click="getAnnoncesByTitre(titre_secteur_selecter)">Chercher</a>
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
                    <small>Contrat :{{annonce.contrat}}</small><br />
                    <small>Salaire :{{annonce.salaire}}</small>


                </div>
                <div class="col-md mt-20">
                    <router-link v-bind:to="/Postuler/+annonce.annonce_id">
                    </router-link>
                    <button type="button" @click="postuler_annonce(annonce.annonce_id)"
                        class="btn btn-sm">Postuler</button>


                </div>
            </a>
        </div>

    </div>
</template>

<script>
    import useAnnonces from '../../store/annonceStore.js'
    import {
        useRouter
    } from 'vue-router'
    import useSecteurs from '../../store/secteurStore.js'
    import {
        onMounted,
        ref
    } from 'vue'
    import TheSlider from '../TheSlider.vue'


    export default {

        setup() {
            const titre_secteur_selecter = ref('')
            const router = useRouter()
            let Message = ref(false)
            let connectedUser = ref()
            const {
                Annonces,
                getAnnonces,
                getAnnoncesBySecteur,
                getAnnoncebyConnectedUser,
                getAnnoncesCandidat,
                getAnnoncesRecruteur,
                getAnnoncesRecruteurByTitre,
                getAnnoncesCandidatByTitre
            } = useAnnonces()
            const {
                Secteurs,
                getSecteurs
            } = useSecteurs()

            function postuler_annonce(annonce_id) {
                let connectedUser = localStorage.currentUser
                if (!connectedUser) {

                    Message.value=true      
                    //router.push('/login')
                } else {

                    router.push('/Postuler/' + annonce_id)

                }
            }

            function getAnnoncesByTitre(titre) {

                if (!localStorage.currentUser) {

                    if (titre == "All") {
                        getAnnoncesRecruteur();

                    } else {
                        getAnnoncesRecruteurByTitre(titre);

                    }
                }

            }
            onMounted(getSecteurs)
            onMounted(getAnnoncebyConnectedUser)

            return {
                connectedUser,
                Annonces,
                Message,
                Secteurs,
                getAnnoncesByTitre,
                titre_secteur_selecter,
                getAnnoncebyConnectedUser,
                postuler_annonce,

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
