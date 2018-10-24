<template>
<v-container grid-list-md fluid>
    <v-layout row wrap align-center justify-center>
        <v-flex v-for="n in 10"
                :key="n"
                xs3>
            <film-card></film-card>
        </v-flex>
    </v-layout>
</v-container>
</template>

<script>
    export default {
        data: () => ({

        })
    }
</script>

<style scoped>

</style>