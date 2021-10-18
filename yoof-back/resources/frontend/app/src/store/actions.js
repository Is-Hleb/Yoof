const axios = require('axios')

export const actions = {
    registerUser({commit}, userData) {
        axios.post('api/auth/register', userData).then(r => {
            let data = r.data
            if(data.code === 'err') {
                commit('SET_MODAL_ERRORS', data.errors)
            } else {
                commit('SET_AUTH_USER', data)
            }
        })
    },
    loginUser({commit}, userData) {
      axios.post('api/auth/login', userData).then(r => {
          let data = r.data
          commit('SET_AUTH_USER', data)
      })
    },
    preload({commit}) {
        axios.get('api/token').then(r => {
            let data = r.data
            console.log(data)
            if(data.code === 'success') {
                commit('SET_AUTH_TOKEN', data.token);
                axios.get('api/user').then(r => {
                    let data = r.data
                    commit('SET_AUTH_USER', data)
                })
            }
        });
    },
    loginOut({commit}) {
        axios.get('api/logout').then(() => {
            commit("UNSET_USER");
        })
    }
}
