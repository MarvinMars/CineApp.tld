<template>
    <v-list dense v-if="menus">
        <v-list-tile v-for="menu in menus.items" :key="menu.id" @click="">
            <v-list-tile-action>
                <v-icon>{{ menu.icon }}</v-icon>
            </v-list-tile-action>
            <v-list-tile-content>
                <v-list-tile-title>
                    {{ menu.title }}
                </v-list-tile-title>
            </v-list-tile-content>
        </v-list-tile>
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
</template>

<script>
    export default {
        data: () => ({
            drawer: true,
            menus: [],
            friends:[],
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
                console.log('hi');
                var vm = this;
                axios.get('/api/users/1',{'id':1})
                    .then(function (res) {
                        vm.friends = res.data.user.friends;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        mounted(){
            console.log('hi');
            this.LoadMenus();
            this.LoadUser();
        },
    }
</script>

<style scoped>

</style>