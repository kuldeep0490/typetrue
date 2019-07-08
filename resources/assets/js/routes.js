import VueRouter from 'vue-router';
import Gender from './components/questions/Gender';
import Age from './components/questions/Age';
import Diagnosed from './components/questions/Diagnosed';
import Smoker from './components/questions/Smoker';
import A1c from './components/questions/A1c';
import Height from './components/questions/Height';
import Weight from './components/questions/Weight';
import Conditions from './components/questions/Conditions';
import Info from './components/questions/Info';
import Products from './components/questions/Products';
import Sorry from './components/questions/Sorry';
import Thanks from './components/questions/Thanks';

const routes = [
    { path: '/', component: Gender, name: 'home' },
    { path: '/what-is-your-gender', component: Gender, name: 'gender' },
    { path: '/how-old-are-you', component: Age, name: 'age' },
    { path: '/when-were-you-diagnosed', component: Diagnosed, name: 'diagnosed' },
    { path: '/are-you-a-smoker', component: Smoker, name: 'smoker' },
    { path: '/your-current-a1c', component: A1c, name: 'a1c' },
    { path: '/how-tall-are-you', component: Height, name: 'height' },
    { path: '/how-much-do-you-weigh', component: Weight, name: 'weight' },
    { path: '/any-conditions', component: Conditions, name: 'conditions' },
    { path: '/enter-your-info', component: Info, name: 'info' },
    { path: '/select-product', component: Products, name: 'products' },
    { path: '/so-sorry', component: Sorry, name: 'sorry' },
    { path: '/thanks', component: Thanks, name: 'thanks' },
];

const router = new VueRouter({
    routes
});

export default router;