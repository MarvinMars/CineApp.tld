export default {
    name:'navbar',
    props:['items'],
    data () {
        return {
            drawerStatus: this.drawer,
        }
    },
    computed: {
        drawer() {
            return this.$store.state.drawer.status;
        }
    },
    mounted() {
        console.log(this.items);
    }
}