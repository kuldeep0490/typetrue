import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);

new Vue({
  el: '#app',

  data: {
        active: 0,
        currentQ: 1,
        age: null,
        gender: null,
        year: null,
        month: null,
        smoker: null,
        a1c: null,
        height: null,
        weight: null,
        diagnosed: null,
        percentage: 0,
        diagnosedSelect: {
            none: {
                value: 'none',
                label: 'None',
            },
            some: {
                value: 'some',
                label: 'Some',
            }
        },
        genderSelect: {
            male: {
                value: 'male',
                label: 'Male',
            },
            female: {
                value: 'female',
                label: 'Female',
            }
        },
        smokerSelect: {
            smoker: {
                value: 'smoker',
                label: 'Smoker',
            },
            'non-smoker': {
                value: 'non-smoker',
                label: 'Non-smoker',
            }
        }
  },

  methods: {
    nextQ(q) {
        this.currentQ = q;

        this.percentage = (q/8) * 100;
    },

    next(q) {
      if (this.active++ > 2) this.active = 0;
    
      this.nextQ(q);
    }
  }
});