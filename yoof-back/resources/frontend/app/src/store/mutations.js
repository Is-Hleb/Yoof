export const mutations = {
    SET_AUTH_USER: (state, data) => {
        state.user = data.user;
        localStorage.setItem('user', JSON.stringify(state.user))
    },
    SET_MODAL_ERRORS: (state, errors) => {
        state.errors = errors
    },
    SET_LOADING: (state, value) => {
        state.loading = value;
    }
}
