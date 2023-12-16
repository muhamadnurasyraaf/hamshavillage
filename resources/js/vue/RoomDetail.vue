<template>
    <Navbar />
    <div class="room-details">
      <h2>{{ room.name }} : {{ roomId }}</h2>

      <!-- Carousel for room images -->
      <div class="carousel">
        <div class="slide" v-for="(image, index) in room.images" :key="index" :class="{ active: index === activeIndex }">
          <img :src="image" alt="Room Image" class="room-image" />
        </div>
        <div class="carousel-controls">
          <button @click="prevSlide" class="control-btn">&lt;</button>
          <button @click="nextSlide" class="control-btn">&gt;</button>
        </div>
      </div>

      <p>Description: {{ room.description }}</p>

      <p>Price: ${{ room.price }}</p>
    </div>
    <Footer />
  </template>

  <script>
import Footer from './Footer.vue';
import Navbar from './Navbar.vue';
  export default {
    components:{
        Navbar,Footer
    },
    data() {
      return {
        room: {
          name: 'Example Room',
          images: [
          'storage/rooms/bed_eng.jpg',
            'storage/rooms/inside_ck1.jpg',
        ],
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel eros vitae purus sodales suscipit.',
          price: 150 // Replace with the actual room price
        },
        roomId:0,
        activeIndex: 0
      };
    },
    mounted(){
        this.roomId = this.$route.params.id;
    },
    methods: {
      nextSlide() {
        this.activeIndex = (this.activeIndex + 1) % this.room.images.length;
      },
      prevSlide() {
        this.activeIndex = (this.activeIndex - 1 + this.room.images.length) % this.room.images.length;
      }
    }
  };
  </script>

  <style scoped>
  .room-details {
    text-align: center;
    padding: 20px;
    min-height: 76.2vh;
  }

  .carousel {
    position: relative;
    max-width: 300px; /* Set maximum width for the carousel */
    margin: 0 auto;
    overflow: hidden;
    margin-bottom: 20px;
  }

  .slide {
    display: none;
    justify-content: center;
    align-items: center;
  }

  .slide.active {
    display: flex;
  }

  .room-image {
    max-width: 100%;
    height: auto;
    max-height: 200px; /* Set maximum height for images */
  }

  .carousel-controls {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    display: flex;
    justify-content: space-between;
  }

  .control-btn {
    background: rgba(255, 255, 255, 0.5);
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    font-size: 1.2em;
  }

  @media (max-width: 768px) {
    .carousel {
      max-width: 80%;
    }
  }
  </style>
