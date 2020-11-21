export const state = () => ({
  list: []
})

export const getters = {
  dailyTasks(state) {
    return state.list.filter(item => item.status.includes('PENDING'))
  }
}

export const mutations = {
  setList(state, payload) {
    state.list = payload
  },
  newTask(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  deleteTask(state, payload) {
    const index = state.list.findIndex(item => item.id === payload)
    const arr = [...state.list]
    arr.splice(index, 1)
    state.list = arr
  },
  updateTask(state, payload) {
    const index = state.list.findIndex(item => item.id === payload.id)
    const arr = [...state.list]
    arr[index] = payload
    state.list = arr
  }
}

export const actions = {
  async getTasks({ commit }) {
    const res = await this.app.$axios.$get('/tasks')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res
  },
  async startTask({ commit }, payload) {
    const res = await this.app.$axios.post(`/tasks/${payload.id}/status`, {
      status_id: payload.status.id
    })
    if (!res || res === 'error') return
    // console.log('Approve task', res.data)
    commit('updateTask', res.data.data)
    return res.data.data
  },
  async completeTask({ commit }, payload) {
    const res = await this.app.$axios.post(`/tasks/${payload.id}/status`, {
      status_id: payload.status.id
    })
    if (!res || res === 'error') return
    // console.log('Reject task', res.data)
    commit('updateTask', res.data.data)
    return res.data.data
  },
  async newTask({ commit }, payload) {
    const res = await this.app.$axios.post('/tasks', payload)
    if (!res || res === 'error') return
    commit('newTask', res.data.data[0])
    return res.data.data[0]
  },
  async deleteTask({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/tasks/${payload}`)
    if (!res || res === 'error') return
    commit('deleteTask', payload)
    return payload
  },
  async updateTask({ commit }, payload) {
    const res = await this.app.$axios.$patch(`/tasks/${payload.id}`, payload)
    if (!res || res === 'error') return
    commit('updateTask', res.data[0])
    return res.data[0]
  },
  async getByEmployee(ctx, payload) {
    const res = await this.app.$axios.$get(
      `/tasks?sort=-created_at&filter[by_employee]=${payload}`
    )
    if (!res || res === 'error') return
    return res.data
  },
  async getTask({ commit }, payload) {
    const res = await this.app.$axios.$get(`/tasks/${payload}`)
    if (!res || res === 'error') return
    return res
  }
}
