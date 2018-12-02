<template>
<div>
    <v-card hover>
        <v-img :src="`https://unsplash.it/200/300?random=${Math.floor(Math.random() * 20) + 1}`" contain></v-img>
        <v-card-title primary-title>
            <div>
                <h3 class="headline mb-0" v-if="cine">{{cine.title}}</h3>
                <div>({{cine.year}})</div>
            </div>
        </v-card-title>
        <v-card-text>
            <div class="text-xs-center">
                <v-rating v-model="rating"></v-rating>
            </div>
        </v-card-text>
        <v-card-actions>
            <v-btn slot="activator" color="primary" dark flat>
                <router-link :to="{ name:'film', params:{ FilmId:cine.id }}">
                    <v-icon>play_circle_outline</v-icon>
                </router-link>
            </v-btn>
            <v-btn flat color="blue">Save</v-btn>
        </v-card-actions>
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
                rating:5
            }
        },
        methods:{},
        created(){},
        computed:{},
        watch:{},
    }
</script>