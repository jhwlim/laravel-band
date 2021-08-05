import groupApi from "../../api/groupApi";

const state = {
    id: 0,
    name: '',
    intro: '',
    image_path: '',
    admin_id: '',
}

const getters = {

}

const mutations = {
    setGroupState(state, payload) {
        const { id, name, intro, image_path, admin_id } = payload;
        state.id = id;
        state.name = name;
        state.intro = intro;
        state.image_path = image_path;
        state.admin_id = admin_id;
    },
    resetGroupState(state) {
        state.id = 0;
        state.name = '';
        state.intro = '';
        state.image_path = '';
        state.admin_id = 0;
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
