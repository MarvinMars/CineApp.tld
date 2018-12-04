<template>
    <v-container grid-list-md fluid>
        <v-layout row wrap>
            <v-flex xs6>
                <v-card>
                    <v-img cover :src="`https://unsplash.it/200/300?blur&&random=${Math.floor(Math.random() * 20) + 1}`" ></v-img>
                </v-card>
            </v-flex>
            <v-flex xs6 align-space-around>
                <v-flex xs12>
                    <v-card>
                        <v-card-title primary-title>
                            <div>
                                <h3 class="headline mb-0">{{film.title}}
                                    <span v-if="film.year">
                                        ({{film.year}})
                                    </span>
                                </h3>
                            </div>
                        </v-card-title>
                    </v-card>
                </v-flex>
                <v-flex xs12>
                    <v-card>
                        <v-card-title primary-title>
                          Description
                        </v-card-title>
                        <v-card-text>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </v-card-text>
                    </v-card>
                </v-flex>
                <v-flex xs12 wrap>
                    <v-card>
                        <v-btn color="orange">Share</v-btn>
                        <v-btn color="orange">Explore</v-btn>
                        <v-btn color="orange">Share</v-btn>
                        <v-btn color="orange">Explore</v-btn>
                        <v-btn color="orange">Share</v-btn>
                        <v-btn color="orange">Explore</v-btn>
                    </v-card>
                </v-flex>
            </v-flex>
            <v-flex xs12 >
                <iframe v-if="film.link" :src="film.link"  frameborder="0" width="100%" height="500px" allowfullscreen></iframe>
            </v-flex>
            <v-flex xs12 >
                <v-card>
                    <v-card-title primary-title>
                        Comment
                    </v-card-title>
                </v-card>
                <v-flex xs12 >
                    <v-card>
                        <v-card-title primary-title>
                            Comment
                        </v-card-title>
                        <v-flex xs12 >
                            <v-card>
                                <v-card-title primary-title>
                                    Comment
                                </v-card-title>
                                <v-flex xs12 >
                                    <v-card>
                                        <v-card-title primary-title>
                                            Comment
                                        </v-card-title>
                                        <v-flex xs12 >
                                            <v-card>
                                                <v-card-title primary-title>
                                                    Comment
                                                </v-card-title>
                                                <v-flex xs12 >

                                                </v-flex>
                                            </v-card>
                                        </v-flex>
                                    </v-card>
                                </v-flex>
                            </v-card>
                        </v-flex>
                    </v-card>
                    <v-card>
                        <v-card-title primary-title>
                            Comment
                        </v-card-title>
                    </v-card>
                    <v-card>
                        <v-card-title primary-title>
                            Comment
                        </v-card-title>
                    </v-card>
                    <v-card>
                        <v-card-title primary-title>
                            Comment
                        </v-card-title>
                    </v-card>
                </v-flex>
            </v-flex>
        </v-layout>
    </v-container>
</template>
<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                film:null,
            }
        },
        methods: {},
        mounted() {
            console.log(this.$route.params);
        },
        created(){
            var vm = this;
            axios.get('/api/films/'+this.$route.params.FilmId)
                .then(function (res) {
                    vm.film = res.data.film;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        computed: {},
        watch: {},
    }

</script>

<style scoped>

</style>