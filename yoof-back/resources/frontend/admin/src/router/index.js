import Vue from 'vue'
import VueRouter from 'vue-router'
import middlewarePipeline from "./middlewarePipeline";
import store from '../store'
import auth from './middleware/auth'
import guest from './middleware/guest'

Vue.use(VueRouter)

let routes = [
	{
		// will match everything
		path: '*',
		component: () => import('../views/404.vue'),
	},
	{
		path: '/',
		name: 'index',
		redirect: () => {
		    if(store.state.user.role === 'admin')
		        return '/dashboard'
            return '/sign-in'
        },
        meta: {
		    middleware: [
                auth
            ]
        }
	},
	{
		path: '/dashboard',
		name: 'Основное',
		layout: "dashboard",
        meta: {
            middleware: [
                auth
            ]
        },
		component: () => import(/* webpackChunkName: "dashboard" */ '../views/Dashboard.vue'),
	},
	{
		path: '/layout',
		name: 'Layout',
		layout: "dashboard",
        meta: {
            middleware: [
                auth
            ]
        },
		component: () => import('../views/Layout.vue'),
	},
	{
		path: '/tables',
		name: 'База данных',
		layout: "dashboard",
        meta: {
            middleware: [
                auth
            ]
        },
		component: () => import('../views/Tables.vue'),
	},
	{
		path: '/billing',
		name: 'Документы от ЮЛ',
		layout: "dashboard",
        meta: {
            middleware: [
                auth
            ]
        },
		component: () => import('../views/Billing.vue'),
	},
	{
		path: '/Profile',
		name: 'Profile',
		layout: "dashboard",
		meta: {
			layoutClass: 'layout-profile',
            middleware: [
                auth
            ]
		},
		component: () => import('../views/Profile.vue'),
	},
	{
		path: '/sign-in',
		name: 'sign-in',
        meta: {
		  middleware: [
		    guest,
          ],
        },
		component: () => import('../views/Sign-In.vue'),
	},

]

// Adding layout property from each route to the meta
// object so it can be accessed later.
function addLayoutToRoute( route, parentLayout = "default" )
{
	route.meta = route.meta || {} ;
	route.meta.layout = route.layout || parentLayout ;

	if( route.children )
	{
		route.children = route.children.map( ( childRoute ) => addLayoutToRoute( childRoute, route.meta.layout ) ) ;
	}
	return route ;
}

routes = routes.map( ( route ) => addLayoutToRoute( route ) ) ;

const router = new VueRouter({
	mode: 'hash',
	base: '/admin/',
	routes,
	scrollBehavior (to, from, savedPosition) {
		if ( to.hash ) {
			return {
				selector: to.hash,
				behavior: 'smooth',
			}
		}
		return {
			x: 0,
			y: 0,
			behavior: 'smooth',
		}
	},

})

router.beforeEach((to, from, next) => {
    if (!to.meta.middleware) {
        return next()
    }
    const middleware = to.meta.middleware
    const context = {
        to,
        from,
        next,
        store,
        router: this
    }
    return middleware[0]({
        ...context,
        next: middlewarePipeline(context, middleware, 1)
    })
})

export default router;
