export const state = () => ({
  list: [],
  permissions: [],
  currentPermissions: []
})

export const mutations = {
  setList(state, payload) {
    state.list = payload
  },
  newRole(state, payload) {
    const arr = [...state.list]
    arr.unshift(payload)
    state.list = arr
  },
  deleteRole(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.list = arr
  },
  updateRole(state, payload) {
    const arr = [...state.list]
    const index = arr.findIndex(item => item.id === payload.id)
    arr[index] = payload
    state.list = arr
  },
  setPermissions(state, payload) {
    state.permissions = payload
  },
  setCurrentPermissions(state, payload) {
    if (payload && payload.length > 0 && typeof payload[0] === 'object') {
      state.currentPermissions = payload.map(item => item.name)
    } else {
      state.currentPermissions = payload
    }
  },
  newRolePermission(state, payload) {
    const arr = [...state.currentPermissions]
    arr.unshift(payload)
    state.currentPermissions = arr
  },
  deleteRolePermission(state, payload) {
    const arr = [...state.currentPermissions]
    const index = arr.findIndex(item => item.id === payload)
    arr.splice(index, 1)
    state.currentPermissions = arr
  }
}

export const actions = {
  async getRoles({ commit }) {
    const res = await this.app.$axios.$get('/roles')
    if (!res || res === 'error') return
    commit('setList', res.data)
    return res.data
  },
  async newRole({ commit }, payload) {
    const res = await this.app.$axios.$post('/roles', payload)
    if (!res || res === 'error') return
    commit('newRole', res.data[0])
    return res.data[0]
  },
  async deleteRole({ commit }, payload) {
    const res = await this.app.$axios.$delete(`/roles/${payload}`)
    if (!res || res === 'error') return
    commit('deleteRole', payload)
    return payload
  },
  async updateRole({ commit }, payload) {
    const res = await this.app.$axios.$patch(`/roles/${payload.id}`, {
      name: payload.name
    })
    if (!res || res === 'error') return
    commit('updateRole', res.data[0])
    return res.data[0]
  },
  async getSingle({ commit }, payload) {
    const res = await this.app.$axios.$get(`/roles/${payload}`)
    const resPermissions = await this.app.$axios.$get(
      `/roles/${payload}/permissions`
    )
    if (!res || res === 'error') return
    if (!resPermissions || resPermissions === 'error') return
    // console.log('yoo', resPermissions)
    const data = {
      ...res.data,
      permissions: resPermissions
    }
    commit('setCurrentPermissions', resPermissions)
    return data
  },
  async getPermissions({ commit }) {
    const res = await this.app.$axios.$get('/permissions')
    if (!res || res === 'error') return
    commit('setPermissions', res.data)
    return res.data
  },
  async newRolePermission({ commit }, payload) {
    const data = new FormData()
    payload.permission.forEach((item, index) => {
      data.append(`permissions[${index}]`, item)
    })
    const res = await this.app.$axios.$post(
      `/roles/${payload.role_id}/assign/permissions/multiple`,
      data,
      {
        headers: {
          'content-type': 'multipart/form-data'
        }
      }
    )
    if (!res || res === 'error') return
    commit('setCurrentPermissions', res.data)
    return res.data
  },
  async deleteRolePermission({ commit }, payload) {
    if (!payload || !payload.permission || !payload.permission.name) return
    const res = await this.app.$axios.$post(
      `/roles/${payload.role_id}/remove/permissions/${payload.permission.name}`
    )
    if (!res || res === 'error') return
    commit('setCurrentPermissions', res.data)
    return payload
  },
  async getAllUserPermissions(ctx, payload) {
    if (!payload || payload.length <= 0) return
    let permissions = []
    await asyncForEach(payload, async item => {
      const res = await this.app.$axios.$get(`/roles/${item}/permissions`)
      if (!res || res === 'error') return
      permissions = [...permissions, ...res]
    })
    return permissions
  }
}

async function asyncForEach(array, callback) {
  for (let index = 0; index < array.length; index++) {
    await callback(array[index], index, array)
  }
}
