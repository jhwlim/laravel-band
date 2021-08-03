<template>
    <v-container
        fluid
        fill-height
        class="d-flex justify-center align-center">
        <v-card class="px-8 py-4" width="340px">
            <v-card-title class="justify-center">
                <h2>로그인</h2>
            </v-card-title>
            <v-card-text class="py-0">
                <v-text-field
                    v-model="loginForm.userId"
                    label="아이디"
                    width="100%"
                ></v-text-field>
                <v-text-field
                    v-model="loginForm.password"
                    label="비밀번호"
                    width="100%"
                ></v-text-field>
            </v-card-text>
            <v-card-actions>
                <v-btn
                    color="primary"
                    width="100%"
                    @click="login"
                >
                    로그인
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-container>
</template>

<script>
import authApi from "../api/authApi";

export default {
    name: "LoginView",
    data: function() {
        return {
            loginForm: {
                userId: '',
                password: '',
            }
        };
    },
    methods: {
        login() {
            authApi.login(this.loginForm)
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>
