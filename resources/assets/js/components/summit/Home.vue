<template>
    <v-app>

        <v-navigation-drawer temporary absolute v-model="sidebar">
            <v-list>
                <v-list-tile
                        v-for="item in menuItems"
                        :key="item.title"
                        :to="item.path"
                        exact>
                    <v-list-tile-action>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>{{ item.title }}</v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>

        <v-toolbar fixed>
      <span class="hidden-sm-and-up">
        <v-toolbar-side-icon @click.stop="sidebar = !sidebar">
        </v-toolbar-side-icon>
      </span>
            <v-toolbar-title>
                <a href="/summit-2018" tag="span" style="cursor: pointer;color:black;text-decoration: none;">
                    <v-avatar :tile='true'>
                        <img src="./../../../image/small-logo.png">
                    </v-avatar>
                    &nbsp{{ appTitle }}
                </a>
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-xs-only">
                <v-btn
                        flat
                        v-for="item in menuItems"
                        :key="item.title"
                        :to="item.path"
                        exact>
                    <v-icon left>{{ item.icon }}</v-icon>
                    {{ item.title }}
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <main>
            <v-container fluid style="padding: 0px !important;">
                <router-view></router-view>
            </v-container>
        </main>

    </v-app>
</template>

<script>

    export default {

        data () {
            return {

                appTitle: '榮耀城領袖高峰會',

                sidebar: false,

                menuItems: [
//                    { title: 'Home', path: '/summit-2018' },
//                    { title: 'Home', path: '/summit-2018', icon: 'home' },
//                    { title: 'Register Now', path: '/summit-2018/signup' },
                    { title: '報名', path: '/summit-2018/signup', icon: 'mode_edit' },
                ]
            }
        }
    }
</script>

<style lang="stylus">
    @import './stylus/main.styl';
</style>
