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
            {{ 'Itinerary #' + (itineraryData.id || '') }}
          </h1>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>ID:</strong> {{ itineraryData.id }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Title:</strong> {{ itineraryData.title }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Body:</strong> {{ itineraryData.body }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Amount:</strong> {{ itineraryData.amount }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Approved:</strong> {{ itineraryData.is_approved ? "Yes" : "No" }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Status:</strong> {{ itineraryData.status }}</p>
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Documents
          </h1>
        </v-flex>
        <v-flex xs12>
          <Documents :list="documents" />
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
      itineraryData: {},
      documents: []
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('itineraries/getItinerary', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.itineraryData = res.data
    // console.log('itinerary data', this.itineraryData)

    const documents = await this.$store.dispatch(
      'itineraries/getItineraryDocuments',
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
