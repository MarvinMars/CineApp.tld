<template>
<v-container grid-list-md fluid>
    <v-layout row align-baseline justify-center v-if="films">
        <v-flex v-for="film in films"
                :key="film.id"
                xs3>
            <film-card v-bind:film = "film"></film-card>
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
