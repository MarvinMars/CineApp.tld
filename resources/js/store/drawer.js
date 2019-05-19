const state = {
    status: false,
};

// mutations
const mutations = {
    switchStatus (state) {
        state.status = !state.status;
    }
};

export default {
    namespaced: true,
    state,
    mutations
};