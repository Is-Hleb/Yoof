export const mutations = {
    SET_AUTH_USER: (state, data) => {
        state.user = data;
    },
    SET_MODAL_ERRORS: (state, errors) => {
        state.errors = errors
    }
}
