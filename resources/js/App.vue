<script>

import {store} from './store/store.js';
import axios from 'axios';

export default {
    name:'home',

    data(){
        return{
            posts:[],
            types:[],
            technologies:[],
        }
    },

    methods:{
        getApi(){
            axios.get(store.apiUrl + 'posts')
                .then(results=>{
                    this.posts = results.data.posts;
                    this.types = results.data.types;
                    this.technologies = results.data.technologies;
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

        <ul>
            <li
            v-for="post in posts"
            :key="post.id"
            >
            <span>{{ post.title }}</span> - <span>{{ post.date }}</span>  - <span>{{ types[0].name}}</span> - <span>{{ technologies[0].name}}</span>
            <!-- al posto di zero va [post.type_id] ma non funziona uguale l'altro -->

            </li>
        </ul>

    </div>
</template>

<style lang="scss" scoped>

</style>
