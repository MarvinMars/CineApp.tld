export default {
    name:'toolbar',
    data () {
        return {}
    },
    methods: {
        switchDrawer() {
            this.$store.commit('drawer/switchStatus')
        }
    },
}