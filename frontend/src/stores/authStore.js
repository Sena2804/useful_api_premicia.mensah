import { defineStore } from "pinia";
import axios from 'axios';
import router from "@/router";

export const useAuthStore = defineStore('authStore', {
  state: () =>({
    token : ''
  }),

  getters : {
    user : (state) => state.user
  },

  actions : {

    async register(data){
      const url = 'http://127.0.0.1:8000/api/register'

      const response = await axios.post(url, {
        name : data.name,
        email : data.email,
        password : data.password
      });
      return response;
    },

    async login(data){
      const url = 'http://127.0.0.1:8000/api/login'

      const response = await axios.post(url, {
        email : data.email,
        password : data.password
      })
      this.token = response.data.token;

      if(response.status == 200){
        router.push('/');
      }
      return response;
    },
  }
})
