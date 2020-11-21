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
            {{ ('Trip - ' + (tripData.title || '')) || ('Trip #' + (tripData.id || '')) }}
          </h1>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Participants:</strong> {{ participants.length }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>date:</strong> {{ tripData.date }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Status:</strong> {{ tripData.status }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Description:</strong> {{ tripData.description }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Approved:</strong> {{ tripData.is_approved ? "Yes" : "No" }}</p>
        </v-flex>
        <v-flex xs12 md4 />
        <v-flex xs12 md4>
          <p><strong>Latitude:</strong> {{ tripData.latitude }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Longitude:</strong> {{ tripData.longitude }}</p>
        </v-flex>
        
        <v-flex v-if="position" xs12>
          <GmapMap
            :center="position"
            :zoom="6"
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
            Participants
          </h1>
        </v-flex>
        <v-flex xs12>
          <TripParticipants :id="id" />
        </v-flex>
      </v-layout>
    </v-card>
  </div>
</template>

<script>
import TripParticipants from '~/components/Trips/TripParticipants'

export default {
  components: {
    TripParticipants
  },
  data() {
    return {
      id: '',
      loading: false,
      pageLoading: false,
      tripData: {}
    }
  },
  computed: {
    participants() {
      return this.$store.state.trips.participants
    },
    position() {
      if (!this.tripData.latitude || !this.tripData.longitude) {
        return false
      }

      return {
        lat: Number(this.tripData.latitude),
        lng: Number(this.tripData.longitude)
      }
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('trips/getSingle', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.tripData = res.data
    // console.log('trip data', this.tripData)
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
