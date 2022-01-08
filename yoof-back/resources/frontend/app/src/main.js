import Vue from 'vue'
import App from './App.vue'
import axios from 'axios'
import VueAxios from "vue-axios";
import router from './router'
import store from './store'
import Antd from 'ant-design-vue';


import './baseAssets/main.css';

Vue.use(Antd);
Vue.use(VueAxios, axios);
Vue.config.devtools = true;


new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
