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
                    <th>价格</th>
                </tr>

                </thead>
                <tr>
                    <td>{{ this.name }}</td>
                    <td>{{ this.email }}</td>
                    <td>{{ this.mobile }}</td>
                    <td>{{ this.gender }}</td>
                    <td v-if="this.isDiscounted">已使用 <em class="fa fa-check" style="color:green"></em></td>
                    <td v-else>未使用 <em class="fa fa-minus" style="color:gray"></em></td>
                    <td v-show="this.isDiscounted">A$50.00 <s style="color:lightgray">A$100.00</s></td>
                    <td v-show="!this.isDiscounted">A$100.00</td>
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

                    <tr>
                        <td><b>价格</b></td>
                        <td v-show="this.isDiscounted">A$50.00 <s style="color:lightgray">A$100.00</s></td>
                        <td v-show="!this.isDiscounted">A$100.00</td>
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

            <p class="is-size-3">同意条款</p>

            <br>

            <div class="columns">
                <div class="column">
                    <label class="checkbox">
                        <input type="checkbox" name="terms" id="terms" v-validate="'required'" data-vv-as="同意条款" @click="toggleChecker" required>
                        I agree to the <a style="color:blue" @click="toggleModal">terms and conditions</a>
                    </label>
                    <span class="help-block" v-show="errors.has('terms')" style="color: red !important;">{{ errors.first('terms') }}</span>
                </div>
            </div>

            <div v-show="this.showModal" title="GCC Summit 2018">
                <em class="fa fa-compress" @click="toggleModal"></em>
                <div class="container" style="background-color:lightgray !important;width:100% !important;">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        <br><br>
                        Why do we use it?
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        <br><br>
                        Where does it come from?
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                        <br><br>
                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                        <br><br>
                        Where can I get some?
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                    </p>
                </div>
                <em class="fa fa-compress" @click="toggleModal"></em>
                <br>
            </div>

            <div class="field">
                <button :class="(isLoading ? 'button is-info is-loading' : 'button is-info')" style="width:100%" @click.prevent="pay" :disabled=" errors.any() || isLoading || !complete || ! this.termChecker">
                    Pay Now !
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
                showModal: false,
                show: false,
                label: 'Processing, please wait...',
                key: GCC.stripeKey,
                complete: false,
                number: false,
                expiry: false,
                cvc: false,
                isLoading: false,
                termChecker: false,
                style:{
                    base: {
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

        props:['name','mobile','gender','firstTime','isDiscounted','path','email','coupon'],

        components: { CardNumber, CardExpiry, CardCvc, Loader },

        watch: {
            number () { this.update() },
            expiry () { this.update() },
            cvc () { this.update() }
        },

        methods:{

            toggleModal(){
                this.showModal = !this.showModal;
            },

            toggleChecker(){
                this.termChecker = !this.termChecker;
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
            },

            pay () {

                let vm = this;

                vm.show = true;

                createToken().then(data => {

                    let formData = {
                        name: vm.name,
                        first_time: vm.firstTime,
                        isAgreed: vm.termChecker,
                        gender: vm.gender,
                        mobile: vm.mobile,
                        email: vm.email,
                        path: vm.path,
                        stripeToken: data.token.id,
                        coupon: vm.coupon
                    };

                    axios.post('/api/form/purchase', formData).then(response => {

                        console.log(response.data);

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
                        else if (response.data.message === 'failed to create Entity'){
                            alert('!! 支付失败, reason: ' + response.data.reason + '请联系我们的同工 customerservice@glorycitychurch.com');
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

            dismissLoader(){
                this.isLoading = false;
                this.show = false;
            }

        }

    }

</script>


<style src="./../../../../../public/css/bulma-0.6.1/css/bulma.css"></style>