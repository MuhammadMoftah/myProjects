export const state = () => ({
  list: []
})

export const mutations = {
  setReport(state, payload) {
    state.list = payload
  }
}

export const actions = {
  async getReport({ commit }, payload) {
    const url = `/reports/generate?to_date=${payload.x}&from_date=${payload.y}`
    const res = await this.app.$axios.$get(url)
    if (!res || res === 'error') return
    commit('setReport', res.data)
    return res.data
  }
}
