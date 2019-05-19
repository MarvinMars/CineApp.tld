<toolbar inline-template>
    <v-toolbar
            dark
            app
            clipped-left
            fixed
    >
        <v-toolbar-title>
            <v-toolbar-side-icon @click="switchDrawer"></v-toolbar-side-icon>
            <span class="hidden-sm-and-down">{{env('APP_NAME')}}</span>
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn icon>
            <v-icon>search</v-icon>
        </v-btn>
        <v-btn icon>
            <v-icon>apps</v-icon>
        </v-btn>
        <v-btn icon>
            <v-icon>notifications</v-icon>
        </v-btn>
        <v-btn icon large>
            <v-avatar size="32px" tile>
                <img src="/img/now-logo.png" alt="">
            </v-avatar>
        </v-btn>
    </v-toolbar>
</toolbar>