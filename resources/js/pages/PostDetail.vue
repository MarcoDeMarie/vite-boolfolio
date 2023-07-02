<script>

import {store} from '../store/store.js';
import axios from 'axios';


export default {
    name:"postDetail",


    data(){
        return{
            post: null,
            loaded: false,
        }
    },

    methods:{
        getApi(){
            this.loaded = false;
            axios.get(store.apiUrl + 'posts/' + this.$route.params.slug)
                .then(result => {
                    this.post = result.data;
                    console.log(this.post);
                    this.loaded = true;
                })

        }
    },

    mounted(){
        this.getApi();
    }

}



</script>

<template>

<div class="container-inner">
    <div v-if="loaded">
        <h1> {{ post.title }}</h1>
            <div>
                <p v-html="type"></p>
                <ul>
                    <li class="badge badge-tag" v-for="techonology in post.technologies" :key="techonology.id">{{ techonology.name }}</li>
                </ul>
            </div>
            <div class="image">
                <img :src="post.image_path" :alt="post.image_original_name">
                <i>{{ post.image_original_name }}</i>
            </div>
        <p v-html="post.text"> </p>
    </div>
</div>


</template>

<style lang="scss" scoped>
    .image{
        margin: 20px 0;
    }
</style>
