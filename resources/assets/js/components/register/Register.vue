<template>
    <div class="container">
        <router-link :to="{name: 'profile'}" class="btn btn-outline-info" activeClass="active" exact>返回</router-link>
        <br><br>
        <div class="box">
            <register-form></register-form>
        </div>
    </div>
</template>

<script>

    import RegisterForm from './RegisterForm'

    export default {
        components: {
            RegisterForm
        }
    }
</script>