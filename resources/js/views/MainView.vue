<template>
    <v-container>
        <h2 class="mb-2">전체 그룹</h2>
        <v-card>
            <v-list two-line>
                <v-list-item
                    v-for="(group, index) in groups" :key="index"
                    @click="moveToGroup(group.id)"
                >
                    <v-list-item-avatar>
                        <group-image :src="group.image_path"></group-image>
                    </v-list-item-avatar>

                    <v-list-item-content>
                        <v-list-item-title v-text="group.name"></v-list-item-title>

                        <v-list-item-subtitle v-text="group.intro"></v-list-item-subtitle>
                    </v-list-item-content>

                    <v-list-item-action>
                        <v-icon>mdi-information</v-icon>
                    </v-list-item-action>
                </v-list-item>
            </v-list>
        </v-card>

    </v-container>
</template>

<script>
import GroupImage from '../components/group/GroupImage';
import groupApi from "../api/groupApi";

export default {
    name: "MainView",
    components: {
        GroupImage,
    },
    data: function() {
        return {
            groups: [],
        };
    },
    methods: {
        moveToGroup(id) {
            this.$router.push(`/group/${id}`);
        }
    },
    created: function() {
        groupApi.getAllGroups()
            .then(response => {
                console.log(response);
                const result = response.data;
                this.groups = result;
            })
            .catch(error => {
                console.log(error);
            });
    }
}
</script>
