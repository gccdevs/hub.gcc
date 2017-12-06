<template>
    <div class="col-md-9">
        <router-link :to="{name: 'profile'}" class="btn btn-outline-info" activeClass="active" exact>返回</router-link>
        <br><br>
        <div class="card card-default">
            <div class="card-body">
                <edit-profile-form></edit-profile-form>
            </div>
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