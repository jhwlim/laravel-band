<template>
    <group-layout>
        <template v-slot:content>
            Show
            <div>
                {{ group.created_at }} {{ createdAt }} <br>
                {{ group.updated_at }} {{ updatedAt }} <br>
                {{ isSameDay }}
            </div>
        </template>
    </group-layout>
</template>

<script>
import GroupLayout from "../../components/group/GroupLayout";
import { mapState } from "vuex";

export default {
    name: "GroupView",
    components: {
        GroupLayout
    },
    computed: {
        ...mapState({
            group: state => state.group,
        }),
        createdAt() {
            return new Date(this.group.created_at);
        },
        updatedAt() {
            return new Date(this.group.updated_at);
        },
        diff() {
            const today = new Date();
            return Math.ceil((today.getTime() - this.updatedAt.getTime()) / (1000 * 60 * 60));
        },
        isSameDay() {
            const today = new Date();
            return today.getDay() === this.updatedAt.getDay();
        }
    }
}
</script>
