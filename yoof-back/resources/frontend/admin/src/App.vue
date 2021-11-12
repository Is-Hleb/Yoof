<!--
	This is the main page of the application, the layout component is used here,
	and the router-view is passed to it.
	Layout component is dynamically declared based on the layout for each route,
	specified in routes list router/index.js .
 -->

<template>
    <div id="app">
        <a-spin :spinning="loading" size="large">
            <component :is="layout">
                <router-view/>
            </component>
        </a-spin>
    </div>
</template>

<script>
const axios = require('axios')
export default ({
    computed: {
        loading() {
            return this.$store.getters.loading
        },
        // Sets components name based on current route's specified layout, defaults to
        // <layout-default></layout-default> component.
        layout() {
            return "layout-" + (this.$route.meta.layout || "default").toLowerCase();
        }
    },
    beforeCreate() {
        this.$store.dispatch('preload')
        this.$store.dispatch('loadUsers')
        this.$store.dispatch('getAllCategories')
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

})

</script>

<style lang="scss">
</style>
