<template>
    <div>
        <div class="flex-center position-ref full-height" style="background-color:#D9DFE5; padding-bottom:200px; margin-bottom:-150px;">
            <div class="content" v-cloak>
                <img class="logo" src="./../../../image/gcclogoH1140.png" style="width:20%;height:10%;" />
            </div>
        </div>

        <div class="card-block text-center col-md-6 offset-md-3 z-depth-5 cards shadow">
            <div>
                <h1 class="card-title text-white">奉献</h1>
                <h6 class="card-text text-white">「奉獻」是我們在神面前的一個敬虔的操練！ 神不需要我們的錢，但是透過我們如此的表態，我們向神表達三個很重要的意義:</h6>
                <br>
                <h4 style="color:white !important;" class="card-subtitle mb-2 text-muted">感恩,尊榮,信心</h4>
                <br>
                <v-btn class="btn btn-light" v-b-modal.giving-option>Giving</v-btn>
            </div>
            <br><br>
        </div>

        <b-modal id="giving-option" title="網路奉獻">
            <div class="container">
                <div class="row">
                    <div @click="toggleQuickPay" class="text-center col-md-5 btn btn-info" v-b-modal.giving>Quick Giving</div>
                    <div class="col-md-2"></div>
                    <div @click="toggleCustomPay"  class="text-center col-md-5 btn btn-info" v-b-modal.giving>Custom Amount</div>
                </div>
            </div>
        </b-modal>

        <b-modal id="giving" title="GCC Central Hub">
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="control-form">電子郵件*</label>
                        <input type="email" class="form-control" v-model="email">
                    </div>
                    <div v-if="quick_pay === 'quick'" class="col-md-12">
                        <label class="control-form">金額 (A$)*</label>
                        <select v-model="amount" class="form-control">
                            <option disabled value="">請選擇金額</option>
                            <option value="10">AS 10.00</option>
                            <option value="25">AS 25.00</option>
                            <option value="50">A$ 50.00</option>
                            <option value="100">A$ 150.00</option>
                            <option value="200">A$ 200.00</option>
                            <option value="250">A$ 250.00</option>
                            <option value="500">A$ 500.00</option>
                            <option value="1000">A$ 1000.00</option>
                        </select>
                    </div>
                    <div class="col-md-12" v-else>
                        <label class="control-form">金額 (A$)*</label>
                        <input type="number" class="form-control" v-model="amount">
                    </div>
                    <div class="col-md-12">
                        <label class="control-form" style="margin-right:20px;">卡號 *</label>
                        <card-number class='stripe-element card-number'
                                     ref='cardNumber'
                                     :stripe='key'
                                     style="width:100%"
                                     :options='{style}'
                                     @change='number = $event.complete'></card-number>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <label class="control-form" style="margin-right: 20px;">有效日期 *</label>
                        <card-expiry class='stripe-element card-expiry'
                                     ref='cardExpiry'
                                     :stripe='key'
                                     :options='{style}'
                                     @change='expiry = $event.complete'></card-expiry>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <label class="control-form" style="margin-right: 20px;">安全碼 *</label>
                        <card-cvc class='stripe-element card-cvc'
                                  ref='cardCvc'
                                  :stripe='key'
                                  :options='{style}'
                                  @change='cvc = $event.complete'>
                        </card-cvc>
                    </div>
                </div>

            </div>
        </b-modal>

        <home-body></home-body>
        <home-footer></home-footer>
    </div>
</template>

<script>

    import HomeBody from './Body'
    import HomeFooter from './Footer'

    import { CardNumber, CardExpiry, CardCvc, createToken } from 'vue-stripe-elements'

    export default{

        components:{
            HomeBody,
            HomeFooter,
            CardNumber,
            CardExpiry,
            CardCvc
        },
        data(){
            return {
                quick_pay:false,
                amount:false,
                email:'',
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
        updated() {
            if (this.custom_amount <= 0) {
                this.custom_amount = 0;
            }
        },

        watch: {
            number () { this.update() },
            expiry () { this.update() },
            cvc () { this.update() }
        },

        methods:{
            toggleQuickPay(){
                this.quick_pay = 'quick';
            },
            toggleCustomPay(){
                this.quick_pay = 'custom';
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
            }
        }
    }

</script>


<style>
    html, body {
        background-color: #FBF9FC;
        color: #34363A;
        font-weight: 100;
        min-height: 100vh;
        margin: 0;
    }

    button {
        color: #FBF9FC;
    }

    .cards {
        background-image: url('./../../../image/centralBk.png');
        background-size: cover;
        padding-bottom:15px;
        padding-top:15px;
        border-radius: 5px;
    }

    .shadow {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .content {
        text-align: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .links > li {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .footer h1 {
        color:white;
    }

</style>