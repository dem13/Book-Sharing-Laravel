<template>
    <div class="form-group row">
        <div class="col-md-4 offset-md-4">
            
            <label for="image" class="btn btn-primary"> Select Image </label>

            <input id="image" type="file" class="d-none" name="image" autocomplete="image" autofocus>

            <div v-if="image !== null" class="image-preview">
                <img :src="image"> 
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props:{
            name: String
        },
        data(){
            return{
                image: null,
                input: null
        }},
        mounted() {
            this.input = this.$el.querySelector("input[type=file]")
            if(this.input !== null){
                this.input.addEventListener('change', () => this.onImageSelection())
            }
        },
        methods:{
            onImageSelection(){
                if (this.input.files && this.input.files[0]) {
                    let reader = new FileReader()
                    
                    var vm = this

                    reader.onload = function(e) {
                        vm.image = e.target.result
                    }
                    
                    reader.readAsDataURL(this.input.files[0])
                  }
            }
        }
    }
</script>

<style type="text/css">
    .image-preview img{
        width: 100%;
    }
</style>
