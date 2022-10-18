<template>
     <div class="card">
              <div class="card-header">
                <h3 class="card-title mt-2">Product Create</h3>
          
                <div class="card-tools">
                      <a href="" class="btn btn-success"><i class="fas fa-list"></i> Product List</a>
                </div>
              </div>
                  <form action="" method="post">
                      <div class="card-body">
                        

                        <div class="row">
                              <div class="form-group col-md-6">
                              <label for="name">Product Name</label>
                              <input type="text" class="form-control" id="name"  name="name" placeholder="Enter product Name"> 
                           </div>


                           <div class="form-group col-md-6">
                              <label for="name">Category</label>
                              <select name="category_id" id="" class="form-control">
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
                              <select name="brand_id" id="" class="form-control">
                                 <option value="">--select brand--</option>
                                 <option v-for="brand in brands" :key="brand.id" :value="brand.id">
                                 {{ brand.name }}
                                 </option>
                              </select>    
                           </div>

                           <div class="form-group col-md-6">
                              <label for="name">Size</label>
                              <select name="size_id" id="" class="form-control">
                                 <option value="">--select size--</option>
                                 <option v-for="size in sizes" :key="size.id" :value="size.id">
                                 {{ size.size }}
                                 </option>
                              </select>   
                           </div>
                        </div>

                       <div class="row">
                           <div class="form-group col-md-6">
                              <label for="name">Sku</label>
                              <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter product Sku"> 
                           </div>

                           <div class="form-group col-md-6">
                              <label for="name">Cost_price</label>
                              <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter product Cost_price"> 
                           </div>
                       </div>
                         
                         <div class="row">
                           <div class="form-group col-md-4">
                              <label for="name">Retail_price</label>
                              <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter product retail_price"> 
                           </div>

                           <div class="form-group col-md-4">
                              <label for="name">Image</label>
                              <input type="file" class="form-control" name="image" @change="loadImage($event)">
                           </div>


                           <div class="form-group col-md-4">
                              <img width="150"  :src="productForm.image" alt="">
                           </div>
                         </div>

                          <div class="form-group">
                            <label for="name">Descripiton</label>
                            <ckeditor :editor="editor" v-model="productForm.description" :config="editorConfig"></ckeditor>
                          </div>

                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                      </div>

                  </form>
              <!-- /.card-footer-->
            </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
   data() {
        return {
           productForm:{
              name        : '',
              category_id : '' ,
              image       : '',  
              description : '' ,           
           },
           editor: ClassicEditor,
           editorConfig: { }
        }
      },

      methods:{
         loadImage(e){
             let file = e.target.files['0'];            
             let reader = new FileReader();
             reader.onload = (e) => {
               this.productForm.image = e.target.result;
             };

            reader.readAsDataURL(file);   
         }
      },

     mounted(){
        this.$store.dispatch("getCategory");
        this.$store.dispatch("getBrand");
        this.$store.dispatch("getSize");
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