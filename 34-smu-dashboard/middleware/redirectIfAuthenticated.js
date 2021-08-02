export default function({ app, redirect, route, $auth, store }) {
  if ($auth.loggedIn) {
    return redirect("/manager");
  }
}
