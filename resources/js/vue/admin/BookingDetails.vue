<template>
    <Navbar />
    <div class="booking-details">
      <div class="card">
        <div v-if="loading" class="loading-text">Loading...</div>
        <div v-else>
          <div v-if="error" class="error-text">{{ error }}</div>
          <div v-else>
            <h2>Booking Details</h2>
            <div v-if="booking" class="booking-info">
              <p><strong>Booking ID:</strong> {{ booking.id }}</p>
              <p><strong>Room ID:</strong> {{ booking.room_id }}</p>
              <!-- Display other booking details as needed -->
            </div>
            <div v-else>
              <p>No booking details available.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </template>

  <script>
  import Navbar from '../Navbar.vue';
  import Footer from '../Footer.vue';
  import axios from 'axios';

  export default {
    data() {
      return {
        booking: null,
        loading: false,
        error: null,
      };
    },
    mounted() {
      const bookingId = this.$route.params.id;
      this.fetchBookingDetails(bookingId);
    },
    methods: {
      fetchBookingDetails(bookingId) {
        this.loading = true;
        axios.get(`/api/booking/${bookingId}`)
          .then(response => {
            this.booking = response.data.data;
            this.loading = false;
          })
          .catch(error => {
            this.error = 'Error fetching booking details';
            this.loading = false;
            console.log(error);
          });
      },
    },
    components: {
      Navbar,
      Footer,
    }
  };
  </script>
  <style scoped>
  .booking-details {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  padding: 20px;
}

.card {
  width: 90%; /* Adjust the width as needed */
  max-width: 600px; /* Set a maximum width */
  background-color: #e1bee7;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
}

h2 {
  font-size: 24px;
  margin-bottom: 20px;
}

.booking-info {
  /* Additional styling for booking details */
}

.loading-text,
.error-text {
  text-align: center;
  margin-top: 20px;
  color: #ff0000;
}
  </style>
