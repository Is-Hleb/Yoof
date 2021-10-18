import auth from "@/router/middleware/auth";

const routes = [
    {
        path: '/',
        name: 'index',
        component: () => import('../components/IndexPage/Index')
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('../components/Auth/Login'),
    },
    {
        path: '/register',
        name: 'register',
        component: () => import('../components/Auth/Register')
    },
    {
        path: '/cabinet',
        name: 'cabinet',
        meta: {
            middleware: [
                auth,
            ]
        },
        component: () => import('../components/BuyerCabinet/Index')

    },
]

export default routes
