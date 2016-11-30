import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '../pages/home';
import Post from '../pages/post';
import Archives from '../pages/archives';

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
            path: '/archives',
            name: 'archives',
            component: Archives
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