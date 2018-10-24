<template>
    <v-container fluid>
        <v-layout row wrap>
            <v-flex xs12>
                <v-card dark color="primary">
                    <v-flex v-for="i in 2" :key="`6${i}`" xs6>
                        <v-card dark color="secondary">
                            <v-card-text class="px-0">6</v-card-text>
                        </v-card>
                    </v-flex>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
    export default {
        data: () => ({
            size: 'md',
            items: [
                { text: 'Extra small (2px)', value: 'xs' },
                { text: 'Small (4px)', value: 'sm' },
                { text: 'Medium (8px)', value: 'md' },
                { text: 'Large (16px)', value: 'lg' },
                { text: 'Extra large (24px)', value: 'xl' }
            ]
        })
    }
</script>

<style scoped>

</style>