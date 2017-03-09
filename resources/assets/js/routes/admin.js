import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export default new Router({
    routes: [
        { path: '/',  redirect: '/dashboard' },
        { path: '/dashboard',  component: require('../views/admin/Dashboard.vue') },
        { path: '/page1', name: 'page1', component: require('../views/admin/TestPage1.vue') },
        { path: '/page2', name: 'page2', component: require('../views/admin/TestPage2.vue') }
    ]
});
