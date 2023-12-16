<template>
    <Navbar />
    <div class="room-management">

      <div class="room-cards">
        <button @click="nav()">Add a room</button>
        <div v-for="room in rooms" :key="room.id" class="room-card">
          <h3>{{ room.name }}</h3>
          <div class="room-images">
            <img v-for="(image, index) in room.images" :key="index" :src="image" alt="Room Image" />
          </div>
          <p>Description: {{ room.description }}</p>
          <p>Price: ${{ room.price }}</p>
          <div class="card-buttons">
            <button @click="editRoom(room)">Edit</button>
            <button @click="deleteRoom(room.id)">Delete</button>
          </div>
        </div>
      </div>

      <div v-if="rooms.length === 0">
        <p>No rooms available.</p>
      </div>
    </div>
    <Footer />
  </template>

  <script>
import Navbar from '../Navbar.vue';
import Footer from '../Footer.vue';
  export default {
    data() {
        return {
            rooms: [
                {
                    id: 1,
                    name: 'Example Room 1',
                    images: ['image_url_1.jpg', 'image_url_2.jpg'],
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                    price: 100
                },
                {
                    id: 2,
                    name: 'Example Room 2',
                    images: ['image_url_3.jpg', 'image_url_4.jpg'],
                    description: 'Nulla vel eros vitae purus sodales suscipit.',
                    price: 120
                }
                // Add more room objects as needed
            ]
        };
    },
    methods: {
        editRoom(room) {
            // Logic for editing a room
            console.log("Edit room:", room);
        },
        deleteRoom(roomId) {
            // Logic for deleting a room
            console.log("Delete room with ID:", roomId);
        },
        nav(){
            this.$router.push({name:'add-room'});
        }
    },
    components: { Navbar,Footer }
};
  </script>

  <style>
  .room-management {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: flex-start;
    padding: 20px;
  }

  .room-card {
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin: 10px;
  }

  .room-card h3 {
    margin-top: 0;
  }

  .room-images {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
  }

  .room-images img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 5px;
    margin-right: 5px;
  }

  .card-buttons button {
    margin-right: 5px;
  }
  </style>
