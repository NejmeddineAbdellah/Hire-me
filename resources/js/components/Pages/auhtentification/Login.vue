<template>
    <div calss="container">
        <form class="login_form ">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Email </label>
                <input type="email" v-model="User.email" id="email" name="email" class="form-control" required />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Mot de passe</label>
                <input :type="visibility" name="password" v-model="User.password" id="form2Example2"
                    class="form-control" autocomplete="on" required />


            </div>
            <label class="switch"><input type="checkbox" @click="isVisible" />
                <div></div>
            </label>
            <p>Afficher Mot de passe</p>
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                </div>

                <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="button" @click="login(User)" class="btn btn-primary btn-block mb-4">Connecter</button>

            <!-- Register buttons -->
            <div class="text-center">
                <router-link to='/Registre'>
                    <p>Pas un membre? <a>S'inscrire</a></p>
                </router-link>
            </div>
            <div v-if="Message!==''" class="alert alert-secondary" role="alert">
                {{Message}}
            </div>
        </form>
    </div>
</template>

<script>
    import {
        ref,
        reactive
    } from 'vue'
    import useUsers from '../../../store/userStore.js'
    export default {
        setup() {
            const User = ref({})
            let visibility = ref("password");
            const passwordField = document.querySelector('#password')

            const {
                CurrentUsers,
                loginUser,
                Message
            } = useUsers()

            function login(User) {
                if(localStorage){
                    loginUser(User)
                  
                }
                
            }

            function show() {
                visibility.value = "text"
            }

            function hide() {
                visibility.value = "password"
            }

            function isVisible() {
                if (visibility.value == "text") {
                    hide()
                } else {
                    show()
                }
            }




            return {
                
                User,
                login,
                Message,
                isVisible,
                visibility


            }
        },

    }
</script>

<style scoped>
    .login_form {
        margin: auto;
        padding: 30px;
        justify-content: space-evenly;
        width: 40%;


    }

    .text-center a {
        color: black;
    }

    input,
    label,
    button {
        font-size: 15px;
        margin: auto;
        height: auto;
    }

    .switch input {
        position: absolute;
        opacity: 0;
    }

    /**
 * 1. Adjust this to size
 */

    .switch {
        display: inline-block;
        font-size: 20px;
        /* 1 */
        height: 1em;
        width: 2em;
        background: #BDB9A6;
        border-radius: 1em;
    }

    .switch div {
        height: 1em;
        width: 1em;
        border-radius: 1em;
        background: #FFF;
        box-shadow: 0 0.1em 0.3em rgba(0, 0, 0, 0.3);
        -webkit-transition: all 300ms;
        -moz-transition: all 300ms;
        transition: all 300ms;
    }

    .switch input:checked+div {
        -webkit-transform: translate3d(100%, 0, 0);
        -moz-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
    }
</style>
