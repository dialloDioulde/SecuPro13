/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('add-employee', require('./components/AddEmployeeComponent.vue').default);
Vue.component('edit-employee', require('./components/EditEmployeeComponent.vue').default);
Vue.component('show-employee', require('./components/EmployeesComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));


// Routage
import Home from './components/HomeComponent.vue';
import Employees from './components/EmployeesComponent';

const routes = [
    {
        path: '/home',
        component: Home,
        name:'home',
    },
    {
        path: '/employees',
        component: Employees,
        name:'employees',
    },
];

const router = new VueRouter({routes});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: router,
});
