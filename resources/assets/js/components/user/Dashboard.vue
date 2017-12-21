<template>
    <div class="row" style="margin-right:0px !important;">
        <side-bar class="col-md-2" :id="this.id" :role="this.role"></side-bar>
        <div class="col-md-10">
            <div>
                <transition name="fade" mode="out-in">
                    <router-view :id="this.id" :role="this.role"></router-view>
                </transition>
            </div>
            <br><br>
        </div>
    </div>
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