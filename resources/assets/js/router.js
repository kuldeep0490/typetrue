import VueRouter from 'vue-router';
import Home from './components/Home';
import GetStarted from './components/forms/GetStarted';
import OneLastThing from './components/forms/OneLastThing';
import EnterYourInfo from './components/forms/EnterYourInfo';
import SelectProduct from './components/forms/SelectProduct';
import Sorry from './components/Sorry';
import ThankYou from './components/ThankYou';

const routes = [
    { path: '/', component: Home },
    { path: '/sorry', component: Sorry },
    { path: '/get-started', component: GetStarted },
    { path: '/one-last-thing', component: OneLastThing },
    { path: '/enter-your-info', component: EnterYourInfo },
    { path: '/select-product', component: SelectProduct },
    { path: '/thank-you', component: ThankYou },
];

const router = new VueRouter({
    routes
});

export default router;