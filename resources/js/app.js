import Vue from "vue";
import PostComponent from "./components/PostComponent.vue";
import PostAddCategoryComponent from "./components/PostAddCategoryComponent.vue";
import PostAddEntryComponent from "./components/PostAddEntryComponent.vue";
import CreateEntriesTableComponent from "./components/CreateEntriesTableComponent.vue";
require('./bootstrap');


const app = new Vue({
    el:'#main',
    components:{
        PostAddCategoryComponent,
        PostAddEntryComponent,
        CreateEntriesTableComponent,
    },

})
