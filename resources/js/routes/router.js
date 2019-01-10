import Vue from 'vue'
import Router from 'vue-router'

import App from '../components/index'
import ClientApp from '../components/client/index'
import AdminApp from '../components/admin/index'

import Films from '../components/client/films/films'
import Film from '../components/client/films/film'

import Users from '../components/admin/users/index'
import User from '../components/admin/users/index'
import UserEdit from '../components/admin/users/edit'
import UserDelete from '../components/admin/users/delete'


Vue.component('app', App);
Vue.component('app-client', ClientApp);
Vue.component('admin-app', AdminApp);

Vue.component('films', Films);
Vue.component('film', Film);

Vue.component('users', Users);
Vue.component('userEdit', UserEdit);
Vue.component('userDelete', UserDelete);

Vue.use(Router)

export default new Router({
    routes: [
        {
            name: 'main',
            path: '/',
            component: App,
            redirect: '/client',
            children: [
                {
                    name: 'client',
                    path: '/client',
                    component: ClientApp,
                    children: [
                        {
                            name: 'films',
                            path: '/',
                            component: Films
                        },
                        {
                            name: 'film',
                            path: '/film/:FilmId',
                            component: Film
                        },
                    ]
                },
                {
                    name: 'admin',
                    path: 'admin',
                    component: AdminApp,
                    children: [
                        {
                            name: 'films',
                            path: 'films',
                            component: Films
                        },
                        {
                            name: 'film',
                            path: 'film/:FilmId',
                            component: Film
                        },
                        {
                            name: 'users',
                            path: 'users',
                            component: Users,
                        },
                        {
                            name: 'user/:userId',
                            path: 'user',
                            component: User,
                            children:[
                                {
                                    name: 'edit',
                                    path: 'edit',
                                    component: UserEdit,
                                },
                                {
                                    name: 'delete',
                                    path: 'delete',
                                    component: UserDelete,
                                },
                            ]
                        },
                    ]
                }
            ]
        },
    ]
})