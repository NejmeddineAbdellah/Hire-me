<template>
    <div class="card-0 justify-content-center d-block">
        <div class="card-body px-sm-4 px-0">
            <div class="row justify-content-center round">
                <div class="col-lg-10 col-md-12 ">
                    <div class="card shadow-lg card-1">
                        <div class="card-body inner-card">
                            <div class="row justify-content-center">
                            <div v-if="Message!==''" class="alert alert-secondary" role="alert">
                            {{Message}}
                            </div>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                
                                    <div class="form-group"><label for="first-name">Nom et prénom</label><input v-model="nomprenom" type="text"
                                            class="form-control" id="first-name" placeholder=""> </div>

                                    <div class="form-group"> <label for="exampleFormControlTextarea2">Demande</label>
                                        <textarea class="demande" v-model="demande.lettre_motivation" id="demande" name="demande"
                                            rows="5" required></textarea></div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-10 col-12">
                                    <div class="mb-2 mt-4">
                                        <div class="text-right">
                                            <button type="button" @click="createDemande" class="btn btn-primary btn-block"><small
                                                    class="font-weight-bold">Postuler</small></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import useDemanndes from '../../store/demandeStore.js'
 import {
        onMounted,
        ref,
        reactive
    } from 'vue'
    import {useRoute} from 'vue-router'

    export default {
    setup() {
        const route = useRoute()
        const connectedUser = JSON.parse(localStorage.currentUser)
   
        const demande = reactive({
            'lettre_motivation':'',
            'user_id':connectedUser.user_id,
            'id_annonce':route.params.id,
         
        })
        
        const {
            Demandes,
            Message,
            storeDemande
        }=useDemanndes()

       const createDemande = async() => {
        await storeDemande({...demande})
       }

        return{
            demande,
            Message,
            createDemande,
        }

    }

    }
</script>
<style scoped>
    input,
    label,
    span,
    button {
        font-size: 15px;
        margin: auto;
        height: auto;
        width: max-content;
    }

    /*----------------------------*/
    .card-0 {
        min-height: 110vh;
        background: linear-gradient(-20deg, rgb(255, 255, 255) 50%, #0275d8 50%);
        color: white;
        border: 0px
    }

    p {
        font-size: 15px;
        line-height: 25px !important;
        font-weight: 500
    }

    .container {
        padding-top: 0px !important;
        border-radius: 20px
    }

    .btn {
        letter-spacing: 1px
    }

    select:active {
        box-shadow: none !important;
        outline-width: 0 !important
    }

    select:after {
        box-shadow: none !important;
        outline-width: 0 !important
    }

    input,
    textarea {
        padding: 10px 12px 10px 12px;
        border: 1px solid lightgrey;
        border-radius: 0px !important;
        margin-bottom: 5px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        color: #2C3E50;
        font-size: 14px;
        letter-spacing: 1px;
        resize: none
    }

    select:focus,
    input:focus {
        box-shadow: none !important;
        border: 1px solid #2196F3 !important;
        outline-width: 0 !important;
        font-weight: 400
    }

    label {
        margin-bottom: 2px;
        font-weight: bolder;
        font-size: 14px
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #304FFE;
        outline-width: 0
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }

    .form-control {
        height: calc(2em + .75rem + 3px)
    }

    .inner-card {
        margin: 79px 0px 70px 0px
    }

    .card-0 {
        margin-top: 100px;
        margin-bottom: 100px
    }

    .card-1 {
        border-radius: 17px;
        color: black;
        box-shadow: 2px 4px 15px 0px rgb(0, 0, 0, 0.5) !important
    }

    #file {
        border: 2px dashed #92b0b3 !important
    }

    .color input {
        background-color: #f1f1f1
    }

    .files:before {
        position: absolute;
        bottom: 60px;
        left: 0;
        width: 100%;
        content: attr(data-before);
        color: #000;
        font-size: 12px;
        font-weight: 600;
        text-align: center
    }

    #file {
        display: inline-block;
        width: 100%;
        padding: 95px 0 0 100%;
        background: url('https://i.imgur.com/VXWKoBD.png') top center no-repeat #fff;
        background-size: 55px 55px
    }
</style>
