<template>
    <div>
        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>
        <home-footer id="channels" style="background-color:#D9DFE5;padding-bottom: 0px;padding-top:0px;"></home-footer>
    </div>
</template>

<script>
    import HomeFooter from './../home/Footer'
    export default {
        components:{
            HomeFooter
        }
    }
</script>