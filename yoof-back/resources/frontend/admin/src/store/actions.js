import router from "@/router";

const axios = require('axios')

function sendAuthRequest(state, method, url, data = []) {
    return axios({
        method,
        url,
        data,
        headers: {
            'Authorization': 'Bearer ' + state.user.api_token,
            'Accept': 'application/json'
        },
    })
}

export const actions = {
    loginUser({commit, dispatch}, userData) {
        axios.post('/api/auth/login', userData).then(r => {
            let data = r.data
            if(r.data.code === 'err') {
                commit('SET_MODAL_ERRORS', r.data.data)
                return;
            }
            if(data.user.role !== 'admin') {
                commit('UNSET_USER')
            } else {
                commit('SET_AUTH_USER', data)
                dispatch('loadUsers')
                dispatch('getAllCategories')
            }
        })
    },
    preload({commit}) {
        axios.get('/api/api-token').then(r => {
            let data = r.data
            if (data.code === 'success') {
                commit('SET_AUTH_TOKEN', data.api_token);
                axios.get('/api/user').then(r => {
                    let data = r.data
                    commit('SET_AUTH_USER', data)
                })
            }
        });
    },
    loadUsers({state, commit}) {
        commit("SET_LOADING", true);
        sendAuthRequest(state, 'GET', '/api/admin/users').then(r => {
            let data = r.data;
            commit('SET_LOADING', false);
            commit('SET_ALL_USERS', data)
        }).catch(r => {
            commit('UNSET_USER')
            if(router.currentRoute.name !== 'sign-in') {
                router.push({name: 'sign-in'}).then()
            }
        })
    },
    deleteUser({commit, state}, index) {
        if (state.user.id === index) {
            return;
        }
        sendAuthRequest(state, 'delete', '/api/admin/users/' + index).then(r => {
            if (r.data.code !== 'err') {
                commit('DELETE_USER', index);
            }
        });
    },
    loginOut({commit}) {
        axios.get('/api/logout').then(() => {
            commit("UNSET_USER");
            router.push({name: 'sign-in'}).then()
        })
    },
    sendEmailToUser({commit, state}, data) {
        let id = data.index
        let message = data.message
        commit('SET_LOADING', true)
        sendAuthRequest(state, 'POST', '/api/admin/send-mail-to-user', {message, id}).then(r => {
            if (r.data.code === 'success') {
                commit('SET_LOADING', false)
            } else {
                commit('SET_MODAL_ERRORS', r.data.data)
            }
        });
    },
    changeUserStatus({commit, state}, index) {
        let user = state.allUsers.filter(item => item.id === index)[0]
        sendAuthRequest(state, 'PUT', '/api/admin/users/' + user.id, {status: !user.status}).then(r => {
           commit('EDIT_USER', {key: 'status', value: !user.status, id: user.id});
        })
    },
    getAllCategories({commit, state}) {
        sendAuthRequest(state, 'GET', '/api/category').then(r => {
            let data = r.data;
            commit("SET_ALL_CATEGORIES", data);
        })
    },
    deleteCategoryRow({state, dispatch}, row) {
        sendAuthRequest(state, 'DELETE', '/api/admin/category/' + row.id, {type: row.is}).then(r => {
            if(r.data.code === 'success') {
                dispatch('getAllCategories');
            }
        })
    },
    editCategory({state, dispatch}, category) {
        sendAuthRequest(state, 'PUT', '/api/admin/category/' + category.id, {
            type: category.type,
            data: category.data,
        }).then(r => {
            let data = r.data;
            if(r.data.code === 'success') {
                console.log(r.data);
                dispatch('getAllCategories')
            }
        })
    },
    createSearchArgument({state, dispatch}, argument) {
        sendAuthRequest(state, 'POST', '/api/admin/search-argument', argument).then(r => {
            if(r.data.code === 'success') {
                dispatch('getAllCategories')
            }
        })
    }
 }
