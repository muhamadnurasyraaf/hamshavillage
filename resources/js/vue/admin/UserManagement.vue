<template>
    <Navbar />
    <div v-for="user in users" :key="user.id" class="user-details-container">
      <h1>User Details</h1>


      <div class="user-details">
        <p><strong>Name:</strong> {{ user.username }}</p>
        <p><strong>Email:</strong> {{ user.email }}</p>
        <p><strong>Role:</strong> {{ (user.is_admin ? 'Admin' : 'Worker') }}</p>

        <button @click="editUser" class="edit-button">Edit User Details</button>
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
        users: null
      };
    },
    components:{
        Navbar,Footer
    },
    mounted() {
      this.fetchUserDetails();
    },
    methods: {
      fetchUserDetails() {
        axios.get('/api/users')
        .then((response) =>{
            this.users = response.data;
        })
        .catch((error) =>{
            console.error('Error fetching data ',error);
        });

      },

    }
  };
  </script>

  <style scoped>
  .user-details-container {
    display: flex;
    flex-direction: column;
    gap: 2em;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    font-family: Arial, sans-serif;
    height: 75.5vh;
  }

  .user-details {
    display: flex;
    gap: 1em;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
  }

  .user-details p {
    margin: 5px 0;
  }

  .edit-button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .edit-button:hover {
    background-color: #0056b3;
  }
  </style>
