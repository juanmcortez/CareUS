require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

import router from './Router/index';
import careus from '../CareUS/SPA/CareUS';

Vue.use(VueRouter);

Vue.config.productionTip = false;

const CareUS = new Vue({
    el: '#CareUS',
    router,
    components: { careus }
});
