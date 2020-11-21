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
          <h1 class="display-1 font-weight-thin text-uppercase">
            {{ 'Attendance #' + (attendanceData.id || '') }}
          </h1>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Action:</strong> {{ attendanceData.action }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Latitude:</strong> {{ attendanceData.latitude }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Longitude:</strong> {{ attendanceData.longitude }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Comment:</strong> {{ attendanceData.comment || 'N/A' }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Employee:</strong> {{ employeeData.full_name }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <nuxt-link :to="`/employee/${employeeData.id}`">
            Go to {{ attendanceData.employee_fullname || 'employee' }}'s profile
          </nuxt-link>
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
      </v-layout>
    </v-card>
  </div>
</template>

<script>
export default {
  data() {
    return {
      id: '',
      loading: false,
      pageLoading: false,
      attendanceData: {},
      employeeData: {}
    }
  },
  computed: {
    position() {
      if (!this.attendanceData.latitude || !this.attendanceData.longitude) {
        return false
      }

      return {
        lat: Number(this.attendanceData.latitude),
        lng: Number(this.attendanceData.longitude)
      }
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('attendances/getAttendance', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.attendanceData = res.data
    this.employeeData = res.employee
    // console.log('attendance data', this.attendanceData)
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
