import './bootstrap';
import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from 'vue-router';
import router from './routes';
import storeFactory from './store.js';
import VueAnalytics from 'vue-analytics'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);
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
import ProgressBar from './components/questions/Progress';
import TrueHelp from './components/Help';
library.add(faHeart, faStar, faPlusCircle, faMinusCircle);
Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component('progress-bar', ProgressBar);
Vue.component('true-help', TrueHelp);

const app = new Vue({
    el: '#app',
    router,
    store
});