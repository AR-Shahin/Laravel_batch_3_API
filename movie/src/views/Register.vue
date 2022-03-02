<template>
    <div>
        <h3 class="text-center">Register</h3>
        <hr>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form action="" @submit.prevent="handle">
                        <input type="name" class="form-control" placeholder="Name" v-model="user.name"> <br>
                        <input type="email" class="form-control" placeholder="Email" v-model="user.email"> <br>
                        <input type="password" class="form-control" placeholder="Password" v-model="user.password"> <br>
                        <button class="btn btn-sm btn-success">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { reactive } from '@vue/reactivity';
import { useRouter } from 'vue-router';

    export default {
        setup(){
            const user = reactive({
                name : '',
                email : '',
                password: ''
            })
            let url = 'http://127.0.0.1:8000/api/v1';
            const router = useRouter();
            const handle = () => {
                axios.post(`${url}/customer/register`,user).then(res => {
                    console.log(res)
                    router.push('/login')
                }).catch(err => {
                    console.og(err)
                })
            }

            return{
            handle,user,url
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
