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
            {{ 'Leave for ' + (leaveData.employee_fullname || '') }}
          </h1>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Type:</strong> {{ leaveData.type }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Duration type:</strong> {{ leaveData.duration_type }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Number of hours:</strong> {{ leaveData.number_of_hours }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Paid type:</strong> {{ leaveData.paid_type }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Start date:</strong> {{ leaveData.start_date }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>End date:</strong> {{ leaveData.end_date }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Hours:</strong> {{ leaveData.number_of_hours }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Status:</strong> {{ leaveData.status }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <nuxt-link :to="`/employee/${employeeData.id}`">
            Go to {{ leaveData.employee_fullname || 'employee' }}'s profile
          </nuxt-link>
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Documents
          </h1>
        </v-flex>
        <v-flex xs12 class="mb-4">
          <Documents :list="documents" />
        </v-flex>

        <v-flex xs12 class="mb-4">
          <h1 class="display-1 font-weight-thin">
            Cancel Information
          </h1>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Date:</strong> {{ leaveData.end_date.split(' ')[0] }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Time:</strong> {{ leaveData.end_date.split(' ')[1] }}</p>
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
import Documents from '~/components/Shared/Documents'

export default {
  components: {
    Documents
  },
  data() {
    return {
      id: '',
      loading: false,
      pageLoading: false,
      leaveData: {},
      employeeData: {},
      documents: [],
      zoom: 12
    }
  },
  computed: {
    position() {
      if (!this.leaveData.latitude || !this.leaveData.longitude) {
        return false
      }
      return {
        lat: Number(this.leaveData.latitude),
        lng: Number(this.leaveData.longitude)
      }
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('leaves/getLeave', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.leaveData = res.data
    this.employeeData = res.employee
    // console.log('leave data', this.leaveData)

    const documents = await this.$store.dispatch(
      'leaves/getLeaveDocuments',
      this.id
    )
    if (!documents || documents === 'error') return
    this.documents = documents
    // console.log('documents data', this.documents)
    this.pageLoading = false
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
