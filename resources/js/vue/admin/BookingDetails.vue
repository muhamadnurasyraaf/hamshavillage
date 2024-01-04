<template>
    <div>
      <Navbar />
      <div class="container">
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
          <p><strong>Customer's Name:</strong> {{ bookingDetails.name }}</p>
          <p><strong>Customer's Email:</strong> {{ bookingDetails.email}}</p>
          <p><strong>Customer's Phone Number:</strong> {{ bookingDetails.phonenumber}}</p>
          <p><strong>Notes : </strong>{{ bookingDetails.notes }}</p>
          <p><strong>Room Type : </strong> {{ room ? room.room_name : 'No room selected' }}</p>
          <p><strong>Breakfast : </strong> {{ bookingDetails.breakfast }}</p>
          <p><strong>Extra mattress : </strong> {{ bookingDetails.extra_mat }}</p>
          <p><strong>Check in Date:</strong> {{ bookingDetails.checkin_date }}</p>
          <p><strong>Check out Date:</strong> {{ bookingDetails.checkout_date }}</p>
          <p><strong>Total : </strong>RM{{ bookingDetails.cost }}</p>
        </div>
        <div class="btns">
            <button @click="confirmDelete">Delete this booking details</button>
            <button @click="confirmSet">Set as Completed</button>
        </div>

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
      confirmDelete(){
        if(confirm('Do you confirm you want to delete this booking : ' + this.bookingId)){
            this.deleteBooking();
        }
      },
      deleteBooking(){
        axios.delete(`/api/booking/delete/${this.bookingId}`)
        .then((response)=>{
            console.log(response.data);
            this.$router.push('/admin/bookinghistory');
        })
        .catch((err)=>{
            console.error('Error deleting data',err);
        })
      },
      confirmSet(){
            if(confirm('Do you confirm?')){
                this.setComplete();
            }
        },
        setComplete(){
            axios.post(`/api/booking/update/${this.bookingId}`)
            .then((response)=>{
                alert(response.data.message);
            }).
            catch((err)=>{
                console.error('Error updating data',err);
            })
        }
        },

    }
  </script>

  <style scoped>
  .btns button{
    background-color: #43f543;
    color: white;
    border: none;
    padding: 1em 2em;
    border-radius: 2em;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.4s;
  }
  .btns button:hover{
    background-color: #ccc;
    color: black;
  }
  .btns{
    display: flex;
    justify-content: center;
    margin: 1em 0;
    gap: 1em;
  }
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
