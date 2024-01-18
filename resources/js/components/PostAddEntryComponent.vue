<template>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Добавить запись</span>
        </div>
    <input type="text" class="form-control" aria-label="Default" v-model="value" aria-describedby="inputGroup-sizing-default">
    <select v-model="category_id" class="form-select form-select-lg mb-3">
        <option  v-for="category in categories" :value="category.id">
             {{ category.name }}
        </option>
    </select>
        <div class="input-group-append">
            <input type="submit" @click.prevent="addEntry" class="btn btn-primary" value="Добавить">
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            user_id:null,
            category_id:null,
            value:null,
            categories:null
        }
    },
    mounted() {
        this.getCategories()
        this.getUser()
    },
    methods:{
        getCategories(){
            axios.get('/categories')
                .then(res=>{
                    this.categories = res.data
                })
        },
        getUser(){
            axios.get('/getAuthUser')
                .then(res=>{
                    this.user_id = res.data
                })
        },
        addEntry(){
            axios.post('/addEntry',{user_id:this.user_id, category_id:this.category_id, value:this.value})
                .then(res=>{
                     this.value = null
                     this.category_id = null
                     this.categories = null
                    console.log(res)
                })
        }
    }
}
</script>



<style scoped>

</style>
