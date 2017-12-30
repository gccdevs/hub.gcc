<template>
    <v-content>
        <section>
            <!-- ** New background image added ; height changed to 700 **-->
            <v-parallax v-bind:src="require('./../../../image/background1.jpg')" height="700">
                <v-layout
                        column
                        align-center
                        justify-center>
                    <img src="./../../../image/large-logo.png" alt="logo" height="100">
                    <h1 class="white--text mb-2 display-3 text-xs-center">Limitless</h1>
                    <div class="subheading mb-3 text-xs-center white--text">2018 Conference GCC</div>
                    <v-btn class="blue lighten-2 mt-5" dark large href="/summit-2018/signup">
                        Register Now
                    </v-btn>
                </v-layout>
            </v-parallax>
        </section>

        <!-- ** v-carousel height changed to 100vh ; added v-container and iframe **-->
        <section>
            <v-layout row wrap>
                <v-flex xs12>
                    <v-carousel style="height:100vh" :cycle='false'>
                        <v-carousel-item src="">
                            <v-container id="videoContainer">
                                <iframe src="https://www.youtube.com/embed/e-ORhEE9VVg" frameborder="0" allowfullscreen></iframe>
                            </v-container>
                        </v-carousel-item>

                        <v-carousel-item src="">
                            <v-container id="videoContainer">
                                <iframe src="https://www.youtube.com/embed/eiDiKwbGfIY" frameborder="0" allowfullscreen></iframe>
                            </v-container>
                        </v-carousel-item>
                        <v-carousel-item src="">
                            <v-container id="videoContainer">
                                <iframe src="https://www.youtube.com/embed/e-ORhEE9VVg" frameborder="0" allowfullscreen></iframe>
                            </v-container>
                        </v-carousel-item>
                        <v-carousel-item src="">
                            <v-container id="videoContainer">
                                <iframe src="https://www.youtube.com/embed/eiDiKwbGfIY" frameborder="0" allowfullscreen></iframe>
                            </v-container>
                        </v-carousel-item>
                    </v-carousel>
                </v-flex>
            </v-layout>
        </section>

        <!-- ** New background image added **-->
        <section>
            <v-parallax v-bind:src="require('./../../../image/background1.jpg')" height="600">
                <v-layout column align-center justify-center>
                    <div class="headline white--text mb-3 text-xs-center">Summit 2018</div>
                    <em> Italic subtext</em>
                    <v-btn class="blue lighten-2 mt-5" dark large href="/summit-2018/signup">
                        Register Now
                    </v-btn>
                </v-layout>
            </v-parallax>
        </section>

        <!-- ** Whole Section Changed ; Need to replace placeholder avatar to Speaker head-image **-->
        <section>
            <v-container grid-list-xl fluid offset-xs1 px-5 my-5>
                <v-layout row wrap>
                    <v-flex xs12 sm4 md4>
                        <v-card class="elevation-0 transparent layout justify-center">
                            <v-dialog v-model="modal" max-width="350">
                                <v-avatar slot="activator" style="cursor: pointer" width="100%">
                                    <img src="https://lh3.googleusercontent.com/dB3Dvgf3VIglusoGJAfpNUAANhTXW8K9mvIsiIPkhJUAbAKGKJcEMPTf0mkSexzLM5o=w300">
                                </v-avatar>
                                <v-card>
                                    <v-card-title class="headline">Name</v-card-title>
                                    <v-card-text>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-card>
                        <v-card class="layout justify-center elevation-0 transparent">
                            <v-card-title primary-title>
                                <div>
                                    <h3 class="headline mb-1">Name</h3>
                                    <div>
                                        Org
                                    </div>
                                </div>
                            </v-card-title>
                        </v-card>
                    </v-flex>
                    <v-flex xs12 sm4 md4 >
                        <v-card class="elevation-0 transparent layout justify-center">
                            <v-dialog v-model="modal1" max-width="350" >
                                <v-avatar slot="activator" style="cursor: pointer" width="100%">
                                    <img src="https://lh3.googleusercontent.com/dB3Dvgf3VIglusoGJAfpNUAANhTXW8K9mvIsiIPkhJUAbAKGKJcEMPTf0mkSexzLM5o=w300">
                                </v-avatar>
                                <v-card>
                                    <v-card-title class="headline">Name</v-card-title>
                                    <v-card-text>Intros</v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-card>
                        <v-card class="layout justify-center elevation-0 transparent">
                            <v-card-title primary-title>
                                <div>
                                    <h3 class="headline mb-1">Name</h3>
                                    <div>
                                        Org
                                    </div>
                                </div>
                            </v-card-title>
                        </v-card>
                    </v-flex>
                    <v-flex xs12 sm4 md4 >
                        <v-card class="elevation-0 transparent layout justify-center">
                            <v-dialog v-model="modal2" max-width="350" >
                                <v-avatar slot="activator" style="cursor: pointer" width="100%">
                                    <img src="https://lh3.googleusercontent.com/dB3Dvgf3VIglusoGJAfpNUAANhTXW8K9mvIsiIPkhJUAbAKGKJcEMPTf0mkSexzLM5o=w300">
                                </v-avatar>
                                <v-card>
                                    <v-card-title class="headline">Name</v-card-title>
                                    <v-card-text>Intros</v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                        </v-card>
                        <v-card class="layout justify-center elevation-0 transparent">
                            <v-card-title primary-title>
                                <div>
                                    <h3 class="headline mb-1">Name</h3>
                                    <div>
                                        Org
                                    </div>
                                </div>
                            </v-card-title>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </section>
        <!-- ** End ** -->

        <section>
            <!-- ** New background image added  **-->
            <v-parallax v-bind:src="require('./../../../image/background1.jpg')" height="600">
                <v-layout column justify-center class="my-5" align-center>
                    <v-flex xs12 sm4 class="my-3">
                        <div class="text-xs-center">
                            <h2 class="headline" style="font-size:24px !important;">Schedule</h2>
                            <span class="subheading">3 days</span>
                        </div>
                    </v-flex>
                    <v-flex xs12>
                        <v-container grid-list-xl>
                            <v-layout row wrap align-center>
                                <v-flex xs12 md4>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-text class="text-xs-center">
                                            <v-icon x-large class="blue--text text--lighten-2" style="color: white !important;">color_lens</v-icon>
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline text-xs-center" style="color: white">Day 1</div>
                                        </v-card-title>
                                        <v-card-text style="color: white">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                                <v-flex xs12 md4>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-text class="text-xs-center">
                                            <v-icon x-large class="blue--text text--lighten-2" style="color: white !important;">flash_on</v-icon>
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline" style="color: white">Day 2</div>
                                        </v-card-title>
                                        <v-card-text style="color: white">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                        </v-card-text>
                                    </v-card>
                                </v-flex>
                                <v-flex xs12 md4>
                                    <v-card class="elevation-0 transparent">
                                        <v-card-text class="text-xs-center">
                                            <v-icon x-large class="blue--text text--lighten-2" style="color: white !important;">build</v-icon>
                                        </v-card-text>
                                        <v-card-title primary-title class="layout justify-center">
                                            <div class="headline text-xs-center" style="color: white">Day 3</div>
                                        </v-card-title>
                                        <v-card-text style="color: white">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
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
            <v-layout row wrap py-4>
                <v-flex xs12>
                    <div id="myMap" ></div>
                </v-flex>
            </v-layout>
        </section>
        <!-- ** End ** -->


        <section>
            <v-container grid-list-xl>
                <v-layout row wrap justify-center class="my-5">
                    <v-flex xs12 sm4>
                    <v-flex xs12 sm4>
                        <img src="./../../../image/gcclogoH1140.png" alt="" height="100">
                        <br><br>
                        <img src="./../../../image/large-logo.png" alt="" height="100">
                    </v-flex>
                    </v-flex>
                    <v-flex xs12 sm4 offset-sm1>
                        <v-card class="elevation-0 transparent">
                            <v-card-title primary-title class="layout justify-center">
                                <div class="headline">Contact us</div>
                            </v-card-title>
                            <v-card-text>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                            </v-card-text>
                            <v-list class="transparent">
                                <v-list-tile>
                                    <v-list-tile-action>
                                        <v-icon class="blue--text text--lighten-2">phone</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>xxx-xxxx-xxxx</v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile>
                                    <v-list-tile-action>
                                        <v-icon class="blue--text text--lighten-2">place</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>458 Swanston Street Carlton</v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                                <v-list-tile>
                                    <v-list-tile-action>
                                        <v-icon class="blue--text text--lighten-2">email</v-icon>
                                    </v-list-tile-action>
                                    <v-list-tile-content>
                                        <v-list-tile-title>customerservice@glorycitychurch.com</v-list-tile-title>
                                    </v-list-tile-content>
                                </v-list-tile>
                            </v-list>
                            <!-- ** Social Media Icon added  **-->
                            <v-layout justify-space-around pt-3>
                                <a><img :src="require('./../../../image/facebook.png')"></a>
                                <a><img :src="require('./../../../image/instagram.png')"></a>
                                <a><img :src="require('./../../../image/wechat.png')"></a>
                            </v-layout>
                            <!-- ** End  **-->
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </section>

        <v-footer class="blue darken-2">
            <v-layout row wrap align-center>
                <v-flex xs12>
                    <div class="white--text ml-3">
                        2017 - 2018 All right reserved @Glory City Church of Melbourne. <a href="/" style="color: white;text-decoration:none;"><b>Central Hub</b></a>
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
            this.map = new google.maps.Map(document.getElementById('myMap'), {
                center: {lng: 144.959833, lat: -37.807449},
                scrollwheel: false,
                zoom:18
            });
            var marker = new google.maps.Marker({
                position: {lng: 144.959833, lat:-37.807449}
            });
            marker.setMap(this.map)
        }

    }

</script>

<!-- ** New Style added for video **-->
<style scoped>

    #myMap {
        height:300px;
        width:100%;
    }
    #videoContainer iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

</style>
