export default function({ app, store, redirect, route }) {
  if (
    route.name &&
    route.name.includes('employee') &&
    !store.state.auth.user.permissions.includes('employee_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('inactive') &&
    !store.state.auth.user.permissions.includes('user_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('jobTitle') &&
    !store.state.auth.user.permissions.includes('job-title_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('department') &&
    !store.state.auth.user.permissions.includes('department_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('leave') &&
    !store.state.auth.user.permissions.includes('leave_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('loan') &&
    !store.state.auth.user.permissions.includes('loan_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('overtime') &&
    !store.state.auth.user.permissions.includes('overtime_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('task') &&
    !store.state.auth.user.permissions.includes('task_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('announcement') &&
    !store.state.auth.user.permissions.includes('announcement_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('spot') &&
    !store.state.auth.user.permissions.includes('spot_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('attendance') &&
    !store.state.auth.user.permissions.includes('attendance_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('trip') &&
    !store.state.auth.user.permissions.includes('trip_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('event') &&
    !store.state.auth.user.permissions.includes('event_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('stock') &&
    !store.state.auth.user.permissions.includes('stock_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('feedback') &&
    !store.state.auth.user.permissions.includes('feedback_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('ticket') &&
    !store.state.auth.user.permissions.includes('ticket_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('companyDocument') &&
    !store.state.auth.user.permissions.includes('document_read')
  ) {
    return redirect('/')
  }

  if (
    route.name &&
    route.name.includes('role') &&
    !store.state.auth.user.permissions.includes('role_read')
  ) {
    return redirect('/')
  }

  if (
    route.name === 'settings' &&
    !store.state.auth.user.permissions.includes('setting_update')
  ) {
    return redirect('/')
  }
}
