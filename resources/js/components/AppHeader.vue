<template>
    <v-app-bar
        app
        color="white"
        flat
    >
        <v-container class="d-flex align-center">
            <router-link to="/" class="text-decoration-none">
                <v-btn
                    text
                    class="font-weight-bold"
                >
                    Home
                </v-btn>
            </router-link>
            <v-spacer></v-spacer>
            <router-link to="/login" class="text-decoration-none">
                <v-btn text>
                    로그인
                </v-btn>
            </router-link>
            <v-btn
                text
                @click="logout"
            >
                로그아웃
            </v-btn>
        </v-container>
    </v-app-bar>
</template>

<script>
import authApi from "../api/authApi";

export default {
    name: "AppHeader",
    methods: {
        logout() {
            authApi.logout()
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        },
    }
}
</script>
