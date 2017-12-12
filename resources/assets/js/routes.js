
import VueRouter from 'vue-router';
import Store from './store/index'

let routes = [
    {
        path: '/summit-2018/signup',
        name:'summit',
        component: require('./components/summit/Form'),
        meta: {}
    },
    {
        path: '/summit-2018/terms-and-conditions',
        name:'summit.terms',
        component: require('./components/summit/Terms'),
        meta: {}
    },
    {
        path: '/summit-2018/success',
        name:'summit.success',
        props: true,
        component: require('./components/summit/Success'),
        meta: { requiresPaid: true }
    },
    {
        path: '/dashboard',
        component: require('./components/user/Dashboard'),
        children: [
            {
                path: '',
                name: 'profile',
                component: require('./components/user/Profile'),
                meta: {}
            },
            {
                path: '/form',
                name: 'form.show',
                component: require('./components/summit/Show'),
                meta: {}
            },
            {
                path: '/booking',
                name: 'booking',
                component: require('./components/bookings/Booking'),
                meta: {}
            },
            {
                path: '/calendar',
                name: 'calendar',
                component: require('./components/calendar/Calendar'),
                meta: {}
            },
            {
                path: '/user/list',
                name: 'user.list',
                component: require('./components/register/UserList'),
                meta: {}
            },
            {
                path: '/user/invite',
                name: 'user.create',
                component: require('./components/register/Register'),
                meta: {},
            },
            {
                path: '/user/invite/success',
                name: 'user.create.success',
                component: require('./components/register/InviteSuccess.vue'),
                meta: { requiresInvite: true }
            },
            {
                path: '/message',
                name: 'message',
                component: require('./components/message/Message'),
                meta: {}
            },
            {
                path: '/dashboard/profile-edit',
                name: 'profile.edit',
                component: require('./components/user/EditProfile'),
                meta: {}
            },
            {
                path: '/dashboard/password-edit',
                name: 'password.edit',
                component: require('./components/user/password/EditPassword'),
                meta: {}
            },
        ],
        meta: {}
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {

    if (to.meta.requiresForm){
        if(Store.state.Form.hasEmail){
            return next();
        } else {
            return next({'name' : 'summit'})
        }
    }

    if (to.meta.requiresPaid){
        if(Store.state.Form.paid){
            return next();
        } else {
            return next({'name' : 'summit'})
        }
    }

    if (to.meta.requiresInvite) {
        if(Store.state.User.invited) {
            return next();
        } else {
            return next({'name' : 'user.create'});
        }
    }

    next()

});

export default router;