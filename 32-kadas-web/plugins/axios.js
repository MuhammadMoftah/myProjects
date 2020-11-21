export default function({ $axios, redirect, store }) {
  $axios.onRequest(config => {
    if (store.state.auth.token) {
      config.headers.common.Authorization = `Bearer ${store.state.auth.token}`
    }
  })
  $axios.onRequestError(err => {
    console.log(err)
    store.dispatch('snackbar/show', {
      message: `Couldn't connect to the API.`,
      timeout: 30000,
      title: 'title',
      position: 'bottomCenter'
    })
    return 'error'
  })

  $axios.onError(err => {
    console.log(err)
    store.dispatch('snackbar/show', {
      message: `Somthing went wrong, please try again later.`,
      timeout: 30000,
      title: 'title',
      position: 'bottomCenter'
    })
  })

  $axios.onError(err => {
    if (err.response && err.response.data) {
      const errors = err.response.data.errors
      const message =
        (errors &&
          errors[Object.keys(errors)[0]] &&
          errors[Object.keys(errors)[0]][0]) ||
        err.response.data.message ||
        errors[0].message
      store.dispatch('snackbar/show', {
        message,
        timeout: 30000,
        position: 'bottomCenter'
      })
      console.log(message)
      return 'error'
    }
  })
}
