<template>
  <div class="home">
    <div class="container">
        <h3 class="text-center">Movies</h3>
        <div class="row">
            <div class="col-md-3 mb-3" v-for="movie in data.movies" :key="movie.id">
                <div class="card">
                    <div class="card-body">
                        <img :src="`http://127.0.0.1:8000/${movie.image}`" alt="" class="img-fluid">
                        <h3><router-link :to="`/single/${movie.id}`">{{movie.name}}</router-link></h3>
                        <h4>
                            <span v-for="cat in movie.categories" :key="cat.id">{{cat.name}} | </span>
                        </h4>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
  </div>
</template>

<script>
import { onMounted, reactive } from '@vue/runtime-core'
// @ is an alias to /src
import axios from 'axios';

export default {
  name: 'Home',

  setup(){

      const data = reactive({
          movies : []
      })
      let url = 'http://127.0.0.1:8000/api/v1';

      onMounted(()=>{
          axios.get(`${url}/movie`).then(res =>{
              data.movies = res.data.data
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
