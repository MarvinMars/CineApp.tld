<template>
<v-container grid-list-md fluid>
    <v-layout row wrap align-center justify-center v-if="films">
        <v-flex v-for="film in films"
                :key="film.id"
                xs3>
            <film-card v-bind:film = "film"></film-card>
        </v-flex>
    </v-layout>
</v-container>
</template>

<script>
    import axios from 'axios';
    export default {
        data(){
           return{
               films:null,
           }
        },
        methods:{

        },
        created(){
            var vm = this;
            axios.get('/films')
                .then(function (res) {
                    vm.films = res.data.films.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
</script>
