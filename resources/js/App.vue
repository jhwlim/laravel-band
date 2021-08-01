<template>
    <v-app>
        <app-header></app-header>
        <v-main class="grey lighten-2">
            <router-view></router-view>
        </v-main>
    </v-app>
</template>

<script>
import AppHeader from "./components/AppHeader";

export default {
    name: "App",
    components: {
        AppHeader
    },
}
</script>
