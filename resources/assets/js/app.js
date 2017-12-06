require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import router from './routes';
import store from './store/index';
import App from './components/App.vue';
import zh_CN from 'vee-validate/dist/locale/zh_CN';
import VeeValidate, {Validator} from 'vee-validate';

axios.interceptors.request.use(function (config) {
    config.headers['X-CSRF-TOKEN'] = GCC.csrfToken;
    return config;
});

Validator.localize('zh_CN', zh_CN);

Vue.use(VueRouter);

Vue.use(VeeValidate, {
    locale: 'zh_CN'
});

Vue.component('app', App);
new Vue({
    el: '#app',
    router,
    store
});