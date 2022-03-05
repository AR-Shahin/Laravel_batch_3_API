<template>
    <div>
        <h1>Dashboard</h1>
        <!-- {{ data.user  }} -->
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td>{{data.user.name}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{data.user.email}}</td>
            </tr>
        </table>
        <hr>
        <h5>Favourites Movies</h5>
        <hr>
        <p v-for="movie in data.fevs" :key="movie.id" class="lead ">
            {{ movie.movie.name }}
        </p>
    </div>
</template>

<script>
import { onMounted, reactive } from '@vue/runtime-core';
import axios from "axios"
    export default {
        setup(){
            let url = 'http://127.0.0.1:8000/api/v1';
            let token = localStorage.getItem('authToken')
            const data = reactive({
                'user' : {},
                'fevs' : []
            })
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

            onMounted(() => {
                axios.post(`${url}/customer/me`)
                .then(res=> {
                    data.user = res.data
                }).catch(err => {
                    console.log(err);
                })

                // Fetch Fabourites Movies
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

                axios.post(`${url}/fev-movies`)
                .then(res=> {
                    data.fevs = res.data.data
                }).catch(err => {
                    console.log(err);
                })
            })


            return{
                url,data
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
