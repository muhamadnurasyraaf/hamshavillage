<template>
    <Navbar />
    <div class="content">

        <div class="form">
            <p>Login</p>
            <ul v-if="errors.length">
                <li v-for="(error,index) in errors" :key="index">{{ error }}</li>
            </ul>
            <input type="text" v-model="user.username" class="text" placeholder="Username.." autocomplete="off">
            <input type="password" v-model="user.password" class="pass" placeholder="Password" autocomplete="off">
            <button type="submit" @click="login">Login</button>
        </div>
    </div>
    <Footer />
</template>

<style scoped>

    .content{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 79.8vh;
    }
    .form{
        display: flex;
        flex-direction:column;
        align-items: center;
        gap: 0.5em;
        font-family: 'Montserrat',sans-serif;
        color: whitesmoke;
        padding: 2em 1em;
        box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
        border-radius: 0.2em;
        background-color: #009B77;
    }
    p{
        font-size: 1.5rem;
        text-decoration: overline;
    }
    .form input{
        padding: 1em 2em;
        border-radius: 0.4rem;
        outline: none;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    }
    input::placeholder{
        font-family: 'Poppins',sans-serif;
    }
    button{
        background-color: #43f543;
        border: none;
        padding: 0.5em 1em;
        margin-top:0.3em;
        border-radius: 0.4em;
        color: white;
        font-weight: bold;
        cursor: pointer;
    }
    @media  screen and (max-width:480px) {
        .content{
            max-height: 63.1vh;
        }
    }
</style>

<script>
    import Navbar from '../Navbar.vue';
    import Footer from '../Footer.vue';
    export default{
        components:{
            Navbar,
            Footer,
        },
        data() {
            return {
                user:{
                    username: '',
                    password: '',
                },
                errors: [],
            }
        },
        methods:{
            login(){
                if(this.user.username !== '' && this.user.password !== ''){
                    axios.post('api/user/login', this.user)
                    .then((response) =>{
                        if(response.data.message == 'Success'){
                           this.$router.push('/admin/dashboard')
                        }
                    })
                    .catch((error) =>{
                        if(error.response && error.response.status === 422){
                            this.errors = Object.values(error.response.data.errors)
                        }else{
                            console.error('Login failed',error);
                        }
                    })
                }else{
                    console.log('Username and passsword are required');
                }
            },
        }
    }
</script>
