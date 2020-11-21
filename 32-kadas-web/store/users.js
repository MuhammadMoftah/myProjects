export const state = () => ({
  list: [],
  inactive: []
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
  setInactive(state, payload) {
    state.inactive = payload
  },
  newUser(state, payload) {
    state.list.unshift(payload)
  },
  updateProfile(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload.id)
    arr[index] = { ...arr[index], ...payload }
    state.list = arr
  },
  deleteInactive(state, payload) {
    const arr = [...state.inactive]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.inactive = arr
  }
}

export const actions = {
  async getUsers({ commit }) {
    const res = await this.app.$axios.$get('/users')
    if (!res || res === 'error') return
    commit('setList', res.data)
  },
  async getInactiveUsers({ commit }) {
    const res = await this.app.$axios.$get('/users?filter[by_role]=unactivated')
    if (!res || res === 'error') return
    commit('setInactive', res.data)
    return res.data
  },
  async getProfile({ commit }, payload) {
    const res = await this.app.$axios.$get(`/users/${payload}/profile`)
    if (!res || res === 'error') return
    return res.data
  },
  async newUser({ commit }, payload) {
    const res = await this.app.$axios.$post('/users', payload)
    if (!res || res === 'error') return
    commit('newUser', res.data[0])
    return res.data[0]
  },
  async updateUser({ commit }, payload) {
    const res = await this.app.$axios.$patch(
      `/users/${payload.user_id || payload.id}`,
      payload
    )
    if (!res || res === 'error') return false
    commit('updateProfile', res.data[0])
    return res.data[0]
  },
  async updateProfile({ commit }, payload) {
    let resAvatar
    if (payload.avatar) {
      // console.log(payload.avatar)
      const data = new FormData()
      data.append('document', payload.avatar)
      resAvatar = await this.app.$axios.$patch(
        `/users/${payload.id}/profile`,
        data,
        {
          headers: {
            'content-type': 'multipart/form-data'
          }
        }
      )
      if (!resAvatar || resAvatar === 'error') return false
    }
    const data = { ...payload }
    delete data.avatar
    const resData = await this.app.$axios.$patch(
      `/users/${payload.id}/profile`,
      data
    )
    if (!resData || resData === 'error') return false
    // console.log('prof resData', resData)
    commit('updateProfile', resData.data)
    return resData.data[0]
  },
  async deleteInactiveUser({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/users/${payload}`)
    if (!res || res === 'error') return
    commit('deleteInactive', payload)
    return payload
  },
  async getUserRoles(ctx, payload) {
    const res = await this.app.$axios.$get(`/users/${payload}/roles`)
    if (!res || res === 'error') return
    return res
  },
  async assignRole(ctx, payload) {
    const res = await this.app.$axios.$post(
      `/users/${payload.id}/assign/roles/${payload.role}`
    )
    if (!res || res === 'error') return
    return res
  },
  async removeRole(ctx, payload) {
    const res = await this.app.$axios.$post(
      `/users/${payload.id}/remove/roles/${payload.role}`
    )
    if (!res || res === 'error') return
    return res
  }
}
