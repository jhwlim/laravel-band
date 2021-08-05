<template>
    <v-container
        fluid
        fill-height
        class="d-flex justify-center align-center"
    >
        <v-card class="px-8 py-4" width="450">
            <v-card-title class="justify-center">
                <h2>그룹 만들기</h2>
            </v-card-title>
            <v-card-text class="py-0">
                <v-img
                    v-if="imageUrl"
                    :src="imageUrl"
                    aspect-ratio="1"
                    width="100%"
                    class="rounded-xl"
                ></v-img>
                <v-file-input
                    label="그룹 이미지를 등록해주세요"
                    prepend-icon=""
                    append-icon="mdi-camera"
                    full-width
                    @change="changeFileInput"
                ></v-file-input>
                <v-text-field
                    v-model="groupRegForm.name"
                    label="그룹명"
                    width="100%"
                ></v-text-field>
                <v-textarea
                    v-model="groupRegForm.intro"
                    label="그룹 소개글"
                    auto-grow
                ></v-textarea>
            </v-card-text>
            <v-card-actions>
                <v-btn
                    color="primary"
                    width="100%"
                    @click="submitGroupRegForm"
                >
                    그룹 생성하기
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-container>
</template>

<script>
import groupApi from "../api/groupApi";

export default {
    name: "GroupCreateView",
    data: function() {
        return {
            groupRegForm: {
                name: '',
                intro: '',
                imageFile: null,
            },
        }
    },
    computed: {
        imageUrl() {
            const file = this.groupRegForm.imageFile;
            return file ? URL.createObjectURL(file) : '';
        }
    },
    methods: {
        changeFileInput(file) {
            this.groupRegForm.imageFile = file;
        },
        submitGroupRegForm() {
            groupApi.createGroup(this.groupRegForm)
                .then(response => {
                    console.log(response);
                    const group = response.data;
                    this.$router.push(`/group/${group.id}`);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
}
</script>

<style scoped>

</style>
