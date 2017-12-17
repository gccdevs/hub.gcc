<template>
    <div class="card border-info">
        <div class="card-header bg-transparent border-info">
            <router-link :to="{name: 'profile'}" class="btn btn-outline-info" activeClass="active" exact>返回</router-link>
        </div>
        <div class="card-body">
            <edit-profile-form></edit-profile-form>
        </div>
    </div>
</template>

<script>
    import EditProfileForm from './EditProfileForm.vue'

    export default {
        name: 'edit-profile',
        components: {
            EditProfileForm
        }
    }
</script>