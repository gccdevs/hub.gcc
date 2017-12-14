<template>
    <div>
        <router-link :to="{name: 'profile'}" class="btn btn-outline-info" activeClass="active" exact>返回</router-link>
        <br><br>
        <div class="card card-default">
            <div class="card-body">
                <register-form :id="this.id"></register-form>
            </div>
        </div>
    </div>
</template>

<script>

    import RegisterForm from './RegisterForm'

    export default {

        components: {
            RegisterForm
        },

        props:['id']

    }
</script>