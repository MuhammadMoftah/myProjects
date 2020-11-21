export const state = () => ({
  list: []
})

export const getters = {
  pendingOvertimes(state) {
    return state.list.filter(
      item => item.status && item.status.name === 'PENDING_HOD_APPROVAL'
    )
  },
  approvedOvertimes(state) {
    return state.list.filter(
      item => item.status && item.status.name.includes('APPROVED')
    )
  }
}

export const mutations = {
  setList(state, payload) {
    state.list = payload
  },
  newOverTime(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  updateOvertime(state, payload) {
    const index = state.list.findIndex(item => item.id === payload.id)
    const arr = [...state.list]
    arr[index] = { ...arr[index], ...payload }
    state.list = arr
  }
}

export const actions = {
  async getOvertimes({ commit }) {
    const res = await this.app.$axios.$get('/overtimes?sort=-created_at')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res.data
  },
  async newOverTime({ commit }, payload) {
    const res = await this.app.$axios.post('/overtimes', payload)
    if (!res || res === 'error') return
    commit('overtimes', res.data.data[0])
    return res.data.data[0]
  },
  async approveOvertime({ commit }, payload) {
    // console.log(payload)
    const res = await this.app.$axios.post(`/overtimes/${payload.id}/status`, {
      status_id: payload.status.id
    })
    // console.log(res)
    if (!res || res === 'error') return
    // console.log('Approve overtime', res.data)
    commit('updateOvertime', res.data.data)
    return res.data.data
  },
  async rejectOvertime({ commit }, payload) {
    const res = await this.app.$axios.post(`/overtimes/${payload.id}/status`, {
      status_id: payload.status.id
    })
    if (!res || res === 'error') return
    // console.log('Reject overtime', res.data)
    commit('updateOvertime', res.data.data)
    return res.data.data
  },
  async getByEmployee(ctx, payload) {
    const res = await this.app.$axios.$get(
      `/overtimes?sort=-created_at&filter[by_employee]=${payload}`
    )
    if (!res || res === 'error') return
    return res.data
  },
  async getOvertime({ commit }, payload) {
    const res = await this.app.$axios.$get(`/overtimes/${payload}`)
    if (!res || res === 'error') return
    return res
  }
}
