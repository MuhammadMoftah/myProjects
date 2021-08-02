export const state = () => ({
  categories: [],
  dishes: []
});
const getters = {};
const mutations = {
  storeCategories(state, payload) {
    state.categories = payload;
  },
  storeDishes(state, payload) {
    state.dishes = payload;
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
