export const state = () => ({
  list: [],
  types: []
})

export const getters = {
  pendingLoans(state) {
    return state.list.filter(item => item.status === 'PENDING_HOD_APPROVAL')
  },
  approvedLoans(state) {
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
  newLoanList(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  updateLoan(state, payload) {
    const index = state.list.findIndex(item => item.id === payload.id)
    const arr = [...state.list]
    arr[index] = { ...arr[index], ...payload }
    state.list = arr
  },
  newLoanType(state, payload) {
    const arr = [...state.types]
    arr.unshift(payload)
    state.types = arr
  },
  deleteLoanType(state, payload) {
    const index = state.types.findIndex(item => item.id === payload)
    const arr = [...state.types]
    arr.splice(index, 1)
    state.types = arr
  },
  updateLoanType(state, payload) {
    const index = state.types.findIndex(item => item.id === payload.id)
    const arr = [...state.types]
    arr[index] = payload
    state.types = arr
  }
}

export const actions = {
  async getLoans({ commit }) {
    const res = await this.app.$axios.$get('/loans?sort=-created_at')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res.data
  },
  async newLoanList({ commit }, payload) {
    const res = await this.app.$axios.post('/loans', payload)
    // payload.type === 'Educational Loan'
    //   ? (payload.loan_type_id = 'Xalew2DMBjwy0LEY3J9n')
    //   : (payload.loan_type_id = 'ZmL0NE4Vo3byDJROg9Q3')
    if (!res || res === 'error') return
    commit('newLoanList', res.data.data[0])
    return res.data.data[0]
  },
  async getLoanTypes({ commit }) {
    const res = await this.app.$axios.$get('/loan-types?sort=-created_at')
    if (!res || res === 'error') return
    commit('setTypes', res.data)
    return res.data
  },
  async getLoan({ commit }, payload) {
    const res = await this.app.$axios.$get(`/loans/${payload}`)
    if (!res || res === 'error') return
    return res
  },
  async getLoanDocuments({ commit }, payload) {
    const res = await this.app.$axios.$get(`/loans/${payload}/documents`)
    if (!res || res === 'error') return
    return res.data
  },
  async approveLoan({ commit }, payload) {
    const res = await this.app.$axios.post(`/loans/${payload.id}/status`, {
      status_id: payload.status.id
    })
    if (!res || res === 'error') return
    // console.log('Approve loan', res)
    commit('updateLoan', res.data.data)
    return res.data.data
  },
  async rejectLoan({ commit }, payload) {
    const res = await this.app.$axios.post(`/loans/${payload.id}/status`, {
      status_id: payload.status.id
    })
    if (!res || res === 'error') return
    // console.log('Reject loan', res)
    commit('updateLoan', res.data.data)
    return res.data.data
  },
  async newLoanType({ commit }, payload) {
    const res = await this.app.$axios.post('/loan-types', payload)
    if (!res || res === 'error') return
    commit('newLoanType', res.data.data[0])
    return res.data.data[0]
  },
  async deleteLoanType({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/loan-types/${payload}`)
    if (!res || res === 'error') return
    commit('deleteLoanType', payload)
    return payload
  },
  async updateLoanType({ commit }, payload) {
    const res = await this.app.$axios.$patch(
      `/loan-types/${payload.id}`,
      payload
    )
    if (!res || res === 'error') return
    commit('updateLoanType', res.data[0])
    return res.data[0]
  },
  async updateLoan({ commit }, payload) {
    const res = await this.app.$axios.$patch(
      `/loans/${payload.id}`,
      payload.body
    )
    if (!res || res === 'error') return
    commit('updateLoan', payload)
    return res.data
  },
  async getByEmployee(ctx, payload) {
    const res = await this.app.$axios.$get(
      `/loans?sort=-created_at&filter[by_employee]=${payload}`
    )
    if (!res || res === 'error') return
    return res.data
  }
}
