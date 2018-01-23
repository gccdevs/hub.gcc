<template>
    <v-content>
        <section>
            <!-- ** New background image added ; height changed to 700 **-->
            <!-- ** New stuff/Changes **-->
            <v-parallax v-bind:src="require('./../../../image/landingpage1.png')" height="700">
                <!-- ** New stuff/Changes **-->
                <v-layout
                        column
                        align-center
                        justify-center
                >
                    <!-- ** New stuff/Changes **-->
                    <img src="./../../../image/landing-page.png" alt="logo" height="400">
                    <!-- ** New stuff/Changes **-->
                    <em>「我靠著那加給我力量的，凡事都能做。」- 腓立比書 4:13</em>

                    <v-btn
                            class="blue lighten-2 mt-5"
                            dark
                            large
                            href="/summit-2018/signup"
                    >
                        線上報名
                    </v-btn>
                    <em>早鳥價截止日期： 2018年2月18號</em>
                </v-layout>
            </v-parallax>
        </section>

        <!-- ** v-carousel height changed to 100vh ; added v-container and iframe **-->
        <section>
            <v-layout wrap>
                <v-flex xs12>
                    <v-carousel style="height:90vh" :cycle='false' >
                        <v-carousel-item src="" class="youtubeBanner">
                            <v-container id="videoContainer">
                                <iframe width="560" height="215" src="https://www.youtube.com/embed/lIcBO2wrd6A" frameborder="0" allowfullscreen></iframe>
                            </v-container>
                        </v-carousel-item>
                        <!--<v-carousel-item src="">-->
                            <!--<v-container id="videoContainer">-->
                                <!--<iframe width="560" height="315" src="https://www.youtube.com/embed/eiDiKwbGfIY" frameborder="0" allowfullscreen></iframe>-->
                            <!--</v-container>-->
                        <!--</v-carousel-item>-->
                        <!--<v-carousel-item src="">-->
                            <!--<v-container id="videoContainer">-->
                                <!--<iframe width="560" height="315" src="https://www.youtube.com/embed/e-ORhEE9VVg" frameborder="0" allowfullscreen></iframe>-->
                            <!--</v-container>-->
                        <!--</v-carousel-item>-->
                        <!--<v-carousel-item src="">-->
                            <!--<v-container id="videoContainer">-->
                                <!--<iframe width="560" height="315" src="https://www.youtube.com/embed/eiDiKwbGfIY" frameborder="0" allowfullscreen></iframe>-->
                            <!--</v-container>-->
                        <!--</v-carousel-item>-->
                    </v-carousel>
                </v-flex>
            </v-layout>
        </section>

        <!-- ** New background image added **-->
        <section>
            <!-- ** New stuff/Changes **-->
            <v-parallax v-bind:src="require('./../../../image/landingpage2.png')" height="600">
                <!-- ** New stuff/Changes **-->
                <v-layout column align-center justify-center>
                    <em>發掘出個人的潛力</em>
                    <em>啟發個人的夢想與異象</em>
                    <em>提升個人軟實力</em>
                    <em>看見機會成為神國的使者，福音的勇士</em>
                    <v-btn
                            class="blue lighten-2 mt-5"
                            dark
                            large
                            href="/summit-2018/signup"
                    >
                        線上報名
                    </v-btn>
                    <em>早鳥價截止日期： 2018年2月18號</em>
                </v-layout>
            </v-parallax>
        </section>

        <!-- ** Whole Section Changed ; Need to replace placeholder avatar to Speaker head-image **-->
        <section>
            <!--<v-container grid-list-xl fluid offset-xs1 ml-5 px-5 mx-5 my-5 v-cloak>-->
                <v-layout wrap px-5 my-5 fluid>
                    <v-flex xs12 sm4 md4 pl-3>
                        <v-card class="elevation-0 transparent layout justify-center pt-5 px-5">
                            <v-dialog v-model="modal" max-width="350">
                                <v-avatar slot="activator" v-cloak style="cursor: pointer;">
                                    <img src="./../../../image/GC_Pastor.png">
                                </v-avatar>
                                <v-card class="pt-3">
                                    <img src="./../../../image/GC_Pastor.png" style="max-width:150px; max-height:150px; position:relative; left:28%;">
                                    <v-card-title class="headline justify-center">黃福國 牧師</v-card-title>
                                    <v-card-text class="layout justify-center">
                                        美國維吉尼亞軍校資訊系<br>
                                        靈糧教牧宣教神學院<br>
                                        美國聯邦大學教牧博士</v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-card>
                        <v-card class="layout justify-center elevation-0 transparent">
                            <v-card-title primary-title>
                                <div class="ml-3">
                                    <h3 class="headline mb-1">黃福國 牧師</h3>
                                    <div>
                                        榮耀城靈糧堂
                                    </div>
                                </div>
                            </v-card-title>
                        </v-card>
                    </v-flex>
                    <v-flex xs12 sm4 md4 pl-3>
                        <v-card class="elevation-0 transparent layout justify-center pt-5 px-5">
                            <v-dialog v-model="modal1" max-width="350">
                                <v-avatar slot="activator" v-cloak style="cursor: pointer;">
                                    <img src="./../../../image/GC_Pastor2.png">
                                </v-avatar>
                                <v-card class="pt-3">
                                    <img src="./../../../image/GC_Pastor2.png" style="max-width:150px; max-height:150px; position:relative; left:28%;">
                                    <v-card-title class="headline justify-center">王翠如 牧師</v-card-title>
                                    <v-card-text class="layout justify-center">台北基督學院大傳系<br>
                                        靈糧教牧宣教神學院
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-card>
                        <v-card class="layout justify-center elevation-0 transparent">
                            <v-card-title primary-title>
                                <div class="ml-3">
                                    <h3 class="headline mb-1">王翠如 牧師</h3>
                                    <div>
                                        榮耀城靈糧堂
                                    </div>
                                </div>
                            </v-card-title>
                        </v-card>
                    </v-flex>
                    <v-flex xs12 sm4 md4 pl-3>
                        <v-card class="elevation-0 transparent layout justify-center pt-5 px-5">
                            <v-dialog v-model="modal2" max-width="350" >
                                <v-avatar slot="activator" v-cloak style="cursor: pointer;">
                                    <img src="./../../../image/Joseph.png">
                                </v-avatar>
                                <v-card class="pt-3">
                                    <img src="./../../../image/Joseph.png" style="max-width:150px; max-height:150px; position:relative; left:28%;">
                                    <v-card-title class="headline justify-center">陳敬恩 牧師</v-card-title>
                                    <v-card-text class="layout justify-center">Glory City Church 榮耀城教會 創辦人 & 主任牧師<br>
                                        Lion Heart Coaching 獅子心領導力 創始人 & 總經理
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-card>
                        <v-card class="layout justify-center elevation-0 transparent">
                            <v-card-title primary-title>
                                <div class="ml-3">
                                    <h3 class="headline mb-1">陳敬恩 牧師</h3>
                                    <div>
                                        Glory City Church 榮耀城教會
                                    </div>
                                </div>
                            </v-card-title>
                        </v-card>
                    </v-flex>
                    <v-flex xs12 sm4 md4 pl-3>
                        <v-card class="elevation-0 transparent layout justify-center pt-5 px-5">
                            <v-dialog v-model="modal3" max-width="350" >
                                <v-avatar slot="activator" v-cloak style="cursor: pointer;">
                                    <img src="./../../../image/Phillip_Gai.png">
                                </v-avatar>
                                <v-card class="pt-3">
                                    <img src="./../../../image/Phillip_Gai.png" style="max-width:150px; max-height:150px; position:relative; left:28%;">
                                    <v-card-title class="headline justify-center">Philip Gai</v-card-title>
                                    <v-card-text class="layout justify-center">Compassion Australia 公關主任<br>
                                        One Living Church International Inc 資深領袖顧問</v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-card>
                        <v-card class="layout justify-center elevation-0 transparent">
                            <v-card-title primary-title>
                                <div class="ml-3">
                                    <h3 class="headline mb-1">Philip Gai</h3>
                                    <div>
                                        Compassion Australia
                                    </div>
                                </div>
                            </v-card-title>
                        </v-card>
                    </v-flex>
                    <v-flex xs12 sm4 md4>
                        <v-card class="elevation-0 transparent layout justify-center pt-5 px-5">
                            <v-dialog v-model="modal4" max-width="350" >
                                <v-avatar slot="activator" v-cloak style="cursor: pointer;">
                                    <img src="./../../../image/Shelly_Boon.png">
                                </v-avatar>
                                <v-card class="pt-3">
                                    <img src="./../../../image/Shelly_Boon.png" style="max-width:150px; max-height:150px; position:relative; left:28%;">
                                    <v-card-title class="headline justify-center">Shirley Boon</v-card-title>
                                    <v-card-text class="layout justify-center">前 CHC KL 華人部牧師<br>
                                        社會創新啟發家 / Social Innovator
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-card>
                        <v-card class="layout justify-center elevation-0 transparent">
                            <v-card-title primary-title>
                                <div class="ml-3">
                                    <h3 class="headline mb-1">Shirley Boon</h3>
                                    <div>
                                        社會創新啟發家
                                    </div>
                                </div>
                            </v-card-title>
                        </v-card>
                    </v-flex>
                    <v-flex xs12 sm4 md4 pl-3>
                        <v-card class="elevation-0 transparent layout justify-center pt-5 px-5">
                            <v-dialog v-model="modal5" max-width="350" >
                                <v-avatar slot="activator" v-cloak style="cursor: pointer;">
                                    <img src="./../../../image/Torch_Speaker2.png">
                                </v-avatar>
                                <v-card class="pt-3">
                                    <img src="./../../../image/Torch_Speaker2.png" style="max-width:150px; max-height:150px; position:relative; left:28%;">
                                    <v-card-title class="headline justify-center">吳永成 牧師</v-card-title>
                                    <v-card-text class="layout justify-center">現為火把行道會牧師及區牧，主要負責職場服事<br>
                                        畢業於臺灣大學電機研究所碩士、恩惠神學院。
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-card>
                        <v-card class="layout justify-center elevation-0 transparent">
                            <v-card-title primary-title>
                                <div class="ml-3">
                                    <h3 class="headline mb-1">吳永成 牧師</h3>
                                    <div>
                                        火把教會
                                    </div>
                                </div>
                            </v-card-title>
                        </v-card>
                    </v-flex>
                </v-layout>
        </section>
        <!-- ** End ** -->

        <section>
            <!-- ** New background image added  **-->
            <v-parallax v-bind:src="require('./../../../image/landingpage2.png')" height="1000">
                <v-layout
                        row
                        justify-center

                        align-center
                >
                    <v-flex xs12>
                        <v-container grid-list-xl>
                            <div class="headline white--text mb-3 text-xs-center">活動流程</div>
                            <v-layout row wrap align-top>
                                <v-flex xs6 md3>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline text-xs-center white--text">Day 1</div>
                                        </v-card-title>
                                        <v-card-text >
                                            <v-list class="transparent">
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>18:00報到</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>18:30開放入場</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>19:00敬拜讚美</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>19:30歡迎</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>20:00 Session 1</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>22:00 Finish</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                            </v-list>
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                                <v-flex xs6 md3>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline text-xs-center white--text">Day 2</div>
                                        </v-card-title>
                                        <v-card-text >
                                            <v-list class="transparent">
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>18:30開放入場</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>19:00敬拜讚美</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>19:30歡迎</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>20:00 Session 2</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>22:00 Finish</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                            </v-list>
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                                <v-flex xs6 md3>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline text-xs-center white--text">Day 3</div>
                                        </v-card-title>
                                        <v-card-text >
                                            <v-list class="transparent">
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>9:00 開放入場</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>9:30 敬拜讚美</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>10:00 Session 3</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>11:00 Session 4</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>12:00 午餐時間</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>13:30 敬拜讚美</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                            </v-list>
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                                <v-flex xs6 md3>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline text-xs-center white--text">Day 3 Continue</div>
                                        </v-card-title>
                                        <v-card-text >
                                            <v-list class="transparent">
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>14:00 Session 5</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>15:30 Session 6</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>16:30 let’s talk</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>17:30晚餐時間</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>19:00敬拜讚美</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>20:00 Session7</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                                <v-list-tile class="layout justify-center">
                                                    <v-list-tile-content class="white--text">
                                                        <v-list-tile-title>22:00 Finish</v-list-tile-title>
                                                    </v-list-tile-content>
                                                </v-list-tile>
                                            </v-list>
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-flex>
                </v-layout>
            </v-parallax>
        </section>

        <!-- ** New Section added just for Google Map **-->
        <section mx-0>
            <v-layout wrap py-4>
                <v-flex xs12>
                    <div id="myMap" ></div>
                </v-flex>
            </v-layout>
        </section>
        <!-- ** End ** -->


        <section>
            <v-container grid-list-xl>
                <v-layout row wrap justify-center class="my-5">
                    <v-flex xs12 md6 sm6>
                        <v-card class="elevation-0 transparent">
                            <v-card-title primary-title class="layout justify-center">
                                <div class="headline">Contact us</div>
                            </v-card-title>
                            <v-list class="transparent ">
                                <!--<v-list-tile>-->
                                    <!--<v-list-tile-action>-->
                                        <!--<v-icon class="blue&#45;&#45;text text&#45;&#45;lighten-2">phone</v-icon>-->
                                    <!--</v-list-tile-action>-->
                                    <!--<v-list-tile-content>-->
                                        <!--<v-list-tile-title>xxx-xxxx-xxxx</v-list-tile-title>-->
                                    <!--</v-list-tile-content>-->
                                <!--</v-list-tile>-->
                                <v-list-tile>
                                    <v-list-tile-action>
                                        <v-icon class="blue--text text--lighten-2">place</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>To be confirmed</v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile>
                                    <v-list-tile-action>
                                        <a href="mailto:customerservice@glorycitychurch.com"><v-icon class="blue--text text--lighten-2">email</v-icon></a>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <a href="mailto:customerservice@glorycitychurch.com"><v-list-tile-title>Customer Service</v-list-tile-title></a>
                                    </v-list-tile-content>
                                </v-list-tile>
                            </v-list>
                            <!-- ** Social Media Icon added  **-->
                            <v-layout justify-space-around pt-3>
                                <a href="https://www.facebook.com/GloryCityChurch/"><img :src="require('./../../../image/facebook.png')"></a>
                                <a href="https://www.instagram.com/glorycitychurch_mel/"><img :src="require('./../../../image/Instagram.png')"></a>
                                <a href="https://glorycitychurch.com/%E5%BE%AE%E4%BF%A1%E5%85%AC%E7%9C%BE%E8%99%9F/"><img :src="require('./../../../image/wechat.png')"></a>
                            </v-layout>
                            <!-- ** End  **-->
                        </v-card>
                    </v-flex>
                    <v-flex xs12 md6 sm6 class="layout justify-space-around">
                        <img class="px-2" src="./../../../image/gcclogoH1140.png" height="100">
                        <img src="./../../../image/summitlogo.png" height="100">
                    </v-flex>
                </v-layout>
            </v-container>
        </section>

        <v-footer class="blue darken-2">
            <v-layout row wrap align-center>
                <v-flex xs12>
                    <div class="white--text ml-3 text-center">
                        2018 All right reserved @Glory City Church of Melbourne.
                    </div>
                </v-flex>
            </v-layout>
        </v-footer>
    </v-content>
</template>

<!-- ** Deleted all Vue-Youtube-Embeded Related Stuff ; modal(s) added for pop up window for Speaker head-image**-->
<script>
    export default {
        data () {
            return {
                modal: false,
                modal1: false,
                modal2: false,
                modal3: false,
                modal4: false,
                modal5: false
            }
        },
        mounted: function (){
//            console.log("map: ", google.maps)
            this.map = new google.maps.Map(document.getElementById('myMap'), {
                center: {lng: 144.9633171, lat: -37.8061211},
                scrollwheel: false,
                zoom:18
            });
            var marker = new google.maps.Marker({
                position: {lng: 144.9633171, lat:-37.8061211}
            });
            marker.setMap(this.map)
        }
    }
</script>

<!-- ** New Style added for video **-->
<style scoped>
    .avatar{
        width:150px!important;
        height:150px!important;
    }
    #myMap {
        height:300px;
        width:100%;
    }
    #videoContainer{
        position: relative;
        padding-bottom: 56.25%; /* 16:9 */
        padding-top: 25px;
        height: 0;
    }
    #videoContainer iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .youtubeBanner {
        background-image: url("./../../../image/youtubeBK.png") !important;
        width:inherit !important;
    }
</style>
