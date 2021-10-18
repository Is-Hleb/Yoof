import Vue from 'vue'
import App from './App.vue'
import axios from 'axios'
import VueAxios from "vue-axios";
import router from './router'
import store from './store'


import './components/IndexPage/assets/main.css';

Vue.use(VueAxios, axios);
Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
