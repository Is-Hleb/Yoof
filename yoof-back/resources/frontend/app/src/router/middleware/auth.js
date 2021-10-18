const axios = require('axios')

export default function auth ({next, store}){

    if(!store.state.user.isAuth) {
        next('/')
    }

    axios.get('/api/is-auth', {
       headers: {
           Authorization: 'Bearer ' + store.state.user.token
       }
    }).then(r => {
        let data = r.data;
        console.log(this)
        if(data.code === 'success') {
            next()
        } else {
            next('/')
        }
    }).catch(e => {
        console.log(e.message)
        next('/')
    });
}
