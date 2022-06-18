import { ref } from 'vue'
import axios from "axios";



export default function useAnnonces(){


        const Annonces = ref([])
        const Annonce = ref([])



        const getAnnoncesBySecteur = async(titre) => {  

            let response = await axios.get('http://127.0.0.1:8000/api/annoncebysecteur/'+titre)
            Annonces.value = response.data;

        }
   
        const getAnnonces = async() => {

            let response = await axios.get('http://127.0.0.1:8000/api/annonce')           
            Annonces.value = response.data;

        }

        const getAnnonceById = async(id) => {

            let response = await axios.get('http://127.0.0.1:8000/api/annonce/'+id)           
            Annonce.value = response.data;

        }

        const getAnnoncesByIdUser = async (user_id) => {

            let response = await axios.get('http://127.0.0.1:8000/api/getAnnonceByuserId/'+user_id)
            Annonces.value = response.data;
          
        }
        
        const getAnnonceCandidat = async (annonce_id) => {
            
            let response = await axios.get('http://127.0.0.1:8000/api/ancandidat/'+annonce_id)
            Annonce.value = response.data;
        }

        const storeAnnonce = async () => {
            await axios.post('http://127.0.0.1:8000/api/annonce' , Annonce.value)
            
        }

        const updateAnnonce = async (annonce_id) => {
            await axios.put('http://127.0.0.1:8000/api/annonce/' + annonce_id ,Annonce.value)
      
            
           
        }
        const destroyAnnonce = async (id) => {
            axios.delete('http://127.0.0.1:8000/api/annonce/'+ id)
        }

        

        return {
          Annonces,
          Annonce,
          getAnnonces,
          getAnnoncesBySecteur,
          getAnnoncesByIdUser,
          getAnnonceById,
          getAnnonceCandidat,
          storeAnnonce,
          updateAnnonce,
          destroyAnnonce,

        }
}
