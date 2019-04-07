import Vuex from 'vuex';

import typetrue from './store/index.js';

const createStore = () => {
    return new Vuex.Store({
        modules: {
            typetrue
        }
    })
};

export default createStore;