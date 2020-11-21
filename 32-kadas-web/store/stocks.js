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
  },
  newStock(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  deleteStock(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.list = arr
  },
  updateStock(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload.id)
    arr[index] = payload
    state.list = arr
  }
}

export const actions = {
  async getStocks({ commit }) {
    const res = await this.app.$axios.$get('/stocks?sort=-updated_at')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res.data
  },
  async getStock({ commit }, payload) {
    const res = await this.app.$axios.$get(`/stocks/${payload}`)
    if (!res || res === 'error') return
    return res
  },
  async getStockDocuments({ commit }, payload) {
    const res = await this.app.$axios.$get(`/stocks/${payload}/documents`)
    if (!res || res === 'error') return
    return res.data
  },
  async newStock({ commit }, payload) {
    const res = await this.app.$axios.$post('/stocks', payload)
    if (!res || res === 'error') return
    commit('newStock', res.data[0])
    return res.data[0]
  },
  async deleteStock({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/stocks/${payload}`)
    if (!res || res === 'error') return
    commit('deleteStock', payload)
    return payload
  },
  async updateStock({ commit }, payload) {
    const res = await this.app.$axios.$patch(`/stocks/${payload.id}`, payload)
    if (!res || res === 'error') return
    commit('updateStock', res.data[0])
    return res.data[0]
  }
}
