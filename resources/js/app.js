require('./bootstrap');


 
import { createApp } from 'vue'
import App from './App.vue' 
import Adm from './components/Admin/AppAdmin.vue'
import router from './router/index'



const app = createApp(App);
const admin = createApp(Adm)
app.use(router).mount('#app')
admin.use(router).mount('#admin')
