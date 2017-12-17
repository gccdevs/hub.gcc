<template>
    <nav class="menu-text navbar navbar-light bg-light">
        <!--<div class="sidebar-header">-->
            <!--<h2>Menu</h2>-->
        <!--</div>-->
        <nav class="menu-text nav nav-pills flex-column">

            <router-link :to="{ name:'profile' }" class="menu-text nav-link" tag="a">
                <span class="icon"><i class="fa fa-user-md"></i></span> Profile
            </router-link>

            <nav class="menu-text nav nav-pills flex-column">
                <router-link :to="{name: 'profile.edit'}" class="menu-text nav-link ml-3 my-1">
                    <span class="icon is-small"><i class="fa fa-info"></i></span> Update profile
                </router-link>

                <router-link :to="{ name: 'password.edit' }" class="menu-text nav-link ml-3 my-1">
                    <span class="icon is-small"><i class="fa fa-key"></i></span> Change Password
                </router-link>
            </nav>

            <router-link :to="{ name: 'booking' }" class="menu-text nav-link">
                <span class="icon"><i class="fa fa-clipboard"></i></span> Booking
            </router-link>

            <router-link :to="{ name: 'message' }" class="menu-text nav-link">
                <span class="icon"><i class="fa fa-comment"></i></span> Message
            </router-link>

            <router-link :to="{ name: 'form.show' }" v-if="this.role === 1 || this.role === 2" class="menu-text nav-link">
                <span class="icon"><i class="fa fa-table"></i></span> Tables
            </router-link>

            <router-link :to="{ name: 'user.list' }" v-if="this.role === 1 || this.role === 2" class="menu-text nav-link">
                <span class="icon"><i class="fa fa-home"></i></span> User List
            </router-link>

            <nav class="menu-text nav nav-pills flex-column" v-if="this.role === 1 || this.role === 2">
                <router-link :to="{name: 'user.create'}" class="menu-text nav-link ml-3 my-1">
                    <span class="icon is-small"><i class="fa fa-plus"></i></span> Invite Users
                </router-link>
            </nav>

            <a href="/logout" class="menu-text nav-link">
                <span class="icon is-small"><i class="fa fa-sign-out"></i></span> Log out
            </a>
        </nav>

    </nav>

</template>

<script>

    export default{

        data() {
            return{
                isActive: true,
                error: null
            }
        },

        props:['role', 'id'],

        computed: {
            classObject: function () {
                return {
                    active: this.isActive && !this.error,
                    'text-danger': this.error && this.error.type === 'fatal'
                }
            }
        }

    }

</script>

<style>
    .menu-text {
        color:#25a2b7 !important;
    }
</style>