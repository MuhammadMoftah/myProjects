export const state = () => ({
  token: '',
  user: {}
})

export const mutations = {
  login(state, payload) {
    state.token = payload.token
    state.user = {
      ...state.user,
      ...payload.data
    }
  },
  updateUserData(state, payload) {
    state.user = {
      ...state.user,
      ...payload
    }
  },
  loginWithToken(state, payload) {
    state.token = payload
  },
  setAuthUserData(state, payload) {
    state.user = payload
  },
  logout(state) {
    state.token = ''
    state.user = {}
  },
  updateSetup(state, payload) {
    state.user.setup = payload
  }
}

export const actions = {
  async login({ commit, dispatch }, payload) {
    const subdomain = payload.email.split('@')[1].split('.')[0]
    const baseURL = process.env.API_ENDPOINT.replace('SUBDOMAIN', subdomain)
    this.app.$axios.defaults.baseURL = baseURL
    const res = await this.app.$axios.$post('/login', payload)
    if (!res || res === 'error') return
    const resSetup = await this.app.$axios.$get('/settings/company', {
      headers: {
        Authorization: `Bearer ${res.data.token}`
      }
    })
    if (!resSetup || resSetup === 'error') return
    console.log(resSetup)
    const s = resSetup.data.is_setup
    const setup = !!(s === false || s === 'false' || s === 0 || s === '0')
    const roles = res.data.roles || []
    const permissions = res.data.permissions || []
    const data = {
      ...res.data.user,
      ...res.data.profile,
      employee_id: res.data.employee.id,
      roles,
      permissions,
      setup
    }
    commit('login', {
      data,
      token: res.data.token
    })
    this.app.$cookies.set('token', res.data.token)
    this.app.$cookies.set('url', baseURL, {
      path: '/',
      maxAge: 60 * 60 * 24 * 365
    })
    localStorage.setItem('user', JSON.stringify(data))
    if (setup) {
      this.$router.push('/settings')
      return res.data.token
    }
    const redirectTo = this.$cookies.get('redirectTo')
    if (redirectTo) {
      this.$cookies.remove('redirectTo')
      this.$router.push(redirectTo)
    } else {
      this.$router.push('/')
    }
    return res.data.token
  },
  updateUserData({ commit, state }, payload) {
    const data = state.user.id ? state.user : localStorage.getItem('user')
    commit('updateUserData', {
      ...data,
      ...payload
    })
    localStorage.setItem(
      'user',
      JSON.stringify({
        ...data,
        ...payload
      })
    )
    return {
      ...data,
      ...payload
    }
  },
  async forgot({ commit }, payload) {
    const subdomain = payload.email.split('@')[1].split('.')[0]
    const baseURL = process.env.API_ENDPOINT.replace('SUBDOMAIN', subdomain)
    this.app.$axios.defaults.baseURL = baseURL
    const res = await this.app.$axios.$post('/password/create', payload)
    if (!res || res === 'error') return
    return res.message
  },
  async checkResetToken({ commit, dispatch }, payload) {
    const baseURL = process.env.API_ENDPOINT.replace(
      'SUBDOMAIN',
      payload.company
    )
    this.app.$axios.defaults.baseURL = baseURL
    const res = await this.app.$axios
      .$get(`/password/find/${payload.token}`)
      .catch(err => {
        if (!err.response && err.request) {
          dispatch(
            'snackbar/show',
            {
              message: `Couldn't validate your token`,
              timeout: 5000
            },
            {
              root: true
            }
          )
        }
        this.$router.replace('/')
      })
    if (!res || res === 'error') {
      this.$router.replace('/')
      return
    }

    return res
  },
  async reset({ commit, dispatch }, payload) {
    const subdomain = payload.email.split('@')[1].split('.')[0]
    const baseURL = process.env.API_ENDPOINT.replace('SUBDOMAIN', subdomain)
    this.app.$axios.defaults.baseURL = baseURL
    const res = await this.app.$axios.$post('/password/reset', payload)
    if (!res || res === 'error') return
    // console.log(res)
    dispatch(
      'snackbar/show',
      {
        message: `Your password was reset successfully`,
        timeout: 5000
      },
      {
        root: true
      }
    )
  },
  loginWithToken({ commit }, payload) {
    commit('loginWithToken', payload)
    const user = localStorage.getItem('user')
    const baseURL = this.app.$cookies.get('url')
    if (baseURL) this.app.$axios.defaults.baseURL = baseURL
    if (user) commit('setAuthUserData', JSON.parse(user))
    return user
  },
  async logout({ commit }) {
    const res = await this.app.$axios.$post('/logout')
    if (!res || res === 'error') return
    commit('logout')
    this.app.$cookies.remove('token')
    localStorage.removeItem('user')
    this.$router.push('/login')
    return 'Logged out'
  },
  clearData({ commit }) {
    this.app.$cookies.remove('token')
    localStorage.removeItem('user')
    commit('logout')
  }
}
