function getUser() {
    try {
        return JSON.parse(localStorage.getItem('user'))
    } catch (e) {
        console.log(e.message)
        return {}
    }
}

export const state = {
    user: getUser(),
    errors: {},
    loading: false,
}
