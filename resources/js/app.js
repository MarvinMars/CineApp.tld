
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vuetify from 'vuetify';
import VueRouter from 'vue-router';


window.Vue = require('vue');

Vue.use(VueRouter);
Vue.use(Vuetify);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('app', require('./components/dashboard/app.vue'));
Vue.component('menu-navbar', require('./components/dashboard/menu-navbar.vue'));
Vue.component('feed', require('./components/dashboard/content/feed.vue'));
Vue.component('film-card', require('./components/dashboard/content/film/film-card.vue'));
const Dashboard = { template: '<app></app>' };

const routes = [
    { path: '/', component: Dashboard },
];
const router = new VueRouter({
    routes // short for `routes: routes`
});

const app = new Vue({
    el: '#app',
    router,
}).$mount('#app');