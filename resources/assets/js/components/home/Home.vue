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
                <v-btn class="btn btn-light" v-b-modal.comming-soon>Giving</v-btn>
            </div>
            <br><br>
        </div>

        <b-modal id="giving" title="GCC Central Hub">
            <stripe></stripe>
        </b-modal>

        <home-body></home-body>
        <home-footer></home-footer>
    </div>
</template>

<script>

    import HomeBody from './Body'
    import HomeFooter from './Footer'

    export default{

        components:{
            HomeBody,
            HomeFooter
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