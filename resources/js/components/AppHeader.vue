<template>
    <v-app-bar
        app
        color="white"
        flat
    >
        <v-container class="d-flex align-center">
            <v-btn
                text
                class="font-weight-bold"
            >
                Home
            </v-btn>
            <v-spacer></v-spacer>
            <v-btn text>
                로그아웃
            </v-btn>
        </v-container>
    </v-app-bar>
</template>

<script>
export default {
    name: "AppHeader"
}
</script>
