export const getters = {
    getErrors: state => {
        return state.errors;
    },
    getUser: state => {
        return state.user;
    },
    getAuthStatus: state => {
        return !!state.user.token;
    }
}
