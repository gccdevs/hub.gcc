<template>
    <form @submit.prevent="updatePassword">
        <div class="form-group" :class="{'has-error' : errors.has('password') }">
            <label for="password">密碼</label>
            <input class="form-control" v-model="password"
                   v-validate data-vv-rules="required|min:6" data-vv-as="密碼"
                   id="password" type="password" name="password" required>
            <span class="help-block" style="color:red" v-show="errors.has('password')">{{errors.first('password')}}</span>
        </div>
        <div class="form-group" :class="{'has-error' : errors.has('password_confirmation') }">
            <label for="password-confirm">確認密碼</label>
            <input class="form-control" id="password-confirm"
                   v-validate data-vv-rules="required|min:6|confirmed:password" data-vv-as="確認密碼"
                   type="password" name="password_confirmation" required>
            <span class="help-block" style="color:red" v-show="errors.has('password_confirmation')">{{errors.first('password_confirmation')}}</span>
        </div>
        <div class="form-group">
            <div class="control">
                <button type="submit" class="btn btn-outline-info" style="width:100% !important;">
                    更新密碼
                </button>
            </div>
        </div>
    </form>
</template>

<script>

    export default {
        data() {
            return {
                password : '',
                password_confirmation: ''
            }
        },
        methods:{
            updatePassword() {
                this.$validator.validateAll().then(result => {
                    if (result) {
                        let formData = {
                            password: this.password
                        }
                        this.$store.dispatch('updatePasswordRequest', formData).then(response => {
                            this.$router.push({name: 'profile'})
                            console.log('Success!');
                        }).catch(error => {
                            //
                        })
                    }
                    //
                })
            }
        }
    }
</script>
