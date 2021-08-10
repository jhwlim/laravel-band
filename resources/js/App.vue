<template>
    <v-app>
        <app-alert></app-alert>
        <app-header></app-header>
        <v-main class="grey lighten-2">
            <router-view></router-view>
            <v-btn @click="generateAlert">에러 추가</v-btn>
        </v-main>
    </v-app>
</template>

<script>
import AppHeader from "./components/AppHeader";
import AppAlert from "./components/AppAlert";
import { mapActions } from "vuex";

export default {
    name: "App",
    components: {
        AppHeader,
        AppAlert,
    },
    methods: {
        ...mapActions({
            alert: 'alert',
        }),
        generateAlert() {
            this.alert({ message: 'error' })
        }
    },
    created: function() {
        this.alert({ type: 'info', message: 'information' });
    }
}
</script>
