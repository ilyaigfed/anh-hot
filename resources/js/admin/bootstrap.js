import store from './store';
import Vue from 'vue';

window.axios = require('axios');

axios.defaults.baseURL = '/api/';

axios.interceptors.request.use(config => {
    let token = store.getters.TOKEN;

    if(token) config.headers.common['Authorization'] = 'Bearer' + token;

    return config;
});
