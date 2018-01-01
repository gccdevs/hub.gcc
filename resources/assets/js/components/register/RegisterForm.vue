<template>
    <form @submit.prevent="processInvite">

        <div class="form-group" :class="{'has-error' : errors.has('name') }">
            <label for="name">姓名</label>
            <input v-model="name"
                   v-validate="'required|min:2|max:20'" data-vv-as="姓名"
                   id="name" type="text" class="form-control" name="name" required>
            <span class="help-block" v-show="errors.has('name')" style="color: red">{{errors.first('name')}}</span>
        </div>

        <div class="form-group" :class="{'has-error' : errors.has('email') }">
            <label for="email">邮箱</label><br>
            <input v-model="email"
                   v-validate="'required|alpha_dash|max:20|min:2'" data-vv-as="邮箱" style="width:30%;display: inline-block"
                   id="email" type="text" name="email" class="form-control" required>
            <h2 class="is-size-4" style="display:inline">@glorycitychurch.com</h2><br>
            <span class="help-block" v-show="errors.has('email')" style="color: red">{{errors.first('email')}}</span>
        </div>

        <div class="form-group">
            <label for="roles">身份</label>
            <select v-model="roles" class="form-control" id="roles" style="width:100%;" v-validate data-vv-rules="required">
                <option disabled value="">Please select one</option>
                <option v-show="role === 1">Admin</option>
                <option>User</option>
            </select>
            <span class="help-block" v-show="errors.has('roles')" style="color: red">{{errors.first('roles')}}</span>
        </div>

        <br>

        <div class="form-group">
            <div class="form-group">
                <button type="submit" class="btn btn-outline-info" style="width:100% ;" :disabled="this.roles == ''">
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

        props:['user_id','role'],

        methods:{

            processInvite() {

                console.log(this.id);

                if (this.validatesInputLength){
                    this.invite();
                }
            },


            validatesInputLength(){
                return this.name.length <= 20 && this.email.length <= 20 && this.roles && this.email.length > 2 && this.name.length > 0;
            },

            invite() {

                let vm = this;

                let formData = {
                    name: vm.name,
                    email: vm.email + '@glorycitychurch.com',
                    invitedId: this.user_id,
                    password: Math.random().toString(16),
                    role: vm.roles
                };

                axios.post('/api/user/send-invitation', formData).then(response => {

                    console.log(response.data.message);

                    if (response.data.message === 'sent'){

                        vm.$store.dispatch('inviteUserRequest').then(response => {
                            vm.$router.push({name: 'user.create.success', params:{
                                name: vm.name,
                                email: vm.email + '@glorycitychurch.com',
                                role: vm.roles
                            }});
                        });

                    }else if(response.data.message === 'Email format is wrong or has already been invited'){
                        alert('This email has been taken. Please use another email.');
                    }else {
                        console.log(response.data);
                    }

                }).catch(error => {
                    console.log(error);
                });


            }
        }
    }
</script>