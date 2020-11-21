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
  async getJobTitles({ commit }) {
    const res = await this.app.$axios.$get('/job-titles')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res
  },
  async getSingle({ commit }, payload) {
    const res = await this.app.$axios.$get(`/job-titles/${payload}`)
    if (!res || res === 'error') return
    return res
  }
}
