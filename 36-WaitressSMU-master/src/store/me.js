export const state = () => ({
  me: {}
});
const getters = {};
const mutations = {
  setMe(state, payload) {
    state.me = payload;
  }
};
const actions = {};

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
};
