export const getters = {
    getErrors: state => state.errors,
    getUser: state => state.user,
    getAuthStatus: state => { return !!state.user.token },
    loading: state => state.loading,
}
