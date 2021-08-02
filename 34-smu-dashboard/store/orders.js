export const state = () => ({
  show: false,
  data: "",
  generalOrders: [],
  activeGeneralOrder: null,
  itemToEdit: "",
  selectedOrders: []
});

// export const getters = {}

export const mutations = {
  closeOrders(state) {
    state.show = false;
  },
  openOrders(state, payload) {
    if (!state.show) state.show = true;
    state.data = payload;
  },
  toggleOrders(state) {
    state.show = !state.show;
  },
  getOrders(state, payload) {
    state.list = payload;
  },
  setData(state, payload) {
    state.data = payload;
  },
  setItemToEdit(state, data) {
    state.itemToEdit = data;
  },
  updateSingleOrder(state, newOrder) {
    state.data.orders.forEach((order, i) => {
      if (order.id === newOrder.id) {
        state.data.orders.splice(i, 1, newOrder);
      }
    });
  },

  storeGeneralOrders(state, payload) {
    state.generalOrders = payload;
  },
  storeActiveGeneralOrder(state, payload) {
    state.activeGeneralOrder = payload;
  },
  setSelectedOrders(state, payload) {
    state.selectedOrders = payload;
  }
};
export const actions = {
  closeOrders({ commit }) {
    commit("closeOrders");
  },
  openOrders({ commit }, payload) {
    commit("openOrders", payload);
  },
  toggleOrders({ commit }) {
    commit("toggleOrders");
  }
};
