export const state = () => ({
  list: [],
  jobTitles: [],
  documents: []
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
  newEmployee(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  deleteEmployee(state, payload) {
    const index = state.list.findIndex(item => item.id === payload)
    const arr = [...state.list]
    arr.splice(index, 1)
    state.list = arr
  },
  updateEmployee(state, payload) {
    const index = state.list.findIndex(item => item.id === payload.id)
    const arr = [...state.list]
    arr[index] = payload
    state.list = arr
  },
  setJobTitles(state, payload) {
    state.jobTitles = payload
  },
  newJobTitle(state, payload) {
    const arr = [...state.jobTitles]
    arr.unshift(payload)
    state.jobTitles = arr
  },
  deleteJobTitle(state, payload) {
    const index = state.jobTitles.findIndex(item => item.id === payload)
    const arr = [...state.jobTitles]
    arr.splice(index, 1)
    state.jobTitles = arr
  },
  updateJobTitle(state, payload) {
    const index = state.jobTitles.findIndex(item => item.id === payload.id)
    const arr = [...state.jobTitles]
    arr[index] = payload
    state.jobTitles = arr
  },
  setDocuments(state, payload) {
    state.documents = payload
  },
  newEmployeeDocument(state, payload) {
    const arr = [...state.documents]
    arr.unshift(payload)
    state.documents = arr
  },
  deleteEmployeeDocument(state, payload) {
    const arr = [...state.documents]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.documents = arr
  },
  updateEmployeeDocument(state, payload) {
    const arr = [...state.documents]
    const index = arr.findIndex(item => item.id === payload.id)
    arr[index] = payload
    state.documents = arr
  }
}

export const actions = {
  async getEmployees({ commit }) {
    const res = await this.app.$axios.$get(
      '/employees?sort=-created_at&include=user'
    )
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res
  },
  async getSingle({ commit }, payload) {
    const res = await this.app.$axios.$get(
      `/employees/${payload}?include=user,job_title,department,documents`
    )
    if (!res || res === 'error') return
    // console.log(res)
    const resProfile = await this.app.$axios.$get(
      `/users/${res.user.id}/profile`
    )
    if (!resProfile || resProfile === 'error') return
    // console.log(resProfile)
    const data = {
      ...res.user,
      ...res.data,
      ...resProfile.data,
      id: res.data.id,
      user_id: res.user.id,
      department_id: res.department ? res.department.id : '',
      job_title_id: res.job_title ? res.job_title.id : ''
    }
    return data
  },
  async getEmployeeDocuments({ commit }, payload) {
    const res = await this.app.$axios.$get(`/employees/${payload}/documents`)
    if (!res || res === 'error') return
    commit('setDocuments', res.data)
    return res.data
  },
  async newEmployeeDocument({ commit }, payload) {
    const data = new FormData()
    data.append('document', payload.document)
    if (payload.name) data.append('name', payload.name)
    if (payload.type) data.append('type', payload.type)
    const res = await this.app.$axios.$post(
      `/employees/${payload.id}/documents`,
      data,
      {
        headers: {
          'content-type': 'multipart/form-data'
        }
      }
    )
    if (!res || res === 'error') return
    commit('newEmployeeDocument', res.data[0])
    return res.data[0]
  },
  async deleteEmployeeDocument({ commit }, payload) {
    const res = await this.app.$axios.$delete(
      `/employees/${payload.id}/documents/${payload.docId}`
    )
    if (!res || res === 'error') return
    commit('deleteEmployeeDocument', payload.docId)
    return payload.docId
  },
  async updateEmployeeDocument({ commit }, payload) {
    const data = {}
    if (payload.name) data.name = payload.name
    if (payload.type) data.type = payload.type
    const res = await this.app.$axios.$patch(
      `/employees/${payload.id}/documents/${payload.docId}`,
      data
    )
    if (!res || res === 'error') return
    commit('updateEmployeeDocument', res.data[0])
    return res.data[0]
  },
  async newEmployee({ commit, dispatch }, payload) {
    const usersRes = await dispatch('users/newUser', payload, { root: true })
    await dispatch(
      'users/updateProfile',
      { ...payload, id: usersRes.id },
      { root: true }
    )
    const data = { ...payload, user_id: usersRes.id }
    const res = await this.app.$axios.$post('/employees', data)
    if (!res || res === 'error') return
    commit('newEmployee', res.data[0])
    return res.data[0]
  },
  async deleteEmployee({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/employees/${payload}`)
    if (!res || res === 'error') return
    commit('deleteEmployee', payload)
    return payload
  },
  async updateEmployee({ commit, dispatch }, payload) {
    const usersRes = await dispatch('users/updateUser', payload, { root: true })
    // console.log(usersRes)
    if (!usersRes || usersRes === 'error') return false
    const profileRes = await dispatch(
      'users/updateProfile',
      { ...payload, id: usersRes.id },
      { root: true }
    )
    if (!profileRes || profileRes === 'error') return false
    const data = { ...payload, user_id: usersRes.id }
    const res = await this.app.$axios.$patch(`/employees/${payload.id}`, data)
    // console.log('emp upd', res)
    if (!res || res === 'error') return false
    commit('updateEmployee', res.data[0])
    return { ...usersRes, ...profileRes, ...res.data[0] }
  },
  async activateEmployee({ commit, dispatch }, payload) {
    const usersRes = await dispatch('users/updateUser', payload, { root: true })
    // console.log(usersRes)
    if (!usersRes || usersRes === 'error') return false
    const profileRes = await dispatch(
      'users/updateProfile',
      { ...payload, id: usersRes.id },
      { root: true }
    )
    if (!profileRes || profileRes === 'error') return false
    const data = { ...payload, user_id: usersRes.id }
    const res = await this.app.$axios.$post('/employees', data)
    // console.log('emp upd', res)
    if (!res || res === 'error') return false
    commit('users/deleteInactive', payload, { root: true })
    return { ...usersRes, ...profileRes, ...res.data[0] }
  },
  async getJobTitles({ commit }) {
    const res = await this.app.$axios.$get('/job-titles?sort=-created_at')
    if (!res || res === 'error') return
    commit('setJobTitles', res.data)
    return res.data
  },
  async newJobTitle({ commit }, payload) {
    const res = await this.app.$axios.post('/job-titles', payload)
    if (!res || res === 'error') return
    commit('newJobTitle', res.data.data[0])
    return res
  },
  async deleteJobTitle({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/job-titles/${payload}`)
    if (!res || res === 'error') return
    commit('deleteJobTitle', payload)
    return payload
  },
  async updateJobTitle({ commit }, payload) {
    const res = await this.app.$axios.$patch(
      `/job-titles/${payload.id}`,
      payload
    )
    if (!res || res === 'error') return
    commit('updateJobTitle', res.data[0])
    return res
  },
  async getByDepartment(ctx, payload) {
    const res = await this.app.$axios.$get(
      `/employees?sort=-created_at&filter[by_department]=${payload}`
    )
    if (!res || res === 'error') return
    return res.data
  },
  async getByJobTitle(ctx, payload) {
    const res = await this.app.$axios.$get(
      `/employees?sort=-created_at&filter[by_job_title]=${payload}`
    )
    if (!res || res === 'error') return
    return res.data
  },
  async resetMobileDevice(ctx, payload) {
    const res = await this.app.$axios.$post(
      `/employees/${payload}/platforms/clear`
    )
    if (!res || res === 'error') return
    return res.code === 200
  },
  async importData(ctx, payload) {
    const data = new FormData()
    if (payload) data.append('users', payload)
    const res = await this.app.$axios.$post('/import/users', data, {
      headers: {
        'content-type': 'multipart/form-data'
      }
    })
    if (!res || res === 'error') return
    return res
  }
}
