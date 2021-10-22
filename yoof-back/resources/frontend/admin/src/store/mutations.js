import router from "@/router";

export const mutations = {
    SET_AUTH_USER: (state, data) => {
        let secondAttempt = false;
        if(state.user.role === 'admin') {
            secondAttempt = true;
        }

        state.user = data.user
        state.user.isAuth = true
        state.user.data = data.data

        if(!secondAttempt) {
            router.push({name: 'index'}).then();
        }

        localStorage.setItem('user', JSON.stringify(state.user));
        localStorage.setItem('role', 'admin')
        localStorage.setItem('isAuth', 'true')
        localStorage.setItem('api_token', data.api_token)
    },
    SET_MODAL_ERRORS: (state, data) => {
        state.errors = data.errors
    },
    SET_AUTH_TOKEN: (state, token) => {
        state.user.api_token = token
        state.user.isAuth = true

        localStorage.setItem('api_token', token)
    },
    UNSET_USER: (state) => {
        state.user = {
            isAuth: false,
            api_token: ''
        }

        localStorage.setItem('user', '')
        localStorage.setItem('role', '')
        localStorage.setItem('isAuth', 'false')
        localStorage.setItem('api_token', '')
    },
    SET_ALL_USERS: (state, users) => {
        state.allUsers = users;
    },
    DELETE_USER: (state, id) => {
        state.allUsers = state.allUsers.filter(item => item.id !== id)
    },
    SET_LOADING: (state, value) => {
        state.loading = value;
    },
    EDIT_USER: (state, {key, value, id}) => {
        state.allUsers = state.allUsers.map(item => {
            let ret = item
            if (item.id === id) {
                ret[key] = value;
            }
            return ret;
        });
    },
    SET_ALL_CATEGORIES: (state, data) => {
        state.categories = data;
    },

}
