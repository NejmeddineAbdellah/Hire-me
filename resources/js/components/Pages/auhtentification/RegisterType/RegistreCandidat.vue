<template>
    <div class="container mt-20">
        <form class="form-horizontal" role="form">
            <h2>Candidat</h2>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="email" id="email" placeholder="Email" v-model="User.email" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="password" id="password" v-model="User.password" name="password"
                        placeholder="Mot de passe" class="form-control" autocomplete="on" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="password" id="password_confirmation" v-model="User.password_confirmation"
                        placeholder="Confirmation du Mot de passe" class="form-control" autocomplete="on"
                        name="password_confirmation" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" id="nom" placeholder="Nom" v-model="User.nom_candidat" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" id="prenom" placeholder="Prenom" v-model="User.prenom_candidat"
                        class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" id="username" placeholder="Nom d'utilisateur" v-model="User.username"
                        class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <p> Votre image :</p>
                    <input type="file" @change="avatarupload" id="avatare" name="avatare" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <p> Votre Cv :</p>
                    <input type="file" id="cv" name="cv" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" id="nvetude" placeholder="Niveau d'etude" v-model="User.niveau_etude"
                        class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" id="Telephone" v-model="User.tele" placeholder="Telephone" class="form-control"
                        name="Telephone">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" id="Ville" placeholder="Ville" v-model="User.ville" class="form-control">
                </div>
            </div>

            <!-- /.form-group -->
            <button type="button" @click="createUser(User)" class="btn btn-primary btn-block">Register</button>
            <div v-if="Message!==''" class="alert alert-secondary" role="alert">
                {{Message}}
            </div>
        </form><!-- /form -->
    </div>
</template>

<script>
    import {
        onMounted,
        ref,
    } from 'vue'

    import useSecteurs from '../../../../store/secteurStore.js'
    import useUsers from '../../../../store/userStore.js'
    export default {

        setup() {
            
            const User = ref({
                role: "candidat",
                image_candidat: ''
            })

            const {
                Secteurs,
                getSecteurs
            } = useSecteurs()
            const {
                Message,
                storeUser,
            } = useUsers()

            function createUser(User) {
                storeUser(User)  
                            
            }


            function avatarupload(event) {

                let file = event.target.files[0];
                let reader = new FileReader();

                if (file['size'] < 4194304) {
                    reader.onloadend = (file) => {
                        User.value.image_candidat = reader.result;

                    }
                    reader.readAsDataURL(file);

                } else {

                    alert(
                        "ce fichier est trop volumineux pour être téléchargé, la taille de fichier maximale prise en charge est de 4 Mo");

                }


            }
            onMounted(getSecteurs)


            return {
                Secteurs,
                Message,
                User,
                createUser,
                avatarupload
            }
        },

        name: 'candidat'
    }
</script>

<style scoped>
    input,
    select,
    option {
        font-size: 20px;
        margin: auto;
        height: auto;
    }

    .form-horizontal {
        margin: auto;

    }
</style>
