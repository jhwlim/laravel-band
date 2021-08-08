<template>
    <v-container>
        <h2>내가 관리자인 그룹</h2>
        <v-card>
            <v-list two-line>
                <v-list-item
                    v-for="(group, index) in groups" :key="index"
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

export default {
    name: "MainView",
    components: {
        GroupImage,
    },
    data: function() {
        return {
            groups: [
                {
                    name: '테스트 그룹 1',
                    intro: '테스트 그룹 입니다.',
                }
            ],
        };
    }
}
</script>
