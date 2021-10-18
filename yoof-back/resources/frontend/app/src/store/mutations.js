export const mutations = {
    SET_AUTH_USER: (state, data) => {
        state.user = data.user
        state.user.isAuth = true
        state.user.data = data.data

        localStorage.setItem('isAuth', 'true')
        localStorage.setItem('token', data.token)
    },
    SET_MODAL_ERRORS: (state, data) => {
        state.errors = data.errors
    },
    SET_AUTH_TOKEN: (state, token) => {
        state.user.token = token
        state.user.isAuth = true

        localStorage.setItem('token', token)
    },
    UNSET_USER: (state) => {
        state.user = {
            isAuth: false,
            token: ''
        }

        localStorage.setItem('isAuth', 'false')
        localStorage.setItem('token', '')
    }

}
