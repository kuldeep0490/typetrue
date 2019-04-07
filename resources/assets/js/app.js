import './bootstrap';
import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from 'vue-router';
import router from './router';
import storeFactory from './store.js';

Vue.use(Vuex);
Vue.use(VueRouter);

const store = storeFactory();

import { library } from '@fortawesome/fontawesome-svg-core';
import { faHeart, faStar, faPlusCircle, faMinusCircle } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
library.add(faHeart, faStar, faPlusCircle, faMinusCircle);
Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.component('tt-clouds', require('./components/Clouds.vue'));

// Vue.component('tt-forms', require('./components/Forms.vue'));

// Vue.component('tt-decline-one', require('./components/DeclineOne.vue'));

// Vue.component('tt-decline-two', require('./components/DeclineTwo.vue'));

// Vue.component('tt-decline-three', require('./components/DeclineThree.vue'));

// Vue.component('tt-lead-form', require('./components/LeadForm.vue'));

// Vue.component('tt-product-form', require('./components/ProductForm.vue'));

// Vue.component('tt-thank-you', require('./components/ThankYou.vue'));

const app = new Vue({
    el: '#app',
    router,
    store,
    mounted() {
        setTimeout(function () {
            let animations = $('.animated');

            $.each(animations, function () {
                $(this).attr('class', 'animated');
            });
        }, 10000);
    }
});
