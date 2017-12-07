<template>
    <div class="container">
        <div class="row">
            <form class="form-horizontal">
            <div class="col-md-12 offset-md-2 form-group credit-card-inputs" :class="{complete}">
                <label class="col-md-12 offset-md-2 control-label">支付 *</label>
                <div>
                    <label class="control-label" style="margin-right:20px;">卡号</label>
                        <card-number class='stripe-element card-number'
                                     ref='cardNumber'
                                     :stripe='key'
                                     style="width:220%"
                                     :options='{style}'
                                     @change='number = $event.complete'></card-number>
                    <br>
                    <label class="control-label" style="margin-right: 20px;"> 有效期 </label>
                        <card-expiry class='stripe-element card-expiry'
                                     ref='cardExpiry'
                                     :stripe='key'
                                     :options='{style}'
                                     @change='expiry = $event.complete'></card-expiry>
                    <br>
                    <label class="control-label" style="margin-right: 20px;"> 安全码 </label>
                        <card-cvc class='stripe-element card-cvc'
                                  ref='cardCvc'
                                  :stripe='key'
                                  :options='{style}'
                                  @change='cvc = $event.complete'>
                        </card-cvc>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 offset-md-4">
                    <button class='pay-with-stripe' @click='pay' :disabled='!complete'>Pay A$ 50.00</button>
                </div>
            </div>
            </form>

        </div>
    </div>

</template>


<script>
    import { CardNumber, CardExpiry, CardCvc, createToken } from 'vue-stripe-elements'

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

        watch: {
            number () { this.update() },
            expiry () { this.update() },
            cvc () { this.update() }
        },

        components: { CardNumber, CardExpiry, CardCvc },

        methods:{

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
                createToken().then(data => {
                    console.log(data.token.id);
                    let formData = {
                        email: 'gaohaoqian@gmail.com',
                        stripeToken : data.token.id
                    };

                    axios.post('/api/form/purchase',formData).then(response => {
                        console.log(response.data.message);
                    }).catch(error => {
                        console.log("errrrrr: ", error);
                    })
                })
            }
        }
    }

</script>

<style>
    .stripe-element {
        border-bottom: 1px solid;
        border-color: darkgray;
    }
    .credit-card-inputs.complete {
        border: 2px solid #1598af;
    }
</style>