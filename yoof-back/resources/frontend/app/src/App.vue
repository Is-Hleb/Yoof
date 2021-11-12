<template>
    <a-spin :spinning="loading" size="large">
        <div id="app">
            <router-view/>
        </div>
    </a-spin>
</template>

<script>
const axios = require('axios')

export default {
    computed:{
        loading() {
            return this.$store.getters.loading;
        }
    },
    created() {
        axios.interceptors.request.use((config) => {
            // trigger 'loading=true' event here
            this.$store.commit('SET_LOADING', true)
            return config;
        }, (error) => {
            // trigger 'loading=false' event here
            this.$store.commit('SET_LOADING', false)
            return Promise.reject(error);
        });

        axios.interceptors.response.use((response) => {
            // trigger 'loading=false' event here
            this.$store.commit('SET_LOADING', false)
            return response;
        }, (error) => {
            // trigger 'loading=false' event here
            this.$store.commit('SET_LOADING', false)
            return Promise.reject(error);
        });
    }
}
</script>

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
