import authApi from "../../api/authApi";


const state = {
    id: 0,
    user_id: '',
    created_at: '',
    isAuth: false,
};

const getters = {

};

const mutations = {
    setMemberState(state, payload) {
        const { id, user_id, created_at } = payload;
        state.id = id;
        state.user_id = user_id;
        state.created_at = created_at;
        state.isAuth = true;
    },
    resetMemberState(state) {
        state.id = 0;
        state.user_id = '';
        state.created_at = '';
        state.isAuth = false;
    },
};

const actions = {
    login(context, {userId, password}) {
        return authApi.login({userId, password})
            .then(response => {
                context.commit('setMemberState', response.data);
                return response;
            });
    },
    logout(context) {
        return authApi.logout()
            .then(response => {
                context.commit('resetMemberState');
                return response;
            });
    },
    setInitState(context) {
        return authApi.getAuthMember()
            .then(response => {
                context.commit('setMemberState', response.data);
            })
            .catch(error => {
                console.log(error);
            });
    },
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}
