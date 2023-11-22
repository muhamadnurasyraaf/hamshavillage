<template>
      <nav>
    <div class="left">
      Hamsha Village
    </div>
    <div class="links">
        <router-link class="nav-link" to="/">Home</router-link>
        <router-link class="nav-link" to="/rooms">Rooms</router-link>
        <router-link class="nav-link" to="/booking">Booking</router-link>
        <router-link class="nav-link" to="/terms">Terms & Condition</router-link>
    </div>
    <div>
      <button id="btn">Contact Us</button>
    </div>
   </nav>
</template>

<style scoped>
    nav{
  display: flex;
  justify-content: space-between;
  padding: 2em 1em;
  background-color: #197419;
  align-items: center;
}
.left{
  font-family: 'Montserrat Alternates',sans-serif;
  font-weight: 700;
  text-decoration: overline;
  color: whitesmoke;
}
.links{
  display: flex;
  justify-content: center;
  gap: 1em;
  align-items: center;
}
li{
  list-style-type: none;
}
.nav-link{
  color: whitesmoke;
  text-decoration: none;
  transition: all 0.4s ease-in-out;
}
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
.links .nav-link:hover{
  color: #acaaaa;
}
button:hover{
  background-color: #828382;
  color: #f7f7f7;
}
@media screen and (max-width: 768px) {
  nav {
    flex-direction: column;
    align-items: flex-start;
    padding: 1em;
  }
  .left {
    margin-bottom: 1em;
  }
  .links {
    flex-direction: column;
    align-items: flex-start;
  }
  .links li {
    margin-bottom: 0.5em;
  }
}
</style>
