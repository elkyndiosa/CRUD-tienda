import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
export default new Router({
	routes: [
		{
			path: '/tienda-prueba/public/',
			name: 'home',
			component: require('./views/home').default
		}
	],
	mode: 'history'
})
