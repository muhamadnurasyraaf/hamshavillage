<template>
    <Navbar />
    <div class="bank-account">
      <h2>Bank Account Information</h2>
      <form @submit.prevent="submitForm">
        <div v-if="!isEditing" class="readonly-mode">
          <div class="form-group">
            <label>Account Holder Name:</label>
            <input type="text" v-model="bankacc.account_name" readonly>
          </div>
          <div class="form-group">
            <label>Account Number:</label>
            <input type="text" v-model="bankacc.number_account" readonly>
          </div>
          <div class="form-group">
            <label>Bank Name:</label>
            <input type="text" v-model="bankacc.Bank_Name" readonly>
          </div>
          <button @click="toggleEdit">Edit</button>
        </div>
        <div v-else class="editable-mode">
          <div class="form-group">
            <label>Account Holder Name:</label>
            <input type="text" v-model="bankacc.account_name" required>
          </div>
          <div class="form-group">
            <label>Account Number:</label>
            <input type="text" v-model="bankacc.number_account" required>
          </div>
          <div class="form-group">
            <label>Bank Name:</label>
            <input type="text" v-model="bankacc.Bank_Name" required>
          </div>
          <div class="buttons">
            <button type="submit">Submit</button>
            <button @click="toggleEdit">Cancel</button>
          </div>
        </div>
      </form>
    </div>
    <Footer />
  </template>

  <script>
import Navbar from '../Navbar.vue';
import Footer from '../Footer.vue';
  export default {
    data() {
      return {
       bankacc:{},
        isEditing: false
      };
    },
    mounted(){
        axios.get('/api/banks')
        .then((response) =>{
            this.bankacc = response.data;
        })
        .catch((err) =>{
            console.error("Error fetching data " , err);
        })
    },
    methods: {
      toggleEdit() {
        this.isEditing = !this.isEditing;
      },
      submitForm() {
       axios.put('/api/bank/update',this.bankacc)
       .then((response) =>{
            console.log(response.data);
       }).
       catch((err)=>{
        console.error("Error submitting data " , err);
       })
        this.isEditing = false;
      }
    },
    components:{
        Navbar,Footer
    },
  };
  </script>

  <style scoped>
  .bank-account {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    min-height: 76vh;
  }

  h2 {
    text-align: center;
  }

  .form-group {
    margin-bottom: 15px;
  }

  label {
    display: block;
    font-weight: bold;
  }

  input[type="text"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  button:hover {
    background-color: #0056b3;
  }

  .buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 15px;
  }

  @media screen and (max-width: 768px) {
    input[type="text"] {
      width: calc(100% - 22px);
    }
  }
  </style>
