<template>
    <div>
      <Navbar />
      <div class="container">
        <!-- Display Booking Details -->
        <div class="booking-details">
          <h2>Booking Details</h2>
          <p><strong>Booking ID:</strong> {{ bookingId }}</p>
          <p><strong>Room Type:</strong> {{ room ? room.room_name : 'No room selected' }}</p>
          <p><strong>Date:</strong> {{ bookingDetails.checkin_date }}</p>
        </div>
        <button @click="redirectHome">back to home</button>
        <div v-if="paymentReceipt" class="payment-receipt">
          <h2>Payment Receipt</h2>
          <div v-if="isImage" class="receipt-image">
            <img :src="`../${paymentReceipt}`" alt="Payment Receipt" />
          </div>
          <div v-else class="receipt-pdf">
            <embed :src="`../${paymentReceipt}`" type="application/pdf" width="100%" height="600px" />
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
        room: null
      };
    },
    mounted() {
      this.fetchBookingDetails();
      this.handleFileUpload();
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
      handleFileUpload() {
            const file = this.paymentReceipt;
              if (file) {
                const allowedImageExtensions = ['.png', '.jpg', '.jpeg'];
                const fileExtension = file.name.toLowerCase().split('.').pop();

               if(allowedImageExtensions.includes(file[0]['type'])){
                this.isImage = true;
               }

              } else {
                console.error('No file selected.');
              }
          },
          redirectHome(){
            this.$router.push('/');
          }
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
