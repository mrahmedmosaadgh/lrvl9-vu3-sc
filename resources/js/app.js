import './bootstrap';
import { createApp } from 'vue';
import App from '../js/App.vue'
import '../css/app.css'
import router from './router'
import { createPinia } from 'pinia'

createApp(App)
.use(router)
.use(createPinia())

.mount('#app')