/* Vendor components */
import './bootstrap.js'
// import '../design/js/blk-design-system'
import Vue from 'vue';
import Vuetify from 'vuetify';
Vue.use(Vuetify, { theme: false });

/* Store */
import store from './store'

/* Custom components */
import toolbar from './components/toolbar';
import navbar from './components/navbar';

Vue.component('toolbar', toolbar);
Vue.component('navbar', navbar);


const app = new Vue({
    el: '#app',
    store,
});