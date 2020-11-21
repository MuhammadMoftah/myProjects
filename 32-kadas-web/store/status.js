export const state = () => ({
  list: []
})

export const getters = {
  leaves(state) {
    return state.list.filter(item => item.type === 'leaves')
  },
  loans(state) {
    return state.list.filter(item => item.type === 'loans')
  },
  overtimes(state) {
    return state.list.filter(item => item.type === 'overtimes')
  },
  trips(state) {
    return state.list.filter(item => item.type === 'trips')
  },
  tasks(state) {
    return state.list.filter(item => item.type === 'tasks')
  },
  tickets(state) {
    return state.list.filter(item => item.type === 'tickets')
  },
  // This getter accepts a type payload i.e. leaves, loans, etc.. and return all status
  // related to this type and available to the current logged in user as an object
  getRoleStatus: (state, getters, rootState) => payload => {
    const arr = getters[payload.what].filter(item => {
      if (item.name.split('_').length === 1) return true
      return item.name.toLowerCase().includes(payload.role)
    })
    const obj = {}
    arr.forEach(item => {
      obj[item.name.split('_')[0].toLowerCase()] = item
    })
    return obj
  }
}

export const mutations = {
  setList(state, payload) {
    if (payload.where) {
      state[payload.where] = payload.data
    } else {
      state.list = payload.data
    }
  }
}

export const actions = {
  async getStatuses({ commit }, payload) {
    const res = await this.app.$axios.$get(
      `/status${payload ? `/${payload}` : ''}`
    )
    if (!res || res === 'error') return
    // console.log(res)
    commit('setList', {
      data: res.data,
      where: payload
    })
    return res
  }
}
