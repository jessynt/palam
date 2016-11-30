import Vue from 'vue';
import Vuex from 'vuex';
import modules from './module';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {},
    modules,
    strict: true
})

export default store;