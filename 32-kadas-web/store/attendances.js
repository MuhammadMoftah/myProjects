export const state = () => ({
  list: []
})

export const getters = {
  // dailyTasks(state) {
  //   return state.list.filter(item => item.status === 'PENDING')
  // }
}

export const mutations = {
  setList(state, payload) {
    state.list = payload
  }
}

export const actions = {
  async getAttendances({ commit }) {
    const res = await this.app.$axios.$get('/attendances?sort=-created_at')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res
  },
  async getAttendance({ commit }, payload) {
    const res = await this.app.$axios.$get(`/attendances/${payload}`)
    if (!res || res === 'error') return
    return res
  },
  async getByEmployee(ctx, payload) {
    const res = await this.app.$axios.$get(
      `/attendances?sort=-created_at&filter[by_employee]=${payload}`
    )
    if (!res || res === 'error') return
    return res.data
  }
}
