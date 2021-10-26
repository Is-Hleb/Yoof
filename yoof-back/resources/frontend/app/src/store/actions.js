const axios = require('axios')

// function sendAuthRequest(state, method, url, data = []) {
//     return axios({
//         method,
//         url,
//         data,
//         headers: {
//             'Authorization': 'Bearer ' + state.user.api_token,
//             'Accept' : 'application/json'
//         },
//     })
// }

export const actions = {
    async getState({commit, getters}) {
        let r = await axios.get('api/state');
        let data = r.data;
        if(!getters.getAuthStatus)
            commit('SET_AUTH_USER', data.user);
    },
    async signIn({commit}, userData) {
        let r = await axios.post('api/auth/login', userData)
        let data = r.data
        if (data.code === 'success') {
            commit('SET_AUTH_USER', data)
            commit('SET_MODAL_ERRORS', {})
        } else {
            commit('SET_MODAL_ERRORS', data.errors)
        }
    },
    async signUp({commit}, userData) {
        let r = await axios.post('api/auth/register', userData)
        let data = r.data;
        if (data.code === 'success') {
            commit('SET_AUTH_USER', data)
            commit('SET_MODAL_ERRORS', {})
        } else {
            commit('SET_MODAL_ERRORS', data.errors)
        }
    },
    signOut({commit}) {
        axios.get('api/logout').then(() => {
            commit("SET_AUTH_USER", {})
        })
    }
}
