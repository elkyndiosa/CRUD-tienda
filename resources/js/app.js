require('./bootstrap');

window.Vue = require('vue');
Vue.component('app', require('./components/appComponent.vue').default);
import router from './routes.js'

const app = new Vue({
    el: '#app',
    router
});
