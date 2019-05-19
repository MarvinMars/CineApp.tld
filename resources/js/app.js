import './bootstrap.js'
// import '../design/js/blk-design-system'
import Vue from 'vue';
import Vuetify from 'vuetify';
import Vuex from 'vuex';

Vue.use(Vuex);
Vue.use(Vuetify, { theme: false });

const store = new Vuex.Store({
    state: {
        drawer: false,
    },
    mutations: {
        switchDrawer (state) {
            state.drawer = !state.drawer;
        }
    }
});

Vue.component('toolbar', {
    methods: {
        switchDrawer() {
            this.$store.commit('switchDrawer');
        }
    }
});

Vue.component('navbar', {
    props:['items'],
    data: () => ({
        drawerStatus: this.drawer,
    }),
    computed: {
        drawer() {
            return this.$store.state.drawer;
        }
    },
    mounted() {
        console.log(this.items);
    }
});


const app = new Vue({
    el: '#app',
    store,
});