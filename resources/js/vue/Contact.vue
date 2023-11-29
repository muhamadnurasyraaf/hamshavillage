<template>
    <Navbar />
    <div class="content">
        <h1>Contact Us</h1>

        <ul>
        <li>Phone: <a href="tel:0123539574">012 353 9574</a></li>
        <li>Phone: <a href="tel:0126291906">012 629 1906</a></li>
        <li>Email: <a href="mailto:pakdanndor@yahoo.com">pakdanndor@yahoo.com</a></li>
        <li>Email: <a href="mailto:hamshabeauliciousrich@gmail.com">hamshabeauliciousrich@gmail.com</a></li>
        </ul>

        <p>Feel free to contact us for any inquiries or assistance you may require.</p>

    </div>
    <Footer />
</template>
<style scoped>
    body{
        margin: 20px;
    }
    .content{
        height: 79.9vh;
        margin: 0 auto;
        max-width: fit-content;
    }
    h1 {
      text-align: center;
    }

    ul {
      list-style: none;
      padding-left: 0;
    }

    li:before {
      content: "📞";
      margin-right: 10px;
    }

    a {
      color: blue;
      text-decoration: none;
    }

    @media (max-width: 600px) {
      h1 {
        font-size: 22px;
      }
      .content{
        height: 65vh;
      }
    }

</style>
<script>
import Footer from './Footer.vue';
import Navbar from './Navbar.vue';

export default{
    components:{
        Navbar,
        Footer
    }
}
</script>
