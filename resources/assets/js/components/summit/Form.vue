<template>

    <div class="container">
        <div class="box">
            <p class="is-size-1">Summit 2018</p>
            <div class="box">
                <p class="is-size-3">基本信息</p>

                <hr>

                <div class="columns">
                    <div class="column" :class="{'has-error' : errors.has('name') }">
                        <label class="label" for="name">姓名 *</label>
                        <div>
                            <input style="width:80%" class="is-size-6" v-model="name"
                                   v-validate data-vv-rules="required|min:2" data-vv-as="姓名"
                                   id="name" placeholder="Name" type="text" name="name" required>
                            <br>
                            <span class="help-block" v-show="errors.has('name')" style="color: red !important;">{{errors.first('name')}}</span>
                        </div>
                    </div>
                    <div class="column">
                        <div class="columns">
                            <div class="column"  :class="{ 'has-error': errors.has('gender') }">
                                <label class="label">性别 *</label>
                                <div class="field">
                                    <label style="margin-right:20px;" for="gender">
                                        <input class="is-size-5" v-model="gender" v-validate data-vv-rules="required|in:male,female" data--vv-args="gender" data-vv-as="性别"
                                               name="gender" value="male" id="gender" type="radio"> 男 <em class="fa fa-male" style="color: cornflowerblue"></em>
                                    </label>
                                    <label class="radio" for="gender">
                                        <input class="is-size-5" v-model="gender" name="gender" value="female" type="radio"> 女 <em class="fa fa-female" style="color: hotpink"></em>
                                    </label>
                                    <br>
                                    <span class="help-block" v-show="errors.has('gender')" style="color: red !important;">{{ errors.first('gender') }}</span>
                                </div>
                            </div>
                            <div class="column"  :class="{ 'has-error': errors.has('firstTime') }">
                                <label class="label">第一次参加 *</label>
                                <div class="field">
                                    <label style="margin-right:20px;" for="firstTime">
                                        <input class="is-size-5" v-model="firstTime" v-validate data-vv-rules="required|in:yes,no" data--vv-args="firstTime" data-vv-as="第一次参加"
                                               name="firstTime" value="yes" id="firstTime" type="radio"> 是 <em class="fa fa-check" style="color: cornflowerblue"></em>
                                    </label>
                                    <label class="radio" for="firstTime">
                                        <input class="is-size-5" v-model="firstTime" name="firstTime" value="no" type="radio">
                                        否 <em class="fa fa-times" style="color: hotpink"></em>
                                    </label>
                                    <br>
                                    <span class="help-block" v-show="errors.has('firstTime')" style="color: red !important;">{{ errors.first('firstTime') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column" :class="{'has-error' : errors.has('email') }">
                        <label class="label" for="email">邮箱 *</label>
                        <div class="field">
                            <input style="width:80%" class="is-size-6" v-model="email"
                                   v-validate data-vv-rules="required|email" data-vv-as="邮箱"
                                   id="email" placeholder="email" type="email" name="email" required>
                            <br>
                            <span class="help-block" v-show="errors.has('email')" style="color: red !important;">{{errors.first('email')}}</span>
                        </div>
                    </div>
                    <div class="column" :class="{'has-error' : errors.has('email-confirm') }">
                        <label class="label" for="email-confirm">确认邮箱 *</label>
                        <div class="field">
                            <input style="width:80%" class="is-size-6" v-model="email_confirm"
                                   id="email-confirm" placeholder="email again" v-validate data-vv-rules="required|email|confirmed:email" data-vv-as="确认邮箱"
                                   type="email" name="email-confirm" required>
                            <br>
                            <span class="help-block" v-show="errors.has('email-confirm')" style="color: red !important;">{{errors.first('email-confirm')}}</span>
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column" :class="{'has-error' : errors.has('mobile') }">
                        <label class="label" for="mobile">电话 *</label>
                        <div >
                            <input style="width:80%" class="is-size-6" v-model="mobile" type="text" name="mobile"
                                   v-validate data-vv-rules="required|min:8" data-vv-as="电话"
                                   id="mobile" placeholder="mobile" required>
                            <br>
                            <span class="help-block" v-show="errors.has('mobile')" style="color: red !important;">{{errors.first('mobile')}}</span>
                        </div>
                    </div>
                    <div class="column" :class="{'has-error' : errors.has('address') }">
                        <label class="label" for="address">地址 *</label>
                        <div class="field">
                            <input style="width:80%" class="is-size-6" v-model="address"
                                   v-validate data-vv-rules="required|min:5" data-vv-as="地址"
                                   id="address" placeholder="address" type="text" name="address" required>
                            <br>
                            <span class="help-block" v-show="errors.has('address')" style="color: red !important;">{{errors.first('address')}}</span>
                        </div>
                    </div>
                </div>

                <p class="is-size-3" style="display:inline">支付信息 <p class="is-size-5" style="display:inline"> Pay with <em style="color:#474fdb;" class="fa fa-cc-stripe"></em></p></p>
                <hr>

                <div class="columns">
                    <div class="column">
                        <label class="control-label" style="margin-right:20px;">卡号 *</label>
                        <card-number class='stripe-element card-number'
                                     ref='cardNumber'
                                     :stripe='key'
                                     style="width:100%"
                                     :options='{style}'
                                     @change='number = $event.complete'></card-number>
                    </div>
                    <br>
                    <div class="column">
                        <label class="control-label" style="margin-right: 20px;">有效期 *</label>
                        <card-expiry class='stripe-element card-expiry'
                                     ref='cardExpiry'
                                     :stripe='key'
                                     :options='{style}'
                                     @change='expiry = $event.complete'></card-expiry>
                    </div>
                    <br>
                    <div class="column">
                        <label class="control-label" style="margin-right: 20px;">安全码 *</label>
                        <card-cvc class='stripe-element card-cvc'
                                  ref='cardCvc'
                                  :stripe='key'
                                  :options='{style}'
                                  @change='cvc = $event.complete'>
                        </card-cvc>
                    </div>
                </div>

                <div class="field">
                    <button class="button is-primary" style="width:100%" @click.prevent="nextStep" :disabled="!complete">
                        Pay A$ 50.00
                    </button>
                </div>
                <loader :show="show" :label="label"></loader>
            </div>
        </div>

    </div>

</template>

<script>

    import { CardNumber, CardExpiry, CardCvc, createToken } from 'vue-stripe-elements'
    import Loader from 'vue-full-loading'


    export default {

        data(){
            return {
                name: '',
                mobile: '',
                firstTime: '',
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
                        color: '#fb0c13',
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
                if (this.complete && this.gender && this.firstTime && this.name.length >= 2 && this.email.length > 0 && this.address.length >= 5 && this.mobile.length >= 8 && this.email === this.email_confirm) {
                    this.$validator.validateAll().then(result => {

                        let formData = {
                            email: this.email
                        };

                        axios.post('/api/form/validate', formData).then(response => {
                            console.log('alert: ', response.data.status);
                            if (response.data.status) {
                                alert("此邮箱已被成功注册. 请使用其他邮箱.");
                                this.$router.push({name: 'summit'});
                            } else {
                                this.pay();
                            }
                        })
                    })
                }else{
                    alert('Please follow the instruction to finish the registration first!');
//                    this.$router.push({name:'summit'})
                }
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
                        name: vm.name,
                        first_time: vm.firstTime,
                        address: vm.address,
                        gender: vm.gender,
                        mobile: vm.mobile,
                        email: vm.email,
                        stripeToken: data.token.id
                    };

                    vm.show = true;

                    axios.post('/api/form/purchase', formData).then(response => {

                        console.log(response.data.message);

                        if (response.data.message === 'paid success') {

                            let ref = response.data.ref;

                            vm.$store.dispatch('paymentRequest').then(response => {

                                vm.$router.push({
                                    name: 'summit.success', params: {
                                        name: vm.name,
                                        email: vm.email,
                                        firstTime: vm.firstTime,
                                        address: vm.address,
                                        gender: vm.gender,
                                        mobile: vm.mobile,
                                        paymentRef: ref
                                    }
                                });

                            }).catch(error => {
                                console.log('dispatching error: ', error);
                            });
                        }
                        else if(response.data.message === 'failed to send email'){
                            alert('!! 支付成功，但是发送邮件收据失败。请联系我们的同工！ Failed reason: ' + response.data.reason);
                            vm.show = false;
                        }
                        else if(response.data.message === 'failed to charge the card'){
                            alert('!! Failed to charge, reason: ' + response.data.reason + ' No amount is deducted. Please start again!');
                            vm.show = false;
//                            vm.$router.push({name: 'summit'});
                        }
                        else{
                            alert('Unknown error, please contact us.');
                            vm.show = false;
                            vm.$router.push({name: 'summit'});
                        }
                    }).catch(error => {
                        console.log("errrrrr: ", error);
                        vm.show = false;
                    })
                }).catch(err => {
                    alert('网络中断！请检查是否收到成功支付邮件');
                    console.log('creating token failed: ', err);
                    vm.show = false;
                })
            }
        }
    }
</script>


<style>

    input {
        outline: 0 !important;
        border-width: 0 0 2px 0 !important;
        border-color: darkgray !important;
    }

    /*input:focus {*/
        /*outline: 0 !important;*/
        /*border-width: 0 0 2px 0 !important;*/
        /*border-color: #1598af !important;*/
    /*}*/

    .stripe-element {
        outline: 0 !important;
        border-bottom: 2px solid !important;
        border-color: darkgray !important;
    }

</style>