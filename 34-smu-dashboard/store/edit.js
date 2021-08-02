export const state = () => ({
   show: false,
   data: ''
});

export const getters = {}

export const mutations = {
   closeEdit(state) {
      state.show = false;
   },
   openEdit(state, payload) {
      if (!state.show) state.show = true
      state.data = payload
   },
   toggleEdit(state) {
      state.show = !state.show;
   },
   getEdit(state, payload) {
      state.list = payload
   },
   updateData(state, payload) {
      state.data = payload
   }
}

export const actions = {
   closeEdit({ commit }) {
      commit("closeEdit");
   },
   openEdit({ commit }, payload) {
      commit("openEdit", payload);
   },
   toggleEdit({ commit }) {
      commit("toggleEdit");
   },

};