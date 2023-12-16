<template>
    <Navbar />
    <div class="content" v-for="room in rooms" :key="room.id">
        <div class="card" :style="{ backgroundImage: showBackgroundImage ? `url(/storage/rooms/${room.imageUrl})` : ''}">
            <div class="img-container">
                <img v-bind:src="`/storage/rooms/${room.imageUrl}`" alt="Image Not Found">
            </div>
            <div class="room-details">
                <h3>{{ room.room_name }}</h3>
                <p>{{ room.description }}</p>
                <p style="font-weight: bold;">RM{{ room.price }}</p>
                <div class="buttons">
                    <router-link class="button" :to="`/booking/${room.id}`">Book this room</router-link>
                    <router-link class="btn" :to="`/room-details/${room.id}`">More Details</router-link>
                </div>

            </div>
        </div>
    </div>
<Footer />
</template>

<style scoped>
.buttons{
    display: flex;
    gap: 1em;
    align-items: center;
}
.button{
  border: none;
  font-family: 'Montserrat',sans-serif;
  padding: 0.7em 1.5em;
  border-radius: 0.3em;
  font-weight: bold;
  background-color: #43f543;
  outline: none;
  color: white;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}
.button:hover{
  background-color: #828382;
  color: #f7f7f7;
}
.content{
    margin: 1em auto;
    max-width: 70%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
  }
  .card{
    display: flex;
    height: 35vh;
    justify-content: space-around;
    gap: 1.5em;
    width: 65%;
    box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
    padding: 1em;
    border-radius: 1em;
    align-items: center;
    background-image: none;
  }
  .card h3{
    font-family: 'Montserrat Alternates',sans-serif;
    text-decoration: overline;
  }
  .img-container{
    width: 37%;
  }
  .room-details{
    width: 50%;
  }
  .img-container img{
    width: 70%;
    border-radius: 1.5em;
  }
  @media screen and (max-width: 480px){
    .card{
        display: flex;
        flex-direction: column;
        width: 100%;
        margin: 20px 0;
        background-size:cover;
        background-position: center;
    }
    .img-container img{
      display: none;
    }
    .room-details{
        line-height: 1;
    }
    .card h3{
        color: rgb(230, 157, 67);
    }
    .card p{
        color: #fffcfc;
    }


  }
</style>

<script>
    import Navbar from './Navbar.vue';
    import Footer from './Footer.vue';
    export default{
        components:{
            Navbar,
            Footer,
        },
        data(){
            return {
                showBackgroundImage:true,
                active:'rooms',
                rooms:[],
            }
        },
        mounted(){
            axios.get('/api/rooms')
            .then((response) => {
                this.rooms = response.data;
            })
            .catch((error) =>{

            })
        },
        created(){
            this.checkScreenWidth();
            window.addEventListener('resize',this.checkScreenWidth);
        },
        methods:{
            checkScreenWidth(){
                this.showBackgroundImage = window.innerWidth <= 480;
            },
        }

    }
</script>
