<template>
    <v-card class="white--text">
        <v-layout>
            <v-flex xs5>
                <v-img
                        :src="`https://unsplash.it/200/300?random=${Math.floor(Math.random() * 20) + 1}`"
                        contain
                ></v-img>
            </v-flex>
            <v-flex xs7>
                <v-card-title primary-title>
                    <div>
                        <div class="headline">Supermodel</div>
                        <div>Foster the People</div>
                        <div>(2014)</div>
                    </div>
                </v-card-title>
            </v-flex>
        </v-layout>
        <v-divider light></v-divider>
        <v-card-actions class="pa-3" >
            Rate this film
            <v-spacer></v-spacer>
            <v-icon color="#00f2c3" >star</v-icon>
            <v-icon color="#00f2c3">star</v-icon>
            <v-icon color="#00f2c3">star_half</v-icon>
            <v-icon color="#00f2c3">star_border</v-icon>
            <v-icon color="#00f2c3">star_border</v-icon>
        </v-card-actions>
    </v-card>
</template>

<script>
    export default {
        data() {
            return {}
        },
        methods: {},
        mounted() {
        },
        computed: {},
        watch: {},
    }
</script>

<style scoped>

</style>