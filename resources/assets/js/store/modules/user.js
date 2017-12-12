import * as types from './../mutation-type'

export default{

    state: {
        invited: false
    },

    mutations:{
        [types.SET_INVITATION](state) {
            state.invited = true
        },
    },

    actions: {
        inviteUserRequest({commit}) {
            commit({
                type: types.SET_INVITATION
            })
        },
    }
}