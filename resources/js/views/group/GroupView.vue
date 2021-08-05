<template>
    <group-layout>
        <template v-slot:content>
            Show
        </template>
    </group-layout>
</template>

<script>
import GroupLayout from "../../components/group/GroupLayout";

export default {
    name: "GroupView",
    components: {
        GroupLayout
    },
}
</script>
