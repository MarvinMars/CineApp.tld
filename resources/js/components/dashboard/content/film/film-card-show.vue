<template>
    <iframe v-if="film.link" :src="film.link"  frameborder="0" width="50%" height="50%" allowfullscreen></iframe>
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