<template>
    <v-app>
        <app-alert></app-alert>
        <app-header></app-header>
        <v-main class="grey lighten-2">
            <router-view></router-view>
        </v-main>
    </v-app>
</template>

<script>
import AppHeader from "./components/AppHeader";
import AppAlert from "./components/AppAlert";

export default {
    name: "App",
    components: {
        AppHeader,
        AppAlert,
    },
}
</script>
