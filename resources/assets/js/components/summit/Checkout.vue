<template>
    <div>
        <br><br><br>
        <section class="hero is-info is-bold">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title has-text-left" >
                        无可限量 Limitless 2018
                    </h1>
                    <h2 class="subtitle has-text-left">
                        Checkout
                    </h2>
                </div>
            </div>
        </section>
        <div class="container">

            <p class="is-size-3" style="display:inline">确认信息</p><br>

            <table class="table is-hidden-touch is-size-4" style="background-color: transparent !important;">
                <thead>
                <tr>
                    <th>姓名</th>
                    <th>电邮</th>
                    <th>电话</th>
                    <th>性别</th>
                    <th>折扣券</th>
                </tr>

                </thead>
                <tr>
                    <td>{{ this.name }}</td>
                    <td>{{ this.email }}</td>
                    <td>{{ this.mobile }}</td>
                    <td>{{ this.gender }}</td>
                    <td v-if="this.isDiscounted">已使用 <em class="fa fa-check" style="color:green"></em></td>
                    <td v-else>未使用 <em class="fa fa-minus" style="color:gray"></em></td>
                </tr>
                <tbody>

                </tbody>
            </table>

            <div class="is-hidden-desktop">
                <hr>
                <table class="table" style="background-color: transparent;">
                    <!--<thead>-->
                    <!--<tr>-->
                        <!--<th></th>-->
                        <!--<th></th>-->
                    <!--</tr>-->
                    <!--</thead>-->
                    <tbody>
                    <tr>
                        <td><b>姓名</b></td>
                        <td>{{ this.name }}</td>
                    </tr>
                    <tr>
                        <td><b>电邮</b></td>
                        <td>{{ this.email }}</td>
                    </tr>
                    <tr>
                        <td><b>电话</b></td>
                        <td>{{ this.mobile }}</td>
                    </tr>
                    <tr>
                        <td><b>性别</b></td>
                        <td>{{ this.gender }}</td>
                    </tr>
                    <tr>
                        <td><b>折扣券</b></td>
                        <td v-if="this.isDiscounted">已使用 <em class="fa fa-check" style="color:green"></em></td>
                        <td v-else>未使用 <em class="fa fa-minus" style="color:gray"></em></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <p class="is-size-6"><em class="fa fa-bell" style="color:#1e87e8;"></em> 如信息无误, 请进行支付, <router-link :to="{name:'summit.signup'}" tag="a" style="text-decoration: none;">或者重新填写</router-link></p>

            <hr>

            <p class="is-size-3" style="display:inline">支付</p>
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

            <div class="field">
                <button :class="(isLoading ? 'button is-info is-loading' : 'button is-info')" style="width:100%" @click.prevent="validateAndPay" :disabled=" errors.any() || isLoading || (!(complete && this.termChecker))">
                    Pay
                </button>
            </div>

            <loader :show="show" :label="label"></loader>

        </div>
    </div>
</template>


<script>

    import { CardNumber, CardExpiry, CardCvc, createToken } from 'vue-stripe-elements'
    import Loader from 'vue-full-loading'

    export default {

        created(){
            console.log(this.name, this.mobile);
        },

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

        props:['name','mobile','gender','firstTime','isDiscounted','path','email'],

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