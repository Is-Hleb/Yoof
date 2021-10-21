const routes = [
    {
        path: '',
        name: 'index',
        component: () => import('../components/Templates/Index')
    },
    {
        path: '/cabinet',
        name: 'buyer-cabinet',
        component: () => import('../components/BuyerCabinet/Index')
    },
    {
        path: '/cabinet2',
        name: 'seller-cabinet-no-active',
        component: () => import('../components/SellerCabinetNoActive/Index')
    },


]

export default routes
