export default function({ app, store, redirect, route }) {
  const token = app.$cookies.get('token') || store.state.auth.token
  const hasToken = !!token
  const authRoutes = ['login', 'register', 'forgot', 'reset']
  const whitelist = [...authRoutes]
  if (hasToken) {
    store.dispatch('auth/loginWithToken', token)
  } else {
    store.dispatch('auth/clearData')
  }
  if (
    !whitelist.includes(route.name) &&
    !hasToken &&
    route.matched.length > 0
  ) {
    app.$cookies.set('redirectTo', route.fullPath, {
      path: '/',
      maxAge: 60 * 60 * 24 * 7
    })
    return redirect('/login')
  }
  if (authRoutes.includes(route.name) && hasToken) {
    return redirect('/')
  }
}
