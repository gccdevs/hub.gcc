<template>
    <div class="container">
        <h1>Summit 2018</h1>
        <br>
        <form class="form-horizontal" @submit.prevent="register">
            <div class="form-group" :class="{'has-error' : errors.has('first_name') }">
                <label for="first_name" class="col-md-6 offset-md-2 control-label">名字 *</label>
                <div class="col-md-6 offset-md-2">
                    <input v-model="first_name"
                           v-validate data-vv-rules="required|min:1" data-vv-as="名字"
                           id="first_name" placeholder="first name" type="text" class="form-control" name="first_name" required>
                    <span class="help-block" v-show="errors.has('first_name')" style="color: red !important;">{{errors.first('first_name')}}</span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error' : errors.has('last_name') }">
                <label for="last_name" class="col-md-6 offset-md-2 control-label">姓氏 *</label>
                <div class="col-md-6 offset-md-2">
                    <input v-model="last_name"
                           v-validate data-vv-rules="required|min:1" data-vv-as="姓氏"
                           id="last_name" placeholder="last name" type="text" class="form-control" name="last_name" required>
                    <span class="help-block" v-show="errors.has('last_name')" style="color: red !important;">{{errors.first('last_name')}}</span>
                </div>
            </div>

            <div class="form-group" :class="{'has-error' : errors.has('mobile') }">
                <label for="mobile" class="col-md-6 offset-md-2 control-label">电话 *</label>
                <div class="col-md-6 offset-md-2">
                    <input v-model="mobile" type="text" name="mobile"
                           v-validate data-vv-rules="required|min:10" data-vv-as="电话"
                           id="mobile" placeholder="mobile" class="form-control" required>
                    <span class="help-block" v-show="errors.has('mobile')" style="color: red !important;">{{errors.first('mobile')}}</span>
                </div>
            </div>

            <div class="form-group" :class="{'has-error' : errors.has('address') }">
                <label for="address" class="col-md-6 offset-md-2 control-label">地址 *</label>
                <div class="col-md-6 offset-md-2">
                    <input v-model="address"
                           v-validate data-vv-rules="required|min:5" data-vv-as="地址"
                           id="address" placeholder="address" type="text" class="form-control" name="address" required>
                    <span class="help-block" v-show="errors.has('address')" style="color: red !important;">{{errors.first('address')}}</span>
                </div>
            </div>

            <div class="form-group" :class="{'has-error' : errors.has('email') }">
                <label for="email" class="col-md-6 offset-md-2 control-label">邮箱 *</label>
                <div class="col-md-6 offset-md-2">
                    <input v-model="email"
                           v-validate data-vv-rules="required|email" data-vv-as="邮箱"
                           id="email" placeholder="email" type="email" class="form-control" name="email" required>
                    <span class="help-block" v-show="errors.has('email')" style="color: red !important;">{{errors.first('email')}}</span>
                </div>
            </div>
            <div class="form-group" :class="{'has-error' : errors.has('email-confirm') }">
                <label for="email-confirm" class="col-md-6 offset-md-2 control-label">确认邮箱 *</label>
                <div class="col-md-6 offset-md-2">
                    <input v-model="email_confirm"
                           id="email-confirm" placeholder="email again" v-validate data-vv-rules="required|email|confirmed:email" data-vv-as="确认邮箱"
                           type="email" class="form-control" name="email-confirm" required>
                    <span class="help-block" v-show="errors.has('email-confirm')" style="color: red !important;">{{errors.first('email-confirm')}}</span>
                </div>
            </div>

            <div class="form-group" :class="{ 'has-error': errors.has('gender') }">
                <label class="col-md-6 offset-md-2 control-label">性别 *</label>
                <div class="col-md-6 offset-md-2">
                    <label class=" control-label">
                        <input v-model="gender" v-validate data-vv-rules="required|in:male,female" data--vv-args="gender" data-vv-as="性别"
                               name="gender" value="male" type="radio">男 <em class="fa fa-male" style="color: cornflowerblue"></em>
                    </label>
                    <label class="col-sm-2 control-label">
                        <input v-model="gender" name="gender" value="female" type="radio">
                        女 <em class="fa fa-female" style="color: hotpink"></em>
                    </label>
                    <span class="help-block" v-show="errors.has('gender')" style="color: red !important;">{{ errors.first('gender') }}</span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-outline-info" @click.prevent="nextStep">
                        下一步
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                first_name: '',
                last_name: '',
                mobile: '',
                address: '',
                gender: '',
                email: '',
                email_confirm: ''
            }
        },
        methods:{

            nextStep() {

                this.$validator.validateAll().then(result => {

                    let formData = {
                        email : this.email
                    };

                    axios.post('/api/form/validate', formData).then(response => {
                        console.log('alert: ', response.data.status);
                        if (response.data.status){
                            alert("This email has been taken. Please use another email.");
                            this.$router.push({name: 'summit'});
                        }else {
                            if (result) {
                                this.proceedCheckout();
                            }
                        }
                    })
                })
            },

            proceedCheckout(){
                this.$store.dispatch('checkoutRequest').then(response => { // set hasEmail to true and then next page
                    this.$router.push({
                        name:'summit.checkout',
                        params:{
                            'first_name': this.first_name,
                            'last_name': this.last_name,
                            'address': this.address,
                            'mobile': this.mobile,
                            'gender': this.gender,
                            'email': this.email
                        }
                    })
                }).catch(error => {
                    this.$router.push({name: 'summit'});
                    console.log("....",error);
                });
            }
        }
    }
</script>