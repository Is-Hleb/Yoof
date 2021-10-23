import Vue from 'vue'
import Vuex from 'vuex'
const axios = require('axios');

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
      user: {
          isAuth: false,
          token: ''
      }
  },
  mutations: {
      SET_AUTH_TOKEN: (state, token) => {
          state.user.token = token;
          state.user.isAuth = true;
      },
  },
  actions: {
      getToken({commit}) {
          axios.get('api/token').then(r => {
              let data = r.data;
              console.log(data);
          })
      },
      loginUser({}, user) {
          axios.post('/api/admin/auth', {
              email: user.email,
              password: user.password
          })
              .then( r => {
                  console.log(r.data);
              })
      }
  },
  modules: {
  }
})
