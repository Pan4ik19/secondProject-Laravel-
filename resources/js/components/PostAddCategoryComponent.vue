<template>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Добавить категорию</span>
        </div>
        <input type="text" class="form-control" aria-label="Default" v-model="name" aria-describedby="inputGroup-sizing-default">
        <div class="input-group-append">
            <input type="submit" @click.prevent="addCategory" class="btn btn-primary" value="Добавить">
        </div>
    </div>
</template>


<script>
export default {
    data(){
        return{
            name: null
        }
    },
    methods:{
        addCategory(){
            axios.post('/addCategory',{name:this.name})
                .then(res=>{
                    this.name=null
                })
        }
    }
}
</script>



<style scoped>

</style>
