import { defineStore } from "pinia";
import axios from 'axios';
import router from "@/router";

export const useAuthStore = defineStore('authStore', {
  state: () =>({
    token : '',
    user : []
  }),

  getters : {
    user : (state) => state.user
  },

  actions : {
    async getToken() {

    },

    async register(data){
      const url = 'http://127.0.0.1:8000/api/register'

      const response = await axios.post(url, {
        name : data.name,
        email : data.email,
        password : data.password
      });
      return response;
    }
  }
})
