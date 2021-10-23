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
    signUp({commit}, data) {
        axios.post('api/auth/register', data).then(r => {
            let data = r.data;
            if(data.code === 'success') {
                commit('SET_AUTH_USER', data)
            } else {
                commit('SET_MODAL_ERRORS', data.в)
            }
        });
    },
}
