import { ref } from 'vue'
import axios from "axios";


export default function useSecteurs(){


        const Secteurs = ref([])

        const getSecteurs= async() => {
           let response = await axios.get('http://127.0.0.1:8000/api/secteur')           
              Secteurs.value = response.data.data;

        }

        return {
          Secteurs,
          getSecteurs,

        }
}