import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '../pages/home';
import notFoundView from '../pages/notFound';
import Post from '../pages/post';
import Tag from '../pages/tag'
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
            path: '/tag/:tagName',
            name: 'tag',
            component: Tag
        },
        {
            path: '/archive',
            name: 'archive',
            component: archive
        },
        {
            path : '*',
            component: notFoundView
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