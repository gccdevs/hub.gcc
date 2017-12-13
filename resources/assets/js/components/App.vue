<template>
    <div>
        <transition name="fade" mode="out-in">
            <router-view :id=" this.id "></router-view>
        </transition>
    </div>
</template>

<script>
    export default {

        props:['id']

    }
</script>
