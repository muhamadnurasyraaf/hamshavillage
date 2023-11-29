<template>
   <Navbar />

   <main>
    <h1>Terms and Policies</h1>

<h2>General Policies</h2>
<ul>
  <li>Tidak dibenarkan menggunakan sabun, shampoo, makan & minum serta MEROKOK di dalam kawasan kolam‼</li>
  <li>Tidak dibenarkan Popper Party dan tepung gandum‼</li>
  <li>Tidak dibenarkan berkaraoke (berhampiran dgn Surau & utk menghormati kejiranan juga) ‼</li>
  <li>Tidak dibenarkan pencampuran lelaki perempuan yg belum berkahwin‼</li>
  <li>Tidak dibenarkan aktiviti yg tidak bermoral‼</li>
  <li>Tidak dibenarkan jemputan luar, sdara mara atau kenalan terdekat yg tidak menginap di homestay‼Caj tambahan akan dikenakan sekira ianya berlaku</li>
</ul>

<h2>Booking Information</h2>
<ul>
  <li>Waktu Check in: selepas 3.00 petang</li>
  <li>Waktu Check out: sebelum 12.00 tengahari</li>
  <li>Extra Tilam Rm 20</li>
</ul>

<p class="highlight">⭐ MUSLIM FRIENDLY ⭐⭐</p>

<p>Note: This is just a sample terms and policies page. Please contact us for the official and complete version.</p>
   </main>
   <Footer />
</template>

<style scoped>
  main {
    padding: 20px;
    height: 75.6vh;

  }
  body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h1 {
      text-align: center;
    }

    h2 {
      margin-top: 30px;
    }

    ul {
      list-style: none;
      padding-left: 0;
    }

    li:before {
      content: "✅";
      margin-right: 10px;
    }

    .highlight {
      color: blue;
      font-weight: bold;
    }

    @media screen and  (max-width: 600px) {
      h1, h2 {
        font-size: 22px;
      }
    }

    @media screen and (max-width:480px) {
        main{
        padding-bottom:10em;
      }
    }
    .content{
        height: 79.9vh;
    }


</style>
<script>
    import Navbar from './Navbar.vue';
    import Footer from './Footer.vue';
    export default{
        components:{
            Navbar,
            Footer,
        }
    }
</script>
