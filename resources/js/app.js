
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
const App = require('./components/client/index.vue');
const Films = require('./components/client/films/films.vue');
const Film = require('./components/client/films/film.vue');

Vue.component('app', App);
Vue.component('films', Films);
Vue.component('film', Film);

const routes = [
    { path: '/', component: Films },
    {
        name: 'film',
        path: '/film/:FilmId',
        component: Film
    }
];

const router = new VueRouter({routes});

const app = new Vue({
    el: '#app',
    router,
}).$mount('#app');