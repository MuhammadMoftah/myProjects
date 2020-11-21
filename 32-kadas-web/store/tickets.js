export const state = () => ({
  list: [],
  types: []
})

export const getters = {
  pendingTickets(state) {
    return state.list.filter(item => item.status === 'PENDING_HOD_APPROVAL')
  },
  approvedTickets(state) {
    return state.list.filter(item => item.status.includes('APPROVED'))
  }
}

export const mutations = {
  setList(state, payload) {
    state.list = payload
  },
  setTypes(state, payload) {
    state.types = payload
  },
  updateTicket(state, payload) {
    const index = state.list.findIndex(item => item.id === payload.id)
    const arr = [...state.list]
    arr[index] = { ...arr[index], ...payload }
    state.list = arr
  },
  newTicketList(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  newTicketType(state, payload) {
    const arr = [...state.types]
    arr.unshift(payload)
    state.types = arr
  },
  deleteTicketType(state, payload) {
    const index = state.types.findIndex(item => item.id === payload)
    const arr = [...state.types]
    arr.splice(index, 1)
    state.types = arr
  },
  updateTicketType(state, payload) {
    const index = state.types.findIndex(item => item.id === payload.id)
    const arr = [...state.types]
    arr[index] = payload
    state.types = arr
  }
}

export const actions = {
  async getTickets({ commit }) {
    const res = await this.app.$axios.$get('/tickets?sort=-created_at')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res.data
  },
  async getTicket({ commit }, payload) {
    const res = await this.app.$axios.$get(
      `/tickets/${payload}?include=creator`
    )
    if (!res || res === 'error') return
    return res
  },
  async getTicketDocuments({ commit }, payload) {
    const res = await this.app.$axios.$get(`/tickets/${payload}/documents`)
    if (!res || res === 'error') return
    return res.data
  },
  async openTicket({ commit }, payload) {
    const res = await this.app.$axios.post(`/tickets/${payload.id}/status`, {
      status_id: payload.status.id
    })
    if (!res || res === 'error') return
    // console.log('Approve ticket', res.data)
    commit('updateTicket', res.data.data)
    return res.data.data
  },
  async closeTicket({ commit }, payload) {
    const res = await this.app.$axios.post(`/tickets/${payload.id}/status`, {
      status_id: payload.status.id
    })
    if (!res || res === 'error') return
    // console.log('Reject ticket', res.data)
    commit('updateTicket', res.data.data)
    return res.data.data
  },

  async newTicketList({ commit }, payload) {
    const res = await this.app.$axios.post('/tickets', payload)
    if (!res || res === 'error') return
    commit('newTicketList', res.data.data[0])
    return res.data.data[0]
  }
}
