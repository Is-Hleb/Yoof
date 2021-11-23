function mathUser() {
    let nullUser = {
        isAuth: false,
        api_token: '',
        role: '',
    };
    try {
        let user = JSON.parse(localStorage.getItem('user'));
        if(!user) {
            return nullUser
        }
        return user;
    } catch (e) {
        return nullUser
    }
}

export const state = {
    user: mathUser(),
    errors: {},
    loading: false,
}
