import { createStore } from 'vuex'
import axios from 'axios';

const store = createStore({
  state () {
    return {
       categoryData : [],
       brandData    : [],
       sizeData     : [],  
       errors       : [],
       is_error    : false,
    }
  },

    getters:{
        categories(state){
            return state.categoryData;
        },
        brands(state){
            return state.brandData;
        },
        sizes(state){
            return state.sizeData;
        },
        //errror field
        errors(state){
            return state.errors;
        },
        is_error(state){
            return state.is_error !== false;
        }
    },

    mutations: {
       
        GET_CATEGORY(state,data){
            state.categoryData = data;
        },

        GET_BRAND(state,data){
            state.brandData = data;
        },

        GET_SIZE(state,data){
            state.sizeData = data;
        },

        ERRORS(state,data){
            state.is_error = true;
            state.errors    = data;
        }
    },

    actions:{

        addProduct(context, productForm){
             axios.post('/products', productForm).then((res)=>{
                    productForm.name          = '', 
                    productForm.category_id   = '', 
                    productForm.brand_id      = '', 
                    productForm.cost_price    = '',
                    productForm.retail_price  = '', 
                    productForm.sku           = '', 
                    productForm.year          = '', 
                    productForm.description   = '', 
                         
                 Toast.fire({
                    icon: 'success',
                    title: 'product save success'
                  })
             }).catch((error)=>{
                context.commit('ERRORS',error.response.data.errors)
             })
        },


        updateProduct(context, payload){
            axios.put(`/products/${payload.id}`, payload.data).then((res)=>{  
                Toast.fire({
                   icon: 'success',
                   title: 'product update success'
                 })

                 window.location.href = '/products';
            }).catch((error)=>{
               context.commit('ERRORS',error.response.data.errors)
            })
        },

        getCategory(context){
            axios.get('/get-categories').then((res)=>{
                context.commit("GET_CATEGORY",res.data.categories)
            })
        },

        getBrand(context){
            axios.get('/get-brands').then((res)=>{
                context.commit("GET_BRAND",res.data.brands)
            })
        },

        getSize(context){
            axios.get('/get-sizes').then((res)=>{
                context.commit("GET_SIZE",res.data.sizes)
            })
        },
    }
})

export default store;