<template>
    <v-app id="inspire" dark>
        <v-navigation-drawer
                v-model="drawer"
                app
                fixed
                clipped
                hide-overlay
                class="menu-mr"
        >
          <menu-navbar></menu-navbar>
        </v-navigation-drawer>
        <v-toolbar
                class="toolbar-mr"
                dense
                fixed
                clipped-left
                app>
            <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
            <v-icon class="mx-3">fab fa-youtube</v-icon>
            <v-toolbar-title class="mr-5 align-center">
                <span class="title">CinePack</span>
            </v-toolbar-title>
            <v-spacer></v-spacer>

            <v-btn icon>
                <v-icon>search</v-icon>
            </v-btn>

            <v-btn icon>
                <v-icon>apps</v-icon>
            </v-btn>

            <v-btn icon>
                <v-icon>refresh</v-icon>
            </v-btn>
            <v-list-tile-avatar>
                <img :src="`https://randomuser.me/api/portraits/men/58.jpg`" alt="">
            </v-list-tile-avatar>
        </v-toolbar>
        <v-content>
            <feed></feed>
        </v-content>
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            drawer: true,
            items: [
                { icon: 'trending_up', text: 'Most Popular' },
                { icon: 'subscriptions', text: 'Subscriptions' },
                { icon: 'history', text: 'History' },
                { icon: 'featured_play_list', text: 'Playlists' },
                { icon: 'watch_later', text: 'Watch Later' }
            ],
            items2: [
                { picture: 28, text: 'Joseph' },
                { picture: 38, text: 'Apple' },
                { picture: 48, text: 'Xbox Ahoy' },
                { picture: 58, text: 'Nokia' },
                { picture: 78, text: 'MKBHD' }
            ]
        }),
        props: {
            source: String
        }
    }
</script>
