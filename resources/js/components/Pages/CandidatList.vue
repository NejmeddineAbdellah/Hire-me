<template>
    <TheSlider />
    <div class="container">

        <!-- Search Box -->
        <div class="row mt-20">
            <div class="col-xl-10">
                <!-- form -->
                <form action="#" class="search-box w-100">
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
                    <div class="search-form ">

                        <a href="javascript:void(0)" @click="getAnnoncesByTitre(titre_secteur_selecter)"><small>Trouver
                            Candidat</small></a>
                    </div>
                </form>
            </div>
        </div>

        <!-- End search form -->
        <div class="list-group mt-5 row">
            <p><span>Total d'annonce est :</span>{{Annonces.length}}</p>
            <a v-for="annonce in Annonces" :key="annonce.id"
                class="list-group-item list-group-item-action flex-column align-items-start mb-50 border">
                <div class="col-md"> {{annonce.secteur_activite}}
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{annonce.titre_annonce}} <small>{{annonce.username}}</small></h5>
                        <span>{{annonce.secteur_activite}}</span><br><br><br>
                        <span><button type="button" class="btn btn-info"><a :href="AfficherCv(annonce.cv_candidat)" target="_blank" rel="noopener noreferrer" class="showcv">Afficher le CV</a></button></span>
                    </div>
                  
                    <p class="mb-1">{{annonce.description_annonce}}</p>
                    <br><br><br>
                    <div class="d-flex  w-100 justify-content-between">
                        <small>Niveau d'etude :{{annonce.niveau_etude}}</small>
                        <small>Type d'annonce :{{annonce.type_annonce_candidat}}</small>
                        <small>Ville :{{annonce.ville}}</small>
                        <small>Tele :{{annonce.tele}}</small>
                    </div>
                </div>

            </a>
            <br><br><br>
        </div>

    </div>
</template>

<script>
    import TheSlider from '../TheSlider.vue'
    import useAnnonce from '../../store/annonceStore'
    import useSecteurs from '../../store/secteurStore.js'
    import {
        onMounted,
        ref
    } from 'vue'
    export default {


        setup() {
          const titre_secteur_selecter = ref('')
           const userConnecter = JSON.parse(localStorage.currentUser)
            const {
                Annonces,
                getAnnoncesCandidat,
                getAnnoncesCandidatByTitre,

            } = useAnnonce()
  const {
                Secteurs,
                getSecteurs
            } = useSecteurs()



            function getAnnoncesByTitre(titre) {

                if (titre == "All") {
                    getAnnoncesCandidat();

                } else {
                    getAnnoncesCandidatByTitre(titre);

                }

            }
            function AfficherCv(cv){
                
                return 'img/users/cv/'+cv;
             }



            onMounted(getAnnoncesCandidat)
            onMounted(getSecteurs)

            return {
              Secteurs,
              Annonces,
              titre_secteur_selecter,
              getAnnoncesByTitre,
              AfficherCv,

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
    showcv{
        font-size: 15px;
        color:brown !important;
    }
</style>