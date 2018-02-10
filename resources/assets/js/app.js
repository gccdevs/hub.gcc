require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import router from './routes';
import store from './store/index';
import App from './components/App.vue';
import zh_CN from 'vee-validate/dist/locale/zh_CN';
import VeeValidate, {Validator} from 'vee-validate';
import BootstrapVue from 'bootstrap-vue';
import Vuetify from 'vuetify';
import Quasar from 'quasar-framework';

require('quasar-framework/dist/quasar.mat.css');
require('quasar-extras/roboto-font');

axios.interceptors.request.use(function (config) {
    config.headers['X-CSRF-TOKEN'] = GCC.csrfToken;
    return config;
});

Validator.localize('zh_CN', zh_CN);

Vue.use(Quasar);
Vue.use(VueRouter);
Vue.use(Vuetify);
Vue.use(BootstrapVue);

Vue.use(VeeValidate, {
    locale: 'zh_CN'
});

Vue.component('app', App);

new Vue({
    el: '#app',
    router,
    store
});