import Vue from "vue";
import router from "./router";
import vuetify from "./plugins/vuetify";
import App from "./App.vue";

const app = new Vue({
    el: '#app',
    router,
    vuetify,
    render: h => h(App),
});
