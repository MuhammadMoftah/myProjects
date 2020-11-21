export const state = () => ({
  list: [],
  types: []
})

export const getters = {
  pendingLeaves(state) {
    return state.list.filter(item => item.status === 'PENDING_HOD_APPROVAL')
  },
  approvedLeaves(state) {
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
  newLeaveList(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  updateLeave(state, payload) {
    const index = state.list.findIndex(item => item.id === payload.id)
    const arr = [...state.list]
    arr[index] = { ...arr[index], ...payload }
    state.list = arr
  },
  newLeaveType(state, payload) {
    const arr = [...state.types]
    arr.unshift(payload)
    state.types = arr
  },
  deleteLeaveType(state, payload) {
    const index = state.types.findIndex(item => item.id === payload)
    const arr = [...state.types]
    arr.splice(index, 1)
    state.types = arr
  },
  updateLeaveType(state, payload) {
    const index = state.types.findIndex(item => item.id === payload.id)
    const arr = [...state.types]
    arr[index] = payload
    state.types = arr
  }
}

export const actions = {
  async getLeaves({ commit }) {
    const res = await this.app.$axios.$get('/leaves?sort=-created_at')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res.data
  },
  async newLeaveList({ commit }, payload) {
    const res = await this.app.$axios.post('/leaves', payload)
    if (!res || res === 'error') return
    commit('newLeaveList', res.data.data[0])
    return res.data.data[0]
  },
  async getLeaveTypes({ commit }) {
    const res = await this.app.$axios.$get('/leave-types?sort=-created_at')
    if (!res || res === 'error') return
    commit('setTypes', res.data)
    return res.data
  },
  async getLeave({ commit }, payload) {
    const res = await this.app.$axios.$get(`/leaves/${payload}`)
    if (!res || res === 'error') return
    return res
  },
  async getLeaveDocuments({ commit }, payload) {
    const res = await this.app.$axios.$get(`/leaves/${payload}/documents`)
    if (!res || res === 'error') return
    return res.data
  },
  async approveLeave({ commit }, payload) {
    const res = await this.app.$axios.post(`/leaves/${payload.id}/status`, {
      status_id: payload.status.id
    })
    if (!res || res === 'error') return
    // console.log('Approve leave', res.data)
    commit('updateLeave', res.data.data)
    return res.data.data
  },
  async rejectLeave({ commit }, payload) {
    const res = await this.app.$axios.post(`/leaves/${payload.id}/status`, {
      status_id: payload.status.id
    })
    if (!res || res === 'error') return
    // console.log('Reject leave', res.data)
    commit('updateLeave', res.data.data)
    return res.data.data
  },
  async newLeaveType({ commit }, payload) {
    const res = await this.app.$axios.post('/leave-types', payload)
    if (!res || res === 'error') return
    commit('newLeaveType', res.data.data[0])
    return res.data.data[0]
  },
  async deleteLeaveType({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/leave-types/${payload}`)
    if (!res || res === 'error') return
    commit('deleteLeaveType', payload)
    return payload
  },
  async updateLeaveType({ commit }, payload) {
    const res = await this.app.$axios.$patch(
      `/leave-types/${payload.id}`,
      payload
    )
    if (!res || res === 'error') return
    commit('updateLeaveType', res.data[0])
    return res.data[0]
  },
  async getByEmployee(ctx, payload) {
    const res = await this.app.$axios.$get(
      `/leaves?sort=-created_at&filter[by_employee]=${payload}`
    )
    if (!res || res === 'error') return
    return res.data
  }
}
