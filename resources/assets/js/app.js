/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import axios from "axios";

Vue.component('app-list', require('./components/List.vue'));
Vue.component('asserts-list', require('./components/List_assert.vue'));
Vue.component('dschedules-list', require('./components/List_dschedule.vue'));
Vue.component('bucketlists-list', require('./components/List_bucketlist.vue'));

const app = new Vue({
    el: '#app',
});