<template>
    <v-container grid-list-md fluid>
        <v-layout row align-baseline justify-center v-if="users">
            <v-list subheader>
                <v-subheader>Users</v-subheader>
                <v-list-tile
                        v-for="item in users"
                        :key="item.id"
                        avatar
                        @click=""
                >
                    <v-list-tile-avatar>
                        <img :src="`https://randomuser.me/api/portraits/men/${item.id}.jpg`" alt="">
                    </v-list-tile-avatar>

                    <v-list-tile-content>
                        <v-list-tile-title v-html="item.name"></v-list-tile-title>
                        <v-list-tile-sub-title v-html="item.email"></v-list-tile-sub-title>
                    </v-list-tile-content>

                    <v-list-tile-action>
                        <v-icon :color="item ? 'teal' : 'grey'">chat_bubble</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-action>
                        <v-icon :color="item ? 'teal' : 'grey'">chat_bubble</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-action>
                        <v-icon :color="item ? 'teal' : 'grey'">chat_bubble</v-icon>
                    </v-list-tile-action>
                </v-list-tile>
            </v-list>
        </v-layout>
        <div class="text-xs-center">
            <v-pagination
                    v-model="page"
                    :length="length"
                    :total-visible="15"
            ></v-pagination>
        </div>
    </v-container>
</template>

<script>
    import axios from 'axios';
    export default {
        data(){
            return{
                users:null,
                page:1,
                length:1,
                rating:3,
            }
        },
        methods:{
            LoadResults: function(){
                var vm = this;
                axios.get('/api/users',{
                    params: {
                        page: this.page
                    }
                })
                    .then(function (res) {
                        vm.users = res.data.users.data;
                        vm.length = res.data.users.last_page;
                        vm.page = res.data.users.current_page;
                        $("html, body").animate({
                            scrollTop: 0
                        }, 600);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        created(){
            this.LoadResults();
        },
        watch:{
            page: function () {
                this.LoadResults();
            },
        }
    }
</script>
