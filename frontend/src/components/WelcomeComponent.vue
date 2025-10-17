<script setup>
</script>

<template>
  <div class="welcome_container">
    <div class="text_container">
      <h1>Welcome to our Page</h1>
      <router-link to="/auth/login" class="link_to_login">Let's login <img src="../assets/hand_right.png" alt="arrow right icon"></router-link>
    </div>
  </div>
</template>


<style>
.welcome_container{
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  max-width: 1000px;
  margin: 0 auto;
}

.text_container{
  display: flex;
  flex-direction: column;
  gap: 15px;
  justify-content: center;
  align-items: center;
}

.text_container h1{
  font-size: 80px;
  font-weight: 700;
}

.link_to_login{
  display: flex;
  align-items: center;
  font-size: 25px;
  color: #0cb937;
  gap: 8px;
  padding: 7px 15px;
  border: 1px solid #d4d1d1;
  border-radius: 10px;
}
</style>
