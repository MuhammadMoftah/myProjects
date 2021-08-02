export default function({ redirect, $auth, app, $axios, store }) {
  // $axios.setHeader("X-SMU-LOCALE", app.store.state.lang.code, [
  //   "get",
  //   "post",
  //   "patch",
  //   "put"
  // ]);
  // $axios.setHeader("X-SMU-LOCALE", app.store.state.lang.code);

  if (!$auth.loggedIn) {
    redirect("/manager/login");
  }
}
