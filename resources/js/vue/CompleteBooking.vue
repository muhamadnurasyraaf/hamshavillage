<template>
    <div class="booking-details">
      <h2>Booking Details</h2>
      <div v-if="bookingDetails" class="details-container">
        <p><strong>Booking ID:</strong> {{ bookingDetails.bookingId }}</p>
        <p><strong>Customer Name:</strong> {{ bookingDetails.customerName }}</p>
        <!-- Add other booking details here -->

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
  export default {
    data() {
      return {
        bookingDetails: {
          bookingId: this.$route.params.id,
          customerName: 'John Doe',
          // Other booking details
        },
      };
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
