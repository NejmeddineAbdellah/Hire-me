import {
    ref,
    reactive
} from 'vue'
import axios from "axios";


export default function useDemandes() {


    const Demandes = ref([])
    const Message = ref("")
    const token = ref(localStorage.token)
    let config = {
        headers: { 
            'Authorization': `Bearer ${localStorage.token}`,
            'Accept' : 'appliction/json'
         }
    }



    const getDemandes = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/demande',config)
        Demandes.value = response.data.data;

    }

    const getDemandesByAnnonceOfRecruteur = async (id) => {
        let response = await axios.get('http://127.0.0.1:8000/api/getdemanderecruteur/' + id,config)
        Demandes.value = response.data;
    }

    const getDemandesByUser = async (id) => {
        let response = await axios.get('http://127.0.0.1:8000/api/demande/' + id,config)
        Demandes.value = response.data;
    }

    const destroyDemande = async (id) => {

      let response = await axios.delete('http://127.0.0.1:8000/api/demande/' + id,config)
        Message.value = response.data.message;
    }


    const storeDemande = async (demande) => {
        let response = await axios.post('http://127.0.0.1:8000/api/demande', demande , config)
        Message.value = response.data.message;

    }

    return {
        Demandes,
        Message,
        getDemandes,
        getDemandesByUser,
        storeDemande,
        destroyDemande,
        getDemandesByAnnonceOfRecruteur,

    }
}