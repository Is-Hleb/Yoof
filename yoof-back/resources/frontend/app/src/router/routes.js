// import auth from "@/router/middleware/auth";

const routes = [
    {
        path: '/',
        name: 'index',
        component: () => import('../components/IndexPage/Index')
    },
    {
        path: '/cabinet',
        name: 'lc-not-active',
        component: () => import('../components/SellerCabinetNoActive/Index')
    },
]

export default routes
