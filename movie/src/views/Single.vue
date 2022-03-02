<template>
    <div>
        <h1>Single</h1>
        <hr>
        <div class="container">
            <img src="https://picsum.photos/200/300" alt="">

            <h3>{{data.movie.name}}</h3>
            <p>{{data.movie.description}}</p>
            <h5>    <span v-for="cat in data.movie.categories" :key="cat.id">{{cat.name}} | </span></h5>
            <hr>
            <form action="">
               
                <button>Add To fabourite</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { onMounted, reactive } from '@vue/runtime-core'
import { useRoute } from 'vue-router'
    export default {
        
        setup(){
        const data = reactive({
          movie : []
      })
      const route = useRoute()
        let url = 'http://127.0.0.1:8000/api/v1';
        onMounted(() =>{
        axios.get(`${url}/movie/${route.params.id}`).then(res =>{
            console.log(res);
                    data.movie = res.data.data
                }).catch(err => {
                    console.log(err);
                })
            } )
            return{
                url,route,data
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
