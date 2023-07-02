<script>

import {store} from '../store/store.js';
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

        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

            <h2>Tipi</h2>

            <div v-for="item in types"
                :key="item.id">

                <button type="checkbox" class="btn-check" autocomplete="off" name="items[]" >{{ item.name }}</button>
            </div>

            <h2>Tecnologie</h2>

            <div v-for="item in technologies"
                :key="item.id">

                <button type="checkbox" class="btn-check" autocomplete="off" name="technologies[]" >{{ item.name }}</button>
            </div>

        </div>

        <h1>elenco posts</h1>

        <ul>
            <li
            v-for="post in posts"
            :key="post.id"
            >
            <span class="no-decoration"><router-link  :to="{ name: 'postDetail', params:{ slug: post.slug } }" >{{ post.title }}</router-link></span> - <span>{{ post.date }}</span>  - <span>{{ types[0].name}}</span> - <span>{{ technologies[0].name}}</span>
            <!-- al posto di zero va [post.type_id] ma non funziona uguale l'altro -->

            </li>
        </ul>

    </div>
</template>

<style lang="scss" scoped>
    a{
        text-decoration: none;
        color: black;
    }
</style>
