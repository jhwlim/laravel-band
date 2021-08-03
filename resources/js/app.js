import Vue from "vue";
import router from "./router";
import vuetify from "./plugins/vuetify";
import axios from "./plugins/axios";
import App from "./App.vue";

const app = new Vue({
    el: '#app',
    router,
    vuetify,
    render: h => h(App),
});
