<template>
  <div v-if="id" class="cont">
    <div v-if="pageLoading" class="overlay">
      <v-progress-circular
        indeterminate
        color="primary"
      />
    </div>
    <v-card class="pa-4">
      <v-layout row wrap>
        <v-flex xs12 class="mb-4">
          <h1 class="display-1 font-weight-thin">
            {{ 'Job Title - ' + (jobTitleData.name || '') }}
          </h1>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Employees in this job:</strong> {{ employees.length }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Hour rate:</strong> {{ jobTitleData.hour_rate }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Overtime hour rate:</strong> {{ jobTitleData.overtime_hour_rate }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>salary_start:</strong> {{ jobTitleData.salary_start }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>salary_end:</strong> {{ jobTitleData.salary_end }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Title:</strong> {{ jobTitleData.title }}</p>
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Employees
          </h1>
        </v-flex>
        <v-flex xs12>
          <EmployeeListing :list="employees" :job-title="id" />
        </v-flex>
      </v-layout>
    </v-card>
  </div>
</template>

<script>
import EmployeeListing from '~/components/Employees/EmployeeListing'

export default {
  components: {
    EmployeeListing
  },
  data() {
    return {
      id: '',
      loading: false,
      pageLoading: false,
      jobTitleData: {},
      employees: []
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('jobTitles/getSingle', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.jobTitleData = res.data
    // console.log('jobTitle data', this.jobTitleData)

    const employees = await this.$store.dispatch(
      'employees/getByJobTitle',
      this.id
    )
    if (!employees || employees === 'error') return
    this.employees = employees
    // console.log('employees data', this.employees)
  }
}
</script>

<style lang="stylus" scoped>
.cont {
  position relative
}
.overlay {
  width 100%
  height 100%
  background-color rgba(255,255,255, 0.7)
  z-index 2
  position absolute
  top 0
  left 0
  display flex
  justify-content center
  padding-top 200px
}
</style>
