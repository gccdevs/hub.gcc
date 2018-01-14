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
                        2018 榮耀城領袖高峰會 -- 報名成功！
                    </h2>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="has-text-centered" style="margin-bottom:10%;">
                <br>
                <h1 class="is-size-1" style="color:#1e87e8;"><em class="fa  fa-check-circle fa-3x"></em></h1>
                <br>
                <div class="box">
                    <p style="display: inline;"><b>姓名: </b></p><p style="display: inline;" v-text="this.first_name + ' ' + this.last_name "></p>
                    <br>
                    <p style="display: inline;"><b>付款憑證: </b></p><p style="display: inline;" v-text="this.paymentRef"></p>
                    <br>
                    <p style="display: inline;"><b>郵箱: </b></p><p style="display: inline;" v-text="this.email"></p>
                    <br>
                    <p style="display: inline;"><b>性别: </b></p><p style="display: inline;" v-text="this.gender === 'male' ? '男性' : '女性'"></p>
                    <br>
                    <p style="display: inline;"><b>第一次參加: </b></p><p style="display: inline;" v-text="this.firstTime"></p>
                    <br>
                    <p style="display: inline;"><b>电话號碼: </b></p><p style="display: inline;" v-text="this.mobile"></p>
                    <br>
                    <!--<p style="display: inline;"><b>从何知道: </b></p><p style="display: inline;" v-text="this.path"></p>-->
                </div>
                <h4>確認郵件已發送到：</h4> <br><b class="is-size-3"> {{ this.email }}</b>
                <br><br>
                <h6 class="is-size-6">如未收到，請聯繫 <br><a href="mailto:customerservice@glorycitychurch.com">customerservice@glorycitychurch.com</a> </h6>
                <br>
                <div class="columns" id="links">
                    <a class="column is-outline-info" style="text-decoration: none" href="https://www.facebook.com/GloryCityChurch/"><em class="fa fa-facebook"></em> Facebook</a>&nbsp;
                    <a class="column is-outline-info" style="text-decoration: none" href="https://www.instagram.com/glorycitychurch_mel/"><em class="fa fa-instagram"></em> Instagram</a>&nbsp;
                    <a class="column is-outline-info" style="text-decoration: none" href="https://centralhub.glorycitychurch.com/summit-2018"><em class="fa fa-info"></em> Summit 2018</a>&nbsp;
                </div>
            </div>
        </div>
    </div>
</template>


<script>

    export default {

        props:['email','first_name','last_name','mobile','gender', 'paymentRef', 'firstTime','path'],

    }

</script>

<style>
    #links a:hover {
        background-color: #1e87e8 !important;
        color:white !important;
    }
</style>

<style src="./../../../../../public/css/bulma-0.6.1/css/bulma.css"></style>
