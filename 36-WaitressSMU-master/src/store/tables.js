export const state = () => ({
  activeTable: {},
  activeOrder: {},
  orderAction: null
});
const getters = {};
const mutations = {
  setActiveTable(state, payload) {
    state.activeTable = payload;
  },
  setActiveOrder(state, payload) {
    state.activeOrder = payload;
  },
  setOrderAction(state, payload) {
    state.orderAction = payload;
  },
  updateSingleOrder(state, newOrder) {
    state.activeTable.orders.forEach((order, i) => {
      if (order.id === newOrder.id) {
        state.activeTable.orders.splice(i, 1, newOrder);
      }
    });
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
