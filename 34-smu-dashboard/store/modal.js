export const state = () => ({
  show: false,
  header: "Confirmation modal",
  confirm_button_text: "Confirm",
  cancel_button_text: "Cancel"
});

export const mutations = {
  /**
   * @description
   * @date 2020-10-02
   * @param {*} state
   * @param {*} {show, header, confirm_button_text, cancel_button_text}
   */
  set(state, [show, header, confirm_button_text, cancel_button_text]) {
    state.show = show;

    if (header) {
      state.header = header;
    }

    if (confirm_button_text) {
      state.confirm_button_text = confirm_button_text;
    }

    if (cancel_button_text) {
      state.cancel_button_text = cancel_button_text;
    }
  },

  show(state, show) {
    state.show = show;
  }
};

export const actions = {
  getCourses({ commit }) {
    this.$axios.get(`categories/`).then(response => {
      commit("store", response.data.data);
    });
  },
  createCourse({ commit }, courseName) {
    this.$axios.post(`categories/`, courseName).then(response => {
      commit("store", response.data);
    });
  }
};

// unused for now
export const getters = {};
