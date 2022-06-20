import { ref } from 'vue'
import axios from "axios";


export default function useDemandes(){


        const Demandes = ref([])


        const getDemandes= async() => {
           let response = await axios.get('http://127.0.0.1:8000/api/demande')           
           Demandes.value = response.data.data;
  

        }

        const getDemandesByUser = async(id) => {
          let response = await axios.get('http://127.0.0.1:8000/api/demande/'+id)           
          Demandes.value = response.data;
        }

        const destroyDemande = async(id) => {

          await axios.delete('http://127.0.0.1:8000/api/demande/'+id)

        }

        return {
          Demandes,
          getDemandes,
          getDemandesByUser,
          destroyDemande,

        }
}