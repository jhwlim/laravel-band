import Vue from "vue";
import router from "./router";
import store from "./store";
import vuetify from "./plugins/vuetify";
import axios from "./plugins/axios";
import App from "./App.vue";

const app = new Vue({
    el: '#app',
    router,
    store,
    vuetify,
    render: h => h(App),
});
