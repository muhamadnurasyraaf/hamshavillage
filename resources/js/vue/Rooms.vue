<template>
    <Navbar />
    <div class="content">
<div class="card" :style="{ backgroundImage: showBackgroundImage ? 'url(/storage/rooms/bg1.jpg)' : ''}">
    <div class="img-container">
        <img src="/storage/rooms/bg1.jpg" alt="Image Not Found">
    </div>
    <div class="room-details">
        <h3>Double Room</h3>
        <p>A room with a double bed, ideal for couples or individuals preferring more space.</p>
        <button>Book this room</button>
    </div>
</div>

<div class="card" :style="{ backgroundImage: showBackgroundImage ? 'url(/storage/rooms/first_room.jpg)' : ''}">
    <div class="img-container">
        <img src="/storage/rooms/secondroom.jpg" alt="">
    </div>
    <div class="room-details">
        <h3>Suite</h3>
        <p>A larger, more luxurious room often comprising a bedroom area and a separate living space.</p>
        <button>Book this room</button>
    </div>
</div>

<div class="card" :style="{ backgroundImage: showBackgroundImage ? 'url(/storage/rooms/secondroom.jpg)' : ''}">
    <div class="img-container">
        <img src="storage/rooms/first_room.jpg" alt="">
    </div>
    <div class="room-details">
        <h3>Twin Room</h3>
        <p>A room with two single beds, suitable for friends or individuals who prefer separate sleeping arrangements.</p>
        <button>Book this room</button>
    </div>
</div>
</div>
<Footer />
</template>

<style scoped>
button{
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
button:hover{
  background-color: #828382;
  color: #f7f7f7;
}
.content{
    min-height: 85vh;
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
    margin: 1em;
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
            }
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
