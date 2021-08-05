import Vue from "vue";
import Vuex from "vuex";
import member from './modules/member';
import group from './modules/group';

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        member,
        group,
    }
});

export default store;
