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
  newCompanyDocument(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  deleteCompanyDocument(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.list = arr
  },
  updateCompanyDocument(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload.id)
    arr[index] = payload
    state.list = arr
  }
}

export const actions = {
  async getCompanyDocuments({ commit }) {
    const res = await this.app.$axios.$get(
      '/documents/company?sort=-created_at'
    )
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res.data
  },
  async newCompanyDocument({ commit }, payload) {
    const data = new FormData()
    data.append('document', payload.document)
    if (payload.name) data.append('name', payload.name)
    if (payload.type) data.append('type', payload.type)
    const res = await this.app.$axios.$post('/documents/company', data, {
      headers: {
        'content-type': 'multipart/form-data'
      }
    })
    if (!res || res === 'error') return
    commit('newCompanyDocument', res.data)
    return res.data
  },
  async deleteCompanyDocument({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/documents/company/${payload}`)
    if (!res || res === 'error') return
    commit('deleteCompanyDocument', payload)
    return payload
  },
  async updateCompanyDocument({ commit }, payload) {
    const data = {}
    if (payload.name) data.name = payload.name
    if (payload.type) data.type = payload.type
    const res = await this.app.$axios.$patch(
      `/documents/company/${payload.id}`,
      data
    )
    if (!res || res === 'error') return
    commit('updateCompanyDocument', res.data)
    return res.data
  }
}
