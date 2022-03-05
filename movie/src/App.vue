<template>
  <div id="nav">
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link> | 
    <router-link to="/login">Login</router-link> | 
    <router-link to="/register">Register</router-link> | 
    <router-link to="/dashboard">Dashboard</router-link> | 
    <router-link to="/single">Single</router-link> | 
    <!-- {{ checkIfAuth() }} -->
    <button @click="handle" v-if="checkIfAuth()">Logout</button>
  </div>
  <router-view/>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>
<script>
   import axios from 'axios';
import { reactive } from '@vue/reactivity';
import { useRouter } from 'vue-router';

    export default {
        setup(){
            const user = reactive({
                email : '',
                password: ''
            })
            let token = localStorage.getItem('authToken')
            let url = 'http://127.0.0.1:8000/api/v1';
         axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            const router = useRouter();
            const handle = () => {
                axios.post(`${url}/customer/logout`,user).then(res => {
                    console.log(res)
                    localStorage.setItem('authToken', '')
                    router.push('/login')
                }).catch(err => {
                    console.log(err)
                })
            }

            const checkIfAuth = () => {
                return localStorage.getItem('authToken')
            }
            return{
            handle,user,url,checkIfAuth
            }
        }
    }
</script>
