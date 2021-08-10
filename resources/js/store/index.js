import Vue from "vue";
import Vuex from "vuex";
import member from './modules/member';
import group from './modules/group';
import alert from "./modules/alert";

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        member,
        group,
        alert,
    }
});

export default store;
