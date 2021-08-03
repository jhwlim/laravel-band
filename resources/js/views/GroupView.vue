<template>
    <v-container>
        <group-header></group-header>
        <v-row class="px-3">
            <v-col
                cols="auto"
                class="px-2">
                <h3 class="mb-2">그룹 {{ this.$route.params.id }}</h3>
                <v-btn
                    color="primary"
                >
                    그룹 가입하기
                </v-btn>
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
