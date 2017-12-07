
<template>
    <div class="container">
        <h1>确认支付</h1>
        <loading :show="show" :label="label"></loading>
        <button class="btn btn-outline-warning btn-block" @click="redirectBack"><em class="fa fa-chevron-circle-left"></em> 返回</button>
        <br>
        <img src="../../../image/small-logo.png" style="display: block;margin: 0 auto;">
        <hr>
        <div class="row">
            <p class="col-md-6 offset-md-4" style="color:red">＊查看信息，若准确无误请点击下方支付</p>
            <ul class="list-group offset-md-4">
                <li class="list-group-item">姓名： <b>{{ this.last_name + ', ' + this.first_name }}</b></li>
                <li class="list-group-item">性别：  <b>{{ this.gender === 'male' ? '男性' : '女性' }}</b></li>
                <li class="list-group-item">电邮： <b>{{ this.email }}</b></li>
                <li class="list-group-item">电话： <b>{{ this.mobile }}</b></li>
                <li class="list-group-item">地址： <b>{{ this.address }}</b></li>
            </ul>
        </div>
        <form>
            <input type="hidden" v-model="stripeEmail" name="stripeEmail">
            <input type="hidden" v-model="stripeToken" name="stripeToken">
            <br>
            <button class="btn btn-outline-info btn-block" type="submit" id="readyToPay" @click.prevent="buy">支付 <em class="fa fa-chevron-circle-right"></em></button>
        </form>
    </div>
</template>

<script>

    import Loading from 'vue-full-loading'

    export default{
        data(){
            return{
                stripeEmail:'',
                stripeToken :'',
                show: false,
                label: 'Processing, please wait...'
            }
        },

        components:{
            Loading
        },

        props:['email','first_name','last_name','address','mobile','gender'],

        created(){
            var vm = this;

            vm.handler = StripeCheckout.configure({

                key: GCC.stripeKey,
                image: "https://irp-cdn.multiscreensite.com/af471d46/dms3rep/multi/thumbnail/SUMMIT-LOGO-768x739.png",
                locale: 'au',
                email: this.email,

                closed: function () {
                    vm.show = false;
                },

                opened: function () {
                    vm.show = true;
                },

                token: function(token) {

                    this.stripeToken = token.id;
                    this.stripeEmail = token.email;

                    let formData = {
                        first_name: vm.first_name,
                        last_name: vm.last_name,
                        address: vm.address,
                        mobile: vm.mobile,
                        gender: vm.gender,
                        email : vm.email,
                        stripeToken : token.id,
                        stripeEmail : token.email
                    };

                    axios.post('/api/form/purchase',formData).then(response => {
                        console.log(response.data.message);
                        if (response.data.message === 'paid success') {

                            let ref = response.data.ref;

                            vm.$store.dispatch('paymentRequest').then(response => {

//                                console.log(vm.first_name, vm.last_name, vm.email, vm.address, ref);

                                vm.$router.push({name: 'summit.success', params:{
                                    first_name: vm.first_name,
                                    last_name: vm.last_name,
                                    email: vm.email,
                                    address: vm.address,
                                    gender: vm.gender,
                                    mobile: vm.mobile,
                                    paymentRef: ref
                                }});
                            }).catch(error => {
                                console.log(error);
                            })
                        }
                        else if(response.data.message === 'failed to charge the card'){
                            alert('!! Failed to charge, reason: ' + response.data.reason + ' No amount is deducted. Please start again!');
                            vm.$router.push({name: 'summit'});
                        }
                        else{
                            alert('Email has been taken, Please use another email.');
                            vm.$router.push({name: 'summit'});
                        }
                    }).catch(error => {
                        console.log("errrrrr: ", error);
                    })
                }
            });
        },

        methods: {

            buy() {

                let vm = this;

                vm.handler.open({
                    name: 'GCC 2018 Summit',
                    description: 'The official purchase channel',
                    currency: 'AUD',
                    amount: 5000
                });
            },

            redirectBack() {
                this.$store.dispatch('unsetEmailRequest').then(response => {
                    this.$router.push({name: 'summit'});
                }).catch(error => {
                    console.log('cannot unset or redirect: ', error);
                })
            },

            redirectForward(){
                this.$router.push({name:'summit.success'})
            },

            loading(){
                this.show = true;
            },

            stop(){
                this.show = false;
            }
        }
    }
</script>