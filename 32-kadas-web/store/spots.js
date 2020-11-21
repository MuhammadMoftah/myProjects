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
  newSpot(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  deleteSpot(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.list = arr
  },
  updateSpot(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload.id)
    arr[index] = payload
    state.list = arr
  }
}

export const actions = {
  async getSpots({ commit }) {
    const res = await this.app.$axios.$get('/spots?sort=-created_at')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res.data
  },
  async newSpot({ commit }, payload) {
    const res = await this.app.$axios.$post('/spots', payload)
    if (!res || res === 'error') return
    commit('newSpot', res.data[0])
    return res.data[0]
  },
  async deleteSpot({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/spots/${payload}`)
    if (!res || res === 'error') return
    commit('deleteSpot', payload)
    return payload
  },
  async updateSpot({ commit }, payload) {
    const res = await this.app.$axios.$patch(`/spots/${payload.id}`, payload)
    if (!res || res === 'error') return
    commit('updateSpot', res.data[0])
    return res.data[0]
  },
  async getByEmployee(ctx, payload) {
    const res = await this.app.$axios.$get(
      `/spots?sort=-created_at&filter[by_employee]=${payload}`
    )
    if (!res || res === 'error') return
    return res.data
  },
  async getSpot({ commit }, payload) {
    const res = await this.app.$axios.$get(`/spots/${payload}`)
    if (!res || res === 'error') return
    return res
  }
}
