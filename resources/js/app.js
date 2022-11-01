import './bootstrap';
import '../css/app.css'
import { createApp } from 'vue';
import App from '../js/App.vue'
// import { createAuth0 } from "@auth0/auth0-vue";

// import '../css/tailwind3.1.8'
import router from './router'

import { createPinia } from 'pinia'
// import MonacoEditor from 'monaco-editor-vue3'
import VueClipboard from 'vue3-clipboard'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import CKEditor from '@ckeditor/ckeditor5-vue';
import { UploadMedia, UpdateMedia } from 'vue-media-upload';
// -------------------------------------------

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { fas  } from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
/* add icons to the library */
library.add(fas ,far )
// Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
/* add font awesome icon component */
// Vue.component('font-awesome-icon', FontAwesomeIcon)

// Vue.config.productionTip = false



// -------------------------------------------








// import editorWorker from 'monaco-editor/esm/vs/editor/editor.worker?worker'
// import jsonWorker from 'monaco-editor/esm/vs/language/json/json.worker?worker'
// import cssWorker from 'monaco-editor/esm/vs/language/css/css.worker?worker'
// import htmlWorker from 'monaco-editor/esm/vs/language/html/html.worker?worker'
// import tsWorker from 'monaco-editor/esm/vs/language/typescript/ts.worker?worker'


// self.MonacoEnvironment = {
//     getWorker(_, label) {
//       if (label === 'json') {
//         return new jsonWorker()
//       }
//       if (label === 'css' || label === 'scss' || label === 'less') {
//         return new cssWorker()
//       }
//       if (label === 'html' || label === 'handlebars' || label === 'razor') {
//         return new htmlWorker()
//       }
//       if (label === 'typescript' || label === 'javascript') {
//         return new tsWorker()
//       }
//       return new editorWorker()
//     }
//   }




createApp(App)
.component("font-awesome-icon", FontAwesomeIcon)
 .component('upload-media' , UploadMedia)
 .component('update-media' , UpdateMedia)

.use(router)
// .use(
//   createAuth0({
//     domain: import.meta.env.VITE_AUTH0_DOMAIN,
//     client_id: import.meta.env.VITE_AUTH0_CLIENT_ID,
//     redirect_uri: import.meta.env.VITE_AUTH0_CALLBACK_URL,
//   })
// )

.use(createPinia())
.use(VueClipboard, {
    autoSetContainer: true,
    appendToBody: true,
  })
  .use(VueSweetalert2)
  .use(CKEditor)

// .use(MonacoEditor)
// .use(FontAwesomeIcon)

// .component("font-awesome-icon", FontAwesomeIcon)
.mount('#app')