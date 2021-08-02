export const state = () => ({
  list: [],
  openBasket: false,
  subtotal: 0,
  services: 0,
  vat: 0,
  total: 0,
  price: 0
});
const getters = {
  list(state) {
    return state.list;
  }
};
const mutations = {
  addToBasket(state, payload) {
    state.list.push = payload;
  },
  toggleBasket(state) {
    state.openBasket = !state.openBasket;
  },
  closeBasket(state) {
    state.openBasket = false;
  },
  updateBasket(state, payload) {
    state.list = payload.products;
    state.subtotal = payload.formatted;
    state.services = payload.services;
    state.vat = payload.vat;
    state.total = payload.final_total;
    state.price = payload.total;
  },
  resetBasket(state) {
    state.list = [];
    state.openBasket = false;
    state.subtotal = 0;
    state.services = 0;
    state.vat = 0;
    state.total = 0;
    state.price = 0;
  },
  removeFromBasket(state, id) {
    // state.list = state.list.filter(item => {
    //   return item.cart_id !== id;
    // });
  }
};
const actions = {
  async getBasket({ commit }) {
    const lang = LocalStorage.getItem("lang") ?? "en";
    const res = await axios.get(`/${lang}/cart`);
    commit("updateBasket", res.data.data);
    return res;
  },
  async addToBasket({ rootState }, payload) {
    const res = await axios.post(`/${rootState.general.lang}/cart`, payload);
    return res;
  },

  async removeFromBasket({ rootState }, id) {
    try {
      const res = await axios.delete(`/${rootState.general.lang}/cart/${id}`);
      return res;
    } catch (e) {}
  },
  async editInBasket(id) {
    try {
      const res = await this.$axios.patch(`/en/cart/${id}`, {
        id: item.id,
        quantity: value
      });
      return res;
    } catch (e) {}
  }
};

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
};
