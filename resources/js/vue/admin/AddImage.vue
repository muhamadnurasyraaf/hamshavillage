<template>
    <Navbar />
    <div class="main">
        <h2 v-if="loading">Loading.....</h2>
    <div v-else class="container">
      <h1 class="heading">Add Images for Room : {{ roomId }}</h1>
      <p>Please note that the first image being added will be the cover of the room</p>
      <div class="form-container">
        <div class="form">
          <label for="roomImages" class="label">Upload Images (up to 4):</label>
          <input type="file" id="roomImages"  class="input" accept="image" required>
          <button type="submit" @click="handleImageUpload" class="btn" >Submit</button>
        </div>

        <div class="image-preview" v-if="images.length > 0">
          <h3>Uploaded Images:</h3>
          <p>Click any image if you want to delete</p>
          <div class="image-grid">
            <div v-for="(img, index) in images" :key="index" class="image-item">
              <img @click="confirmDelete(img.id)" :src="img.imageUrl" :alt="'Room Image ' + (index + 1)" class="preview-img">
            </div>
          </div>
        </div>
        <div v-else>
            There's no image yet for this room
        </div>
      </div>
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
        loading:true,
        images: [],
        roomId:this.$route.params.id,
      };
    },
    props:{
        id:String
    },
    components:{Navbar,Footer},
    mounted(){
        this.fetchImages();
    },
    methods: {
      fetchImages(){
        axios.get(`/api/images/find/${this.roomId}`)
        .then((response)=>{
            this.images = response.data;
            this.loading = false;
        })
        .catch((err)=>{
            this.loading = false;
            console.error('Error fetching data',err);
        })
      },
      handleImageUpload(){
        const file = document.getElementById('roomImages').files[0];
        let formdata = new FormData();
        formdata.append('room_id',this.roomId);
        formdata.append('image',file);
        axios.post('/api/image/store',formdata)
        .then((response)=>{
            this.fetchImages()
        })
        .catch((error)=>{
            console.error('Failed to submit data',error);
        })
      },
      async confirmDelete(id){
        const confirmed = confirm('Are you sure you want to delete this image?');
        if(confirmed){
           try {
                await this.deleteImage(id)
           } catch (error) {
                console.error('Error deleting image',error)
                alert('Failed to delete the image');
           }
        }
      },
      async deleteImage(id){

        try {
            const response = await axios.delete(`/api/image/delete/${id}`);
            console.log('Successfully deleted an image' + response.data);
            this.fetchImages()
            alert('Successfully deleted the image');
        } catch (error) {
            console.error('Error deleting the image',error);
            throw error;
        }

      }

    }
  };
  </script>

  <style>
  .main{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 81vh;
  }
  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }

  .heading {
    text-align: center;
    margin-bottom: 20px;
  }

  .form-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .form {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .label {
    font-weight: bold;
  }

  .input {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  .btn {
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .btn:hover {
    background-color: #0056b3;
  }

  .image-preview {
    text-align: center;
  }

  .image-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
  }

  .image-item {
    flex: 0 0 200px;
  }

  .preview-img {
    max-width: 100%;
    height: auto;
    cursor: pointer;
  }
  </style>
