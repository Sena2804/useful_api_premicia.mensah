<script setup>
import { useAuthStore } from '@/stores/authStore';
import { ref } from 'vue';


const email = ref('');
const password = ref('');
const error = ref('');

const authStore = useAuthStore();

const currentUser = ref({
  email : email.value,
  password : password.value
})

const loginUser = async() => {
  if(email.value.trim() == '' || password.value.trim() == ''){
    return error.value = 'Tous les champs sont requis';
  }
}
</script>

<template>
 <div class="container">
    <div class="container_contents">
      <div class="contents_top">
        <img src="../assets/Images/image_login.png" alt="image for login">
        <h2 class="form_title">Welcome Back</h2>
      </div>
      <div class="form_container">
        <div class="error" v-if="error">{{ error }}</div>
        <form @submit.prevent="loginUser" class="form">
          <div class="form_items">
            <label for="email">Your Email</label>
            <input type="email" name="email" v-model="email">
          </div>
          <div class="form_items">
            <label for="password">Your Password</label>
            <input type="password" name="password" v-model="password">
          </div>

          <div class="button_container"><button type="submit">Login</button></div>

          <router-link to="/register" class="register_redirection">Don't have an account ?</router-link>
        </form>
     </div>
    </div>
  </div>
</template>

<style scoped>
.container{
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  max-width: 1300px;
  margin: 0 auto;
}

.container_contents{
  width: 100%;
}

.contents_top{
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
}

.contents_top img{
  width: 80px;
}

.contents_top h2{
  font-size: 40px;
  font-weight: 700;
}

.form_container{
  max-width: 50%;
  margin: 0 auto;
  padding: 80px;
  border: 1px solid #eee;
  box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
}

.form{
  display: flex;
  flex-direction: column;
  gap: 40px;
  font-size: 17px;
}

.error{
  color: red;
  font-size: 16px;
}

.form_items{
  display: flex;
  flex-direction: column;
  gap: 7px;
}

.button_container{
  display: flex;
  justify-content: center;
}

.button_container button{
  padding: 10px 25px;
  font-size: 17px;
  letter-spacing: 1px;
  border: 1px solid #eee;
  background-color: #461ae6;
  color: #fff;
  border-radius: 8px;
  cursor: pointer;
}

.button_container button:hover{
  background-color: #2802b4;
}

.register_redirection{
  color: #000;
}
</style>
