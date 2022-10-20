<template>
    <form action="" method="post" @submit.prevent="updateProduct">
       <div class="row">
          <ShowErrors></ShowErrors>
          <div class="col-md-6">
             <div class="card">
                <div class="card-header">
                   <h3 class="card-title mt-2">Product Update</h3>
                </div>
    
                <div class="card-body">
                   <div class="row">
                      <div class="form-group col-md-6">
                         <label for="name">Product Name</label>
                         <input type="text" class="form-control" id="name" v-model="productForm.name"
                            placeholder="Enter product Name">
                      </div>
    
    
                      <div class="form-group col-md-6">
                         <label for="name">Category</label>
                         <select v-model="productForm.category_id" id="" class="form-control">
                            <option value="">--select category--</option>
                            <option v-for="category in categories" :key="category.id" :value="category.id">
                               {{ category.name }}
                            </option>
                         </select>
    
                      </div>
                   </div>
    
                   <div class="row">
    
                      <div class="form-group col-md-6">
                         <label for="name">Brand</label>
                         <select v-model="productForm.brand_id" id="" class="form-control">
                            <option value="">--select brand--</option>
                            <option v-for="brand in brands" :key="brand.id" :value="brand.id">
                               {{ brand.name }}
                            </option>
                         </select>
                      </div>
    
                      <div class="form-group col-md-6">
                         <label for="name">Sku</label>
                         <input type="text" class="form-control" id="sku" v-model="productForm.sku"
                            placeholder="Enter product Sku">
                      </div>
    
                   </div>
    
                   <div class="row">
                      <div class="form-group col-md-6">
                         <label for="name">Cost_price</label>
                         <input type="number" class="form-control" id="sku" v-model="productForm.cost_price"
                            placeholder="Enter product Cost_price">
                      </div>
    
                      <div class="form-group col-md-6">
                         <label for="name">Retail_price</label>
                         <input type="number" class="form-control" id="sku" v-model="productForm.retail_price"
                            placeholder="Enter product retail_price">
                      </div>
                   </div>
    
    
                   <div class="row">
                      <div class="form-group col-md-6">
                         <label for="name">Image</label>
                         <input type="file" class="form-control" name="image" @change="loadImage($event)">
                      </div>
    
    
                      <div class="form-group col-md-6">
                         <img width="150" :src="product.product_image" alt="">
                      </div>
                   </div>
    
                   <div class="row">
                      <div class="form-group col-md-12">
                         <label for="name">Year</label>
                         <input type="text" class="form-control" id="year" v-model="productForm.year"
                            placeholder="Enter Year">
                      </div>
                   </div>
    
    
                   <div class="form-group">
                      <label for="name">Descripiton</label>
                      <ckeditor :editor="editor" v-model="productForm.description" :config="editorConfig"></ckeditor>
                   </div>
    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <button type="submit" class="btn btn-primary">Update</button>
                </div>
    
    
                <!-- /.card-footer-->
             </div>
          </div>
          <div class="col-md-6">
             <div class="card">
                <div class="card-header">
                   <h3 class="card-title mt-2">Product Size</h3>
                </div>
    
                <div class="card-body">
                   <div class="row" v-for="(item,index) in productForm.items" :key="index">
                      <div class="col-sm-4">
                         <div class="form-group">
                            <select class="form-control" v-model="item.size_id">
                               <option value="">--select size--</option>
                               <option v-for="size in sizes" :key="size.id" :value="size.id">
                                  {{ size.size }}
                               </option>
                            </select>
                         </div>
                      </div>
    
                      <div class="col-sm-3">
                         <input type="text" v-model="item.location" class="form-control" placeholder="Location">
                      </div>
    
    
                      <div class="col-sm-3">
                         <input type="number" v-model="item.quantity" class="form-control" placeholder="Quantity">
                      </div>
    
                      <div class="col-sm-2">
                         <button type="button" @click.prevent="removeItem(index)" class="btn btn-danger"> <i
                               class="fa fa-trash"></i> </button>
                      </div>
                   </div>
    
                   <button type="button" @click.prevent="addItem" class="btn btn-primary"><i class="fa fa-plus"></i>
                      AddItem</button>
                </div>
    
                  
                <!-- /.card-footer-->
             </div>
          </div>
       </div>
    </form>
 </template>
 
 <script>
 import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
 import ShowErrors from '../errors/ShowErrors.vue'
 export default {
    components:{
       ShowErrors
    },
    props: ['product'],
    data() {
         return {
            productForm:{
               name         : '',
               category_id  : '' ,
               brand_id     : '',
               sku          : '',
               cost_price   : '',
               retail_price : '',
               image        : '',  
               year         : '',
               description  : '' , 
               items        : [{
                   size_id  : '',
                   location : '',
                   quantity : 0
               }]          
            },
            editor: ClassicEditor,
            editorConfig: { }
         }
       },
 
       methods:{
 
          addItem(){
              let item = {
                   size_id  : '',
                   location : '',
                   quantity : 0
              }
 
              this.productForm.items.push(item);
          },
 
 
          removeItem(index){
             this.productForm.items.splice(index,1);
          },
 
          updateProduct(){
              let payload ={
                  data : this.productForm,
                  id   : this.product.id,
              }
              this.$store.dispatch('updateProduct', payload)
          },
 
          loadImage(e){
              let file = e.target.files['0'];            
              let reader = new FileReader();
              reader.onload = (e) => {
                this.productForm.image = e.target.result;
              };
 
             reader.readAsDataURL(file);   
          },

         
       },
 
      mounted(){
         this.$store.dispatch("getCategory");
         this.$store.dispatch("getBrand");
         this.$store.dispatch("getSize");

         //set old data

         this.productForm.name         = this.product.name;
         this.productForm.category_id  = this.product.category_id;
         this.productForm.brand_id     = this.product.brand_id;
         this.productForm.sku          = this.product.sku;
         this.productForm.cost_price   = this.product.cost_price;
         this.productForm.retail_price = this.product.retail_price;
         this.productForm.description  = this.product.description;
         this.productForm.year         = this.product.year;  
         this.productForm.items        = this.product.product_stocks;        
      },
  
      computed:{
          categories(){
             return this.$store.getters.categories;
          },
 
          brands(){
             return this.$store.getters.brands;
          },
 
          sizes(){
             return this.$store.getters.sizes;
          },
 
      },
 
   
 
     
 
 }
 </script>