export const state = {
    user: {
        isAuth: localStorage.getItem('isAuth') === 'true',
        token: localStorage.getItem('token') || '',
    },
}
