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
            <form action="" @submit.prevent="addToFvt">
               <input type="hidden" name="" id="">
                <button>Add To fabourite</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { onMounted, reactive } from '@vue/runtime-core'
import { useRouter,useRoute } from 'vue-router'
    export default {
        
        setup(){
        const data = reactive({
          movie : [],
          movie_id : null
      })
      const route = useRoute()
        let url = 'http://127.0.0.1:8000/api/v1';
        const router = useRouter()
        onMounted(() =>{
        axios.get(`${url}/movie/${route.params.id}`).then(res =>{
            console.log(res);
                    data.movie = res.data.data
                }).catch(err => {
                    console.log(err);
                })
            } )


            const addToFvt = () =>{
                axios.post(`${url}/add-fev`,{'movie_id' : data.movie.id}).then(res => {
                    console.log(res)
                    router.push('/')
                }).catch(err => {
                    console.log(err);
                })
            }
            return{
                url,route,data,addToFvt
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
