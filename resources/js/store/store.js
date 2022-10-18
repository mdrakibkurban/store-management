import { createStore } from 'vuex'
import axios from 'axios';

const store = createStore({
  state () {
    return {
       categoryData : [],
       brandData : [],
       sizeData : [],
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
    },

    actions:{
        getCategory(context){
            axios.get('/api/categories').then((res)=>{
                context.commit("GET_CATEGORY",res.data.categories)
            })
        },

        getBrand(context){
            axios.get('/api/brands').then((res)=>{
                context.commit("GET_BRAND",res.data.brands)
            })
        },

        getSize(context){
            axios.get('/api/sizes').then((res)=>{
                context.commit("GET_SIZE",res.data.sizes)
            })
        },
    }
})

export default store;