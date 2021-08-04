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
                    type="password"
                    label="비밀번호"
                    width="100%"
                ></v-text-field>
            </v-card-text>
            <v-card-actions>
                <v-btn
                    color="primary"
                    width="100%"
                    @click="submitLoginForm"
                >
                    로그인
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-container>
</template>

<script>
import { mapActions } from "vuex";

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
        ...mapActions('member', {
            login: 'login',
        }),
        submitLoginForm() {
            this.login(this.loginForm)
                .then(response => {
                    if (response.status === 200) {
                        this.$router.push('/');
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>
