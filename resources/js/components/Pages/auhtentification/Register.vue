<template>
    <div class="container">
        <div class="Radiocheck" style="padding-top:15rem;">

            <input type="radio" id="role" name="role" checked @click="activeform = 'RegistreCandidat'" value="Candidat">
            Candidat
            <input type="radio" id="role" name="role" @click="activeform = 'RegistreRecruteur'" value="Recruteur"
                style="margin-left:20px;"> Recruteur

        </div>
    </div>
    <component :is="activeform"></component>
</template>

<script>
    import RegistreCandidat from './RegisterType/RegistreCandidat.vue'
    import RegistreRecruteur from './RegisterType/RegistreRecruteur.vue'
    export default {
        name: 'Register',
        components: {
            RegistreCandidat,
            RegistreRecruteur,
        },
        data() {
            return {
                activeform: 'RegistreCandidat',
            };
        },

    }

</script>

<style>
    .form-horizontal {       
        padding: 10px;
        width: 50%;
        margin: auto;

    }

    .form-horizontal button {
        margin: auto;
        width: min-content;
    }

    .Radiocheck {
        margin-left: 200px;
        font-size: 20px;
    }

</style>
