<template>
    <div class="container">
        <h1>Summit 2018</h1>
        <br>
        <form class="form-horizontal" @submit.prevent="register">
            <div class="col-xs-6 col-sm-4" style="display: inline-block">
                <h1>基本信息</h1>
                <div class="form-group" :class="{'has-error' : errors.has('first_name') }">
                    <label for="first_name" class=" control-label">名字 *</label>
                    <div class="form-groups">
                        <input v-model="first_name"
                               v-validate data-vv-rules="required|min:1" data-vv-as="名字"
                               id="first_name" placeholder="first name" type="text" class="form-control" name="first_name" required>
                        <span class="help-block" v-show="errors.has('first_name')" style="color: red !important;">{{errors.first('first_name')}}</span>
                    </div>
                </div>
                <div class="form-group" :class="{'has-error' : errors.has('last_name') }">
                    <label for="last_name" class=" control-label">姓氏 *</label>
                    <div class="form-groups">
                        <input v-model="last_name"
                               v-validate data-vv-rules="required|min:1" data-vv-as="姓氏"
                               id="last_name" placeholder="last name" type="text" class="form-control" name="last_name" required>
                        <span class="help-block" v-show="errors.has('last_name')" style="color: red !important;">{{errors.first('last_name')}}</span>
                    </div>
                </div>

                <div class="form-group" :class="{'has-error' : errors.has('mobile') }">
                    <label for="mobile" class=" control-label">电话 *</label>
                    <div class="form-groups">
                        <input v-model="mobile" type="text" name="mobile"
                               v-validate data-vv-rules="required|min:10" data-vv-as="电话"
                               id="mobile" placeholder="mobile" class="form-control" required>
                        <span class="help-block" v-show="errors.has('mobile')" style="color: red !important;">{{errors.first('mobile')}}</span>
                    </div>
                </div>

                <div class="form-group" :class="{'has-error' : errors.has('address') }">
                    <label for="address" class=" control-label">地址 *</label>
                    <div class="form-groups">
                        <input v-model="address"
                               v-validate data-vv-rules="required|min:5" data-vv-as="地址"
                               id="address" placeholder="address" type="text" class="form-control" name="address" required>
                        <span class="help-block" v-show="errors.has('address')" style="color: red !important;">{{errors.first('address')}}</span>
                    </div>
                </div>

                <div class="form-group" :class="{'has-error' : errors.has('email') }">
                    <label for="email" class=" control-label">邮箱 *</label>
                    <div class="form-groups">
                        <input v-model="email"
                               v-validate data-vv-rules="required|email" data-vv-as="邮箱"
                               id="email" placeholder="email" type="email" class="form-control" name="email" required>
                        <span class="help-block" v-show="errors.has('email')" style="color: red !important;">{{errors.first('email')}}</span>
                    </div>
                </div>
                <div class="form-group" :class="{'has-error' : errors.has('email-confirm') }">
                    <label for="email-confirm" class=" control-label">确认邮箱 *</label>
                    <div class="form-groups">
                        <input v-model="email_confirm"
                               id="email-confirm" placeholder="email again" v-validate data-vv-rules="required|email|confirmed:email" data-vv-as="确认邮箱"
                               type="email" class="form-control" name="email-confirm" required>
                        <span class="help-block" v-show="errors.has('email-confirm')" style="color: red !important;">{{errors.first('email-confirm')}}</span>
                    </div>
                </div>

                <div class="form-group" :class="{ 'has-error': errors.has('gender') }">
                    <label class=" control-label">性别 *</label>
                    <div class="form-groups">
                        <label class="control-label" style="margin-right:20px;">
                            <input v-model="gender" v-validate data-vv-rules="required|in:male,female" data--vv-args="gender" data-vv-as="性别"
                                   name="gender" value="male" type="radio">男 <em class="fa fa-male" style="color: cornflowerblue"></em>
                        </label>
                        <label class="control-label">
                            <input v-model="gender" name="gender" value="female" type="radio">
                            女 <em class="fa fa-female" style="color: hotpink"></em>
                        </label>
                        <span class="help-block" v-show="errors.has('gender')" style="color: red !important;">{{ errors.first('gender') }}</span>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-4">
                <h1>支付信息</h1>
                <div>
                    <label class="control-label" style="margin-right:20px;">卡号 *</label>
                    <card-number class='stripe-element card-number'
                                 ref='cardNumber'
                                 :stripe='key'
                                 style="width:100%"
                                 :options='{style}'
                                 @change='number = $event.complete'></card-number>
                    <br>
                    <label class="control-label" style="margin-right: 20px;">有效期 *</label>
                    <card-expiry class='stripe-element card-expiry'
                                 ref='cardExpiry'
                                 :stripe='key'
                                 :options='{style}'
                                 @change='expiry = $event.complete'></card-expiry>
                    <br>
                    <label class="control-label" style="margin-right: 20px;">安全码 *</label>
                    <card-cvc class='stripe-element card-cvc'
                              ref='cardCvc'
                              :stripe='key'
                              :options='{style}'
                              @change='cvc = $event.complete'>
                    </card-cvc>
                </div>
            </div>
            <br>
            <div class="col-xs-6 col-sm-4">
                <button type="submit"  style="width:inherit !important;" class="btn btn-info" @click.prevent="nextStep" :disabled="!complete">
                    Pay A$ 50.00
                </button>
            </div>
            <br>
        </form>

        <loader :show="show" :label="label"></loader>

    </div>
</template>

<script>

    import { CardNumber, CardExpiry, CardCvc, createToken } from 'vue-stripe-elements'
    import Loader from 'vue-full-loading'


    export default {

        data(){
            return {
                first_name: '',
                last_name: '',
                mobile: '',
                address: '',
                gender: '',
                email: '',
                email_confirm: '',
                show: false,
                label: 'Processing, please wait...',
                key: GCC.stripeKey,
                complete: false,
                number: false,
                expiry: false,
                cvc: false,
                style:{
                    base: {
                        color: '#1598af',
                        fontSize: '16px',
                        color: "#32325d",
                        fontSmoothing: 'antialiased',
                        '::placeholder': {
                            color: '#ccc',
                        },
                    },
                    invalid: {
                        color: '#e5424d',
                        ':focus': {
                            color: '#303238',
                        },
                    },
                }
            }
        },

        components: { CardNumber, CardExpiry, CardCvc, Loader },

        watch: {
            number () { this.update() },
            expiry () { this.update() },
            cvc () { this.update() }
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
                            this.pay();
                        }
                    })
                })
            },

            update () {
                this.complete = this.number && this.expiry && this.cvc

                // field completed, find field to focus next
                if (this.number) {
                    if (!this.expiry) {
                        this.$refs.cardExpiry.focus()
                    } else if (!this.cvc) {
                        this.$refs.cardCvc.focus()
                    }
                } else if (this.expiry) {
                    if (!this.cvc) {
                        this.$refs.cardCvc.focus()
                    } else if (!this.number) {
                        this.$refs.cardNumber.focus()
                    }
                }
                // no focus magic for the CVC field as it gets complete with three
                // numbers, but can also have four
            },

            pay () {
                let vm = this;
                createToken().then(data => {
                    console.log(data.token.id);

                    let formData = {
                        email: 'gaohaoqian@gmail.com',
                        stripeToken : data.token.id
                    };

                    vm.show = true;

                    axios.post('/api/form/purchase',formData).then(response => {
                        console.log(response.data.message);
                    }).catch(error => {
                        console.log("errrrrr: ", error);
                    })
                })
            }

//            proceedCheckout() {
//                this.$store.dispatch('checkoutRequest').then(response => { // set hasEmail to true and then next page
//                    this.$router.push({
//                        name: 'summit.checkout',
//                        params: {
//                            'first_name': this.first_name,
//                            'last_name': this.last_name,
//                            'address': this.address,
//                            'mobile': this.mobile,
//                            'gender': this.gender,
//                            'email': this.email
//                        }
//                    })
//                }).catch(error => {
//                    this.$router.push({name: 'summit'});
//                    console.log("....", error);
//                });
//            }

        }
    }
</script>


<style>

    input {
        outline: 0 !important;
        border-width: 0 0 2px 0 !important;
        border-color: darkgray !important;
    }

    input:focus {
        border-color: #1598af !important;
    }

    .stripe-element {
        outline: 0 !important;
        border-bottom: 2px solid !important;
        border-color: darkgray !important;
    }

</style>