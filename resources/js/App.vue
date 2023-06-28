<script>

import {store} from './store/store.js';
import axios from 'axios';

export default {
    name:'home',

    data(){
        return{
            posts:[]
        }
    },

    methods:{
        getApi(){
            axios.get(store.apiUrl + 'posts')
                .then(results=>{
                    this.posts = results.data;
                    console.log(this.posts);
                })
        }
    },

    mounted(){
        this.getApi();
    },


}
</script>

<template>
    <div class="container">
        <h1>elenco posts</h1>
    </div>
</template>

<style>

</style>
