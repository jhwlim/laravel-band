<template>
    <v-container>
        <group-header></group-header>
        <v-row class="px-3">
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
                    color="primary"
                    block
                >
                    그룹 가입하기
                </v-btn>
            </v-col>
            <v-col>
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
import { mapState, mapActions } from "vuex";

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
        groupId() {
            return this.$route.params.id;
        }
    },
    methods: {
        ...mapActions('group', {
            getGroupInfo: 'getGroupInfo'
        }),
    },
    created: function() {
        this.getGroupInfo(this.groupId);
    },
}
</script>
