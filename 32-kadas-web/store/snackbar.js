/*
 *
 * Global Vuetify Snackbar management
 * Just dispatch the show action with your message and timeout
 * Author: Bassel Ahmed
 *
 */

export const state = () => ({
  message: '',
  show: false,
  timeout: 1000,
  color: undefined
})

export const mutations = {
  setSnack(state, payload) {
    state.message = payload.message || ''
    state.show = payload.show || false
    state.timeout = payload.timeout || 1000
    state.color = payload.color || undefined
  },
  saveTimeoutId(state, payload) {
    state.timeoutId = payload
  }
}

export const actions = {
  show({ commit, dispatch, state }, payload) {
    const { message = '', timeout = 1000, color = undefined } = payload
    let colorHex
    if (color) {
      if (color === 'success') colorHex = '#388E3C'
      if (color === 'danger') colorHex = '#D32F2F'
    }
    if (state.timeoutId) clearTimeout(state.timeoutId) // check if there is any timeouts exisiting and clear them before showing a new toast
    if (state.message) {
      // if there is any message show, hide it, wait for transition period to end then show the new one
      dispatch('hide')
      setTimeout(() => {
        commit('setSnack', {
          show: true,
          message: message,
          timeout: timeout,
          color: colorHex
        })
      }, 400) // transition period
    } else {
      // if there isn't, just show a new toast
      commit('setSnack', {
        show: true,
        message: message,
        timeout: timeout,
        color: colorHex
      })
    }
    // start a timeout to hide the toast after its timeout has ended and the save the id to the state
    const t = setTimeout(() => {
      dispatch('hide')
    }, timeout)
    commit('saveTimeoutId', t)
  },
  hide({ commit, state }) {
    // clear everything, timeoutId and data
    if (state.timeoutId) clearTimeout(state.timeoutId)
    commit('setSnack', {
      message: '',
      show: false,
      timeout: 1000,
      color: undefined
    })
  }
}
