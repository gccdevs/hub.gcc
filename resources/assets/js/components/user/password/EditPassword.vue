<template>
    <div class="col-md-9">
        <router-link :to="{name: 'profile'}" class="btn btn-outline-info" activeClass="active" exact>返回</router-link>
        <br><br>
        <div class="card card-default">
            <div class="card-body">
                <edit-password-form></edit-password-form>
            </div>
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