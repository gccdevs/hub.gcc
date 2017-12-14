<template>
    <form class="form" @submit.prevent="processInvite">
        <div class="field" :class="{'has-error' : errors.has('name') }">
            <label for="name" class="label">姓名</label>
            <div class="control">
                <input v-model="name"
                       v-validate="'required|min:2|max:20'" data-vv-as="姓名"
                       id="name" type="text" class="input" name="name" required>
                <span class="help-block" v-show="errors.has('name')" style="color: red">{{errors.first('name')}}</span>
            </div>
        </div>
        <div class="field" :class="{'has-error' : errors.has('email') }">
            <label for="email" class="label">邮箱</label>
            <div class="control">
                <input v-model="email"
                       v-validate="'required|alpha_dash|max:20|min:2'" data-vv-as="邮箱" style="width:30%;"
                       id="email" type="text" name="email" class="input" required>
                <p class="is-size-4" style="display:inline">@glorycitychurch.com</p><br>
                <span class="help-block" v-show="errors.has('email')" style="color: red">{{errors.first('email')}}</span>
            </div>
        </div>

        <div class="field">
            <label for="role" class="label">身份</label>
            <div class="select is-rounded" style="width:100%;">
                <select v-model="role" id="role" style="width:100%;" v-validate data-vv-rules="required">
                    <option disabled value="">Please select one</option>
                    <option>Admin</option>
                    <option>User</option>
                </select>
            </div>
            <span class="help-block" v-show="errors.has('role')" style="color: red">{{errors.first('role')}}</span>
        </div>

        <br>

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
                role: ''
            }
        },

        props:['id'],

        methods:{

            processInvite() {

//                console.log(this.id);

                if (this.validatesInputLength){
                    this.invite();
                }
            },


            validatesInputLength(){
                return this.name.length <= 20 && this.email.length <= 20 && this.role && this.email.length > 2 && this.name.length > 0;
            },

            invite() {

                let vm = this;

                let formData = {
                    name: vm.name,
                    email: vm.email + '@glorycitychurch.com',
                    invitedId: vm.id,
                    password: Math.random().toString(16),
                    role: vm.role
                };

                axios.post('/api/user/send-invitation', formData).then(response => {

                    console.log(response.data.message);

                    if (response.data.message === 'sent'){

                        vm.$store.dispatch('inviteUserRequest').then(response => {
                            vm.$router.push({name: 'user.create.success', params:{
                                name: vm.name,
                                email: vm.email + '@glorycitychurch.com',
                                role: vm.role
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