const routes = [
    {
        path: '/login',
        name: 'login',
        component: () => import('../components/Auth/Login'),
        beforeEnter: (to, from, next) => { // middleware example
            next() // Accept hook function
            // to() ->  The route you are going
            // from() -> Rout, which the makes direction
        }
    },
    {
        path: '/register',
        name: 'register',
        component: () => import('../components/Auth/Register')
    }
]

export default routes
