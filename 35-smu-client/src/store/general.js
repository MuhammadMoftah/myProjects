import { LocalStorage } from "quasar";

export const state = () => ({
  lang: LocalStorage.getItem("lang"),
  info: LocalStorage.getItem("settings"),
  dishes: [],
  menu: [],
  menus: [],
  branches: [],
  activeBranch: {},
  languages: [],
  table_id: null,
  scanType: "",
  pickupOrder: [],
  fingerPrint: {},
  meData: {},
  isSearch: false,
  searchButton: false,
  orderPayload: {},
  scanModal: false,
});
const getters = {
  branchSettings(state) {
    return state.activeBranch.settings;
  },
};
const mutations = {
  setLang(state, payload) {
    state.lang = payload;
  },
  setInfo(state, payload) {
    state.info = payload;
  },
  setMenu(state, payload) {
    state.menu = payload;
  },
  setMenus(state, payload) {
    state.menus = payload;
  },
  setBranches(state, payload) {
    state.branches = payload;
  },
  setActiveBranch(state, payload) {
    state.activeBranch = payload;
  },
  setLanguages(state, payload) {
    state.languages = payload;
  },
  setTable(state, payload) {
    state.table_id = payload;
  },
  setDishes(state, payload) {
    state.dishes = payload;
  },
  setScanType(state, payload) {
    state.scanType = payload;
  },
  setPickupOrder(state, payload) {
    state.pickupOrder = payload;
  },
  setFingerPrint(state, payload) {
    state.fingerPrint = payload;
  },
  setMeData(state, payload) {
    state.meData = payload;
  },
  setSearch(state, payload) {
    state.isSearch = payload;
  },
  setSearchButton(state, payload) {
    state.searchButton = payload;
  },
  setOrderPayload(state, payload) {
    state.orderPayload = payload;
  },
  setScanModal(state, payload) {
    state.scanModal = payload;
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
