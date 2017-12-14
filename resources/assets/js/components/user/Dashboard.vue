<template>
    <section class="container columns">
        <side-bar class="column is-3" :id="this.id" :role="this.role" style="margin-left:2%"></side-bar>
        <div class="column is-9">
            <br>
            <transition name="fade" mode="out-in">
                <router-view :id="this.id" :role="this.role"></router-view>
            </transition>
        </div>
    </section>
</template>

<script>

    import SideBar from './../sideBar'

    export default{
        name: 'dashboard-wrapper',

        components: {
            SideBar
        },

        props:['id','role']

    }
</script>