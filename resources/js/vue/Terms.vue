<template>
   <Navbar />

   <main>
        <section class="terms">
          <h2>1. Introduction</h2>
          <p>Welcome to our website's Terms and Conditions. Please read these terms carefully before using our website.</p>

          <h2>2. Intellectual Property Rights</h2>
          <p>All content on this website is owned by us. You may not modify, copy, reproduce, distribute, or sell any information or material obtained from this website.</p>

        </section>
      </main>
   <Footer />
</template>

<style scoped>
  main {
    padding: 20px;
    height: 75.6vh;
  }

  .terms {
    margin-bottom: 20px;
  }

  h1, h2 {
    margin-top: 0;
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
