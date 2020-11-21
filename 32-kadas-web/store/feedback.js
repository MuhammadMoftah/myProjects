export const state = () => ({
  list: []
})

export const mutations = {
  setList(state, payload) {
    state.list = payload
  },
  newFeedBack(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  updateFeedBack(state, payload) {
    const index = state.list.findIndex(item => item.id === payload.id)
    const arr = [...state.list]
    arr[index] = payload
    state.list = arr
  }
}

export const actions = {
  async getFeedbacks({ commit }) {
    const res = await this.app.$axios.$get('/feedback?sort=-created_at')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res.data
  },
  async getFeedback({ commit }, payload) {
    const res = await this.app.$axios.$get(`/feedback/${payload}`)
    if (!res || res === 'error') return
    return res
  },
  async newFeedBack({ commit }, payload) {
    const res = await this.app.$axios.post('/feedback', payload)
    if (!res || res === 'error') return
    commit('newFeedBack', res.data.data[0])
    return res.data.data[0]
  },
  async updateFeedBack({ commit }, payload) {
    const res = await this.app.$axios.$patch(`/feedback/${payload.id}`, payload)
    if (!res || res === 'error') return
    commit('updateFeedBack', res.data[0])
    return res.data[0]
  }
}
