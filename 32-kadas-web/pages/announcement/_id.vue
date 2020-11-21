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
            {{ 'Announcement #' + (announcementData.id || '') }}
          </h1>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Title:</strong> {{ announcementData.title }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Body:</strong> {{ announcementData.body }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Participants:</strong> {{ participants.length }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Creator:</strong> {{ creatorData.full_name }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Creator ID:</strong> {{ creatorData.id }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <nuxt-link :to="`/employee/${creatorData.id}`">
            Go to creator's profile
          </nuxt-link>
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Participants
          </h1>
        </v-flex>
        <v-flex xs12>
          <AnnouncementParticipants :id="id" />
        </v-flex>
      </v-layout>
    </v-card>
  </div>
</template>

<script>
import AnnouncementParticipants from '~/components/Announcements/AnnouncementParticipants'

export default {
  components: {
    AnnouncementParticipants
  },
  data() {
    return {
      id: '',
      loading: false,
      pageLoading: false,
      announcementData: {},
      creatorData: {}
    }
  },
  computed: {
    participants() {
      return this.$store.state.announcements.participants
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('announcements/getSingle', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.announcementData = res.data
    this.creatorData = res.creator
    // console.log('announcement data', this.announcementData)
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
