export const state = () => ({
  list: [],
  participants: []
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
  newTrip(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  deleteTrip(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.list = arr
  },
  updateTrip(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload.id)
    arr[index] = payload
    state.list = arr
  },
  setParticipants(state, payload) {
    state.participants = payload
  },
  newTripParticipant(state, payload) {
    const arr = [...state.participants]
    arr.unshift(payload)
    state.participants = arr
  },
  deleteTripParticipant(state, payload) {
    const arr = [...state.participants]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.participants = arr
  }
}

export const actions = {
  async getTrips({ commit }) {
    const res = await this.app.$axios.$get('/trips?sort=-created_at')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res.data
  },
  async newTrip({ commit }, payload) {
    const res = await this.app.$axios.$post('/trips', payload)
    if (!res || res === 'error') return
    commit('newTrip', res.data[0])
    return res.data[0]
  },
  async deleteTrip({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/trips/${payload}`)
    if (!res || res === 'error') return
    commit('deleteTrip', payload)
    return payload
  },
  async updateTrip({ commit }, payload) {
    const res = await this.app.$axios.$patch(`/trips/${payload.id}`, payload)
    if (!res || res === 'error') return
    commit('updateTrip', res.data[0])
    return res.data[0]
  },
  async getByEmployee(ctx, payload) {
    const res = await this.app.$axios.$get(
      `/trips?sort=-created_at&filter[by_employee]=${payload}`
    )
    if (!res || res === 'error') return
    return res.data
  },
  async getSingle(ctx, payload) {
    const res = await this.app.$axios.$get(`/trips/${payload}?include=type`)
    if (!res || res === 'error') return
    return res
  },
  async getParticipants({ commit }, payload) {
    const res = await this.app.$axios.$get(`/trips/${payload}/participants`)
    if (!res || res === 'error') return
    commit('setParticipants', res.data)
    return res.data
  },
  async newTripParticipant({ commit }, payload) {
    const data = new FormData()
    payload.employee_id.forEach((item, index) => {
      data.append(`employees[${index}]`, item)
    })
    const res = await this.app.$axios.$post(
      `/trips/${payload.trip_id}/participants`,
      data,
      {
        headers: {
          'content-type': 'multipart/form-data'
        }
      }
    )
    if (!res || res === 'error') return
    window.location.reload()
    commit('newTripParticipant', res.data[0])
    return res.data[0]
  },
  async deleteTripParticipant({ commit }, payload) {
    const res = await this.app.$axios.$delete(
      `/trips/${payload.trip_id}/participants/${payload.id}`
    )
    if (!res || res === 'error') return
    commit('deleteTripParticipant', payload.id)
    return payload
  }
}
