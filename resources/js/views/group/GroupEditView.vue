<template>
    <group-layout>
        <template v-slot:content>
            <v-card
                flat
                class="mx-auto px-8 py-4"
                width="450">
                <v-card-title class="justify-center">
                    <h2>그룹 정보 수정</h2>
                </v-card-title>
                <v-card-text class="py-0">
                    <v-img
                        v-if="imageUrl"
                        :src="imageUrl"
                        aspect-ratio="1"
                        width="100%"
                        class="rounded-xl my-2"
                    ></v-img>
                    <v-file-input
                        label="그룹 이미지를 등록해주세요"
                        prepend-icon=""
                        append-icon="mdi-camera"
                        width="300"
                        @change="changeFileInput"
                    ></v-file-input>
                    <v-btn
                        :disabled="imageBtnDisabled"
                        block
                        color="primary"
                        class="mb-6"
                    >
                        이미지 수정
                    </v-btn>

                    <v-text-field
                        :value="group.name"
                        label="그룹명"
                        width="100%"
                    ></v-text-field>
                    <v-btn
                        :disabled="nameBtnDisable"
                        color="primary"
                        width="100%"
                        class="mb-6"
                    >
                        그룹 이름 수정
                   </v-btn>

                    <v-textarea
                        :value="group.intro"
                        label="그룹 소개글"
                        auto-grow
                    ></v-textarea>
                    <v-btn
                        :disabled="introBtnDisable"
                        color="primary"
                        width="100%"
                        class="mb-6"
                    >
                        그룹 소개글 수정
                    </v-btn>
                </v-card-text>
            </v-card>
        </template>
    </group-layout>
</template>

<script>
import GroupLayout from "../../components/group/GroupLayout";
import { mapState } from "vuex";

export default {
    name: "GroupEditView",
    components: {
        GroupLayout
    },
    data: function() {
        return {
            name: '',
            intro: '',
            imageFile: null,
        };
    },
    computed: {
        ...mapState({
            group: state => state.group,
        }),
        savedImageUrl() {
            return `/storage/${this.group.image_path}`;
        },
        imageUrl() {
            const file = this.imageFile;
            return file ? URL.createObjectURL(file) : this.savedImageUrl;
        },
        imageBtnDisabled() {
            return this.group && this.imageUrl === this.savedImageUrl;
        },
        nameBtnDisable() {
            return false;
        },
        introBtnDisable() {
            return false;
        },
    },
    methods: {
        changeFileInput(file) {
            this.imageFile = file;
        },
    },
    created() {

    }
}
</script>
