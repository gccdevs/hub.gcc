<template>
    <div>
        <transition name="fade" mode="out-in">
            <router-view :id=" this.id " :role="this.role"></router-view>
        </transition>
    </div>
</template>

<script>
    export default {

        props:['id','role']

    }
</script>
