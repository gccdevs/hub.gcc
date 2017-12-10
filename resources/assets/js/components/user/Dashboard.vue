<template>
    <section class="container columns">
        <side-bar class="column is-2"></side-bar>
        <div class="column is-10">
            <br>
            <transition name="fade" mode="out-in">
                <router-view></router-view>
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
        }

    }
</script>