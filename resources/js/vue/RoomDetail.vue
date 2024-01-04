<template>
    <Navbar />
    <div class="room-details">
      <h2>{{ room.room_name }} : {{ roomId }}</h2>

      <!-- Carousel for room images -->
      <div class="carousel">
        <div class="slide" v-for="(image, index) in images" :key="index" :class="{ active: index === activeIndex }">
          <img v-bind:src="image.imageUrl" alt="Room Image" class="room-image" />
        </div>
        <div class="carousel-controls">
          <button @click="prevSlide" class="control-btn">&lt;</button>
          <button @click="nextSlide" class="control-btn">&gt;</button>
        </div>
      </div>

      <p>Description: {{ room.description }}</p>

      <p>Price: RM{{ room.price }}</p>
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
        room: {},
        roomId:0,
        activeIndex: 0,
        images:{}
      };
    },
    props:{
        id:String,
    },
    mounted(){
        this.roomId = this.$route.params.id;
        axios.get(`/api/room/find/${this.roomId}`)
        .then((response) =>{
            this.room = response.data.room;
            this.images = response.data.images;
        })
        .catch((error)=>{
            console.error('Error fetching data',error)
        })
    },
    methods: {
      nextSlide() {
        this.activeIndex = (this.activeIndex + 1) % this.images.length;
      },
      prevSlide() {
        this.activeIndex = (this.activeIndex - 1 + this.images.length) % this.images.length;
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
  max-width: 500px; /* Adjust maximum width for the carousel */
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
  max-height: 300px; /* Increased maximum height for images */
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
