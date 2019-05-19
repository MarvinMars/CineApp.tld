<navbar  inline-template>
<v-navigation-drawer
        clipped
        fixed
        app
        height="80%"
        v-model="drawer"
>
    <v-list dense>
        <v-list-tile>
            <v-list-tile-action>
                <v-icon>fab fa-twitter</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
                <v-list-tile-title>Item1</v-list-tile-title>
            </v-list-tile-content>
        </v-list-tile>
    </v-list>
</v-navigation-drawer>
</navbar>