import './bootstrap';

import {createApp} from 'vue'
import store from './store/store.js'
import CKEditor from '@ckeditor/ckeditor5-vue';

import App from './App.vue'
import ProductCreate from './product/Create.vue'
import ProductUpdate from './product/Update.vue'

import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
window.Toast = Toast;

const app = createApp({})

app.component('app', App)
app.component('product_create',ProductCreate)
app.component('product_update',ProductUpdate)
app.use(store).use(CKEditor).mount('#app')
