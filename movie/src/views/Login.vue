<template>
    <div>
        <h3 class="text-center">Login</h3>
        <hr>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form action="" @submit.prevent="handle">
                        <input type="email" class="form-control" placeholder="Email" v-model="user.email"> <br>
                        <input type="password" class="form-control" placeholder="Password" v-model="user.password"> <br>
                        <button class="btn btn-sm btn-success">Login</button>
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
                email : '',
                password: ''
            })
            let url = 'http://127.0.0.1:8000/api/v1';
            const router = useRouter();
            const handle = () => {
                axios.post(`${url}/customer/login`,user).then(res => {
                    console.log(res)
                    localStorage.setItem('authToken', res.data.access_token)
                    router.push('/dashboard')
                }).catch(err => {
                    console.log(err)
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
