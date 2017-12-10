<template>
    <div class="box">
        <form @submit.prevent="updatePassword" class="box">
            <div class="field" :class="{'has-error' : errors.has('password') }">
                <label for="password" class="label">密码</label>
                <input v-model="password"
                       v-validate data-vv-rules="required|min:6" data-vv-as="密码"
                       id="password" type="password" class="input" name="password" required>
                <span class="help-block" style="color:red" v-show="errors.has('password')">{{errors.first('password')}}</span>
            </div>
            <div class="field" :class="{'has-error' : errors.has('password_confirmation') }">
                <label for="password-confirm" class="label">确认密码</label>
                <input id="password-confirm"
                       v-validate data-vv-rules="required|min:6|confirmed:password" data-vv-as="确认密码"
                       type="password" class="input" name="password_confirmation" required>
                <span class="help-block" style="color:red" v-show="errors.has('password_confirmation')">{{errors.first('password_confirmation')}}</span>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-primary" style="width:100% !important;">
                        更新密码
                    </button>
                </div>
            </div>
        </form>
    </div>
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