
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vuetify from 'vuetify';
import Vuex from 'vuex';

window.Vue = require('vue');

Vue.use(Vuetify);
Vue.use(Vuex);

import router from './routes/router'

const store = new Vuex.Store({
    state: {
        user: null
    },
    mutations: {
        login (state,data) {
            var vm = this;
            axios.post('/api/users/auth',data)
            .then(function (res) {
                console.log(res.data);
                vm.user = res.data.user;
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        logout (state) {
            state.count++
        },
        check (state) {
            if(state.user === null){
                return false
            }else{
                return true
            }
        }
    },

});

const app = new Vue({
    el: '#app',
    router,
    store,
}).$mount('#app');