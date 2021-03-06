import groupApi from "../../api/groupApi";

const state = {
    id: 0,
    name: '',
    intro: '',
    image_path: '',
    admin_id: 0,
    created_at: '',
    updated_at: '',
    state: null,
}

const getters = {
    isAdmin(state, getters, rootState) {
        return state.admin_id > 0 && state.admin_id === rootState.member.id;
    },
    isJoinRequested(state) {
        return state.state === 1;
    },
    isJoined(state, getters) {
        return getters.isAdmin || state.state === 2;
    },
}


const mutations = {
    setGroupState(state, payload) {
        const { id, name, intro, image_path, admin_id, created_at, updated_at } = payload;
        state.id = id;
        state.name = name;
        state.intro = intro;
        state.image_path = image_path;
        state.admin_id = admin_id;
        state.created_at = created_at;
        state.updated_at = updated_at;
    },
    resetGroupState(state) {
        state.id = 0;
        state.name = '';
        state.intro = '';
        state.image_path = '';
        state.admin_id = null;
        state.created_at = '';
        state.updated_at = '';
    }
}

const actions = {
    getGroupInfo(context, groupId) {
        return groupApi.getGroupInfo(groupId)
            .then(response => {
                if (response.status === 200) {
                    const group = response.data;
                    context.commit('setGroupState', group);
                }
                return response;
            })
            .catch(error => {
                context.commit('resetGroupState');
                throw error;
            });
    }
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}
