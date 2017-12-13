import Vue from 'vue'
import Vuex from 'vuex'

import EditProfile from './modules/edit-profile'
import EditPassword from './modules/edit-password'
import Notification from './modules/notification'
import Form from './modules/checkout'
import User from './modules/user'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        EditProfile,
        EditPassword,
        Notification,
        Form,
        User
    },
    strict: true
})