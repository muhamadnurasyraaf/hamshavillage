<template>
    <div class="booking-details">
        <h3>Congratulations,Your Booking Completed!</h3>
      <h2>Booking Details</h2>
      <div v-if="booking" class="details-container">
        <p><strong>Booking ID:</strong> {{ booking.id }}</p>
        <p><strong>Customer Name:</strong> {{ booking.name }}</p>
        <p><strong>Customer Email:</strong> {{ booking.email }}</p>
        <p><strong>Phone Number:</strong> {{ booking.phonenumber }}</p>
        <p><strong>Notes:</strong> {{ booking.notes }}</p>
        <p><strong>Check In Date:</strong> {{ booking.checkin_date }}</p>
        <p><strong>Check Out Date:</strong> {{ booking.checkout_date }}</p>
        <p><strong>Breakfast:</strong> {{ booking.breakfast }}</p>
        <p><strong>Extra Mattress:</strong> {{ booking.extra_mat }}</p>
        <p><strong>Total:</strong> RM{{ booking.cost }}</p>

        <p class="screenshot-info">
          Please take a screenshot of this page as evidence of your booking.
        </p>
      </div>
      <div v-else>
        <p>No booking details available.</p>
        <!-- You can add a form or other elements for booking input here -->
      </div>
      <button @click="backtoHome">Back To Home</button>
    </div>
  </template>

  <script>
import axios from 'axios';

  export default {
    data() {
      return {
        bookingId:this.$route.params.id,
        booking:{},
      };
    },
    mounted(){
        axios.get(`/api/booking/find/${this.bookingId}`)
        .then((response) =>{
            this.booking = response.data.data;
        })
        .catch((response)=>{

        })
    },
    methods:{
        backtoHome(){
            this.$router.push('/');
        }
    },
  };
  </script>

  <style scoped>
  .booking-details {
    font-family: Arial, sans-serif;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
  }

  h2 {
    text-align: center;
    color: #333;
  }

  .details-container {
    margin-top: 20px;
  }

  .details-container p {
    margin-bottom: 8px;
  }

  .screenshot-info {
    font-style: italic;
    color: #888;
    margin-top: 20px;
  }
  </style>
