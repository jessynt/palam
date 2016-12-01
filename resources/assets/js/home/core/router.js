import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '../pages/home';
import Post from '../pages/post';
import archive from '../pages/archive';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/post/:postName',
            name: 'post',
            component: Post
        },
        {
            path: '/archive',
            name: 'archive',
            component: archive
        }
    ],
    scrollBehavior (to, from, savedPosition) {
        return {y: 0}
    }
});
router.afterEach(route => {
    console.info(`${new Date()}: ${route.path}`);
});

export default router;