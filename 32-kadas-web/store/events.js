export const state = () => ({
  list: [],
  types: [],
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
  newEvent(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  deleteEvent(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.list = arr
  },
  updateEvent(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload.id)
    arr[index] = payload
    state.list = arr
  },
  setTypes(state, payload) {
    state.types = payload
  },
  newEventType(state, payload) {
    const arr = [...state.types]
    arr.unshift(payload)
    state.types = arr
  },
  deleteEventType(state, payload) {
    const arr = [...state.types]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.types = arr
  },
  updateEventType(state, payload) {
    const arr = [...state.types]
    const index = arr.findIndex(item => item.id === payload.id)
    arr[index] = payload
    state.types = arr
  },
  setParticipants(state, payload) {
    state.participants = payload
  },
  newEventParticipant(state, payload) {
    const arr = [...state.participants]
    arr.unshift(payload)
    state.participants = arr
  },
  deleteEventParticipant(state, payload) {
    const arr = [...state.participants]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.participants = arr
  }
}

export const actions = {
  async getEvents({ commit }) {
    const res = await this.app.$axios.$get('/events?sort=-created_at')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res.data
  },
  async getSingle(ctx, payload) {
    const res = await this.app.$axios.$get(`/events/${payload}?include=type`)
    if (!res || res === 'error') return
    const data = {
      ...res.data
    }
    if (res.type && res.type.id) data.type_id = res.type.id
    return res
  },
  async newEvent({ commit }, payload) {
    const res = await this.app.$axios.$post('/events', payload)
    if (!res || res === 'error') return
    commit('newEvent', res.data[0])
    return res.data[0]
  },
  async deleteEvent({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/events/${payload}`)
    if (!res || res === 'error') return
    commit('deleteEvent', payload)
    return payload
  },
  async updateEvent({ commit }, payload) {
    const res = await this.app.$axios.$patch(`/events/${payload.id}`, payload)
    if (!res || res === 'error') return
    commit('updateEvent', res.data[0])
    return res.data[0]
  },
  async getEventTypes({ commit }) {
    const res = await this.app.$axios.$get('/event-types?sort=-created_at')
    if (!res || res === 'error') return
    commit('setTypes', res.data)
    return res.data
  },
  async newEventType({ commit }, payload) {
    const res = await this.app.$axios.$post('/event-types', payload)
    if (!res || res === 'error') return
    commit('newEventType', res.data[0])
    return res.data[0]
  },
  async deleteEventType({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/event-types/${payload}`)
    if (!res || res === 'error') return
    commit('deleteEventType', payload)
    return payload
  },
  async updateEventType({ commit }, payload) {
    const res = await this.app.$axios.$patch(
      `/event-types/${payload.id}`,
      payload
    )
    if (!res || res === 'error') return
    commit('updateEventType', res.data[0])
    return res.data[0]
  },
  async getByEmployee(ctx, payload) {
    const res = await this.app.$axios.$get(
      `/events?sort=-created_at&filter[by_employee]=${payload}`
    )
    if (!res || res === 'error') return
    return res.data
  },
  async getParticipants({ commit }, payload) {
    const res = await this.app.$axios.$get(`/events/${payload}/participants`)
    if (!res || res === 'error') return
    commit('setParticipants', res.data)
    return res.data
  },
  async newEventParticipant({ commit }, payload) {
    const data = new FormData()
    payload.employee_id.forEach((item, index) => {
      data.append(`employees[${index}]`, item)
    })
    const res = await this.app.$axios.$post(
      `/events/${payload.event_id}/participants`,
      data,
      {
        headers: {
          'content-type': 'multipart/form-data'
        }
      }
    )
    if (!res || res === 'error') return
    window.location.reload()
    commit('newEventParticipant', res.data[0])
    return res.data[0]
  },
  async deleteEventParticipant({ commit }, payload) {
    const res = await this.app.$axios.$delete(
      `/events/${payload.event_id}/participants/${payload.id}`
    )
    if (!res || res === 'error') return
    commit('deleteEventParticipant', payload.id)
    return payload
  }
}
