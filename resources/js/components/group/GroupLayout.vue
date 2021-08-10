<template>
    <v-container>
        <v-row class="px-3 mx-auto" style="max-width: 1024px;">
            <v-col
                cols="auto"
                class="px-2">

                <div class="mx-auto" style="width: 200px;">
                    <group-image
                        :src="group.image_path"
                    ></group-image>
                </div>

                <h3 class="my-3 text-center">{{ group.name }}</h3>
                <v-btn
                    v-if="!this.isJoined"
                    color="primary"
                    block
                    @click="requestJoinGroup"
                >
                    그룹 가입하기
                </v-btn>
            </v-col>
            <v-col>
                <group-header></group-header>
                <v-sheet>
                    <slot name="content"></slot>
                </v-sheet>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import GroupHeader from "../../components/group/GroupHeader";
import GroupImage from "../../components/group/GroupImage";
import { mapState, mapGetters, mapActions } from "vuex";
import groupApi from "../../api/groupApi";

export default {
    name: "GroupLayout",
    components: {
        GroupHeader,
        GroupImage,
    },
    computed: {
        ...mapState({
            group: state => state.group,
        }),
        ...mapGetters({
            isJoined: 'group/isJoined'
        }),
        groupId() {
            return this.$route.params.id;
        }
    },
    methods: {
        ...mapActions('group', {
            getGroupInfo: 'getGroupInfo'
        }),
        requestJoinGroup() {
            groupApi.requestJoinGroup(this.groupId)
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
    created: function() {
        this.getGroupInfo(this.groupId);
    },
}
</script>
