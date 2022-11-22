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
Vue.component('product-edit', require('./components/products/ProductEdit').default);
Vue.component('stock-manage', require('./components/stocks/StockManage').default);
Vue.component('return-product', require('./components/return_products/ReturnProduct').default);

import store from './store';
//initialize vue
const app = new Vue({
    el: '#app',
    store
});