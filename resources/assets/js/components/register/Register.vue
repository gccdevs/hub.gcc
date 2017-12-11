<template>
    <div class="container">
        <h1 class="is-size-1">Invite New Users</h1>
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