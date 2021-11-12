function mathUser() {
    if(localStorage.getItem('user')) {
        return JSON.parse(localStorage.getItem('user'));
    } else {
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
}
