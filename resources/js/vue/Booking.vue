<template>
    <Navbar />
    <div class="container">
    <h1>Booking Form</h1>
    <form id="bookingForm" class="booking-form" @submit.prevent="submitForm">
        <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" v-model="formData.name" required>
        </div>
        <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" v-model="formData.email" required>
        </div>
        <div class="form-group">
        <label for="phoneNumber">Phone Number:</label>
        <input type="tel" id="phoneNumber" v-model="formData.phonenumber" required>
        </div>
        <div class="form-group">
            <label for="Room_Choice">Room Choice</label>
            <select id="Room_Choice" v-model="selectedRoom">
                <option v-for="room in rooms" :key="room.id" :value="room.id">{{ room.room_name }}</option>
            </select>
        </div>
        <div class="form-group">
        <label for="notes">Notes:</label>
        <textarea id="notes" v-model="formData.notes" rows="4"></textarea>
        </div>
        <div class="form-group">
        <label for="checkinDate">Check-in Date:</label>
        <input type="date" id="checkinDate" v-model="formData.checkin_date" required>
        </div>
        <div class="form-group">
        <label for="checkoutDate">Check-out Date:</label>
        <input type="date" id="checkoutDate" v-model="formData.checkout_date" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
    <Footer />
</template>

<style scoped>
    .container {
  width: 80%;
  margin: 20px auto;
  height: 75.4vh;
}

h1 {
  text-align: center;
}

.booking-form {
  background-color: #f9f9f9;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="tel"],
textarea,
input[type="date"],
button {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

button {
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #0056b3;
}

/* Responsive styling */
@media screen and (max-width: 600px) {
  .container {
    width: 100%;
    padding: 0 10px;
  }
}
</style>
<script>
import Navbar from './Navbar.vue';
import Footer from './Footer.vue';
import axios from 'axios';
    export default{
        data(){
            return {
                rooms:[],
                selectedRoom:null,
                formData:{
                    name: '',
                    email: '',
                    phonenumber: '',
                    room_id: '',
                    notes: '',
                    checkin_date:'',
                    checkout_date:'',
                    paid:false,
                },
            }
        },
        mounted(){
            axios.get('/api/rooms')
            .then((response) => {
                this.rooms = response.data;
                this.$router({ name:'payment', params: {id:response.data.id}});
            }).catch((err) => {
                console.error('Error fetching room data : ',err);
            });

        },
        methods:{
            submitForm(){
                this.formData.room_id = this.selectedRoom;

                axios.post('/api/booking/store',this.formData)
                .then((response) => {
                    console.log('Form submitted succesfully : ' , response.data);
                })
                .catch((error) =>{
                    console.log('Error submitting form: ',error);
                });
            },
        },
        components:{
            Navbar,
            Footer,
        }
    }
</script>
