<template>
    <div class="container">
        <section class="hero is-info is-bold">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title has-text-left" >
                        无可限量 Limitless 2018
                    </h1>
                    <h2 class="subtitle has-text-left">
                        墨尔本荣耀城高峰会
                    </h2>
                </div>
            </div>
        </section>
        <br>
        <div class="box">
            <p class="is-size-3">基本信息</p>
            <br>

            <div class="columns">
                <div class="column" :class="{'has-error' : errors.has('name') }">
                    <label class="label" for="name">姓名 *</label>
                    <div>
                        <input style="width:80%" class="is-size-6" v-model="name"
                               v-validate data-vv-rules="required|min:2|max:50" data-vv-as="姓名"
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
                                <label style="margin-right:20px;">
                                    <input class="is-size-5" v-model="gender" v-validate="'required|in:male,female'" data-vv-as="性别"
                                           name="gender" value="male" id="gender" type="radio"> 男 <em class="fa fa-male" style="color: cornflowerblue"></em>
                                </label>
                                <label class="radio">
                                    <input class="is-size-5" v-model="gender" name="gender" value="female" type="radio"> 女 <em class="fa fa-female" style="color: hotpink"></em>
                                </label>
                                <br>
                                <span class="help-block" v-show="errors.has('gender')" style="color: red !important;">{{ errors.first('gender') }}</span>
                            </div>
                        </div>
                        <div class="column"  :class="{ 'has-error': errors.has('firstTime') }">
                            <label class="label">第一次参加 *</label>
                            <div class="field">
                                <label style="margin-right:20px;">
                                    <input class="is-size-5" v-model="firstTime" v-validate="'required|in:yes,no'" data-vv-as="是否第一次参加"
                                           name="firstTime" value="yes" id="firstTime" type="radio"> 是 <em class="fa fa-check" style="color: cornflowerblue"></em>
                                </label>
                                <label class="radio">
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
                <div class="column" :class="{'has-error' : errors.has('address') }">
                    <label class="label" for="address">地址 *</label>
                    <div>
                        <input style="width:80%" class="is-size-6" v-model="address"
                               v-validate data-vv-rules="required|min:5|max:100" data-vv-as="地址"
                               id="address" placeholder="Address" type="text" name="address" required>
                        <br>
                        <span class="help-block" v-show="errors.has('address')" style="color: red !important;">{{errors.first('address')}}</span>
                    </div>
                </div>
                <div class="column" :class="{'has-error' : errors.has('mobile') }">
                    <label class="label" for="mobile">电话 *</label>
                    <div>
                        <input style="width:80%" class="is-size-6" v-model="mobile"
                               v-validate data-vv-rules="required|numeric|min:10|max:25" data-vv-as="电话"
                               id="mobile" placeholder="Mobile, eg: 00610123456789" type="text" name="mobile" required>
                        <br>
                        <span class="help-block" v-show="errors.has('mobile')" style="color: red !important;">{{errors.first('mobile')}}</span>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column" :class="{'has-error' : errors.has('email') }">
                    <label class="label" for="email">邮箱 *   <p class="is-size-7" style="display:inline;color:red">请填写正确Email地址，支付凭证将会发到所填写的Email地址</p></label>
                    <div class="field">
                        <input style="width:80%" class="is-size-6" v-model="email"
                               v-validate data-vv-rules="required|email|max:50" data-vv-as="邮箱"
                               id="email" placeholder="Email" type="email" name="email" required>
                        <br>
                        <span class="help-block" v-show="errors.has('email')" style="color: red !important;">{{errors.first('email')}}</span>
                    </div>
                </div>
                <div class="column" :class="{'has-error' : errors.has('email-confirm') }">
                    <label class="label" for="email-confirm">确认邮箱 *</label>
                    <div class="field">
                        <input style="width:80%" class="is-size-6" v-model="email_confirm"
                               id="email-confirm" placeholder="Email again" v-validate data-vv-rules="required|email|confirmed:email|max:50" data-vv-as="确认邮箱"
                               type="email" name="email-confirm" required>
                        <br>
                        <span class="help-block" v-show="errors.has('email-confirm')" style="color: red !important;">{{errors.first('email-confirm')}}</span>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column" :class="{ 'has-error': errors.has('path') }">
                    <label class="label">从什么途径了解到我们 *</label>
                    <div class="control">
                        <label class="radio">
                            <input class="is-size-5" v-model="path" v-validate="{ rules: 'required|in:friend,classmate,colleague,web,social,family,other', args: 'path' }" data-vv-as="途径"
                                   name="path" value="friend" id="path" type="radio"> 朋友
                        </label>
                        <label class="radio">
                            <input class="is-size-5" v-model="path" name="path" value="classmate" type="radio"> 同学
                        </label>
                        <label class="radio">
                            <input class="is-size-5" v-model="path" name="path" value="colleague" type="radio"> 同事
                        </label>
                        <label class="radio">
                            <input class="is-size-5" v-model="path" name="path" value="social" type="radio"> 网络平台
                        </label>
                        <label class="radio">
                            <input class="is-size-5" v-model="path" name="path" value="family" type="radio"> 家人
                        </label>
                        <label class="radio">
                            <input class="is-size-5" v-model="path" name="path" value="other" type="radio"> 其他
                        </label>
                        <br>
                        <span class="help-block" v-show="errors.has('path')" style="color: red !important;">{{ errors.first('path') }}</span>
                    </div>
                </div>
            </div>

            <p class="is-size-3" style="display:inline">支付信息</p>
            <br>
            <p class="is-size-5" style="display:inline">Pay with <em style="color:#474fdb;" class="fa fa-cc-stripe"></em> <em class="fa fa-cc-visa"></em> <em style="color:#c50000;" class="fa fa-cc-mastercard"></em> <em style="color:#4785d9;" class="fa fa-cc-amex"></em></p>
            <br><br>
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

            <p class="is-size-3">同意条款</p>

            <br>

            <div class="columns">
                <div class="column">
                    <label class="checkbox">
                        <input type="checkbox" name="terms" id="terms" v-validate="'required'" data-vv-as="同意条款" @click="toggleChecker" required>
                        I agree to the <router-link :to="{ name: 'summit.terms' }" tag="a" style="color:#474fdb;">terms and conditions</router-link>
                    </label>
                    <span class="help-block" v-show="errors.has('terms')" style="color: red !important;">{{ errors.first('terms') }}</span>
                </div>
            </div>
        </div>
        <div class="field">
            <button :class="(isLoading ? 'button is-info is-loading' : 'button is-info')" style="width:100%" @click.prevent="validateAndPay" :disabled=" errors.any() || isLoading || (!(complete && this.termChecker))">
                Pay A$ 50.00
            </button>
            <br><br>
        </div>
        <loader :show="show" :label="label"></loader>
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
                path: '',
                show: false,
                label: 'Processing, please wait...',
                key: GCC.stripeKey,
                complete: false,
                number: false,
                expiry: false,
                cvc: false,
                termChecker: false,
                isLoading: false,
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

            validateAndPay() {
                if (this.validatesInputLength()) {
                    this.$validator.validateAll().then(result => {
                        axios.post('/api/form/validate', {email: this.email}).then(response => {
//                                console.log('alert: ', response.data.status);
                            if (response.data.status) {

                                this.dismissLoader();

                                alert("此邮箱已被成功注册. 请使用其他邮箱.");
                                this.$router.push({name: 'summit.signup'});
                            } else {

                                this.isLoading = true;
                                this.show = true;

                                this.pay();
                            }
                        })
                    })
                } else{
                    alert('请检查所填写信息是否有误或未填写!');
                }
            },

            validatesInputLength(){
                return this.termChecker && this.complete && this.gender && this.firstTime && this.name.length >= 2 &&
                    this.email.length > 0 && this.address.length >= 5 && this.mobile.length >= 10 &&
                    this.email === this.email_confirm && this.path && this.name.length <= 50 &&
                    this.email.length <= 50 && this.address.length <= 100 && this.mobile.length <= 25;
            },

            update () {
                this.complete = this.number && this.expiry && this.cvc;

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
//                    console.log(data.token.id);

                    let formData = {
                        name: vm.name,
                        first_time: vm.firstTime,
                        address: vm.address,
                        gender: vm.gender,
                        mobile: vm.mobile,
                        email: vm.email,
                        path: vm.path,
                        isAgreed: vm.termChecker,
                        stripeToken: data.token.id
                    };

//                    vm.show = true;

                    axios.post('/api/form/purchase', formData).then(response => {

//                        console.log(response.data.message);

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
                                        path:vm.path,
                                        paymentRef: ref
                                    }
                                });

                            }).catch(error => {
//                                console.log('dispatching error: ', error);
                            });
                        }
                        else if(response.data.message === 'failed to send email'){
                            alert('!! 支付成功，但是发送邮件收据失败。请联系我们的同工 customerservice@glorycitychurch.com' + '\n' +'Failed reason: ' + response.data.reason);
                            vm.dismissLoader();
                        }
                        else if(response.data.message === 'failed to charge the card'){
                            alert('!! 支付失败, reason: ' + response.data.reason + '此账户没有金额扣除，请尝试使用其他支付卡号!');
                            vm.dismissLoader();
//                            vm.$router.push({name: 'summit'});
                        }
                        else if (response.data.message === 'input cannot pass validation'){
                            alert('所填写的信息有误，请检查修改。');
                            vm.dismissLoader();
                        }
                        else{
                            alert('Unknown error, please contact us： customerservice@glorycitychurch.com');
                            vm.dismissLoader();
                            vm.$router.push({name: 'summit.signup'});
                        }
                    }).catch(error => {
//                        console.log("errrrrr: ", error);
                        vm.dismissLoader();
                    })
                }).catch(err => {
                    alert('网络中断！请检查是否收到成功支付邮件,或联系我们的同工 customerservice@glorycitychurch.com');
//                    console.log('creating token failed: ', err);
                    vm.dismissLoader();
                })
            },

            toggleChecker(){
                this.termChecker = !this.termChecker;
            },

            dismissLoader(){
                this.isLoading = false;
                this.show = false;
            }

        }
    }
</script>


<style src="./../../../../../public/css/bulma-0.6.1/css/bulma.css"></style>