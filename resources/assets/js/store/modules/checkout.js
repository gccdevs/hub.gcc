import * as types from './../mutation-type'

export default{

    state: {
        paid: false
    },

    mutations:{
        [types.SET_PAYMENT](state) {
            state.paid = true
        },
    },

    actions:{
        paymentRequest({commit}){
            commit({
                type: types.SET_PAYMENT
            })
        },
    }
}