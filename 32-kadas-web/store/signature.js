export const state = () => ({
  list: []
})

export const getters = {}

export const mutations = {
  setSignature(state, payload) {
    state.list = payload
  },
  newSignature(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  }
}

export const actions = {
  async getSignatures({ commit }) {
    const res = await this.app.$axios.$get('/signature')
    if (!res || res === 'error') return
    commit('setSignature', res.data)
    return res
  },

  async newSignature({ commit }, payload) {
    const res = await this.app.$axios.post('/signature', payload)
    if (!res || res === 'error') return
    commit('newSignature', res.data.data[0])
    return res.data.data[0]
  },

  async getSignature({ commit }, payload) {
    const res = await this.app.$axios.$get(`/signature/${payload}`)
    if (!res || res === 'error') return
    return res
  }
}
