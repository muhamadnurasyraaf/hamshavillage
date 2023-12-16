import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import App from './vue/App.vue';
import Rooms from './vue/Rooms.vue';
import Booking from './vue/Booking.vue';
import Terms from './vue/Terms.vue';
import Dashboard from './vue/admin/Dashboard.vue';
import OngoingBooking from './vue/admin/OngoingBooking.vue';
import BookingHistory from './vue/admin/BookingHistory.vue';
import BookingDetails from './vue/admin/BookingDetails.vue';
import Contact from './vue/Contact.vue';
import Payment from './vue/Payment.vue';
import RoomDetail from './vue/RoomDetail.vue';
import BankAccount from './vue/admin/BankAccount.vue';
import RoomAdmin from './vue/admin/RoomAdmin.vue';
import AddRoom from './vue/admin/AddRoom.vue';
import UserManagement from './vue/admin/UserManagement.vue';
import { createRouter,createWebHistory } from 'vue-router';
const routes = [
    { path: '/' , component: App },
    { path: '/rooms' , component: Rooms },
    { path: '/booking/:id' , component: Booking , props:true },
    { path: '/booking' , component: Booking},
    { path: '/terms' , component: Terms },
    { path: '/admin/dashboard' , component: Dashboard},
    { path: '/admin/ongoingbooking' , component:OngoingBooking  },
    { path: '/admin/bookinghistory' , component:BookingHistory   },
    { path:'/admin/bank_account' , component:BankAccount  },
    { path:'/admin/room' , component:RoomAdmin  },
    { path:'/admin/room/add' , component:AddRoom , name:'add-room' },
    { path: '/contact' , component:Contact , name:'contact' },
    { path: '/room-details/:id' , component:RoomDetail ,props:true },
    { path: '/booking-details/:id', component:BookingDetails, name:'booking-details' },
    { path: '/payment/:id' , name:'payment' , component:Payment  , props:true},
    { path: '/admin/user-management', component:UserManagement }
]

const router = createRouter({
    history:createWebHistory(),
    routes
})


const app = createApp({});
app.use(router);
app.mount('#app');
