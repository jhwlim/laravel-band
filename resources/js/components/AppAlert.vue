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
export default {
    name: "AppAlert",
    data: function() {
        return {
            alerts: [
                {
                    type: "info",
                    message: "Information",
                },
                {
                    type: "error",
                    message: "Error",
                }
            ],
        }
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
