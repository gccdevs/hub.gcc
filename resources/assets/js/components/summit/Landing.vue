<template>
    <v-content>
        <section>
          <v-parallax src="http://eskipaper.com/images/galaxy-wallpaper-hd-16.jpg" height="600">
            <v-layout
              column
              align-center
              justify-center
            >
              <img src="./../../../image/small-logo.png" alt="logo" height="100">
              <h1 class="white--text mb-2 display-3 text-xs-center">Limitless</h1>
              <div class="subheading mb-3 text-xs-center white--text">2018 Conference GCC</div>
              <router-link
                class="blue lighten-2 mt-5"
                dark
                large
                :to="{ name:'summit.signup' }"
                tag="a"
              >
                Register Now
              </router-link>
            </v-layout>
          </v-parallax>
        </section>

        <section>
          <v-layout row wrap>
            <v-flex xs12>
           
              <v-carousel style="height:95vh" :cycle='false'>
                <v-carousel-item>
                  <youtube :video-id="videoId" @ready="ready" @ended="ended" player-width="1570" player-height="710" :player-vars="{autoplay:0, controls: 1, modestbranding:1, showinfo:0, rel:0 }"></youtube>
                </v-carousel-item>
                <v-carousel-item>
                  <youtube :video-id="videoId1" @ready="ready" @ended="ended" player-width="1570" player-height="710" :player-vars="{autoplay:0, controls: 1, modestbranding:1, showinfo:0, rel:0 }"></youtube>
                </v-carousel-item>
                <v-carousel-item>
                  <youtube :video-id="videoId2" @ready="ready" @ended="ended" player-width="1570" player-height="710" :player-vars="{autoplay:0, controls: 1, modestbranding:1, showinfo:0, rel:0 }"></youtube>
                </v-carousel-item>
                <v-carousel-item>
                  <youtube :video-id="videoId3" @ready="ready" @ended="ended" player-width="1570" player-height="710" :player-vars="{autoplay:0, controls: 1, modestbranding:1, showinfo:0, rel:0 }"></youtube>
                </v-carousel-item>
              </v-carousel>
         
            </v-flex>
          </v-layout>
        </section>

        <section>
          <v-parallax src="http://www.technocrazed.com/wp-content/uploads/2015/11/HD-Galaxy-Wallpapers-Free-Download-115.jpg" height="600">
            <v-layout column align-center justify-center>
              <div class="headline white--text mb-3 text-xs-center">Summit 2018</div>
              <em> Italic subtext</em>
              <v-btn
                class="blue lighten-2 mt-5"
                dark
                large
                href=""
              >
                Register Now
              </v-btn>
            </v-layout>
          </v-parallax>
        </section>

        <section>
          <v-container grid-list-xl fluid>
            <v-layout row wrap>
              <v-flex xs12 sm4 md4>
                <v-card hover>
                  <v-card-media src="https://www.adjust.com/new-assets/images/site-images/interface/user.svg" height="290">
                  </v-card-media>
                  <v-card-title primary-title>
                    <div>
                      <h3 class="headline mb-1">Name</h3>
                        <div>
                          Intro
                        </div>
                    </div>
                  </v-card-title>
                </v-card>
              </v-flex>
              <v-flex xs12 sm4 md4>
                <v-card hover>
                  <v-card-media src="https://www.adjust.com/new-assets/images/site-images/interface/user.svg" height="290">
                  </v-card-media>
                  <v-card-title primary-title>
                    <div>
                      <h3 class="headline mb-1">Name</h3>
                        <div>
                          Intro
                        </div>
                    </div>
                  </v-card-title>
                </v-card>
              </v-flex>
              <v-flex xs12 sm4 md4>
                <v-card hover>
                  <v-card-media src="https://www.adjust.com/new-assets/images/site-images/interface/user.svg" height="290">
                  </v-card-media>
                  <v-card-title primary-title>
                    <div>
                      <h3 class="headline mb-1">Name</h3>
                        <div>
                          Intro
                        </div>
                    </div>
                  </v-card-title>
                </v-card>
              </v-flex>
            </v-layout>
            <v-layout row wrap>
              <v-flex xs12 sm4 md4>
                <v-card hover>
                  <v-card-media src="https://www.adjust.com/new-assets/images/site-images/interface/user.svg" height="290">
                  </v-card-media>
                  <v-card-title primary-title>
                    <div>
                      <h3 class="headline mb-1">Name</h3>
                        <div>
                          Intro
                        </div>
                    </div>
                  </v-card-title>
                </v-card>
              </v-flex>
              <v-flex xs12 sm4 md4>
                <v-card hover>
                  <v-card-media src="https://www.adjust.com/new-assets/images/site-images/interface/user.svg" height="290">
                  </v-card-media>
                  <v-card-title primary-title>
                    <div>
                      <h3 class="headline mb-1">Name</h3>
                        <div>
                          Intro
                        </div>
                    </div>
                  </v-card-title>
                </v-card>
              </v-flex>
              <v-flex xs12 sm4 md4>
                <v-card hover>
                  <v-card-media src="https://www.adjust.com/new-assets/images/site-images/interface/user.svg" height="290">
                  </v-card-media>
                  <v-card-title primary-title>
                    <div>
                      <h3 class="headline mb-1">Name</h3>
                        <div>
                          Intro
                        </div>
                    </div>
                  </v-card-title>
                </v-card>
              </v-flex>
            </v-layout>
          </v-container>
        </section>

        <section>
          <v-parallax src="http://eskipaper.com/images/galaxy-wallpaper-hd-16.jpg" height="600">
          <v-layout
            column
            justify-center
            class="my-5"
            align-center
          >
            <v-flex xs12 sm4 class="my-3">
              <div class="text-xs-center">
                <h2 class="headline">Schedule</h2>
                <span class="subheading">
                  3 days 
                </span>
              </div>
            </v-flex>
            <v-flex xs12>
              <v-container grid-list-xl>
                <v-layout row wrap align-center>
                  <v-flex xs12 md4>
                    <v-card class="elevation-0 transparent">
                      <v-card-text class="text-xs-center">
                        <v-icon x-large class="blue--text text--lighten-2">color_lens</v-icon>
                      </v-card-text>
                      <v-card-title primary-title class="layout justify-center">
                        <div class="headline text-xs-center">Day 1</div>
                      </v-card-title>
                      <v-card-text>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                      </v-card-text>
                    </v-card>
                  </v-flex>
                  <v-flex xs12 md4>
                    <v-card class="elevation-0 transparent">
                      <v-card-text class="text-xs-center">
                        <v-icon x-large class="blue--text text--lighten-2">flash_on</v-icon>
                      </v-card-text>
                      <v-card-title primary-title class="layout justify-center">
                        <div class="headline">Day 2</div>
                      </v-card-title>
                      <v-card-text>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                      </v-card-text>
                    </v-card>
                  </v-flex>
                  <v-flex xs12 md4>
                    <v-card class="elevation-0 transparent">
                      <v-card-text class="text-xs-center">
                        <v-icon x-large class="blue--text text--lighten-2">build</v-icon>
                      </v-card-text>
                      <v-card-title primary-title class="layout justify-center">
                        <div class="headline text-xs-center">Day 3</div>
                      </v-card-title>
                      <v-card-text>
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

<!--         <section>
          <v-layout column
            wrap
            class="my-5"
            align-center>
            <v-flex xs12 md12>
              <v-container grid-list-xl>
                <v-layout row wrap align-center>
                  <v-flex xs12 md6>
                    <v-dialog v-model="modal" max-width="350"> 
                        <v-avatar slot="activator" style="cursor: pointer" size="150px">
                          <img src="https://lh3.googleusercontent.com/dB3Dvgf3VIglusoGJAfpNUAANhTXW8K9mvIsiIPkhJUAbAKGKJcEMPTf0mkSexzLM5o=w300">
                        </v-avatar>
                      <v-card>
                        <v-card-title class="headline">Name?</v-card-title>
                        <v-card-text>Intros</v-card-text>
                        <v-card-actions>
                          <v-spacer></v-spacer>
                        </v-card-actions>
                      </v-card>
                    </v-dialog>
                  </v-flex>
                  <v-flex xs12 md6>
                    <v-dialog v-model="modal" max-width="350"> 
                        <v-avatar slot="activator" style="cursor: pointer" size="150px">
                          <img src="https://lh3.googleusercontent.com/dB3Dvgf3VIglusoGJAfpNUAANhTXW8K9mvIsiIPkhJUAbAKGKJcEMPTf0mkSexzLM5o=w300">
                        </v-avatar>
                      <v-card>
                        <v-card-title class="headline">Name?</v-card-title>
                        <v-card-text>Intros</v-card-text>
                        <v-card-actions>
                          <v-spacer></v-spacer>
                        </v-card-actions>
                      </v-card>
                    </v-dialog>
                  </v-flex>
                </v-layout>
              </v-container>
            </v-flex>
          </v-layout>
        </section> -->

        <section>
          <v-container grid-list-xl>
            <v-layout row wrap justify-center class="my-5">
              <v-flex xs12 sm4>
                <v-card>
                  <div id="myMap"></div>
                </v-card>
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
                        <v-list-tile-title>Melb, VIC</v-list-tile-title>
                      </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile>
                      <v-list-tile-action>
                        <v-icon class="blue--text text--lighten-2">email</v-icon>
                      </v-list-tile-action>
                      <v-list-tile-content>
                        <v-list-tile-title>contact@glorycity.com</v-list-tile-title>
                      </v-list-tile-content>
                    </v-list-tile>
                  </v-list>
                </v-card>
              </v-flex>
            </v-layout>
          </v-container>
        </section>

        <v-footer class="blue darken-2">
          <v-layout row wrap align-center>
            <v-flex xs12>
              <div class="white--text ml-3">
                2017 - 2018
              </div>
            </v-flex>
          </v-layout>
        </v-footer>
      </v-content>
</template>

<script>
  import Vue from 'vue'
  import VueYouTubeEmbed from 'vue-youtube-embed'
  Vue.use(VueYouTubeEmbed);

  export default {
    data () {
      return {
          modal: false,
          videoId: 'eiDiKwbGfIY',
          videoId1: 'eiDiKwbGfIY',
          videoId2: 'eiDiKwbGfIY',
          videoId3: 'eiDiKwbGfIY',
          videoLaunched: false,
          videoLoaded: false,
          videoRewatch: false,
          videoEnded: false,
          }
      },
      computed: {
        videoThumb: function() {
          return 'https://img.youtube.com/vi/' + this.videoId + '/maxresdefault.jpg';
        }
      },
      methods: {
        launchVideo() {
          this.videoLaunched = true;
          this.player.playVideo();
      },
        ready(player) {
          this.player = player;
          this.videoLoaded = true;
      },
        ended() {
      }
    },
      mounted: function (){
        console.log("map: ", google.maps)
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

<style scoped>
  #myMap {
    height:300px;
    width:100%;
  }
</style>
