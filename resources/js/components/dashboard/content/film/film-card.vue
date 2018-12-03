<template>
<div>
    <v-card>
        <v-img class="cropp" :src="`https://unsplash.it/200/300?blur&&random=${Math.floor(Math.random() * 20) + 1}`" >
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
</div>
</template>
<script>
    export default {
        props:['film'],
        data(){
            return {
                cine: this.film,
                open_popup:false,
                rating:Math.floor(Math.random() * 5) + 1
            }
        },
        methods:{},
        created(){},
        computed:{},
        watch:{},
    }
</script>