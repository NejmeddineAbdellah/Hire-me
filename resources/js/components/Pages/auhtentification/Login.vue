<template>
    <div calss="container">
        <form class="login_form">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Email address</label>
                <input type="email" v-model="User.email" id="email" name="email" class="form-control" required />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input type="password" v-model="User.password" id="form2Example2" class="form-control" autocomplete="on"
                    required />
            </div>

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
            <button type="button" @click="login(User)" class="btn btn-primary btn-block mb-4">Sign in</button>

            <!-- Register buttons -->
            <div class="text-center">
                <router-link to='/Registre'>
                    <p>Not a member? <a>Register</a></p>
                </router-link>
            </div>
            <div v-if="Message!==''" class="alert alert-secondary" role="alert">
                {{Message}}
            </div>
        </form>
    </div>
</template>

<script>

//import hd from '../../Header.vue'
import { onMounted, ref, reactive } from 'vue'
import useUsers from '../../../store/userStore.js'
    export default {
            setup() {
                const User = ref({})
                
                const {CurrentUsers,loginUser,Message} = useUsers()
            
                function login(User){
                     loginUser(User)
                      if(localStorage.currentUser){
                    localStorage.logged=true
                     }    
                }
               


                return {
                    CurrentUsers,
                    User,
                    login,
                    Message,
                    
                }
            },    
    }

</script>

<style scoped>
    .login_form {
        margin: auto;
        padding: 10px;
        justify-content: space-evenly;
        width: 40%;

    }

    .text-center a {
        color: black;
    }

    input,
    label,
    button {
        font-size: 20px;
        margin: auto;
        height: auto;
    }

</style>
