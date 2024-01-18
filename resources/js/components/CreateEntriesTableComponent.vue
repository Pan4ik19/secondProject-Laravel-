<template>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Дата</th>
            <th scope="col">
                    <select v-model="category_id" class="form-select form-select-sm">
                        <option  v-for="category in categories" :value="category.id" >
                            {{ category.name }}
                        </option>
                    </select>
            </th>
            <th scope="col">Изменить</th>
        </tr>
        </thead>
        <tbody>
        <template v-for="entry in entries" v-if="category_id === entry.category_id">
            <tr >
                <th>{{entry.created_at }}</th>
                <td> {{ entry.value }}</td>
                <td><a href="#" class="btn btn-success" @click.prevent="changeEditEntryId(entry.id,entry.value,entry.user_id,entry.category_id)">изменить</a></td>
            </tr>
            <tr :class="isEdit(entry.id) ? '' : 'd-none'">
                <th>{{entry.created_at }}</th>
                <td><input type="text" v-model="value" class="form-control"></td>
                <td><a href="#" class="btn btn-success " @click.prevent="updateEntry()">сохранить</a></td>
            </tr>
        </template>
        </tbody>
    </table>
</template>

<script>
export default {
    data(){
        return{
            user_id:null,
            category_id:1,
            categories:null,
            entries:null,
            totalValue:null,
            editEntryId:null,
            value:null,
        }
    },
    mounted() {
        this.getCategories()
        this.getEntries()
    },
    methods:{
        getCategories(){
            axios.get('/categories')
                .then(res=>{
                    this.categories = res.data
                })
        },
        getEntries(){
            axios.get('/entries')
                .then(res=>{
                    this.entries = res.data
                    console.log(res.data)
                })
        },
        changeEditEntryId(id,value,user_id,category_id){
            this.editEntryId = id
            this.value = value
            this.user_id = user_id
            this.category_id = category_id
        },

        isEdit(id){
            return this.editEntryId === id
        },

        updateEntry(){
            this.editEntryId = null
            console.log({user_id:this.user_id, category_id:this.category_id, value:this.value})
            axios.get('/updateEntry',{user_id:this.user_id, category_id:this.category_id, value:this.value})
                .then(res=>{
                    console.log(res.data)
                    this.getEntries()
                })
        }


    },

    computed:{
        sortValue(){
            return this.entries.filter(function (entry){
                return entry.category_id === this.category_id
            })
        }
    }
}

</script>



<style scoped>

</style>
