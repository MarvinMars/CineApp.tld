
<template>
    <v-container v-bind="{ [`grid-list-${size}`]: true }" fluid>
        <v-layout row wrap>
            <v-flex
                    v-for="n in 91"
                    :key="n"
                    xs4
            >
                <v-card flat tile>
                    <v-img
                            :src="`https://unsplash.it/150/300?image=${Math.floor(Math.random() * 100) + 1}`"
                            height="150px"
                    ></v-img>
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