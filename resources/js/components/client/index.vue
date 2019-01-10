<template>
    <v-app id="inspire" dark>
        <v-navigation-drawer
                v-model="drawer"
                app
                fixed
                clipped
                hide-overlay
                class="menu-mr"
                height="90%"
        >
            <v-list dense v-if="menus">
                <router-link to="/">
                    <v-list-tile @click="">
                        <v-list-tile-action>
                            <v-icon>home</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                Home
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </router-link>
                <router-link to="/client/profile">
                    <v-list-tile @click="">
                        <v-list-tile-action>
                            <v-icon>face</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                Profile
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </router-link>
                <v-subheader
                        class="mt-3 white--text text--darken-1"
                        color="white"
                        v-if="friends"
                >FRIENDS</v-subheader>
                <v-list>
                    <v-list-tile v-for="friend in friends" :key="item.text" avatar @click="">
                        <v-list-tile-avatar>
                            <img :src="`https://randomuser.me/api/portraits/men/${friend.id}.jpg`" alt="">
                        </v-list-tile-avatar>
                        <v-list-tile-title v-text="friend.name"></v-list-tile-title>
                    </v-list-tile>
                </v-list>
                <v-list-tile class="mt-3" @click="">
                    <v-list-tile-action>
                        <v-icon color="white darken-1">add_circle_outline</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="white--text text--darken-1">Browse Channels</v-list-tile-title>
                </v-list-tile>
                <v-list-tile @click="">
                    <v-list-tile-action>
                        <v-icon color="white darken-1">settings</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="white--text text--darken-1" >Manage Subscriptions</v-list-tile-title>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <v-toolbar
                class="toolbar-mr"
                dense
                fixed
                clipped-left
                app>
            <v-toolbar-side-icon @click.stop="drawer = !drawer" class="gradient" ></v-toolbar-side-icon>
            <router-link to="/">
                <v-toolbar-title class="mr-5 align-center">
                    <span class="title">CinePack</span>
                </v-toolbar-title>
            </router-link>
            <v-spacer></v-spacer>

            <v-btn icon class="gradient">
                <v-icon>search</v-icon>
            </v-btn>

            <v-btn icon class="gradient">
                <v-icon>apps</v-icon>
            </v-btn>

            <v-btn icon class="gradient">
                <v-icon>refresh</v-icon>
            </v-btn>
            <v-list-tile-avatar v-if="user !== null">
                <router-link to="/profile">
                    <img :src="`https://randomuser.me/api/portraits/men/58.jpg`" alt="">
                </router-link>
            </v-list-tile-avatar>
            <v-list-tile-avatar
                    v-if="user == null"
                    @click="login_modal=!login_modal">
                <v-icon>face</v-icon>
            </v-list-tile-avatar>
        </v-toolbar>
        <v-content>
            <router-view></router-view>
        </v-content>
        <v-dialog v-model="login_modal" persistent max-width="600px">
            <v-card>
                <v-card-title>
                    <span class="headline">Login</span>
                </v-card-title>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-text-field label="Email*" v-model="user_email" required></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-text-field label="Password*" v-model="user_password" type="password" required></v-text-field>
                            </v-flex>
                        </v-layout>
                    </v-container>
                    <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" flat @click="login_modal = false">Close</v-btn>
                    <v-btn color="blue darken-1" flat @click="Login">Login</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            drawer: true,
            menus: [],
            friends:[],
            login_modal:false,
            user_email:'',
            user_password:'',
        }),
        props: {
            source: String
        },
        methods:{
            LoadMenus: function(){
                var vm = this;
                axios.get('/api/menu',{})
                    .then(function (res) {
                        console.log(res);
                        vm.menus = res.data.menu;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            LoadUser: function(){
                var vm = this;
                axios.get('/api/users/1',{'id':1})
                    .then(function (res) {
                        vm.friends = res.data.user.friends;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            Login(){
                this.$store.commit('login',{
                    'email':this.user_email,
                    'password':this.user_password
                });
                this.login_modal=false;
                this.user_email='';
                this.user_password='';
            },
        },
        mounted(){
            this.LoadMenus();
            this.LoadUser();
        },
        computed: {
            user() {
                return this.$store.state.user;
            }
        }
    }
</script>