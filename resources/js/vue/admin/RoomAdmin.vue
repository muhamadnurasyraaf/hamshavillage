<template>
    <Navbar />
    <h3 v-if="loading">
            Loading....
        </h3>
    <div v-else class="main">
        <button @click="addroom" class="btn1">Add Room</button>

        <div class="content" v-for="room in rooms" :key="room.id">
        <div class="card" :style="{ backgroundImage: showBackgroundImage ? `url(${room.imageUrl})` : ''}">
        <div class="img-container">
            <img v-bind:src="`${room.imageUrl}`" alt="Image Not Found">
        </div>
        <div class="room-details">
            <h3>{{ room.room_name }}</h3>
            <p>{{ room.description }}</p>
            <p style="font-weight: bold;">RM{{ room.price }}</p>
            <div class="buttons">
                <button class="button" @click="confirmDelete(room.id)">Delete this room</button>
                <router-link class="btn" :to="`/room-detail-admin/${room.id}`">More Details</router-link>
            </div>
        </div>
        </div>
            </div>
    </div>

<Footer />
</template>

<style scoped>
.main{
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 1em;
    min-height: 81vh
}
.btn1{
    width: 10%;
    margin: 0.25em auto;
    color: whitesmoke;
    background-color: #43f543;
    border: none;
    padding: 1em 2em;
    border-radius: 1em;
    font-weight: bold;
    cursor: pointer;
}
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
  background-color: #DC3545;
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
    margin: auto auto;
    max-width: 70%;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;

  }
  .card{
    display: flex;
    height: 35vh;
    justify-content: space-around;
    gap: 0.5em;
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
    import Navbar from '../Navbar.vue';
    import Footer from '../Footer.vue';
    import axios from 'axios';
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
                loading:true,
            }
        },
        mounted(){
            this.fetchRooms();
        },
        created(){
            this.checkScreenWidth();
            window.addEventListener('resize',this.checkScreenWidth);
        },
        methods:{
            fetchRooms(){
                axios.get('/api/rooms')
            .then((response) => {
                this.rooms = response.data;
                this.loading = false
            })
            .catch((error) =>{
                console.error('Error fetching data',error)
                this.loading = false
            })
            },
            checkScreenWidth(){
                this.showBackgroundImage = window.innerWidth <= 480;
            },
            confirmDelete(id){
                if(confirm('Do you confirm to delete room with id : ' + id +' ?')){
                    this.deleteRoom(id);
                }
            },
            deleteRoom(id){
                axios.delete(`/api/room/delete/${id}`)
                .then((response)=>{
                    console.log(response.data);
                    this.fetchRooms();
                })
                .catch((error)=>{
                    console.error('Error deleting data',error.response)
                })
            },
            addroom(){
                this.$router.push('/admin/room/add');
            }
        }

    }
</script>
