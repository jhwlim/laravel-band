<template>
    <group-layout>
        <template v-slot:content>
            <v-card
                flat
                class="mx-auto px-8 py-4"
                width="600"
            >
                <v-card-title>
                    <h2>멤버 관리</h2>
                </v-card-title>
                <v-card-text>
                    <h3 class="mb-2">가입 대기 멤버</h3>
                    <ul class="px-0">
                        <li class="d-flex font-weight-bold mb-2">
                            <span>이름</span>
                            <v-spacer></v-spacer>
                            <span>가입요청일</span>
                        </li>
                        <li
                            v-for="(member, index) in requestedMembers" :key="index"
                            class="d-flex align-center mb-2"
                        >
                            <span>{{ member.user_id }}</span>
                            <v-spacer></v-spacer>
                            <span>{{ member.created_at }}</span>
                            <v-btn
                                small
                                color="success"
                                class="mx-1"
                            >
                                가입 수락
                            </v-btn>
                            <v-btn
                                small
                                color="warning"
                            >
                                가입 거절
                            </v-btn>
                        </li>
                    </ul>
                </v-card-text>
                <v-card-text>
                    <h3>멤버</h3>
                    <ul class="px-0">
                        <li class="d-flex font-weight-bold">
                            <span>이름</span>
                            <v-spacer></v-spacer>
                            <span>가입일</span>
                        </li>
                        <li
                            v-for="(member, index) in joinedMembers" :key="index"
                            class="d-flex"
                        >
                            <span>{{ member.user_id }}</span>
                            <v-spacer></v-spacer>
                            <span>{{ member.created_at }}</span>
                            <v-btn>
                                가입 수락
                            </v-btn>
                            <v-btn>
                                가입 거절
                            </v-btn>
                        </li>
                    </ul>
                </v-card-text>
            </v-card>

        </template>
    </group-layout>
</template>

<script>
import GroupLayout from "../../components/group/GroupLayout";
import { mapState } from "vuex";
import groupApi from "../../api/groupApi";

export default {
    name: "GroupMemberView",
    components: {
        GroupLayout,
    },
    data: function() {
        return {
            requestedMembers: [],
            joinedMembers: [],
        };
    },
    computed: {
        ...mapState({
            group: state => state.group,
        }),
    },
    created: function() {
        const groupId = this.$route.params.id;
        groupApi.getGroupMembers(groupId)
            .then(response => {
                const members = response.data;
                let i = 0;
                for (i in members) {
                    const m = members[i];
                    if (m.state === 1) {
                        this.requestedMembers.push(m);
                    } else {
                        break;
                    }
                }
                this.joinedMembers.slice(i);
            })
            .catch(error => {
                console.log(error);
            });
    }
}
</script>

<style scoped>

</style>
