<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage your employees
      </h1>
      <EmployeeListing import-enabled />
    </v-flex>
    <v-flex v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('job-title_read')">
      <h1 class="page-title display-1 font-weight-thin">
        Manage your Job Titles
      </h1>
      <JobTitlesListing />
    </v-flex>
  </v-layout>
</template>

<script>
import EmployeeListing from '~/components/Employees/EmployeeListing'
import JobTitlesListing from '~/components/Employees/JobTitlesListing'

export default {
  components: {
    EmployeeListing,
    JobTitlesListing
  }
}
</script>

<style lang="stylus" scoped>
.page-title {
  margin-bottom 30px
}
.card-title {
  padding-bottom 0
}
.dialog {
  overflow-x: hidden
}
</style>
