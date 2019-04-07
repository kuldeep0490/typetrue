import VueRouter from 'vue-router';
import Home from './components/Home';
import GetStarted from './components/forms/GetStarted';
import OneLastThing from './components/forms/OneLastThing';
import EnterYourInfo from './components/forms/EnterYourInfo';
import Sorry from './components/Sorry';

const routes = [
    { path: '/', component: Home },
    { path: '/sorry', component: Sorry },
    { path: '/get-started', component: GetStarted },
    { path: '/one-last-thing', component: OneLastThing },
    { path: '/enter-your-info', component: EnterYourInfo }
];

const router = new VueRouter({
    routes
});

export default router;