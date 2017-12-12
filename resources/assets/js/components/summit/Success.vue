<template>
    <div>
        <div class="container has-text-centered" style="margin-bottom:10%;">

            <section class="hero is-primary is-bold">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title has-text-left" >
                            无可限量 Limitless 2018
                        </h1>
                        <h2 class="subtitle has-text-left">
                            墨尔本荣耀城高峰会 -- 报名成功！
                        </h2>
                    </div>
                </div>
            </section>
            <br>
            <h1 class="is-size-1" style="color:#00cba9;"><em class="fa  fa-check-circle fa-3x"></em></h1>
            <br>
            <div class="box">
                <p style="display: inline;"><b>姓名: </b></p><p style="display: inline;" v-text="this.name"></p>
                <br>
                <p style="display: inline;"><b>付款凭证: </b></p><p style="display: inline;" v-text="this.paymentRef"></p>
                <br>
                <p style="display: inline;"><b>Email: </b></p><p style="display: inline;" v-text="this.email"></p>
                <br>
                <p style="display: inline;"><b>性别: </b></p><p style="display: inline;" v-text="this.gender"></p>
                <br>
                <p style="display: inline;"><b>第一次参加: </b></p><p style="display: inline;" v-text="this.firstTime"></p>
                <br>
                <p style="display: inline;"><b>电话: </b></p><p style="display: inline;" v-text="this.mobile"></p>
                <br>
                <p style="display: inline;"><b>地址: </b></p><p style="display: inline;" v-text="this.address"></p>
                <br>
                <p style="display: inline;"><b>从何知道: </b></p><p style="display: inline;" v-text="this.path"></p>
            </div>
            <h3 class="is-size-3">支付成功邮件已发送到： {{ this.email }}</h3>
            <br>
            <h6 class="is-size-6">如未收到，请联系 <a href="mailto:customerservice@glorycitychurch.com">customerservice@glorycitychurch.com</a> </h6>
            <br>
            <a class="button is-primary is-bold is-large" href="/">了解更多</a>
        </div>
    </div>
</template>


<script>

    export default {

        props:['email','name','address','mobile','gender', 'paymentRef', 'firstTime','path'],

    }

</script>