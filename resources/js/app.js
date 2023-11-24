import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import App from './vue/App.vue';
import Rooms from './vue/Rooms.vue';
import Booking from './vue/Booking.vue';
import Terms from './vue/Terms.vue';
import Dashboard from './vue/admin/Dashboard.vue';
import OngoingBooking from './vue/admin/OngoingBooking.vue';
import BookingHistory from './vue/admin/BookingHistory.vue';
import AdminLoginForm from './vue/admin/AdminLoginForm.vue';
import Contact from './vue/Contact.vue';
import { createRouter,createWebHistory } from 'vue-router';
const routes = [
    { path: '/' , component: App },
    { path: '/rooms' , component: Rooms },
    { path: '/booking' , component: Booking },
    { path: '/terms' , component: Terms },
    { path: '/admin' , component: AdminLoginForm },
    { path: '/admin/dashboard' , component: Dashboard },
    { path: '/admin/ongoingbooking' , component:OngoingBooking },
    { path: '/admin/bookinghistory' , component:BookingHistory },
    { path: '/contact' , component:Contact , name:'contact' },
]

const router = createRouter({
    history:createWebHistory(),
    routes
})
const app = createApp({});
app.use(router);
app.mount('#app');
