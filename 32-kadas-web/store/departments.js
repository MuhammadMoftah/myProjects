export const state = () => ({
  list: [],
  types: []
})

export const getters = {
  // getSelectItems(state) {
  //   return state.list.map(item => item.status === 'PENDING')
  // }
}

export const mutations = {
  setList(state, payload) {
    state.list = payload
  },
  setTypes(state, payload) {
    state.types = payload
  },
  newDepartment(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  deleteDepartment(state, payload) {
    const index = state.list.findIndex(item => item.id === payload)
    const arr = [...state.list]
    arr.splice(index, 1)
    state.list = arr
  },
  updateDepartment(state, payload) {
    const index = state.list.findIndex(item => item.id === payload.id)
    const arr = [...state.list]
    arr[index] = payload
    state.list = arr
  },
  newDepartmentType(state, payload) {
    const arr = [...state.types]
    arr.unshift(payload)
    state.types = arr
  },
  deleteDepartmentType(state, payload) {
    const index = state.types.findIndex(item => item.id === payload)
    const arr = [...state.types]
    arr.splice(index, 1)
    state.types = arr
  },
  updateDepartmentType(state, payload) {
    const index = state.types.findIndex(item => item.id === payload.id)
    const arr = [...state.types]
    arr[index] = payload
    state.types = arr
  }
}

export const actions = {
  async getDepartments({ commit }) {
    const res = await this.app.$axios.$get('/departments?sort=-created_at')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res
  },
  async getSingle({ commit }, payload) {
    const res = await this.app.$axios.$get(`/departments/${payload}`)
    if (!res || res === 'error') return
    return res
  },
  async getDepartmentTypes({ commit }) {
    const res = await this.app.$axios.$get('/department-types?sort=-created_at')
    if (!res || res === 'error') return
    commit('setTypes', res.data)
    return res
  },
  async newDepartment({ commit }, payload) {
    const res = await this.app.$axios.post('/departments', payload)
    if (!res || res === 'error') return
    commit('newDepartment', res.data.data)
    return res
  },
  async deleteDepartment({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/departments/${payload}`)
    if (!res || res === 'error') return
    commit('deleteDepartment', payload)
    return res
  },
  async updateDepartment({ commit }, payload) {
    const res = await this.app.$axios.$patch(
      `/departments/${payload.id}`,
      payload
    )
    if (!res || res === 'error') return
    commit('updateDepartment', res.data)
    return res
  },
  async newDepartmentType({ commit }, payload) {
    const res = await this.app.$axios.post('/department-types', payload)
    if (!res || res === 'error') return
    commit('newDepartmentType', res.data.data[0])
    return res
  },
  async deleteDepartmentType({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/department-types/${payload}`)
    if (!res || res === 'error') return
    commit('deleteDepartmentType', payload)
    return res
  },
  async updateDepartmentType({ commit }, payload) {
    const res = await this.app.$axios.$patch(
      `/department-types/${payload.id}`,
      payload
    )
    if (!res || res === 'error') return
    commit('updateDepartmentType', res.data[0])
    return res
  },
  async getSettings({ commit }, payload) {
    const res = await this.app.$axios.$get(`/departments/${payload}/config`)
    if (!res || res === 'error') return
    // const data = {}
    // Object.keys(res.data).forEach(key => {
    //   Object.keys(res.data[key]).forEach(innerKey => {
    //     data[`${key}_${innerKey}`] = res.data[key][innerKey]
    //   })
    // })
    // commit('setList', data)
    return res
  },
  async updateSettings({ commit }, payload) {
    const res = await this.app.$axios.$patch(
      `/departments/${payload.id}/config`,
      payload
    )
    if (!res || res === 'error') return
    return res
  }
}
