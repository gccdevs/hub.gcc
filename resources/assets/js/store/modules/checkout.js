import * as types from './../mutation-type'

export default{

    state: {
        hasEmail: false,
        paid: false
    },

    mutations:{
        [types.SET_EMAIL](state) {
            state.hasEmail = true
        },

        [types.UNSET_EMAIL](state) {
            state.hasEmail = false
        },

        [types.SET_PAYMENT](state) {
            state.paid = true
        },
    },

    actions:{
        checkoutRequest({commit}){
            commit({
                type: types.SET_EMAIL
            })
        },

        unsetEmailRequest({commit}) {
            commit({
                type: types.UNSET_EMAIL
            })
        },

        paymentRequest({commit}){
            commit({
                type: types.SET_PAYMENT
            })
        },
    }
}