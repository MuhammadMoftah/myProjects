export const state = () => ({
  list: "",
  branchesModal: false,
  kitchens: []
});

export const getters = {
  branches(state) {
    return state.list.branches;
  },
  groups(state) {
    return state.list.groups;
  }
};

export const mutations = {
  setUser(state, payload) {
    state.list = payload;
  },
  deleteBranch({ getters }) {},
  branchesModal(state, payload) {
    state.branchesModal = payload;
  },
  setKitchens(state, payload) {
    state.kitchens = payload;
  }
};
export const actions = {};
