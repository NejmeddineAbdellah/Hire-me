<template>
    <div class="container">
        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                    alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">{{userConnecter.nom_candidat}}</h5>
                                <p class="text-muted mb-4">{{userConnecter.username}}</p>
                                <p class="text-muted mb-1">{{userConnecter.secteur_activite}}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nom Entreprise</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{userConnecter.name}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{userConnecter.email}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{userConnecter.tele}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{userConnecter.ville}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4">Total d'<span
                                                class=" text-primary font-italic me-1">Annonces</span></p>
                                        <p>{{Annonces.length}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4">Total du <span
                                                class="text-primary font-italic me-1">Demanades</span></p>
                                        <p>{{Demandes.length}}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import {
        onMounted,
        ref,
        reactive
    } from 'vue'
    import useAnnonces from '../../../../store/annonceStore.js'
    import useDemandes from '../../../../store/demandeStore.js'
    export default {

        setup() {
            const {
                Annonces,
                getAnnoncesByIdUser
            } = useAnnonces()
            const {
                Demandes,
                getDemandesByUser    
            } = useDemandes()
            const userConnecter = JSON.parse(localStorage.currentUser)

          onMounted(getAnnoncesByIdUser(userConnecter.id),getDemandesByUser(userConnecter.id))

            return {
                Annonces,
                Demandes,
                userConnecter,
                getAnnoncesByIdUser,
           
            }


        },
    }

</script>

<style scoped>

</style>
