import Vue from "vue";

require('./bootstrap');
import { extend } from 'vee-validate';
import {required, email, numeric} from 'vee-validate/dist/rules';

// Add the required rule
extend('required', {
    ...required,
    message: 'Dieses Feld ist pflicht'
});

// Add the email rule
extend('email', {
    ...email,
    message: 'Dieses Feld soll eine valide email Addresse sein'
});

// Add the numeric rule
extend('numeric', {
    ...numeric,
    message: 'Dieses Feld soll numeric sein'
});

window.Vue = require('vue').default;

Vue.component('input-component', require('./components/InputComponent.vue').default);
Vue.component('input-height-component', require('./components/InputHeightComponent.vue').default);
Vue.component('input-pay-component', require('./components/InputPayComponent.vue').default);

const app = new Vue({
    el: '#app',
});
