<template>
    <div class="payment-page">
      <h1>Payment Information</h1>
      <div class="booking-details">
        <h2>Booking Details</h2>
        <ul>
          <li>Booking ID: {{ bookingId }}</li>
          <li>Name: {{ booking.name }}</li>
          <li>Email: {{ booking.email }}</li>
          <li>Phone Number: {{ booking.phonenumber }}</li>
          <li>Room: {{ room.room_name }}</li>
          <li>Extra Mattress: {{ booking.extra_mat }} , (RM{{ 20 * booking.extra_mat }})</li>
          <li>Breakfast: {{ booking.breakfast }} , (RM{{ 10 * booking.breakfast }})</li>
          <li>Check-in Date: {{ booking.checkin_date }}</li>
          <li>Check-out Date: {{ booking.checkout_date }}</li>
          <li>Period: {{ booking.days }} Days</li>
        </ul>
      </div>
      <div class="payment-details">
        <h2>Payment Details</h2>
        <p>Please make your payment to the following bank account:</p>
        <ul>
          <li>Account Name: {{ bank.account_name }}</li>
          <li>Account Number: {{ bank.number_account }}</li>
          <li>Bank Name: {{ bank.Bank_Name }}</li>
        </ul>
        <h3>Total : RM{{ room.price }} + RM{{ booking.extra_mat * 20 * booking.days}} (extra mattress) + RM{{ booking.breakfast * 10 * booking.days}} (Breakfast)  = RM{{ price }}</h3>
        <p>Please note that the price had been adjusted based on number of days</p>
        <p>Once you have made your payment, please upload the payment confirmation receipt below[Prefer in image/screenshots(jpg,jpeg,png)].</p>
        <input type="file" id="paymentConfirmationReceipt" />
        <button @click="submitPayment">Submit Payment</button>
      </div>
    </div>
  </template>

  <script>


  export default {

    data() {
      return {
        bookingId: null,
        booking: {},
        paymentDetails: {},
        room:{},
        bank:{},
        file:null,
        price:0,
      };
    },
    mounted() {

       this.bookingId = this.$route.params.id;
       axios.get(`/api/booking/find/${this.bookingId}`)
       .then((response)=>{
          this.booking = response.data.data;
          this.room = response.data.room;
          this.bank = response.data.bank;
          this.price = this.booking.cost;
       })
       .catch((error)=>{
        console.error('Error fetching data ', error)
       });
    },
    methods: {
      submitPayment() {
        this.file = document.getElementById('paymentConfirmationReceipt').files[0];
        const config = {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            };
        let formda = new FormData();
        formda.append('booking_id',this.bookingId);
        formda.append('payment_receipt', this.file);

      axios.post('/api/payment/store', formda,config)
        .then((response) =>{
            console.log(response.data);
            this.$router.push(`/book-completed/${this.bookingId}`);
        })
        .catch((error)=>{
            console.error('Error submitting payment: ' , error);
            console.log(formda)
        });
      },
    },
  };
  </script>

  <style scoped>
  .payment-page {
    width: 80%;
    margin: 20px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  h1 {
    text-align: center;
  }

  ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  li {
    padding: 5px;
    border-bottom: 1px solid #ccc;
  }

  .payment-details {
    margin-top: 20px;
  }

  input[type="file"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
</style>
