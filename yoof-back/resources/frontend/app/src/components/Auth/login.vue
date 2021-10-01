<template>
    <form>
        <input type="email" v-model="email">
        <input type="password" v-model="password">
        <button v-on:click="formSubmit" type="button">Submit</button>
    </form>
</template>

<script>
   const axios = require('axios')
    module.exports = {
        name: "login",
        data(){
            return {
                email: "",
                password: "",
            }
        },
        methods: {
            formSubmit() {
                console.log(this.email)
                console.log(this.password)
                axios.post('api/auth/login').then(r => {
                    console.log(r.data)
                })
            }
        }
    }
</script>
