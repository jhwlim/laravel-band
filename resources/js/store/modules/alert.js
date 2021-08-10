const state = {
    alerts: [
        // {
        //     type: "info",
        //     message: "Information",
        // },
        // {
        //     type: "error",
        //     message: "Error",
        // }
    ],
}

const mutations = {
    addAlert(state, { type, message }) {
        state.alerts.push({ type, message });
    },
    removeFirstAlert(state) {
        state.alerts.shift();
    }
}

const actions = {
    alert(context, { type= 'error', message }) {
        context.commit('addAlert', { type, message });
        setTimeout(() => {
            context.commit('removeFirstAlert');
        }, 3000);
    }
}

export default {
    state,
    mutations,
    actions,
}
