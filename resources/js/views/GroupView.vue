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
                    {{ group.intro }}
                </v-sheet>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import GroupHeader from "../components/GroupHeader";
import GroupImage from "../components/GroupImage";
import groupApi from "../api/groupApi";

export default {
    name: "GroupView",
    components: {
        GroupHeader,
        GroupImage,
    },
    data: function() {
        return {
            group: {
                name: '',
                intro: '',
                image_path: '',
                admin_id: '',
            }
        };
    },
    computed: {
        groupId() {
            return this.$route.params.id;
        }
    },
    created: function() {
        groupApi.getGroupInfo(this.groupId)
            .then(response => {
                if (response.status === 200) {
                    this.group = response.data;
                }
            })
            .catch(error => {
                console.log(error);
                if (error.response.status === 404) {
                    this.$router.push('/');
                }
            });
    },
}
</script>
