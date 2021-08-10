<template>
    <div class="px-1 alert-container">
        <v-alert
            v-for="(alert, index) in alerts" :key="index"
            :type="alert.type"
            width="100%"
            dismissible
            class="mb-1"
        >
            {{ alert.message }}
        </v-alert>
    </div>
</template>

<script>
import { mapState } from "vuex";

export default {
    name: "AppAlert",
    computed: {
        ...mapState({
            alerts: state => state.alert.alerts
        }),
    }
}
</script>

<style scoped>
.alert-container {
    position: absolute;
    z-index: 100;
    width: 100%;
}
</style>
