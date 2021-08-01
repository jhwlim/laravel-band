<template>
    <v-container>
        <group-header></group-header>
        <v-row>
            <v-col cols="auto">
                about {{ this.$route.params.id }}
            </v-col>
            <v-col>
                <v-sheet>
                    Group Content
                </v-sheet>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import GroupHeader from "../components/GroupHeader";

export default {
    name: "GroupView",
    components: {
        GroupHeader,
    }
}
</script>

<style scoped>

</style>
