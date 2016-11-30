import Vue from 'vue'
import {sync} from 'vuex-router-sync';
import store from './home/vuex';
import router from './home/core/router';

import App from './home/App.vue';
import './home/components'

sync(store, router);

new Vue({
    ...App,
    store,
    router
}).$mount('#app');