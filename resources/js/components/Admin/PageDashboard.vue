<template>

    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="widget-small primary coloured-icon"><a href="javascript:void(0)"><i
                        class="icon fa fa-users fa-3x"></i></a>
                <div class="info">
                    <h5>Total Candidats</h5>
                    <p><b>{{UsersCandidat.length}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="widget-small info coloured-icon"><a href="javascript:void(0)"><i
                        class="icon fa fa-briefcase fa-3x"></i></a>
                <div class="info">
                    <h5>Total Recruteurs</h5>
                    <p><b>{{UsersRecruteur.length}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="widget-small warning coloured-icon"><a href="javascript:void(0)"><i
                        class="icon fa fa-newspaper-o fa-3x"></i></a>
                <div class="info">
                    <h5>Total annonces Candidat</h5>
                    <p><b>{{AnnonceCandidat.length}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="widget-small danger coloured-icon"><a href="javascript:void(0)"><i
                        class="icon fa fa-bullhorn fa-3x"></i></a>
                <div class="info">
                    <h5>Total annonces Recrutement</h5>
                    <p><b>{{AnnonceRecruteur.length}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="widget-small danger coloured-icon"><a href="javascript:void(0)"><i
                        class="icon fa fa-envelope fa-3x"></i></a>
                <div class="info">
                    <h5>Total Des Demandes</h5>
                    <p><b>{{Demandes.length}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="widget-small warning coloured-icon"><a href="javascript:void(0)"><i
                        class="icon fa fa-graduation-cap  fa-3x"></i></a>
                <div class="info">
                    <h5>Total Secteurs d'activité</h5>
                    <p><b>{{Secteurs.length}}</b></p>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import useSecteurs from '../../store/secteurStore.js'
    import useAnnonces from '../../store/annonceStore.js'
    import useUsers from '../../store/userStore.js'
    import useDemandes from '../../store/demandeStore.js'
    import {
        onMounted
    } from 'vue'

    export default {

        setup() {
            const {
                UsersCandidat,
                UsersRecruteur,
                getUsersRecruteur,
                getUsersCandidat
            } = useUsers()
            const {
                Demandes,
                getDemandes
            } = useDemandes()
            const {
                Annonces,
                AnnonceCandidat,
                AnnonceRecruteur,
                getAnnonces,
                getAnnoncesRecruteur,
                getAnnoncesCandidat
            } = useAnnonces()
            const {
                Secteurs,
                getSecteurs,
            } = useSecteurs()

            onMounted(getSecteurs)
            onMounted(getDemandes)
            onMounted(getAnnoncesCandidat)
            onMounted(getUsersCandidat)
            onMounted(getAnnoncesRecruteur)
            onMounted(getUsersRecruteur)



            return {

                UsersCandidat,
                UsersRecruteur,
                Secteurs,
                Demandes,
                Annonces,
                AnnonceCandidat,
                AnnonceRecruteur

            }
        }
    }
</script>

<style scoped>
    .row {
        margin-top: 30px;
    }
</style>
