import './bootstrap';

import {createApp} from 'vue'
import store from './store/store.js'
import CKEditor from '@ckeditor/ckeditor5-vue';

import App from './App.vue'
import ProductCreate from './product/Create.vue'


const app = createApp({})

app.component('app', App)
app.component('product_create',ProductCreate)
app.use(store).use(CKEditor).mount('#app')
