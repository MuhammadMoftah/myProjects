export const state = () => ({
  logo: "",
  title: "",
  desc: "",
  services: "",
  tax: "",
  totalVats: "",
  paymentType: ""
});

export const getters = {
  logo(state) {
    return state.logo;
  },
  title(state) {
    return state.title;
  },
  desc(state) {
    return state.desc;
  },
  paymentType(state) {
    return state.paymentType;
  },

  services(state) {
    return parseInt(state.services);
  },
  tax(state) {
    return parseInt(state.tax);
  },
  totalVats(state) {
    return parseInt(state.services) + parseInt(state.tax);
  }
};

export const mutations = {
  storeLogo(state, data) {
    state.logo = data;
  },
  storeTitle(state, data) {
    state.title = data;
  },
  storeDesc(state, data) {
    state.desc = data;
  },
  storePaymentType(state, data) {
    state.paymentType = data;
  },
  storeServices(state, data) {
    state.services = data;
  },
  storeTax(state, data) {
    state.tax = data;
  },
  storeTotalVats(state, data) {
    state.totalVats = data;
  }
};

export const actions = {};
