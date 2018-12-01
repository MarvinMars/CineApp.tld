<template>
    <v-layout row justify-center>
        <v-dialog fullscreen hide-overlay transition="dialog-bottom-transition">
            <iframe v-if="url" :src="url"  frameborder="0" allowfullscreen></iframe>
        </v-dialog>
    </v-layout>
</template>
<script>
    export default {
        props:['url'],
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