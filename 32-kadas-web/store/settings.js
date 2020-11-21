export const state = () => ({
  // list: []
})

export const mutations = {
  // setList(state, payload) {
  //   state.list = payload
  // }
}

export const actions = {
  async getSettings({ commit }) {
    const res = await this.app.$axios.$get('/settings')
    if (!res || res === 'error') return
    const data = {}
    Object.keys(res.data).forEach(key => {
      Object.keys(res.data[key]).forEach(innerKey => {
        data[`${key}_${innerKey}`] = res.data[key][innerKey]
      })
    })
    // commit('setList', data)
    return data
  },
  async updateSettings({ commit, rootState }, payload) {
    const res = await this.app.$axios.$patch('/settings', payload)
    if (!res || res === 'error') return
    // commit('setList', res.data)
    return res
  },
  async setupSettings({ commit, dispatch, rootState }, payload) {
    const res = await this.app.$axios.$post('/settings/setup', payload)
    if (!res || res === 'error') return
    // commit('setList', res.data)
    dispatch('auth/updateUserData', { setup: false }, { root: true })
    commit('auth/updateSetup', false, { root: true })
    this.$router.push('/')
    return res
  }
}
