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
            {{ 'Department - ' + (departmentData.name || '') }}
          </h1>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Employees in this department:</strong> {{ employees.length }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Type:</strong> {{ departmentData.type }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Timezone:</strong> {{ departmentData.timezone }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Latitude:</strong> {{ departmentData.latitude }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Longitude:</strong> {{ departmentData.longitude }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Created at:</strong> {{ departmentData.created_at }}</p>
        </v-flex>
        <v-flex v-if="position" xs12>
          <GmapMap
            :center="position"
            :zoom="12"
            style="width: 100%; height: 300px"
          >
            <GmapMarker
              :position="position"
              :draggable="false"
            />
          </GmapMap>
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Employees
          </h1>
        </v-flex>
        <v-flex xs12>
          <EmployeeListing :list="employees" :department="id" />
        </v-flex>
        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Department clocking configuration
          </h1>
        </v-flex>
        <v-flex xs12>
          <DepartmentConfig :department="id" />
        </v-flex>
      </v-layout>
    </v-card>
  </div>
</template>

<script>
import EmployeeListing from '~/components/Employees/EmployeeListing'
import DepartmentConfig from '~/components/Departments/DepartmentConfig'

export default {
  components: {
    EmployeeListing,
    DepartmentConfig
  },
  data() {
    return {
      id: '',
      loading: false,
      pageLoading: false,
      departmentData: {},
      employees: [],
      zoom: 12
    }
  },
  computed: {
    position() {
      if (!this.departmentData.latitude || !this.departmentData.longitude) {
        return false
      }

      return {
        lat: Number(this.departmentData.latitude),
        lng: Number(this.departmentData.longitude)
      }
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('departments/getSingle', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.departmentData = res.data
    // console.log('department data', this.departmentData)

    const employees = await this.$store.dispatch(
      'employees/getByDepartment',
      this.id
    )
    // console.log(employees)
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
