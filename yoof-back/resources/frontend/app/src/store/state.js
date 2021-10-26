function getUser() {
    if(localStorage.getItem('user')) {
        return JSON.parse(localStorage.getItem('user'))
    }
    return {}
}

export const state = {
    user: getUser(),
    errors: {},
}
