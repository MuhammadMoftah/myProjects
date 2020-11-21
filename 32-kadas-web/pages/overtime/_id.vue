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
            {{ 'Overtime for ' + (overtimeData.employee_fullname || '') }}
          </h1>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Date start:</strong> {{ overtimeData.date_start }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Date end:</strong> {{ overtimeData.date_end }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>reason:</strong> {{ overtimeData.reason }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Requested at:</strong> {{ overtimeData.requested_at }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Status:</strong> {{ overtimeData.status ? overtimeData.status.name : '' }}</p>
        </v-flex>
        <!-- <v-flex xs12 md4>
          <nuxt-link :to="`/employee/${employeeData.id}`">
            Go to {{ overtimeData.employee_fullname || 'employee' }}'s profile
          </nuxt-link>
        </v-flex> -->
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
      overtimeData: {},
      employeeData: {}
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('overtimes/getOvertime', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.overtimeData = res.data
    this.employeeData = res.employee
    // console.log('overtime data', this.overtimeData)
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
