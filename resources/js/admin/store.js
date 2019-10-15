import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        user: JSON.parse(localStorage.getItem('user')) || null,
        token: localStorage.getItem('token') || null,
        auth_status: null
    },
    getters: {
        IS_AUTHENTICATED: state => !!state.token,
        AUTH_STATUS: state => state.auth_status,
        TOKEN: state => state.token
    },
    mutations: {
        SET_AUTH_STATUS: (state, status) => {
            state.auth_status = status;
        },
        SET_TOKEN: (state, token) => {
            state.token = token;
        },
        SET_USER: (state, user) => {
            state.user = user;
        }
    },
    actions: {
        LOGIN: (context, credentials) => {
            return new Promise((resolve, reject) => {
                axios.post('/user/login', credentials).then(response => {
                    const token = response.data.access_token,
                        user = response.data.user;

                    localStorage.setItem('token', token);
                    localStorage.setItem('user', JSON.stringify(user));

                    context.commit('SET_AUTH_STATUS', 'success');
                    context.commit('SET_TOKEN', token);
                    context.commit('SET_USER', user);

                    resolve(response.data);
                }).catch(error => {
                    localStorage.removeItem('token');
                    localStorage.removeItem('user');

                    context.commit('SET_AUTH_STATUS', 'error');

                    reject(error);
                });
            });
        },
        LOGOUT: context => {
            return new Promise((resolve, reject) => {
                axios.delete('/user/logout').then(() => {
                    localStorage.removeItem('token');
                    localStorage.removeItem('user');

                    context.commit('SET_TOKEN', null);
                    context.commit('SET_USER', null);

                    resolve();
                }).catch(error => {
                    reject(error);
                });
            });
        }
    }
});
