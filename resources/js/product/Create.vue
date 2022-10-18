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
                          <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" id="name"  name="name" placeholder="Enter product Name">
                          
                          </div>


                          <div class="form-group">
                            <label for="name">Category</label>
                             <select name="category_id" id="" class="form-control">
                                <option value="">--select category--</option>
                                <option v-for="category in categories" :key="category.id" :value="category.id">
                                {{ category.name }}
                                </option>
                             </select>
                          
                          </div>

                          <div class="form-group">
                            <label for="name">Brand</label>
                             <select name="brand_id" id="" class="form-control">
                                <option value="">--select brand--</option>
                                <option v-for="brand in brands" :key="brand.id" :value="brand.id">
                                {{ brand.name }}
                                </option>
                             </select>
                            
                          </div>

                          <div class="form-group">
                            <label for="name">Size</label>
                             <select name="size_id" id="" class="form-control">
                                <option value="">--select size--</option>
                                <option v-for="size in sizes" :key="size.id" :value="size.id">
                                {{ size.size }}
                                </option>
                             </select>
                           
                          </div>

                          <div class="form-group">
                            <label for="name">Sku</label>
                            <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter product Sku">
                          
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

export default {

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

     }

}
</script>