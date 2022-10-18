import './bootstrap';

import {createApp} from 'vue'
import store from './store/store.js'

import App from './App.vue'
import ProductCreate from './product/Create.vue'

const app = createApp({})

app.component('app', App)
app.component('product_create',ProductCreate)
app.use(store).mount('#app')
