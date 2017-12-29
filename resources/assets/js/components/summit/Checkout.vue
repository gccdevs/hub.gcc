<template>
    <div>
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

        <div class="field">
            <button :class="(isLoading ? 'button is-info is-loading' : 'button is-info')" style="width:100%" @click.prevent="validateAndPay" :disabled=" errors.any() || isLoading || (!(complete && this.termChecker))">
                Proceed to checkout
            </button>
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
            },

            pay () {
                let vm = this;
                createToken().then(data => {

                    let formData = {
                        name: vm.name,
                        first_time: vm.firstTime,
                        gender: vm.gender,
                        mobile: vm.mobile,
                        email: vm.email,
                        path: vm.path,
                        isAgreed: vm.termChecker,
                        stripeToken: data.token.id
                    };

                    axios.post('/api/form/purchase', formData).then(response => {

                        if (response.data.message === 'paid success') {

                            let ref = response.data.ref;

                            vm.$store.dispatch('paymentRequest').then(response => {

                                vm.$router.push({
                                    name: 'summit.success', params: {
                                        name: vm.name,
                                        email: vm.email,
                                        firstTime: vm.firstTime,
                                        gender: vm.gender,
                                        mobile: vm.mobile,
                                        path:vm.path,
                                        paymentRef: ref
                                    }
                                });

                            }).catch(error => {
                            });
                        }
                        else if(response.data.message === 'failed to send email'){
                            alert('!! 支付成功，但是发送邮件收据失败。请联系我们的同工 customerservice@glorycitychurch.com' + '\n' +'Failed reason: ' + response.data.reason);
                            vm.dismissLoader();
                        }
                        else if(response.data.message === 'failed to charge the card'){
                            alert('!! 支付失败, reason: ' + response.data.reason + '此账户没有金额扣除，请尝试使用其他支付卡号!');
                            vm.dismissLoader();
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
                        vm.dismissLoader();
                    })
                }).catch(err => {
                    alert('网络中断！请检查是否收到成功支付邮件,或联系我们的同工 customerservice@glorycitychurch.com');
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