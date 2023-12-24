<template>
    <div>
      <Navbar />
      <div class="content">
        <div class="header">
          <h2>Welcome to Hamsha Village's Dashboard</h2>
          <p>Manage your village with ease</p>
        </div>
        <!-- Buttons for Navigation -->
        <div class="dashboard-buttons">
          <router-link to="/admin/ongoingbooking" class="dashboard-button">
            <button>Manage Bookings</button>
          </router-link>
          <router-link to="/admin/bookinghistory" class="dashboard-button">
            <button>Bookings History</button>
          </router-link>
          <router-link to="/admin/room" class="dashboard-button">
            <button>Manage Rooms</button>
          </router-link>
          <router-link to="/admin/bank_account" class="dashboard-button">
            <button>Manage Account Bank</button>
          </router-link>

        </div>
      </div>
      <Footer />
    </div>
  </template>

  <style scoped>
  .content {
    width: 70%;
    height: 74vh;
    margin: 2em auto;
  }

  .dashboard-buttons {
    margin-top: 2em;
   display: flex;
    justify-content: space-around;
    gap: 1em;
    flex-wrap: wrap;
  }

  .dashboard-button {
    text-align: center;
  }

  .dashboard-button button {
    padding: 1em 2em;
    border: none;
    border-radius: 5px;
    background-color: #3498db;
    color: #fff;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .dashboard-button button:hover {
    background-color: #2980b9;
  }

  /* You can add more styles as needed */
  </style>

  <script>
  import Navbar from '../Navbar.vue';
  import Footer from '../Footer.vue';
import axios from 'axios';

  export default {
    data(){
        return{

        }
    },
    components: {
      Navbar,
      Footer,
    },
    mounted(){

    }
  };
  </script>
