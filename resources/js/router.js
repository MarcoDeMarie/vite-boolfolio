import { createRouter, createWebHistory } from "vue-router";

import Home from './pages/Home.vue'
import Contacts from './pages/Contacts.vue'
import postDetail from './pages/PostDetail.vue'
import Error404 from './pages/Error404.vue'




const router = createRouter({

    history: createWebHistory(),
    linkExactActiveClass: 'active',

    routes:[
        {
            path: '/',
            name: 'home',
            component: Home,

        },
        {
            path: '/contatti',
            name: 'contacts',
            component: Contacts,
        },

        {
            path: '/dettaglio-post/:slug',
            name: 'postDetail',
            component: postDetail
        },



        {
            path: '/:pathMatch(.*)*',
            component: Error404,
        }

    ]

})

export { router }
