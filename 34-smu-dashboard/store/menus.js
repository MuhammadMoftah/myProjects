export const state = () => ({
  list: [],
  modal: ""
});

export const getters = {};

export const mutations = {
  setMenus(state, payload) {
    state.list = payload;
  },
  setModal(state, payload) {
    state.modal = payload;
  }
};

export const actions = {
  refreshMenus({ commit }) {
    return this.$axios.get("/menus").then(res => {
      commit("setMenus", res.data.data);
      return res;
    });
  }
};
