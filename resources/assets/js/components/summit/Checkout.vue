<template>
    <div>
        <br><br><br>
        <section class="hero is-info is-bold">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title has-text-left" >
                        無可限量 | Limitless
                    </h1>
                    <h2 class="subtitle has-text-left">
                        Checkout
                    </h2>
                </div>
            </div>
        </section>
        <div class="container">

            <p class="is-size-3" style="display:inline">確認信息</p><br>

            <table class="table is-hidden-touch is-size-4" style="background-color: transparent !important;">
                <thead>
                <tr>
                    <th>姓</th>
                    <th>名</th>
                    <th>郵箱</th>
                    <th>電話號碼</th>
                    <th>性別</th>
                    <th>折扣券</th>
                    <th>價格</th>
                </tr>

                </thead>
                <tr>
                    <td>{{ this.last_name }}</td>
                    <td>{{ this.first_name }}</td>
                    <td>{{ this.email }}</td>
                    <td>{{ this.mobile }}</td>
                    <td>{{ this.gender }}</td>
                    <td v-if="this.isDiscounted"><em class="fa fa-check" style="color:green"></em></td>
                    <td v-else><em class="fa fa-minus" style="color:gray"></em></td>
                    <td v-show="this.isDiscounted">A${{ price }} <s style="color:lightgray">A$99.00</s></td>
                    <td v-show="!this.isDiscounted">A$99.00</td>
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
                        <td><b>姓</b></td>
                        <td>{{ this.last_name }}</td>
                    </tr>
                    <tr>
                        <td><b>名</b></td>
                        <td>{{ this.first_name }}</td>
                    </tr>
                    <tr>
                        <td><b>郵箱</b></td>
                        <td>{{ this.email }}</td>
                    </tr>
                    <tr>
                        <td><b>電話號碼</b></td>
                        <td>{{ this.mobile }}</td>
                    </tr>
                    <tr>
                        <td><b>性别</b></td>
                        <td>{{ this.gender }}</td>
                    </tr>
                    <tr>
                        <td><b>折扣券</b></td>
                        <td v-if="this.isDiscounted"><em class="fa fa-check" style="color:green"></em></td>
                        <td v-else><em class="fa fa-minus" style="color:gray"></em></td>
                    </tr>

                    <tr>
                        <td><b>價格</b></td>
                        <td v-show="this.isDiscounted">A${{ price }} <s style="color:lightgray">A$99.00</s></td>
                        <td v-show="!this.isDiscounted">A$99.00</td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <p class="is-size-6"><em class="fa fa-bell" style="color:#1e87e8;"></em> 如信息無誤, 請進行到支付頁面, <router-link :to="{name:'summit.signup'}" tag="a" style="text-decoration: none;">或者重新填写</router-link></p>

            <hr>
            <!-- emails -->
            <p class="is-size-3" style="display:inline" v-if="coupon === 'DOUBLEPORTION'">为谁购买</p>
            <div class="columns" v-if="coupon === 'DOUBLEPORTION'">
            <div class="column" :class="{'has-error' : errors.has('inviterEmail') }">
                <label class="label" for="inviterEmail">请输入您朋友的郵箱 * </label>
                <div class="field">
                    <input style="width:80%" class="is-size-6" v-model="inviterEmail"
                           v-validate data-vv-rules="required|email|max:50" data-vv-as="郵箱"
                           id="inviterEmail" placeholder="Email Address" type="email" name="inviterEmail" required>
                    <br>
                    <span class="help-block" v-show="errors.has('inviterEmail')" style="color: red !important;">{{errors.first('inviterEmail')}}</span>
                    <span v-if="inviterEmail === email" style="color: red;">两邮箱地址不可相同</span>
                </div>
            </div>
            </div>
            <p class="is-size-3" style="display:inline">支付</p>
            <br>
            <p class="is-size-5" style="display:inline">Pay with <em style="color:#474fdb;" class="fa fa-cc-stripe"></em> <em class="fa fa-cc-visa"></em> <em style="color:#c50000;" class="fa fa-cc-mastercard"></em> <em style="color:#4785d9;" class="fa fa-cc-amex"></em></p>
            <br><br>

            <div class="columns">
                <div class="column">
                    <label class="control-label" style="margin-right:20px;">卡號 *</label>
                    <card-number class='stripe-element card-number'
                                 ref='cardNumber'
                                 :stripe='key'
                                 style="width:100%"
                                 :options='{style}'
                                 @change='number = $event.complete'></card-number>
                </div>
                <br>
                <div class="column">
                    <label class="control-label" style="margin-right: 20px;">有效日期 *</label>
                    <card-expiry class='stripe-element card-expiry'
                                 ref='cardExpiry'
                                 :stripe='key'
                                 :options='{style}'
                                 @change='expiry = $event.complete'></card-expiry>
                </div>
                <br>
                <div class="column">
                    <label class="control-label" style="margin-right: 20px;">安全碼 *</label>
                    <card-cvc class='stripe-element card-cvc'
                              ref='cardCvc'
                              :stripe='key'
                              :options='{style}'
                              @change='cvc = $event.complete'>
                    </card-cvc>
                </div>
            </div>

            <p class="is-size-3">同意條款</p>

            <br>

            <div class="columns">
                <div class="column">
                    <label class="checkbox">
                        <input type="checkbox" name="terms" id="terms" v-validate="'required'" data-vv-as="同意條款" @click="toggleChecker" required>
                        I agree to the <a style="color:blue" @click="toggleModal">terms and conditions</a>
                    </label>
                    <span class="help-block" v-show="errors.has('terms')" style="color: red !important;">{{ errors.first('terms') }}</span>
                </div>
            </div>

            <div v-show="this.showModal" title="GCC Summit 2018">
                <em class="fa fa-compress" @click="toggleModal"></em>
                <div class="container" style="background-color:lightgray !important;width:100% !important;">
                    <p>
                    <p class="is-size-1">Terms And Conditions</p> <br>

                    Glory City Church of Melbourne Inc. (hereinafter known as ‘Glory City Church’).

                    <br><br>
                    <b class="is-size-4">DISCLAIMER</b>
                    <br>
                    I acknowledge that if I have completed this form on behalf of a person under the age of 18 years of age, I have done so with the permission and consent of the child’s parent/guardian and have been given the responsibility to care for the child at all times during the event. If I am a parent/guardian of a child attending the event, I confirm and acknowledge the child attends at their own risk and I allow this with full knowledge of the risks associated and confirm the child is not the responsibility of Glory City Church, its staff, volunteers and/or agents.
                    Glory City Church reserves the right to change any of the published event details without notice and have the final say on any matter relating to the event.

                    <br><br>
                    <b class="is-size-4">REGISTRATION ALLOCATIONS</b>
                    <br>
                    I understand that when I purchase a number of tickets for this event that I must allocate each of these tickets to named individuals. I understand that if I do not so allocate any of the tickets that they will not be able to be used and will be forfeited and that no refund will be available for any unused tickets.
                    <br><br>
                    <b class="is-size-4">GST/RECEIPTS</b>
                    <br>
                    The registration price does not include GST as the event is considered a ‘Religious Service’. Should you require a tax invoice for your records, please photocopy this registration form prior to returning it to us.
                    <br><br>
                    <b class="is-size-4">
                        REFUNDS/TRANSFERS
                    </b>
                    <br>
                    Refunds on tickets are available up until 14 days prior to the date of the event. After this, we will not refund the tickets due to administrative purposes. Individual tickets may be transferred to another individual by placing the request in an email to customerservice@glorycitychurch.com.
                    <br><br>
                    <b class="is-size-4">
                        INDEMNITY
                    </b>
                    <br>
                    I hereby agree to indemnify, release and hold harmless Glory City Church, its staff, volunteers and/or authorized agents against any and all claims arising from, or in connection with, any injury, accident, misfortune, damage or loss that may occur to myself/my child/ward and/or my/their property, equipment or personal effects while present at the event and within the event premises, including any injury that my child/ward may cause to another person.
                    <br><br>
                    <b class="is-size-4">
                        MEDICAL TREATMENT CONSENT
                    </b>
                    <br>
                    I give permission for Glory City Church authorised staff and/or volunteers to obtain emergency medical, hospital or ambulance assistance at any time they consider necessary. I understand that every reasonable effort will be made for the registrant to be notified before instituting such procedures. I acknowledge that I will be liable for any and all medical/hospital/ambulance costs and expenses incurred in the registrant’s or my child/ward’s treatment.
                    <br><br>
                    <b class="is-size-4">
                        INVOLVEMENT CONSENT
                    </b>
                    <br>
                    I hereby give my consent for the registrant to participate in activities they may choose while attending the event. I agree and understand that Glory City Church reserves the right to exercise its discretion to refuse to register any person upon medical and/or other grounds, without providing a detailed reason for doing so.
                    <br><br>
                    <b class="is-size-4">
                        PRIVACY DECLARATION
                    </b>
                    <br>
                    I understand and accept that Glory City Church may collect and use information about me for the purpose of providing and offering promotional material and may provide the information to any third party who helps Glory City Church provide these services to you. I consent to my personal details being used for the promotion of future Glory City Church events and products. Please contact customerservice@glorycitychurch.com if you have any queries regarding our privacy policy.
                    <br><br>
                    <b class="is-size-4">
                        MEDIA WAIVER
                    </b>
                    <br>
                    The event will be captured in photographs, video and audio. Glory City Church reserves the right to use this material for promotional purposes. I understand it is a condition of all registrant’s entry into the event that all claims are waived in relation to inclusion of their likeness in such films or recordings. If I am a parent/guardian, I give my consent for my child to be captured on photographic, video and audio media.
                </div>
                <em class="fa fa-compress" @click="toggleModal"></em>
                <br>
            </div>

            <div class="field">
                <button :class="(isLoading ? 'button is-info is-loading' : 'button is-info')" style="width:100%" @click.prevent="pay" :disabled=" errors.any() || 
                isLoading || 
                !complete || 
                !this.termChecker">
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

        data(){
            return {
                showModal: false,
                show: false,
                inviterEmail: '',
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

        props:['price', 'first_name','last_name','mobile','gender','firstTime','isDiscounted','path','email','coupon'],

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

                if (this.coupon === 'DOUBLEPORTION') {
                    if (this.email === this.inviterEmail || this.inviterEmail === '') {
                        alert('邮箱有误');
                        return;
                    }
                }

                let vm = this;

                vm.show = true;

                createToken().then(data => {

                    let formData = {
                        first_name: vm.first_name,
                       last_name: vm.last_name,
                        first_time: vm.firstTime,
                        isAgreed: vm.termChecker,
                        gender: vm.gender,
                        mobile: vm.mobile,
                        inviterEmail: vm.inviterEmail,
                        email: vm.email,
                        path: vm.path,
                        price: vm.price,
                        stripeToken: data.token.id,
                        coupon: vm.coupon
                    };

                    axios.post('/api/form/purchase', formData).then(response => {

                        if (response.data.message === 'paid success') {

                            let ref = response.data.ref;

                            vm.$store.dispatch('paymentRequest').then(response => {

                                vm.$router.push({
                                    name: 'summit.success', params: {
                                        first_name: vm.first_name,
                                        last_name: vm.last_name,
                                        inviterEmail: vm.inviterEmail,
                                        email: vm.email,
                                        firstTime: vm.firstTime,
                                        gender: vm.gender,
                                        mobile: vm.mobile,
                                        price: vm.price,
                                        path:vm.path,
                                        paymentRef: ref
                                    }
                                });

                            }).catch(error => {
                            });
                        }
                        else if(response.data.message === 'failed to send email'){
                            alert('!! 支付成功，但是發送郵件收據失敗。請聯繫我們的同工 customerservice@glorycitychurch.com' + '\n' +'Failed reason: ' + response.data.reason);
                            vm.dismissLoader();
                        }
                        else if(response.data.message === 'failed to charge the card'){
                            alert('!! 支付失敗, reason: ' + response.data.reason + '此賬戶沒有金額扣除，請嘗試使用其他支付卡號!');
                            vm.dismissLoader();
                        }
                        else if (response.data.message === 'failed to create Entity'){
                            alert('!! 支付失敗, reason: ' + response.data.reason + '請聯繫我們的同工 customerservice@glorycitychurch.com');
                            vm.dismissLoader();
                        }
                        else if (response.data.message === 'input cannot pass validation'){
                            alert('您所填寫的信息有誤，請檢查修改。');
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
                    alert('網絡中斷！請檢查是否收到成功支付郵件,或聯繫我們的同工 customerservice@glorycitychurch.com');
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
