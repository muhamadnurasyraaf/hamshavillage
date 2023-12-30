<template>
    <div>
      <Navbar />
      <div class="container">
        <!-- Display Booking Details -->
        <div v-if="errors && Object.keys(errors).length > 0">
            <ul>
                <li v-for="(error,key) in errors" :key="key">
                    <p style="color: red;">{{ error }}</p>
                </li>
            </ul>
        </div>
        <div class="booking-details">
          <h2>Booking Details</h2>
          <p><strong>Booking ID:</strong> {{ bookingId }}</p>
          <p><strong>Room Type:</strong> {{ room ? room.room_name : 'No room selected' }}</p>
          <p><strong>Date:</strong> {{ bookingDetails.checkin_date }}</p>
          <div>{{ paymentReceipt }}</div>
        </div>
        <button @click="redirectHome">back to home</button>
        <div v-if="paymentReceipt" class="payment-receipt">
          <h2>Payment Receipt</h2>
          <div v-if="isImage" class="receipt-image">
            <img :src="`../storage/${paymentReceipt}`" alt="Payment Receipt" />
            <a :href="`../storage/${paymentReceipt}`" download>Download Receipt</a>
          </div>

        </div>

      </div>
      <Footer />
    </div>
  </template>

  <script>
  import axios from 'axios';
  import Navbar from '../Navbar.vue';
  import Footer from '../Footer.vue';

  export default {
    components: {
      Navbar,
      Footer
    },
    data() {
      return {
        bookingId: this.$route.params.id,
        bookingDetails: {},
        paymentReceipt: null,
        isImage: true,
        room: null,
        errors:[],
      };
    },
    mounted() {
      this.fetchBookingDetails();
    },
    watch: {
      '$route.params.id': function(newBookingId) {
        this.bookingId = newBookingId;
        this.fetchBookingDetails();
      }
    },
    methods: {
      fetchBookingDetails() {
        axios.get(`/api/booking/find/${this.bookingId}`)
          .then((response) => {
            this.bookingDetails = response.data.data;
            this.room = response.data.room;
            this.paymentReceipt = response.data.payment.file_url;
            console.log(response);
          })
          .catch((error) => {
            console.error('Error fetching data', error);
          });
      },


        },
    }
  </script>

  <style scoped>
  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    font-family: Arial, sans-serif;
  }

  .booking-details {
    background-color: #f5f5f5;
    padding: 20px;
    margin-bottom: 20px;
  }

  .payment-receipt {
    padding: 20px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
  }

  .receipt-image img {
    max-width: 100%;
  }

  .file-upload {
    margin-top: 20px;
    padding: 10px;
  }
  </style>
