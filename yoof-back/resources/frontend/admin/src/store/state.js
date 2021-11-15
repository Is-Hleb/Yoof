function mathUser() {
    try {
        return JSON.parse(localStorage.getItem('user'));
    } catch (e) {
        return {
            isAuth: false,
            api_token: '',
        }
    }
}

export const state = {
    user: mathUser(),
    allUsers: [],
    loading: false,
    categories: [],
    errors: {},
    successMessages: {},
    articles: [],
    axiosConfig: {
        headers: {
            'Authorization': '',
            'Accept': 'application/json'
        },
    },
}
