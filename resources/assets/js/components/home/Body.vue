<template>
    <div class="body">
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="shadow">
                        <img class="card-img-top tinted-image" src="./../../../image/summit.png" alt="Card image cap">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">活动报名</h4>
                                <p class="card-text">
                                    荣耀城高峰会2018 <br>
                                    报名参加小组 <br>
                                    报名受洗 <br>
                                </p>
                                <v-btn class="btn btn-dark" style="margin-bottom:17px;" v-b-modal.formRego>报名</v-btn>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="shadow">
                        <img class="card-img-top" src="./../../../image/watchOnline.jpg" alt="Card image cap">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">在线资源</h4>
                                <p class="card-text">
                                    错过了主日？没关系！
                                    在这里，你可以收看及时的证道信息以及各式各样的视频资源?<br>
                                </p>
                                <v-btn href="https://www.youtube.com/user/GloryCityMelbourne" class="btn btn-dark" style="margin-bottom:17px;">收看资讯</v-btn>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="shadow">
                        <img class="card-img-top" src="./../../../image/devotion.jpg" alt="Card image cap">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">每日晨更</h4>
                                <p class="card-text">
                                    从每天的开始，就领受神的话语，更新你的生命 <br>
                                    <b>时间：每天早上6：30-7：00</b><br>
                                </p>
                                <b-btn class="btn btn-dark" style="margin-bottom:17px;" v-b-modal.comming-soon>参与每日晨耕</b-btn>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="shadow">
                        <img class="card-img-top" src="./../../../image/listen.png" alt="Card image cap">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">联系牧者</h4>
                                <p class="card-text">
                                    有什么话，或者建议想要告诉我们牧者吗?<br>
                                </p>
                                <v-btn class="btn btn-dark" style="margin-bottom:17px;" v-b-modal.comming-soon>我有话说</v-btn>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="shadow">
                        <img class="card-img-top" src="./../../../image/BibleStudy.jpg" alt="Card image cap">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">读经计划</h4>
                                <p class="card-text">
                                    这里有各式各样的读经计划 <br>
                                    一起参与我们的40周读经计划，或者全年读经计划吧！<br>
                                </p>
                                <!--<v-btn class="btn btn-dark" style="margin-bottom:17px;" v-b-modal.comming-soon>今日经文</v-btn>-->
                                <a href="https://bible-study.glorycitychurch.com" class="btn btn-dark" style="margin-bottom:17px;">打卡</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-xs-12">
                    <div class="shadow">
                        <img class="card-img-top" src="./../../../image/connecting.jpg" alt="Card image cap">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">People</h4>
                                <p class="card-text">
                                    还没有central hub的帐号吗?<br>
                                    快去问你的小组长吧!<br>
                                </p>
                                <v-btn href="/login" class="btn btn-dark" style="margin-bottom:17px;">进入Hub</v-btn>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <b-modal id="formRego" title="GCC Central Hub">
            <a style="text-decoration: none !important;" href="/summit-2018" target="_blank">Summit 2018</a>
            <br>
            <a style="text-decoration: none !important;" href="/registration/cell-group" target="_blank">Cell groups sign up</a>
            <br>
            <a style="text-decoration: none !important;" href="/registration/baptism" target="_blank">Baptism Sign up</a>
        </b-modal>

        <b-modal id="comming-soon" title="GCC Central Hub">
            <p class="my-4">Functionality comming soon !</p>
        </b-modal>
    </div>
</template>


<script>
    export default{

    }
</script>

<style>

    .card-img-top {
        height:250px;
    }

    .shadow {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .card {
        text-align:center;
        margin: 0 auto 40px;
        float: none;
        background-color: #D9DFE5;
        height: 250px;
    }

    .links > li {
        color: #fff;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

</style>
