import './bootstrap';

import Alpine from 'alpinejs';
//import vue
import Vue from 'vue';

window.Alpine = Alpine;

Alpine.start();

// window.Vue = require("vue");
//register component
Vue.component('example-component', require('./components/ExampleComponents').default);
Vue.component('product-add', require('./components/products/ProductAdd').default);

import store from './store';
//initialize vue
const app = new Vue({
    el: '#app',
    store
});