<template>
    <v-toolbar flat class="mb-4">
        <v-btn text>게시글</v-btn>
        <v-btn text>멤버</v-btn>
        <router-link :to="`/group/${this.group.id}/edit`">
            <v-btn text>그룹 정보 수정</v-btn>
        </router-link>
    </v-toolbar>
</template>

<script>
import { mapState } from 'vuex';

export default {
    name: "GroupHeader",
    computed: {
        ...mapState({
            group: state => state.group,
        })
    },
}
</script>
