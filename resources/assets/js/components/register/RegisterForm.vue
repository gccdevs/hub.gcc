<template>
    <form class="form" @submit.prevent="invite">
        <div class="field" :class="{'has-error' : errors.has('name') }">
            <label for="name" class="label">姓名</label>
            <div class="control">
                <input v-model="name"
                       v-validate data-vv-rules="required|min:4" data-vv-as="姓名"
                       id="name" type="text" class="input" name="name" required>
                <span class="help-block" v-show="errors.has('name')" style="color: red">{{errors.first('name')}}</span>
            </div>
        </div>
        <div class="field" :class="{'has-error' : errors.has('email') }">
            <label for="email" class="label">邮箱</label>
            <div class="control">
                <input v-model="email"
                       v-validate data-vv-rules="required|email" data-vv-as="邮箱"
                       id="email" type="email" class="input" name="email" required>
                <span class="help-block" v-show="errors.has('email')" style="color: red">{{errors.first('email')}}</span>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-primary" style="width:100% ;">
                    邀请
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
                roles: ''
            }
        },

        props: ['id'],

        methods:{
            invite() {

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