import Home from "./components/Home";
import Rooms from "./components/Rooms";
import Login from "./components/Login";
import VueRouter from "vue-router";
import Vue from 'vue';
import store from './store';

Vue.use(VueRouter);

let router = new VueRouter({
    mode: 'history',
    base: '/admin-panel/',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/rooms',
            name: 'rooms',
            component: Rooms
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                withoutAuth: true
            }
        }
    ]
});

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('token');

    if (to.matched.some(record => record.meta.withoutAuth)) {
        if(token) {
            next(from);
        }
        next();
    } else {
        if(!token) {
            next({ name: 'login' });
        } else {
            next();
        }
    }
});

export default router;
