<template>
    <Navbar />
    <div class="container">
    <h1>Booking Form</h1>
    <div v-if="errors">
        <ul>
            <li class="error" v-for="(error,key) in errors" :key="key">
                {{ error[0] }}
            </li>
        </ul>
    </div>
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
                <option  v-for="room in filteredRooms" :key="room.id" :value="room.id" >{{ room.room_name }}</option>
            </select>
        </div>
        <div class="form-group">
        <label for="notes">Notes:</label>
        <textarea id="notes" v-model="formData.notes" rows="4"></textarea>
        </div>
        <div class="extra_mat">
            <p for="extra">Extra mattress(optional:RM20)</p>
            <input type="checkbox" id="extra_mat">
        </div>
        <div class="extra_mat">
            <p for="extra">Breakfast [RM10 per pax (optional)]</p>
            <div class="buttons">
                <button @click="increaseBreak" type="button">+</button>
                <input type="number" id="extra" v-model="formData.breakfast" readonly>
                <button @click="decreaseBreak" type="button">-</button>
            </div>

        </div>
        <div class="form-group">
        <label for="checkinDate">Check-in Date:</label>
        <input type="datetime-local" id="checkinDate" v-model="formData.checkin_date" required>
        </div>
        <div class="form-group">
        <label for="checkoutDate">Check-out Date:</label>
        <input type="datetime-local" id="checkoutDate" v-model="formData.checkout_date" required>
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
}
.error{
    color: red;
}
h1 {
  text-align: center;
}

.booking-form {
  background-color: #f9f9f9;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin-bottom:2em ;
}
.extra_mat{
    display: flex;
    align-items: center;
   gap: 1em;
   height: 2em;
   margin-bottom: 1em;
}

.buttons{
    display: flex;
    justify-content: center;
    gap: 2em;
}
.buttons button{
    border: none;
    border-radius:1em ;
}
#extra{
    width: 2em;
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
button:not(.buttons button) {
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
li{
    list-style-type: none;
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
    export default{
        data(){
            return {
                rooms:[],
                selectedRoom:null,
                quantity:0,
                id:null,
                errors:null,
                formData:{
                    name: '',
                    email: '',
                    phonenumber: '',
                    room_id: '',
                    notes: '',
                    breakfast:0,
                    checkin_date:'',
                    checkout_date:'',
                    extra_mat:0,
                    paid:false,
                },
            }
        },
        computed:{
            filteredRooms(){
                return this.rooms.filter(room => !room.isBooked);
            }
        },
        mounted(){
            axios.get('/api/rooms')
            .then((response) => {
                this.rooms = response.data;
                this.id = this.$route.params.id;
                if(this.id !== null){
                    this.selectedRoom = this.id;
                }
            }).catch((error) => {
                console.error('Error fetching room data : ',error);
                if (error.request) {
                        console.log('Request:', error.request);
                     }
        // Log response details
                if (error.response) {
                    console.log('Response:', error.response);
                 }
            });

        },
        methods:{
            submitForm(){
                const extraInput = document.getElementById('extra_mat');
                this.formData.room_id = this.selectedRoom;
                this.formData.extra_mat = extraInput.checked ? 1 : 0;
                axios.post('/api/booking/store',this.formData)
                .then((response) => {
                    console.log('Form submitted succesfully : ' , response.data);
                    this.$router.push({name:'payment', params:{ id: response.data.id }});
                })
                .catch((error) =>{
                    console.log('Error submitting form: ',error);
                    this.errors = error.response.data.errors;
                    if (error.request) {
                        console.log('Request:', error.request);
                     }
        // Log response details
                if (error.response) {
                    console.log('Response:', error.response);
                 }
                });
            },
            increase(){
                this.quantity++
                this.formData.extra_mat = this.quantity;
            },
            decrease(){
                if(this.formData.extra_mat > 0 ){
                    this.quantity--
                    this.formData.extra_mat = this.quantity;
                }

            },
            increaseBreak(){
                if(this.formData.breakfast < 5){
                    this.formData.breakfast++
                }
            },
            decreaseBreak(){
                if(this.formData.breakfast > 0){
                    this.formData.breakfast--
                }
            }
        },
        components:{
            Navbar,
            Footer,
        }
    }
</script>
