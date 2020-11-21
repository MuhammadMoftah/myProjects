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
            {{ 'Event - ' + (eventData.name || '') }}
          </h1>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Participants:</strong> {{ participants.length }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Start date:</strong> {{ eventData.start_date }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>End date:</strong> {{ eventData.end_date }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Description:</strong> {{ eventData.description }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Note:</strong> {{ eventData.note }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Created at:</strong> {{ eventData.created_at }}</p>
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Participants
          </h1>
        </v-flex>
        <v-flex xs12>
          <EventParticipants :id="id" />
        </v-flex>
      </v-layout>
    </v-card>
  </div>
</template>

<script>
import EventParticipants from '~/components/Events/EventParticipants'

export default {
  components: {
    EventParticipants
  },
  data() {
    return {
      id: '',
      loading: false,
      pageLoading: false,
      eventData: {}
    }
  },
  computed: {
    participants() {
      return this.$store.state.events.participants
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('events/getSingle', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.eventData = res.data
    // console.log('event data', this.eventData)
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
