<template>
    <form>
        <input type="email" v-model="email">
        <input type="password" v-model="password">
        <button v-on:click="formSubmit" type="button">Submit</button>
    </form>
</template>

<script>
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
                console.log(this.$store.state.message)
                console.log(this.email)
                console.log(this.password)
                this.axios.post('api/auth/login').then(r => {
                    console.log(r.data)
                })
            }
        }
    }
</script>
