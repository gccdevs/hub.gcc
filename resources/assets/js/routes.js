
import VueRouter from 'vue-router';
import Store from './store/index'

let routes = [
    {
        path:'/',
        name:'home',
        component:require('./components/home/Home'),
        meta:{title: 'Central Hub - Glory City Church of Melbourne'}
    },
    {
        path:'/registration',
        component:require('./components/registrations/Index'),
        children:[
            {
                path:'/registration/cell-group',
                name:'rego.registrations',
                component:require('./components/registrations/CellGroup'),
                meta:{title:'Cell Group Registration - Glory City Church of Melbourne'}
            },
            {
                path:'/registration/baptism',
                name:'rego.baptism',
                component:require('./components/registrations/Baptism'),
                meta:{title:'Baptism Registration - Glory City Church of Melbourne'}
            },
        ],
        meta:{title:'Registration - Glory City Church of Melbourne'}
    },
    {
        path:'/summit-2018',
        component:require('./components/summit/Home'),
        children:[
            {
                path:'/',
                component:require('./components/summit/Landing'),
                meta: {title:'Summit 2018 - GCC'}
            },
            {
                path: '/summit-2018/signup',
                name:'summit.signup',
                component: require('./components/summit/Form'),
                meta: {title: 'Summit 2018 Registration - GCC'}
            },
            {
                path: '/summit-2018/terms-and-conditions',
                name:'summit.terms',
                component: require('./components/summit/Terms'),
                meta: {title: 'Terms and Conditions - Summit 2018'}
            },
            {
                path: '/summit-2018/success',
                name:'summit.success',
                props: true,
                component: require('./components/summit/Success'),
                meta: { requiresPaid:true, title:'Payment Success - Summit 2018' }
            },
        ],
        meta: {title:'Summit 2018 - GCC'}
    },
    {
        path: '/dashboard',
        component: require('./components/user/Dashboard'),
        children: [
            {
                path: '',
                name: 'profile',
                component: require('./components/user/Profile'),
                meta: {title:'Dashboard - Central Hub GCC'}
            },
            {
                path: '/form',
                name: 'form.show',
                component: require('./components/summit/Show'),
                meta: {title:'Forms - Central Hub GCC'}
            },
            {
                path: '/booking',
                name: 'booking',
                component: require('./components/bookings/Booking'),
                meta: {title: 'Booking System - Central Hub GCC'}
            },
            {
                path: '/calendar',
                name: 'calendar',
                component: require('./components/calendar/Calendar'),
                meta: {title: 'Calendar - Central Hub GCC'}
            },
            {
                path: '/user/list',
                name: 'user.list',
                component: require('./components/register/UserList'),
                meta: {title: 'User List - Central Hub GCC'}
            },
            {
                path: '/user/invite',
                name: 'user.create',
                component: require('./components/register/Register'),
                meta: {title: 'Invite New Users - Central Hub GCC'},
            },
            {
                path: '/user/invite/success',
                name: 'user.create.success',
                props:true,
                component: require('./components/register/InviteSuccess.vue'),
                meta: { requiresInvite: true, title: 'Invitation Sent - Central Hub GCC' }
            },
            {
                path: '/message',
                name: 'message',
                component: require('./components/message/Message'),
                meta: {title: 'Message System - Central Hub GCC'}
            },
            {
                path: '/dashboard/profile-edit',
                name: 'profile.edit',
                component: require('./components/user/EditProfile'),
                meta: {title:'Change Profile - Central Hub GCC'}
            },
            {
                path: '/dashboard/password-edit',
                name: 'password.edit',
                component: require('./components/user/password/EditPassword'),
                meta: {title:'Change Password - Central Hub GCC'}
            },
        ],
        meta: {title:'Dashboard - Central Hub GCC'}
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {

    if (to.meta.title) {
        document.title = to.meta.title;
    }

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