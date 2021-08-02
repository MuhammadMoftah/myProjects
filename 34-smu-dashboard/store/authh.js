export const state = () => ({
  isLogin: null
});
export const getters = {
  isLogin(state) {
    return state.isLogin;
  },
  user(status) {
    return status.user;
  }
};

export const mutations = {
  storeLogin(state) {
    localStorage.setItem("isLogin", true);
    state.isLogin = localStorage.getItem("isLogin");
  },
  storeLogout(state) {
    localStorage.setItem("isLogin", false);
    state.isLogin = localStorage.getItem("isLogin");
  }
};
