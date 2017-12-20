<template>
    <nav class="sidebar">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <router-link :to="{ name:'profile' }" class="menu-text nav-link" tag="a">
                    <span class="icon"><i class="fa fa-user-md"></i></span> Profile
                </router-link>
            </li>
            <li class="nav-item">

                <ul class="menu-text nav nav-pills flex-column">
                    <router-link :to="{name: 'profile.edit'}" class="menu-text nav-link ml-3 my-1">
                        <span class="icon is-small"><i class="fa fa-info"></i></span> Update profile
                    </router-link>

                    <router-link :to="{ name: 'password.edit' }" class="menu-text nav-link ml-3 my-1">
                        <span class="icon is-small"><i class="fa fa-key"></i></span> Change Password
                    </router-link>
                </ul>
            </li>
        </ul>

        <hr>

        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <router-link :to="{ name: 'booking' }" class="menu-text nav-link" tag="a">
                    <span class="icon"><i class="fa fa-clipboard"></i></span> Booking
                </router-link>
            </li>
        </ul>

        <hr>

        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <router-link :to="{ name: 'message' }" class="menu-text nav-link" tag="a">
                    <span class="icon"><i class="fa fa-comment"></i></span> Message
                </router-link>
            </li>
        </ul>

        <hr>

        <ul class="nav nav-pills flex-column">
            <li>
                <router-link :to="{ name: 'form.show' }" v-show="this.role === 1 || this.role === 2" class="menu-text nav-link" tag="a">
                    <span class="icon"><i class="fa fa-table"></i></span> Tables
                </router-link>
            </li>
        </ul>

        <hr v-show="this.role === 1 || this.role === 2">

        <ul class="menu-text nav nav-pills flex-column">
            <li>
                <router-link :to="{ name: 'user.list' }" v-show="this.role === 1 || this.role === 2" class="menu-text nav-link" tag="a">
                    <span class="icon"><i class="fa fa-home"></i></span> User List
                </router-link>

            </li>
            <li class="nav-item" v-show="this.role === 1 || this.role === 2">

                <ul class="menu-text nav nav-pills flex-column">
                    <router-link :to="{name: 'user.create'}" class="menu-text nav-link ml-3 my-1">
                        <span class="icon is-small"><i class="fa fa-plus"></i></span> Invite Users
                    </router-link>
                </ul>
            </li>
        </ul>

        <hr v-show="this.role === 1 || this.role === 2">

        <a href="/logout" class="menu-text nav-link">
            <span class="icon is-small"><i class="fa fa-sign-out"></i></span> Log out
        </a>
        <hr>
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