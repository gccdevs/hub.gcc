<template>
    <form class="form-horizontal" @submit.prevent="register">
        <div class="form-group" :class="{'has-error' : errors.has('name') }">
            <label for="name" class="col-md-6 control-label">姓名</label>
            <div class="col-md-12">
                <input v-model="name"
                       v-validate data-vv-rules="required|min:4" data-vv-as="姓名"
                       id="name" type="text" class="form-control" name="name" required>
                <span class="help-block" v-show="errors.has('name')" style="color: red">{{errors.first('name')}}</span>
            </div>
        </div>
        <div class="form-group" :class="{'has-error' : errors.has('email') }">
            <label for="email" class="col-md-6 control-label">邮箱</label>
            <div class="col-md-12">
                <input v-model="email"
                       v-validate data-vv-rules="required|email" data-vv-as="邮箱"
                       id="email" type="email" class="form-control" name="email" required>
                <span class="help-block" v-show="errors.has('email')" style="color: red">{{errors.first('email')}}</span>
            </div>
        </div>
        <div class="form-group" :class="{'has-error' : errors.has('password') }">
            <label for="password" class="col-md-6 control-label">密码</label>
            <div class="col-md-12">
                <input v-model="password"
                       v-validate data-vv-rules="required|min:6" data-vv-as="密码"
                       id="password" type="password" class="form-control" name="password" required>
                <span class="help-block" v-show="errors.has('password')" style="color: red">{{errors.first('password')}}</span>
            </div>
        </div>
        <div class="form-group" :class="{'has-error' : errors.has('password_confirmation') }">
            <label for="password-confirm" class="col-md-6 control-label">确认密码</label>
            <div class="col-md-12">
                <input id="password-confirm"
                       v-validate data-vv-rules="required|min:6|confirmed:password" data-vv-as="确认密码"
                       type="password" class="form-control" name="password_confirmation" required>
                <span class="help-block" v-show="errors.has('password_confirmation')" style="color: red">{{errors.first('password_confirmation')}}</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12 offset-md-5">
                <button type="submit" class="btn btn-outline-secondary">
                    创建
                </button>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                name : '',
                email : '',
                roles: '',
                password : ''
            }
        },

        props: ['id'],

        methods:{
            register() {

                let formData = {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    roles: this.roles,
                    invitedBy: this.id
                };

                return axios.post('/api/register/validate', formData).then(response => {
                   if (response.data.message !== 'taken'){
                       axios.post('/api/register', formData).then(response => {
                           console.log("register response: ", response.message);
                           this.$router.push({name: 'confirm'})
                       }).catch(error => {
                           console.log('register error');
                       })
                   }else{
                       alert('This email has been taken. Please use another email.');
                       this.$router.push({name: 'register'})
                   }
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
</script>