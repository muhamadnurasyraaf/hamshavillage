<template>
    <div>
        <Navbar />
        <header :style="{ backgroundImage: 'url(/storage/backgrounds/bg1.jpg)'}">
            <div class="title-container">
            <h1 class="title">Hamsha Village Homestay</h1>
            <p>Cozy Chalets &bull; Refreshing Morning Air &bull; Picturesque Rice Field Scenery</p>
            </div>
   </header>
   <p class="about-us">
    About Us
   </p>
   <div class="about">
      <p>Tucked away in a serene countryside, Hamsha Village stands as a peaceful sanctuary, showcasing a blend of rustic charm and modern comforts. Our collection of cozy chalets harmoniously integrates with the natural landscape, offering breathtaking views of rolling hills and vibrant rice fields that stretch across the horizon. Embracing sustainable practices,
        we prioritize eco-friendly initiatives to preserve the lush beauty that envelops our retreat.</p>
      <p>At Hamsha Village, we curate an immersive experience, inviting guests to unwind and reconnect with nature. Our commitment to sustainability extends to our culinary endeavors, where locally sourced ingredients form the essence of our delectable dishes served at the charming on-site restaurant. Beyond relaxation, we offer diverse activities, from guided nature walks to cultural workshops, allowing guests to delve
        into the rich heritage of the region and discover the tranquility that lies within our serene surroundings.</p>
        <p>
          Moreover, our village fosters a sense of community by hosting events and gatherings that encourage interaction among guests. These occasions provide opportunities to share stories, forge connections, and create lasting memories amidst the tranquil oasis of Hamsha Village. Whether seeking solace in nature's embrace or engaging in cultural experiences, our retreat is a haven for those yearning to unwind,
          rejuvenate, and find harmony amidst the captivating beauty of the countryside.
        </p>
   </div>
   <div class="activities">
    <div>
      <div>
        <h4>Open Days and Hours</h4>
        <table>
          <tr>
            <th>Day</th>
            <th>Opening Hours</th>
          </tr>
          <tr>
            <td>Sunday</td>
            <td>9:00 AM - 12:00 AM</td>
          </tr>
          <tr>
            <td>Monday</td>
            <td>9:00 AM - 12:00 AM</td>
          </tr>
          <tr>
            <td>Tuesday</td>
            <td>9:00 AM - 12:00 AM</td>
          </tr>
          <tr>
            <td>Wednesday</td>
            <td>9:00 AM - 12:00 AM</td>
          </tr>
          <tr>
            <td>Thursday</td>
            <td>9:00 AM - 12:00 AM</td>
          </tr>
          <tr>
            <td>Friday</td>
            <td>Closed</td>
          </tr>
          <tr>
            <td>Saturday</td>
            <td>Closed</td>
          </tr>
        </table>
      </div>
      <div class="act">
        <h4>Available Activities</h4>
        <ul>
          <li>Fishing</li>
          <li>Fish Feeding</li>
          <li>Camping</li>
          <li>Kayaking</li>
          <li>Barbeque</li>
          <li>Swimming Pool</li>
        </ul>
      </div>
    </div>
    <div class="highlightes">
      <h4>highlights</h4>
      <div class="container-img">
        <img :src="image1" alt="Image 1">
        <img :src="image2" alt="Image 2">
        <img :src="image3" alt="Image 3">
        <img :src="image4" alt="Image 3">
      </div>

    </div>
   </div>
    </div>
    <Footer />
</template>

<style scoped>
    header{
  background-position: center;
  height: 89.5vh;
  background-repeat: no-repeat;
  background-size: cover;
  display: flex;
  justify-content: center;
  align-items: center;
}
header h1{
  text-decoration: overline;
  color: white;
  font-family: 'Montserrat Alternates',sans-serif;
}
button:hover{
  background-color: #828382;
  color: #f7f7f7;
}
.title-container{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  font-family: 'Montserrat',sans-serif;
  line-height: 1.5;
  color: #43f543;
  font-weight: bold;
  max-width: 50%;
}
.title-container h1{
  font-size: 3rem;
}
.title-container{
  font-size: 1.5rem;
  font-weight: 400;
}

header .title-container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 1;
}
.about-us{
  text-align: center;
  font-size: 2rem;
  color: #197419;
  font-weight: bold;
  text-decoration: underline;
}
.about{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin: 1em auto;
  color: #acaaaa;
  max-width: 75%;
}
.activities{
  display: flex;
  justify-content: space-around;
  margin: 1em auto;
  max-width: 75%;
}
.highlightes {
 display: flex;
 flex-direction: column;
 max-width: 20%;
 justify-content: center;
 align-items: center;
}

.highlightes img {
  width: 100%;
  height: auto;
}
.container-img{
  display: grid;
  grid-template-columns: 100% 100%;
}

@media screen and (max-width: 480px) {
  /* Further adjustments for even smaller screens */

  header {
    height: 50vh; /* Adjust the height for smaller screens */
  }
  .highlightes{
    display: none;
  }
  .title-container {
    max-width: 95%; /* Adjust the width for smaller screens */
  }
  .title-container p{
    display: none;
  }
  .title-container h1 {
    font-size: 2rem; /* Adjust font size for even smaller screens */
  }

  /* Other responsive adjustments for smaller screens */
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
                image1:'storage/highlights/first.jpg',
                image2:'storage/highlights/second.jpg',
                image3:'storage/highlights/third.jpg',
                image4:'storage/highlights/fourth.jpg',

            }
        }


    }
</script>
