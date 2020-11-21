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
            {{ 'Spot for ' + (employeeData.full_name || '') }}
          </h1>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Responded:</strong> {{ spotData.is_responded ? "Yes" : "No" }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Comment:</strong> {{ spotData.comment }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>ID:</strong> {{ spotData.id }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Creator:</strong> {{ creatorData.full_name }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Created at:</strong> {{ spotData.created_at }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <nuxt-link :to="`/employee/${employeeData.id}`">
            Go to employee's profile
          </nuxt-link>
        </v-flex>
        <v-flex xs12 md4>
          <nuxt-link :to="`/employee/${creatorData.id}`">
            Go to creator's profile
          </nuxt-link>
        </v-flex>

        <v-flex v-if="position" xs12 class="pt-4">
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
      spotData: {},
      employeeData: {},
      creatorData: {}
    }
  },
  computed: {
    position() {
      if (
        !this.spotData.location ||
        !this.spotData.location.latitude ||
        !this.spotData.location.latitude
      ) {
        return false
      }

      return {
        lat: Number(this.spotData.location.latitude),
        lng: Number(this.spotData.location.longitude)
      }
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('spots/getSpot', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.spotData = res.data
    this.employeeData = res.employee
    this.creatorData = res.creator
    // console.log('spot data', this.spotData)
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
