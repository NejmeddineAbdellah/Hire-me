import {
    ref
} from 'vue'
import axios from "axios";




export default function useAnnonces() {


    const Annonces = ref([])
    const Annonce = ref([])
    const AnnonceC = ref([])
    const AnnonceR = ref([])
    const Message = ref([])
    const AnnonceCandidat = ref([])
    const AnnonceRecruteur = ref([])
  
    let config = {
        headers: { 
            'Authorization': `Bearer ${localStorage.token}`,
            'Accept' : 'appliction/json'
         }
    }

    const getAnnoncesBySecteur = async (titre) => {

        let response = await axios.get('http://127.0.0.1:8000/api/annoncebysecteur/' + titre)
        Annonces.value = response.data;

    }
    const getAnnonces = async () => {

        let response = await axios.get('http://127.0.0.1:8000/api/annonce', config)
        Annonces.value = response.data;
    }
    const getAnnoncesCandidat = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/annonceByType/candidat', config)
        AnnonceCandidat.value = response.data;
        Annonces.value = response.data;

        
    }
    const getAnnoncesRecruteur = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/annonceByType/recruteur', config)
        AnnonceRecruteur.value = response.data;
        Annonces.value = response.data;
        
    }
    const getAnnoncesRecruteurByTitre = async (titre) => {
        let response = await axios.get('http://127.0.0.1:8000/api/getAnnonceRecruteurBySecteur/' + titre, config)
        Annonces.value = response.data;
        
    }
    const getAnnoncesCandidatByTitre = async (titre) => {
        let response = await axios.get('http://127.0.0.1:8000/api/getAnnonceCandidatBySecteur/' + titre,config)
        Annonces.value = response.data;
        
    }
    const getAnnonceById = async (id) => {

        let response = await axios.get('http://127.0.0.1:8000/api/annonce/' + id,config)
        Annonce.value = response.data;

    }
    const getAnnoncesByIdUser = async (id) => {
      
        let response = await axios.get('http://127.0.0.1:8000/api/getAnnonceByuserId/' + id, config)
        Annonces.value = response.data;

    }
    const getAnnonceCandidat = async (annonce_id) => {

        let response = await axios.get('http://127.0.0.1:8000/api/ancandidat/' + annonce_id,config)
        Annonce.value = response.data;
    }
    const storeAnnonce = async (Annonce) => {
        let response = await axios.post('http://127.0.0.1:8000/api/annonce', Annonce,config)
        Message.value = response.data.message;
    }
    const updateAnnonce = async (annonce_id) => {
        await axios.put('http://127.0.0.1:8000/api/annonce/' + annonce_id, Annonce.value,config)

    }
    const destroyAnnonce = async (id) => {
        axios.delete('http://127.0.0.1:8000/api/annonce/' + id,config)
    } 
    const getAnnoncebyConnectedUser = async () => {
        if(localStorage.currentUser)
        {
            if(JSON.parse(localStorage.currentUser).role =='candidat')
            {
                await getAnnoncesRecruteur()
    
            }else if(JSON.parse(localStorage.currentUser).role =='recruteur'){
               await getAnnoncesCandidat()
               
            }
        }else{
            await getAnnonces()
        }
        
    }
    const getLatestAnnonceCandidat = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/getlatestcandidatannonce')
        AnnonceC.value = response.data[0];
    }
    const getLatestAnnonceRecruteur = async () => {
        let response = await axios.get('http://127.0.0.1:8000/api/getlatestrecruteurannonce')
        AnnonceR.value = response.data[0];
    }



    return {
        Annonces,
        Annonce,
        AnnonceC,
        AnnonceR,
        Message,
        AnnonceCandidat,
        AnnonceRecruteur,
        getAnnonces,
        getAnnoncesBySecteur,
        getAnnoncesByIdUser,
        getAnnonceById,
        getAnnonceCandidat,
        getAnnoncesRecruteur,
        getAnnoncesCandidat,
        getAnnoncebyConnectedUser,
        getAnnoncesRecruteurByTitre,
        getAnnoncesCandidatByTitre,
        getLatestAnnonceCandidat,
        getLatestAnnonceRecruteur,
        storeAnnonce,
        updateAnnonce,
        destroyAnnonce,

    }
}
