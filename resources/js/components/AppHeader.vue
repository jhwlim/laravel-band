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
            <router-link
                v-if="!isAuth"
                to="/login"
                class="text-decoration-none">
                <v-btn text>
                    로그인
                </v-btn>
            </router-link>
            <v-btn
                v-else
                text
                @click="clickLogout"
            >
                로그아웃
            </v-btn>
        </v-container>
    </v-app-bar>
</template>

<script>
import { mapState, mapActions } from "vuex";

export default {
    name: "AppHeader",
    computed: {
        ...mapState({
            isAuth: state => state.member.isAuth,
        })
    },
    methods: {
        ...mapActions('member', {
            logout: 'logout',
        }),
        clickLogout() {
            this.logout()
                .then(response => {
                    if (response.status === 200) {
                        this.$router.push('/login');
                    }
                })
                .catch(error => {
                    console.log(error);
                })
        },
    }
}
</script>
