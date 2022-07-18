<template>
    <div class="container mt-20">
        <form class="form-horizontal" role="form">
            <h2>Recruteur</h2>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" id="emil" placeholder="Email" v-model="User.email" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" id="name" placeholder="Company name" v-model="User.name" class="form-control">
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
                    <p>Choisir votre Logo</p>
                    <input type="file" id="logo" @change="avatarupload" placeholder="logo" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="password" id="password" v-model="User.password" placeholder="Mot de passe"
                        autocomplete="on" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="password" id="password_confirmation" v-model="User.password_confirmation"
                        placeholder="Confirmation Mot de passe" class="form-control" autocomplete="on">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="select-form">
                        <p>Choisir votre secteur d'activite</p>
                        <select class="selectpicker" v-model="User.secteur_activite">
                            <option value="All" selected>All</option>
                            <option v-for="secteur in Secteurs" :key="secteur.id" v-bind:value="secteur.titre_secteur">
                                {{secteur.titre_secteur}}</option>
                        </select>
                    </div>
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
                    <input type="text" id="ville" v-model="User.ville" placeholder="Ville" class="form-control"
                        name="ville">
                </div>
            </div>
            <!-- /.form-group -->
            <button type="button" @click="createUser(User)" class="btn btn-primary">Register</button>
            <div v-if="Message!==''" class="alert alert-secondary" role="alert">
                {{Message}}
            </div>
        </form>
        <!-- /form -->
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
                role: "recruteur",
                logo: ''

            })
            const {
                Secteurs,
                getSecteurs
            } = useSecteurs()
            const {
                Message,
                storeUser
            } = useUsers()

            function createUser(User) {
                storeUser(User)
            }

             function avatarupload(event) {

                let file = event.target.files[0];
                let reader = new FileReader();

                if (file['size'] < 4194304) {
                    reader.onloadend = (file) => {
                        User.value.logo = reader.result;

                    }
                    reader.readAsDataURL(file);

                } else {

                    alert(
                        "ce fichier est trop volumineux pour être téléchargé, la taille de fichier maximale prise en charge est de 4 Mo");

                }


            }

            onMounted(getSecteurs)


            return {
                Message,
                Secteurs,
                User,
                createUser,
                avatarupload,
            }
        },
        name: 'recruteur'
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
