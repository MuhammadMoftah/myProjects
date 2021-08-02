import { LocalStorage } from "quasar";

export const state = () => ({
  modal: false,
  geometry: "",
  formatted: "",
  detailed: "",
});
const getters = {};
const mutations = {
  setGeometry(state, payload) {
    state.geometry = payload;
  },
  setFormatted(state, payload) {
    state.formatted = payload;
  },
  setDetailed(state, payload) {
    state.detailed = payload;
  },
  setModal(state, payload) {
    state.modal = payload;
  },
};
const actions = {};

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions,
};
