const axios = require('axios')

export default function auth({next, store}) {
    if (store.state.user.role === 'admin') {
        next()
    } else {
        next(false)
    }
}
