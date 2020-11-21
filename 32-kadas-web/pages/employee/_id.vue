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
          <div class="employee-name-avatar">
            <div v-if="employeeData.avatar">
              <img :src="employeeData.avatar" :alt="employeeData.full_name" class="employee-img">
            </div>
            <h1 class="display-2 font-weight-thin">
              {{ employeeData.full_name || "Employee Name" }}
            </h1>
          </div>
          <!-- <h1 class="display-2 font-weight-thin">
            {{ employeeData.full_name || "Employee Name" }}
          </h1> -->
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Email:</strong> {{ employeeData.email }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Full name:</strong> {{ employeeData.full_emp_name }}</p>
        </v-flex>
        <v-flex v-if="employeeData.kin_name" xs12 md4>
          <p><strong>Kin name:</strong> {{ employeeData.kin_name }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p>
            <strong>Department:</strong> <nuxt-link :to="`/department/${employeeData.department_id}`">
              {{ getDepartmentName(employeeData.department_id) }}
            </nuxt-link>
          </p>
        </v-flex>
        <v-flex xs12 md4>
          <p>
            <strong>Job title:</strong> <nuxt-link :to="`/jobTitle/${employeeData.job_title_id}`">
              {{ getJobTitle(employeeData.job_title_id) }}
            </nuxt-link>
          </p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Roles:</strong> {{ employeeData.roles && employeeData.roles.length > 0 ? employeeData.roles.join(', ') : "N/A" }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Phone:</strong> {{ employeeData.phone }}</p>
        </v-flex>
        <v-flex v-if="employeeData.kin_phone" xs12 md4>
          <p><strong>Kin phone:</strong> {{ employeeData.kin_phone }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Reference Number:</strong> {{ employeeData.ref_id }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Address: </strong> {{ employeeData.address }}</p>
        </v-flex>
        <v-flex v-if="employeeData.city" xs12 md4>
          <p><strong>City:</strong> {{ employeeData.city }}</p>
        </v-flex>
        <v-flex v-if="employeeData.national_id" xs12 md4>
          <p><strong>National ID:</strong> {{ employeeData.national_id }}</p>
        </v-flex>
        <v-flex v-if="employeeData.national_type" xs12 md4>
          <p><strong>National type:</strong> {{ employeeData.national_type }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Date of Birth:</strong> {{ employeeData.date_of_birth }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Gender:</strong> {{ employeeData.gender }}</p>
        </v-flex>
        <v-flex v-if="employeeData.zip_code" xs12 md4>
          <p><strong>Zip code:</strong> {{ employeeData.zip_code }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Qualification:</strong> {{ employeeData.highest_qualification }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Performance assessment:</strong> {{ employeeData.performance_assessment }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Total overtime earning:</strong> {{ employeeData.total_overtime_earning }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Total overtime hours:</strong> {{ employeeData.total_overtime_hours }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Hired at:</strong> {{ employeeData.hired_at && employeeData.hired_at.includes(' ') ? employeeData.hired_at.split(' ')[0] : employeeData.hired_at }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Date of last assement:</strong> {{ employeeData.date_of_last_assement && employeeData.date_of_last_assement.includes(' ') ? employeeData.date_of_last_assement.split(' ')[0] : employeeData.date_of_last_assement }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Last date of employment:</strong> {{ employeeData.last_date_of_employment && employeeData.last_date_of_employment.includes(' ') ? employeeData.last_date_of_employment.split(' ')[0] : employeeData.last_date_of_employment }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Type of employment:</strong> {{ employeeData.type_of_employment }}</p>
        </v-flex>
        <!-- <v-flex v-if="employeeData.military_status" xs12 md4>
          <p><strong>Military status:</strong> {{ employeeData.military_status }}</p>
        </v-flex> -->
        <v-flex v-if="employeeData.car_reg" xs12 md4>
          <p><strong>Car reg:</strong> {{ employeeData.car_reg }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Comment:</strong> {{ employeeData.comment }}</p>
        </v-flex>
        <v-flex xs12>
          <v-dialog v-model="confirm" :persistent="buttonLoading" content-class="dialog" max-width="500px">
            <v-btn slot="activator" color="red darken-2 contrast--text">
              Reset mobile device
            </v-btn>
            <v-card>
              <v-card-title class="card-title">
                <span class="headline px-2">
                  Are you sure?
                </span>
              </v-card-title>
              <v-card-actions class="px-3 pb-3">
                <v-spacer />
                <v-btn color="primary" flat :disabled="buttonLoading" @click="close">
                  No
                </v-btn>
                <v-btn color="red" dark :loading="buttonLoading" @click="resetMobileDevice">
                  Yes
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Leaves
          </h1>
        </v-flex>
        <v-flex xs12>
          <Leaves :list="leaves" />
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Loans
          </h1>
        </v-flex>
        <v-flex xs12>
          <Loans :list="loans" />
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Overtimes
          </h1>
        </v-flex>
        <v-flex xs12>
          <Overtimes :list="overtimes" />
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Events
          </h1>
        </v-flex>
        <v-flex xs12>
          <Events :list="events" />
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Trips
          </h1>
        </v-flex>
        <v-flex xs12>
          <Trips :list="trips" />
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Tasks
          </h1>
        </v-flex>
        <v-flex xs12>
          <Tasks :list="tasks" />
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Attendances
          </h1>
        </v-flex>
        <v-flex xs12>
          <Attendances :list="attendances" />
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Documents
          </h1>
        </v-flex>
        <v-flex xs12>
          <EmployeeDocuments :id="id" :list="documents" />
        </v-flex>
      </v-layout>
    </v-card>
  </div>
</template>

<script>
import Leaves from '~/components/Leaves/LeavesListing'
import Loans from '~/components/Loans/LoansListing'
import Overtimes from '~/components/Overtimes/OvertimesListing'
import Events from '~/components/Events/EventsListing'
import Trips from '~/components/Trips/TripsListing'
import Tasks from '~/components/Tasks/TasksListing'
import Attendances from '~/components/Attendances/AttendancesListing'
import EmployeeDocuments from '~/components/Employees/EmployeeDocuments'

export default {
  components: {
    Leaves,
    Loans,
    Overtimes,
    Events,
    Trips,
    Tasks,
    Attendances,
    EmployeeDocuments
  },
  data() {
    return {
      id: '',
      confirm: false,
      buttonLoading: false,
      loading: false,
      pageLoading: false,
      employeeData: {},
      leaves: [],
      loans: [],
      overtimes: [],
      events: [],
      trips: [],
      tasks: [],
      attendances: [],
      documents: []
    }
  },
  computed: {
    departments() {
      return this.$store.state.departments.list
    },
    jobTitles() {
      return this.$store.state.jobTitles.list
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    this.$store.dispatch('departments/getDepartments')
    this.$store.dispatch('jobTitles/getJobTitles')
    const res = await this.$store.dispatch('employees/getSingle', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.employeeData = res
    // console.log(res)
    // console.log('employee data', this.employeeData)

    const leaves = await this.$store.dispatch('leaves/getByEmployee', this.id)
    if (!leaves || leaves === 'error') return
    this.leaves = leaves
    // console.log('leaves data', this.leaves)

    const loans = await this.$store.dispatch('loans/getByEmployee', this.id)
    if (!loans || loans === 'error') return
    this.loans = loans
    // console.log('loans data', this.loans)

    const overtimes = await this.$store.dispatch(
      'overtimes/getByEmployee',
      this.id
    )
    if (!overtimes || overtimes === 'error') return
    this.overtimes = overtimes
    // console.log('overtimes data', this.overtimes)

    const events = await this.$store.dispatch('events/getByEmployee', this.id)
    if (!events || events === 'error') return
    this.events = events
    // console.log('events data', this.events)

    const trips = await this.$store.dispatch('trips/getByEmployee', this.id)
    if (!trips || trips === 'error') return
    this.trips = trips
    // console.log('trips data', this.trips)

    const tasks = await this.$store.dispatch('tasks/getByEmployee', this.id)
    if (!tasks || tasks === 'error') return
    this.tasks = tasks
    // console.log('tasks data', this.tasks)

    const attendances = await this.$store.dispatch(
      'attendances/getByEmployee',
      this.id
    )
    if (!attendances || attendances === 'error') return
    this.attendances = attendances
    // console.log('attendances data', this.attendances)

    const documents = await this.$store.dispatch(
      'employees/getEmployeeDocuments',
      this.id
    )
    if (!documents || documents === 'error') return
    this.documents = documents
    // console.log('documents data', this.documents)
  },
  methods: {
    getDepartmentName(id) {
      const dept = this.departments.find(item => item.id === id)
      return dept ? dept.name : ''
    },
    getJobTitle(id) {
      const title = this.jobTitles.find(item => item.id === id)
      return title ? title.name : ''
    },
    close() {
      this.confirm = false
    },
    async resetMobileDevice() {
      this.buttonLoading = true
      const res = await this.$store
        .dispatch('employees/resetMobileDevice', this.id)
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false
      if (!res || res === 'error') return
      // console.log(res)
      this.close()
      this.$store.dispatch('snackbar/show', {
        message: 'Mobile device has been reset successfully!',
        color: 'success',
        timeout: 2000
      })
    }
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

.employee-img {
  width 50px
  height 50px
  object-fit cover
  display block
}

.employee-name-avatar {
  display flex
  align-items center
  & > div {
    display flex
    align-items center
    margin-right 8px
  }
}
</style>
