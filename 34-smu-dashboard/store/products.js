export const state = () => ({
  activeMenu: {},
  courses: [],
  branchCategories: [],
  coursesNextPage: "",
  dishes: [],
  dish: [],
  types: [],
  options: [],
  generalOffers: ""
});

export const getters = {
  getCourses(state) {
    return state.courses;
  },
  getterTypes(state) {
    return state.types;
  }
};

export const mutations = {
  setActiveMenu(state, payload) {
    state.activeMenu = payload;
  },
  store(state, data) {
    const arr = [...data];
    state.courses = arr;
  },
  pushToStore(state, data) {
    state.courses.push(...data);
  },
  unshiftToStore(state, data) {
    state.courses.unshift(...data);
  },
  editDishImage(state, payload) {
    state.courses.forEach(course => {
      if (course.id == payload.dish.category_id) {
        course.products.forEach(element => {
          if (element.id == payload.dish.id) {
            element.media[0].url = payload.image;
          }
        });
      }
    });
  },
  addDishImage(state, payload) {
    state.courses.forEach(course => {
      if (course.id == payload.dish.category_id) {
        course.products.forEach(element => {
          if (element.id == payload.dish.id) {
            // element.media[0].url = payload.image;
            element.media.push({
              url: payload.image
            });
          }
        });
      }
    });
  },
  addCourseImage(state, payload) {
    state.courses.forEach(course => {
      if (course.slug === payload.cateSlug) {
        course.media.push({ url: payload.image });
      }
    });
  },

  editSingleDish(state, dish) {
    const dishCourse = state.courses.find(el => el.id == dish.category_id);
    let index = dishCourse.products.findIndex(item => item.id == dish.id);
    state.courses.forEach(course => {
      course.products.forEach(element => {
        if (element.id == dish.id) {
          course.products.splice(index, 1, dish);
        }
      });
    });
  },
  editDishVariations(state, dish) {
    state.courses.forEach(course => {
      if (course.id == dish.category_id) {
        course.products.forEach(element => {
          if (element.id == dish.id) {
            element.variations = dish.variations;
          }
        });
      }
    });
  },
  deleteSingleDish(state, dish) {
    state.courses.forEach(course => {
      course.products.forEach((element, i) => {
        if (element.id == dish.id) {
          course.products.splice(i, 1);
        }
      });
    });
  },
  addSingleDish(state, dish) {
    state.courses.forEach(course => {
      if (course.id == dish.category_id) {
        course.products.push(dish);
      }
    });
  },
  deleteCourse(state, payload) {
    const index = state.courses.findIndex(item => item.slug === payload);
    const arr = [...state.courses];
    arr.splice(index, 1);
    state.courses = arr;
  },
  storeTypes(state, data) {
    state.types = data;
  },
  storeDishes(state, data) {
    state.dishes = data;
  },
  storeDish(state, data) {
    state.dish = data;
  },

  coursesNextPage(state, payload) {
    state.coursesNextPage = payload;
  },
  //set general offers
  setOffers(state, value) {
    state.generalOffers = value;
  },

  setBranchCategories(state, payload) {
    state.branchCategories = [...payload];
  }
};

export const actions = {
  // Courses
  async getCourses({ commit, state }, slug) {
    const menuSlug = slug ? slug : state.activeMenu.slug;
    commit("store", []);
    var recursive = next => {
      return this.$axios.get(next).then(res => {
        commit("pushToStore", res.data.data);
        if (res.data.links.next) {
          recursive(res.data.links.next);
        }
        return res;
      });
    };
    //recursive function to get all categories
    return recursive(`menus/${menuSlug}/categories`);
  },

  // Branch All Categories
  async getBranchCategories({ commit, state }) {
    let arr = [];
    var recursive = next => {
      return this.$axios.get(next).then(res => {
        arr.push(...res.data.data);
        commit("setBranchCategories", arr);
        if (res.data.links.next) {
          recursive(res.data.links.next);
        }
        return res;
      });
    };
    //recursive function to get all categories
    return recursive(`/categories`);
  },
  async createCourse({ state, commit }, courseName) {
    const menuSlug = state.activeMenu.slug;
    const res = await this.$axios
      .post(`/menus/${menuSlug}/categories`, courseName)
      .then(response => {
        commit("unshiftToStore", [response.data.data]);
        return response;
      });
    return res;
  },
  async deleteCourse({ state }, courseSlug) {
    const menuSlug = state.activeMenu.slug;
    const res = await this.$axios
      .delete(`menus/${menuSlug}/categories/${courseSlug}`)
      .then(response => {
        return response;
      });

    return res;
  },

  // Dishes
  getDishes({ commit }, courseSlug) {
    this.$axios
      .get(`categories/${courseSlug}`)
      .then(response => {
        commit("storeDishes", response.data.data.products);
      })
      .catch(error => {
        //console.log(error);
      });
  },
  // get single dish
  async getDish({ commit }, dishSlug) {
    const res = await this.$axios
      .get(`products/${dishSlug}`)
      .then(response => {
        commit("storeDish", response);
      })
      .catch(error => {
        //console.log(error);
      });
    return res;
  },
  async deleteDish({ dispatch }, dishSlug) {
    const res = await this.$axios.delete(`products/${dishSlug}`);
    return res;
  },

  // types
  async getTypes({ commit }) {
    await this.$axios.get(`types`).then(response => {
      commit("storeTypes", response.data.data);
    });
  },
  createType({ dispatch }, typeData) {
    const res = this.$axios.post(`types`, typeData).then(response => {
      dispatch("getTypes");
    });
    return res;
  },
  deleteType({ dispatch }, typeSlug) {
    this.$axios.delete(`types/${typeSlug}`).then(response => {
      //console.log(response)
      // dispatch('getDishes')
    });
  },

  // Options
  createOption({ dispatch }, typeData) {
    this.$axios.post(`options`, typeData).then(response => {
      //console.log(response)
      dispatch("getTypes");
    });
  },

  // get General  offers status
  getOffers({ commit }) {
    const res = this.$axios.get("settings/offer").then(res => {
      let item = res.data.data.filter(function(item) {
        if ( item.key == 'offer') {
          return true
        }
      });
      commit("setOffers", item[0].value);
    });
    return res;
  }
};
