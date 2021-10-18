import auth from "@/router/middleware/auth";

const routes = [
    {
        path: '/',
        name: 'index',
        component: () => import('../components/IndexPage/Index')
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
    {
        path: '/cabinet2',
        component: () => import('../components/SellerCabinetNoActive/Index')
    }
]

export default routes
