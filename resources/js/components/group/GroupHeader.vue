<template>
    <v-toolbar flat class="mb-4">
        <router-link
            :to="`/group/${this.group.id}`"
        >
            <v-btn text>게시글</v-btn>
        </router-link>
        <router-link
            :to="`/group/${this.group.id}/members`"
            v-if="isAdmin"
        >
            <v-btn text>멤버</v-btn>
        </router-link>
        <router-link
            :to="`/group/${this.group.id}/edit`"
            v-if="isAdmin"
        >
            <v-btn text>그룹 정보 수정</v-btn>
        </router-link>
    </v-toolbar>
</template>

<script>
import { mapState, mapGetters } from 'vuex';

export default {
    name: "GroupHeader",
    computed: {
        ...mapState({
            group: state => state.group,
        }),
        ...mapGetters({
            isAdmin: 'group/isAdmin',
        }),
    },
}
</script>
