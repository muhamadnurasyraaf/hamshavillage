<template>
  <div class="bookings-list">
    <Navbar />
    <div class="content">
      <h2>Bookings List</h2>
      <div v-if="loading" class="loading-text">Loading...</div>
      <div v-else>
        <div v-if="bookings.length === 0" class="no-bookings-text">No bookings found.</div>
        <div v-else>
          <div class="card-container">
            <div class="card" v-for="booking in bookings" :key="booking.id">
              <div class="card-header">
                <h3>Booking ID: {{ booking.id }}</h3>
                <button @click="viewBookingDetails(booking.id)">View Details</button>
              </div>
              <div class="card-body">
                <p><strong>Room ID:</strong> {{ booking.room_id }}</p>
                <p><strong>Name:</strong> {{ booking.name }}</p>
                <p><strong>Email:</strong> {{ booking.email }}</p>
                <!-- Display other booking details here as required -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Navbar from '../Navbar.vue';
import Footer from '../Footer.vue';

export default {
  components: {
    Navbar,
    Footer
  },
  data() {
    return {
      bookings: [],
      loading: false,
    };
  },
  mounted() {
    this.fetchBookings();
  },
  methods: {
    async fetchBookings() {
      this.loading = true;
      try {
        // Make an API request to fetch bookings from your Laravel backend
        const response = await fetch('/api/bookings');
        if (!response.ok) {
          throw new Error('Failed to fetch bookings');
        }
        const data = await response.json();
        this.bookings = data; // Assuming the API response contains bookings data
      } catch (error) {
        console.error(error);
        // Handle error if necessary
      } finally {
        this.loading = false;
      }
    },
    viewBookingDetails(bookingId) {

      this.$router.push(`/booking-details/${bookingId}`);
    },
  },
};
</script>

<style>

.card-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  gap: 20px;
}

.card {
  width: 300px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition: box-shadow 0.3s ease-in-out;
  box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
  margin:3em 0;
}

.card:hover {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.card-header {
  padding: 16px;
  border-bottom: 1px solid #eee;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.card-header button {
  padding: 8px 16px;
  background-color: #3498db;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
}

.card-header button:hover {
  background-color: #2980b9;
}

.card-body {
  padding: 16px;
}

.card-body p {
  margin: 8px 0;
}
</style>
