<template>
    <div class="card border-info">
        <div class="card-header bg-transparent border-info">
            <router-link :to="{name: 'profile'}" class="btn btn-outline-info" activeClass="active" exact>返回</router-link>
        </div>
        <div class="card-body">
            <edit-password-form></edit-password-form>
        </div>
    </div>
</template>

<script>
    import EditPasswordForm from './EditPasswordForm.vue'

    export default {
        name: 'edit-profile',
        components: {
            EditPasswordForm
        }
    }
</script>