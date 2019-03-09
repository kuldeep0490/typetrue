import VueRouter from 'vue-router';
import Home from './components/Home';
import GetStarted from './components/forms/GetStarted';

const routes = [
    { path: '/', component: Home },
    { path: '/get-started', component: GetStarted }
];

const router = new VueRouter({
    routes
});

export default router;