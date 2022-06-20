import { ref } from 'vue'
import axios from "axios";


export default function useSecteurs(){


        const Secteurs = ref([])
        const Secteur = ref([])

        const getSecteurs= async() => {
           let response = await axios.get('http://127.0.0.1:8000/api/secteur')           
              Secteurs.value = response.data.data;

        }

        const getSecteurById = async (id) => {

          let response = await axios.get('http://127.0.0.1:8000/api/secteur/' + id)
          Secteur.value = response.data;
      }

        const storeSecteur = async() => {
          await axios.post('http://127.0.0.1:8000/api/secteur',Secteur.value) 

        }

        const destroySecteur = async(id) => {
          let response = await axios.delete('http://127.0.0.1:8000/api/secteur/'+id)           
              //Secteurs.value = response.data.data;
        }
        const updateSecteur = async(id) => {
          await axios.put('http://127.0.0.1:8000/api/secteur/'+id,Secteur.value)   
        }


        return {
          Secteur,
          Secteurs,
          getSecteurs,
          getSecteurById,
          storeSecteur,
          updateSecteur,
          destroySecteur,

        }
}