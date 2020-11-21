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
  newItinerary(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  deleteItinerary(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.list = arr
  },
  updateItinerary(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload.id)
    arr[index] = payload
    state.list = arr
  }
}

export const actions = {
  async getItineraries({ commit }) {
    const res = await this.app.$axios.$get('/itineraries?sort=-created_at')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res.data
  },
  async getItinerary({ commit }, payload) {
    const res = await this.app.$axios.$get(`/itineraries/${payload}`)
    if (!res || res === 'error') return
    return res
  },
  async getItineraryDocuments({ commit }, payload) {
    const res = await this.app.$axios.$get(`/itineraries/${payload}/documents`)
    if (!res || res === 'error') return
    return res.data
  },
  async newItinerary({ commit }, payload) {
    const res = await this.app.$axios.$post('/itineraries', payload)
    if (!res || res === 'error') return
    commit('newItinerary', res.data[0])
    return res.data[0]
  },
  async deleteItinerary({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/itineraries/${payload}`)
    if (!res || res === 'error') return
    commit('deleteItinerary', payload)
    return payload
  },
  async updateItinerary({ commit }, payload) {
    const res = await this.app.$axios.$patch(
      `/itineraries/${payload.id}`,
      payload
    )
    if (!res || res === 'error') return
    commit('updateItinerary', res.data[0])
    return res.data[0]
  },
  async getByEmployee(ctx, payload) {
    const res = await this.app.$axios.$get(
      `/itineraries?sort=-created_at&filter[by_employee]=${payload}`
    )
    if (!res || res === 'error') return
    return res.data
  }
}
