// import auth from "@/router/middleware/auth";

const routes = [
    {
        path: '/',
        name: 'index',
        component: () => import('../components/IndexPage/Index')
    },
    {
        path: '/cabinet',
        name: 'lk',
        component: () => {
            /** todo Выбирать кабинет в зависимости от пользователя */
            return import('../components/SellerCabinetNoActive/Index')
        }
    },
]

export default routes
