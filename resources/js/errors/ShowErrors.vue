<template lang="">
    <div class="col-md-12" v-if="is_error">
        <div class="alert alert-danger">
           <ul>
            <li v-for="(error,index) in errors" :key="index">
             {{error[0]}}
            </li>
           </ul>
        </div>
    </div>
</template>
<script>
export default {
     computed:{
        errors(){
            return this.$store.getters.errors;
        },

        is_error(){
            return this.$store.getters.is_error;
        }
     }
}
</script>
<style lang="">
    
</style>