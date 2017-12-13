<template>
    <div class="container">
        <aside class="menu">
            <p class="menu-label" style="margin-left:10px;">General</p>
            <ul class="menu-list">
                <li>
                    <router-link :to="{ name: 'booking' }" v-bind:class="classObject">
                        <span class="icon"><i class="fa fa-clipboard"></i></span> Booking
                    </router-link>
                </li>
                <!--<li>-->
                <!--<router-link :to="{ name: 'calendar' }" v-bind:class="classObject">-->
                <!--<span class="icon"><i class="fa fa-calendar-o"></i></span> Calendar-->
                <!--</router-link>-->
                <!--</li>-->
                <!--<li>-->
                <!--<router-link :to="{ name: 'message' }" v-bind:class="classObject">-->
                <!--<span class="icon"><i class="fa fa-comment"></i></span> Message-->
                <!--</router-link>-->
                <!--</li>-->
                <li>
                    <router-link :to="{ name: 'form.show' }" v-bind:class="classObject">
                        <span class="icon"><i class="fa fa-table"></i></span> Tables
                    </router-link>
                </li>
                <!--<li>-->
                <!--<router-link :to="{ name: 'user.list' }" v-bind:class="classObject">-->
                <!--<span class="icon"><i class="fa fa-home"></i></span> User List-->
                <!--</router-link>-->
                <!--<ul>-->
                <!--<li>-->
                <!--<router-link :to="{name: 'user.create'}">-->
                <!--<span class="icon is-small"><i class="fa fa-plus"></i></span> Invite Users-->
                <!--</router-link>-->
                <!--</li>-->
                <!--</ul>-->
                <!--</li>-->
                <li>
                    <router-link :to="{ name:'profile' }" v-bind:class="classObject">
                        <span class="icon"><i class="fa fa-user-md"></i></span> Profile
                    </router-link>

                    <ul>
                        <li>
                            <router-link :to="{name: 'profile.edit'}">
                                <span class="icon is-small"><i class="fa fa-info"></i></span> Update profile
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'password.edit' }">
                                <span class="icon is-small"><i class="fa fa-key"></i></span> Change Password
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name: 'user.create'}">
                                <span class="icon is-small"><i class="fa fa-plus"></i></span> Invite Users
                            </router-link>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
    </div>
</template>


<script>

    export default{

        data() {
            return{
                isActive: true,
                error: null
            }
        },

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
