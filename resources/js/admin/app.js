import './bootstrap';
import Vue from 'vue';
import vuetify from "./plugins/vuetify";
import router from './router';
import store from './store';
import App from './components/App';

const app = new Vue({
    router,
    vuetify,
    store,
    render: h => h(App)
}).$mount('#app');
