<template>
    <div style="margin-left:5%;">
        <div class="row">
            <side-bar class="col-md-2" :id="this.id" :role="this.role"></side-bar>
            <div class="col-md-9">
                <br><br>
                <transition name="fade" mode="out-in">
                    <router-view :id="this.id" :role="this.role"></router-view>
                </transition>
                <br><br>
            </div>
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