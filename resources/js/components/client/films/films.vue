<template>
    <v-container grid-list-md fluid>
        <v-layout row align-baseline justify-center v-if="films">
            <v-flex v-for="cine in films"
                    :key="cine.id"
                    xs3>
                    <v-card>
                        <v-img class="cropp"
                               :src="`https://unsplash.it/200/300?blur&&random=${Math.floor(Math.random() * 20) + 1}`">
                            <v-rating readonly
                                      background-color="orange lighten-3"
                                      color="orange"
                                      text-xs-center
                                      large
                                      v-model="rating">
                            </v-rating>
                        </v-img>
                        <v-card>
                            <v-card-title primary-title>
                                <h3 class="headline mb-0" v-if="cine">{{cine.title}}<span>({{cine.year}})</span></h3>
                                <v-btn
                                        absolute
                                        dark
                                        fab
                                        top
                                        left
                                        :to="{ name:'film', params:{ FilmId:cine.id }}"
                                        class="beauty-link"
                                >
                                    <v-icon >play_circle_outline</v-icon>
                                </v-btn>
                            </v-card-title>
                            <v-card-text text-xs-center>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </v-card-text>
                        </v-card>
                    </v-card>
            </v-flex>
            <div class="text-xs-center">
                <v-pagination
                        v-model="page"
                        :length="length"
                        :total-visible="15"
                ></v-pagination>
            </div>
        </v-layout>
    </v-container>
</template>
<script>
    import axios from 'axios';
    export default {
        data(){
            return{
                films:null,
                page:1,
                length:1,
                rating:3,
            }
        },
        methods:{
            LoadResults: function(){
                var vm = this;
                axios.get('/api/films',{
                    params: {
                        page: this.page
                    }
                })
                    .then(function (res) {
                        vm.films = res.data.films.data;
                        vm.length = res.data.films.last_page;
                        vm.page = res.data.films.current_page;
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

<style scoped>

</style>