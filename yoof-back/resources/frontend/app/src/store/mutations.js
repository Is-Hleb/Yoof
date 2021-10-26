export const mutations = {
    SET_AUTH_USER: (state, data) => {
        state.user = data;
        localStorage.setItem('user', JSON.stringify(state.user))
    },
    SET_MODAL_ERRORS: (state, errors) => {
        state.errors = errors
    }
}
