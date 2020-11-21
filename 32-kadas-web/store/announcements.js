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
  newAnnouncement(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  deleteAnnouncement(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.list = arr
  },
  updateAnnouncement(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload.id)
    arr[index] = payload
    state.list = arr
  },
  setParticipants(state, payload) {
    state.participants = payload
  },
  newAnnouncementParticipant(state, payload) {
    const arr = [...state.participants]
    arr.unshift(payload)
    state.participants = arr
  },
  deleteAnnouncementParticipant(state, payload) {
    const arr = [...state.participants]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.participants = arr
  }
}

export const actions = {
  async getAnnouncements({ commit }) {
    const res = await this.app.$axios.$get('/announcements?sort=-created_at')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res.data
  },
  async newAnnouncement({ commit }, payload) {
    const res = await this.app.$axios.$post('/announcements', payload)
    if (!res || res === 'error') return
    commit('newAnnouncement', res.data)
    return res.data
  },
  async deleteAnnouncement({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/announcements/${payload}`)
    if (!res || res === 'error') return
    commit('deleteAnnouncement', payload)
    return payload
  },
  async updateAnnouncement({ commit }, payload) {
    const res = await this.app.$axios.$patch(
      `/announcements/${payload.id}`,
      payload
    )
    if (!res || res === 'error') return
    commit('updateAnnouncement', res.data)
    return res
  },
  async getByEmployee(ctx, payload) {
    const res = await this.app.$axios.$get(
      `/announcements?sort=-created_at&filter[by_employee]=${payload}`
    )
    if (!res || res === 'error') return
    return res.data
  },
  async getSingle(ctx, payload) {
    const res = await this.app.$axios.$get(
      `/announcements/${payload}?include=type`
    )
    if (!res || res === 'error') return
    return res
  },
  async getParticipants({ commit }, payload) {
    const res = await this.app.$axios.$get(
      `/announcements/${payload}/participants`
    )
    if (!res || res === 'error') return
    commit('setParticipants', res.data)
    return res.data
  },
  async newAnnouncementParticipant({ commit }, payload) {
    const data = new FormData()
    payload.employee_id.forEach((item, index) => {
      data.append(`employees[${index}]`, item)
    })
    const res = await this.app.$axios.$post(
      `/announcements/${payload.announcement_id}/participants`,
      data,
      {
        headers: {
          'content-type': 'multipart/form-data'
        }
      }
    )
    if (!res || res === 'error') return
    window.location.reload()
    commit('newAnnouncementParticipant', res.data[0])
    return res.data[0]
  },
  async deleteAnnouncementParticipant({ commit }, payload) {
    const res = await this.app.$axios.$delete(
      `/announcements/${payload.announcement_id}/participants/${payload.id}`
    )
    if (!res || res === 'error') return
    commit('deleteAnnouncementParticipant', payload.id)
    return payload
  }
}
