export const state = () => ({
  routeName: "",
  locales: [
    {
      code: "ar",
      name: "Arabic",
      dir: "rtl"
    },
    {
      code: "en",
      name: "English",
      dir: "ltr"
    }
  ],
  messages: [],
  locale: "en"
});

export const mutations = {
  SET_LANG(state, locale) {
    if (state.locales.find(el => el.code === locale)) {
      state.locale = locale;
    }
  },
  STORE_MESSAGES(state, messages) {
    state.messages = messages;
  },
  setRouteName(state, payload) {
    state.routeName = payload;
  }
};

export const actions = {
  // Courses
  getTranslatedMessages({ commit }) {
    this.$axios.get(`/translations`).then(response => {
      commit("STORE_MESSAGES", response.data);
    });
  }
};
