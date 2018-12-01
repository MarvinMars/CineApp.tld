<template>
<div>
    <v-card>
        <v-img :src="`https://unsplash.it/200/300?random=${Math.floor(Math.random() * 20) + 1}`" contain></v-img>
        <v-card-title primary-title>
            <div>
                <h3 class="headline mb-0" v-if="cine">{{cine.title}}</h3>
                <div>({{cine.year}})</div>
            </div>
        </v-card-title>
        <v-card-actions>
            <v-btn slot="activator" color="primary" dark  @click="open_popup = true">View</v-btn>
            <!--<v-btn flat color="blue">Save</v-btn>-->
        </v-card-actions>
    </v-card>
    <v-layout row justify-center>
        <v-dialog v-model="open_popup" fullscreen hide-overlay transition="dialog-bottom-transition">
            <v-card height="100%">
                <iframe v-if="cine.link" :src="cine.link"   width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
                <v-fab-transition>
                    <v-btn
                            dark
                            fab
                            fixed
                            top
                            left
                            @click="open_popup = false"
                    >
                        <v-icon>close</v-icon>
                    </v-btn>
                </v-fab-transition>
            </v-card>
        </v-dialog>
    </v-layout>
</div>
</template>
<script>
    export default {
        props:['film'],
        data(){
            return {
                cine: this.film,
                open_popup:false
            }
        },
        methods: {

        },
        created() {

        },
        computed: {},
        watch: {},
    }
</script>