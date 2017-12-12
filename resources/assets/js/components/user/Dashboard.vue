<template>
    <section class="container columns">
        <side-bar class="column is-3"></side-bar>
        <div class="column is-9">
            <br>
            <transition name="fade" mode="out-in">
                <router-view :id="this.id"></router-view>
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

        props:['id']

    }
</script>