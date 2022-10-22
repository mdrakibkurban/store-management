<template lang="">
    <form action="" @submit.prevent="retunrProduct">
         <div class="alert alert-danger" v-if="retunrProductForm.is_error">
             <ul>
                 <li v-for="(error,index) in retunrProductForm.errors" :key="index">
                     {{error[0]}}
                 </li>
             </ul>
         </div>
 
     <div class="row"> 
         <div class="col-md-6">
             <div class="card">
                <div class="card-header">
                   <h3 class="card-title mt-2">Retunr Product</h3>
                </div>
    
                <div class="card-body"> 
                      <div class="form-group">
                         <label for="name">Product</label>
                         <select v-model="retunrProductForm.product_id" @change="selectedProduct($event)" class="form-control">
                            <option value="">--select product--</option>
                            <option v-for="product in products" :key="product.id" :value="product.id">
                               {{ product.name }}
                            </option>
                         </select>
                      </div>
 
 
                      <div class="form-group">
                         <label for="name">Date</label>
                         <input type="date" class="form-control" id="year" v-model="retunrProductForm.date"
                            placeholder="Date">
                      </div>
                 </div>
 
                 <div class="card-footer">
                   <button type="submit" class="btn btn-primary">Create</button>
                </div>
 
             </div>
         </div>
 
         <div class="col-md-6">
             <div class="card">
                 <div class="card-header">
                     <h3 class="card-title mt-2">Product Size</h3>
                 </div>
     
                <div class="card-body">
                      <table class="table table-bordered">
                         <tr v-for="(item,index) in retunrProductForm.items" :key="index">
                            <td>{{ item.size }}</td>
                            <td>
                               <input type="number" class="form-control" v-model="item.quantity"  placeholder="Quantity" >
                            </td>
                         </tr>
                      </table> 
                 </div>
 
             </div>
          </div>
     </div>
    </form>
 
 </template>
 <script>
 
 export default {
    data() {
         return {
            retunrProductForm:{
               product_id   : '',
               date         : '',
               items        : [] ,
               errors       : [], 
               is_error     : false,      
            },
         }
       },
       mounted(){
          this.$store.dispatch('getProducts');
       },
 
       computed:{
          products(){
              return this.$store.getters.products;
          }
       },
 
       methods:{
         selectedProduct(event){
             this.retunrProductForm.items = [];
             let id = event.target.value;
             let product = this.products.filter(product=> product.id == id)
             product[0].product_size_stocks.map((stock) => {
                 let item = {
                     size     : stock.size.size,
                     size_id  : stock.size_id,
                     quantity : ''
                 }
 
                 this.retunrProductForm.items.push(item);
             })
             
         },
 
         retunrProduct(){
             axios.post('/return-products', this.retunrProductForm).then((res)=>{
                 this.retunrProductForm.product_id  = '', 
                 this.retunrProductForm.date        = '', 
                 Toast.fire({
                     icon: 'success',
                     title: 'Return product successfully save!'
                   })
             }).catch((error)=>{ 
                  if(error.response.data.success === false){
                     this.retunrProductForm.is_error  = true;
                     this.retunrProductForm.errors = error.response.data.errors;
                  }
            
             })
         }
       }
 }
 </script>
 <style lang="">
     
 </style>