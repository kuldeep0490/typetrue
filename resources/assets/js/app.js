import './bootstrap';
import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from 'vue-router';
import router from './router';
import storeFactory from './store.js';
import VueAnalytics from 'vue-analytics';

Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(VueAnalytics, {
    id: 'UA-114824705-1',
    router
});

const store = storeFactory();

import { library } from '@fortawesome/fontawesome-svg-core';
import { faHeart, faStar, faPlusCircle, faMinusCircle } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
library.add(faHeart, faStar, faPlusCircle, faMinusCircle);
Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component('tt-clouds', require('./components/Clouds.vue'));

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
