import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import App from './vue/App.vue';
import Rooms from './vue/Rooms.vue';
import Booking from './vue/Booking.vue';
import Terms from './vue/Terms.vue';
import { createRouter,createWebHistory } from 'vue-router';
const routes = [
    { path: '/' , component: App},
    { path: '/rooms' , component: Rooms},
    { path: '/booking' , component: Booking},
    { path: '/terms' , component: Terms},
]

const router = createRouter({
    history:createWebHistory(),
    routes
})
const app = createApp({});
app.use(router);
app.mount('#app');
