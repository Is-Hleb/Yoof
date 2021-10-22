export default ({next, store}) => {
    if(store.state.user.role === 'user') {
        store.commit('UNSET_USER')
    }

    if(store.state.user.isAuth || store.state.user.api_token) {
        next(false)
    } else {
        next();
    }
}
