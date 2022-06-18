<template>
    <Slider />
    <div class="container">

        <!-- Search Box -->
        <div class="row  mt-20">
            <div class="col-xl-8">
                <!-- form -->
                <form action="#" class="search-box">
                    <div class="input-form">
                        <input type="text" placeholder="Choisir le secteur d'activite">
                    </div>
                    <div class="select-form"  >
                        <select class="selectpicker" v-model="an.titre_secteur" >
                            <option>All</option>
                            <option v-for="secteur in Secteurs" :key="secteur.id" v-bind:value="secteur.titre_secteur">{{secteur.titre_secteur}}</option>
                        </select>

                    </div>
                    <div class="search-form">
                 
                        <a v-on:click="getAnnoncesByTitre(this.an.titre_secteur)">Find job</a>
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
                    <button type="button" class="btn btn-sm">Postuler</button>
                </div>
            </a>
        </div>
        
    </div>
</template>

<script>
    import useAnnonces from '../../store/annonceStore.js'
    import useSecteurs from '../../store/secteurStore.js'
    import { onMounted } from 'vue'
    import Slider from '../Slider.vue'


    export default {

        setup() {
            const {Annonces,getAnnonces,getAnnoncesBySecteur}=useAnnonces()
            const {Secteurs,getSecteurs}=useSecteurs()
            function getAnnoncesByTitre (titre) {
                  if(titre=="All"){

                   getAnnonces();

                }else{
                    
                   getAnnoncesBySecteur(titre);
                }
            }
            onMounted(getSecteurs)
            onMounted(getAnnonces)

            return {
                Annonces,
                Secteurs,
                getAnnoncesByTitre1,
            }
        },
        data() {
            return { 
                an:{
                    titre_secteur:""
                }
            }
        },
        components: {
            Slider,
        },
    }

</script>


<style scoped>

    h5,span {
    font-size:20px;
    
    }
    p{
        font-size:17px;
    }
    small{
        font-size:15px;
    }

</style>
