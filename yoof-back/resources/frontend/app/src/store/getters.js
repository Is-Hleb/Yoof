export const getters = {
    getErrors: state => state.errors,
    getUser: state => state.user,
    getAuthStatus: state => {
        return !!state.user.api_token
    },
    loading: state => state.loading,
    axiosHeaders: state => {
        return {
            'Authorization': 'Bearer ' + state.user.api_token,
            'Accept': 'application/json'
        }
    },
}
