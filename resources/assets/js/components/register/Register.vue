<template>
    <div class="container">
        <h1>创建用户</h1>
        <div class="row">
            <div class="col-md-8 offset-md-1">
                <register-form></register-form>
            </div>
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