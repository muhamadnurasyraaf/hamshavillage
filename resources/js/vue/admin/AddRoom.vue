<template>
    <Navbar />
    <div class="add-room">
      <h2>Add a Room</h2>
      <form @submit.prevent="addRoom">
        <label for="name">Room Name:</label>
        <input type="text" id="name" v-model="room.name" required />

        <label for="description">Description:</label>
        <textarea id="description" v-model="room.description" required></textarea>

        <label for="price">Price:</label>
        <input type="number" id="price" v-model="room.price" required />

        <label for="images">Images (up to 4):</label>
        <input type="file" id="images" accept="image/*" @change="handleImageUpload" multiple />
        <div v-if="room.images.length > 0">
          <p>Uploaded Image Names:</p>
          <ul>
            <li v-for="(image, index) in room.images" :key="index">{{ image.name }}</li>
          </ul>
        </div>

        <button type="submit">Add Room</button>
      </form>
    </div>
    <Footer />
  </template>

  <script>
  import Navbar from '../Navbar.vue';
  import Footer from '../Footer.vue';
  export default {
    data() {
      return {
        room: {
          name: '',
          description: '',
          price: 0,
          images: [] // Storing images as objects containing file data
        }
      };
    },
    components: {
      Navbar,
      Footer
    },
    methods: {
      addRoom() {
        // Logic to handle adding the room with room details and images
        console.log('Room Added:', this.room);
        // Reset form fields after adding room (You might want to clear these fields in your actual application)
        this.room = {
          name: '',
          description: '',
          price: 0,
          images: []
        };
      },
      handleImageUpload(event) {
        const files = event.target.files;
        if (files.length + this.room.images.length > 4) {
          alert('You can only upload up to 4 images.');
          return;
        }

        for (let i = 0; i < files.length; i++) {
          if (this.room.images.length >= 4) break; // Limit to 4 images
          const file = files[i];
          const reader = new FileReader();

          reader.onload = (e) => {
            // Push image data including name into room.images array
            this.room.images.push({
              dataURL: e.target.result,
              name: file.name // Store the name of the uploaded file
            });
          };
          reader.readAsDataURL(file);
        }
      }
    }
  };
  </script>

  <style scoped>
  /* Your existing styles */
  </style>

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
