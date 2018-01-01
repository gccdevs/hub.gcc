<template>
    <div class="container">
        <div class="card border-info">
            <div class="card-header bg-transparent border-info">
                <router-link v-show="this.role == 1" :to="{name: 'user.list'}" class="btn btn-outline-info" activeClass="active" exact>返回</router-link>
            </div>
            <div class="card">
                <div class="card-body">
                    <register-form :id="this.id" :role="this.role"></register-form>
                </div>
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

        props:['id','role']

    }
</script>