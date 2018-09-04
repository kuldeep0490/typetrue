
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('tt-clouds', require('./components/Clouds.vue'));

Vue.component('tt-forms', require('./components/Forms.vue'));

Vue.component('tt-decline-one', require('./components/DeclineOne.vue'));

Vue.component('tt-decline-two', require('./components/DeclineTwo.vue'));

Vue.component('tt-decline-three', require('./components/DeclineThree.vue'));

Vue.component('tt-product-form', require('./components/ProductForm.vue'));

const app = new Vue({
    el: '#app',

    mounted() {
        setTimeout(function () {
            let animations = $('.animated');

            $.each(animations, function () {
                $(this).attr('class', 'animated');
            });
        }, 10000);
    }
});
