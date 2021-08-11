import Vue from "vue";
import store from "../store";

Vue.prototype.$alert = (message, type = "error") => {
    store.dispatch("alert", { message, type });
}
