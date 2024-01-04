<template>
    <Navbar />
    <div class="add-room">
        <div v-if="isSucceed" class="alert">
            Successfully Added a Room
        </div>
      <h2>Add a Room</h2>
      <form @submit.prevent="addRoom">
        <label for="name">Room Name:</label>
        <input type="text" id="name" v-model="room.room_name" required />

        <label for="description">Description:</label>
        <textarea id="description" v-model="room.description" required></textarea>

        <label for="price">Price:</label>
        <input type="number" id="price" v-model="room.price" required />

        <button @click="handleSubmit" type="submit">Add Room</button>
      </form>
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
        room: {
          room_name: '',
          description: '',
          price: 0,
            image:null
        },
        isSucceed:false,
      };
    },
    props:{
        id:String,
    },
    components: {
      Navbar,
      Footer
    },
    methods: {
      handleSubmit() {

            const formData = new FormData();
            formData.append('name', this.room.room_name);
            formData.append('description', this.room.description);
            formData.append('price', this.room.price);

            axios.post('/api/room/store', formData)
            .then((response) => {
            this.isSucceed = true;
            console.log(response.data);
            })
            .catch((err) => {
            console.error('Error submitting data', err);
            });
      }
    }
  };
  </script>

  <style scoped>
  .add-room {
    max-width: 600px;
    margin: 0 auto;
    min-height: 78.3vh;
  }

  form {
    display: flex;
    flex-direction: column;
  }

  label {
    margin-top: 10px;
  }

  input[type="text"],
  input[type="number"],
  textarea {
    width: 100%;
    padding: 5px;
    margin-top: 5px;
  }

  button {
    margin-top: 10px;
    padding: 8px 16px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
  }
  </style>
