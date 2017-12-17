<template>
    <form @submit.prevent="updatePassword">
        <div class="form-group" :class="{'has-error' : errors.has('password') }">
            <label for="password">密码</label>
            <input class="form-control" v-model="password"
                   v-validate data-vv-rules="required|min:6" data-vv-as="密码"
                   id="password" type="password" name="password" required>
            <span class="help-block" style="color:red" v-show="errors.has('password')">{{errors.first('password')}}</span>
        </div>
        <div class="form-group" :class="{'has-error' : errors.has('password_confirmation') }">
            <label for="password-confirm">确认密码</label>
            <input class="form-control" id="password-confirm"
                   v-validate data-vv-rules="required|min:6|confirmed:password" data-vv-as="确认密码"
                   type="password" name="password_confirmation" required>
            <span class="help-block" style="color:red" v-show="errors.has('password_confirmation')">{{errors.first('password_confirmation')}}</span>
        </div>
        <div class="form-group">
            <div class="control">
                <button type="submit" class="btn btn-outline-info" style="width:100% !important;">
                    更新密码
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