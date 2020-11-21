export default function({ redirect, route, store }) {
  const hasToken = !!store.state.auth.token
  if (hasToken) {
    return redirect('/')
  }
  if (!route.query.token) {
    return redirect('/')
  }
}
