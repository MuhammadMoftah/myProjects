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
            <!-- {{ 'Feedback #' + (feedbackData.id || '') }} -->
            Feedback #
          </h1>
        </v-flex>
        <v-flex xs12 md12>
          <p><strong>Title:</strong> {{ feedbackData.title }}</p>
        </v-flex>
        <v-flex xs12 md12>
          <p><strong>Body:</strong> {{ feedbackData.body }}</p>
        </v-flex>
        <!-- <v-flex xs12 md4>
          <p><strong>Creator:</strong> {{ creatorData.full_name }}</p>
        </v-flex> -->
        <!-- <v-flex xs12 md4>
          <p><strong>Creator ID:</strong> {{ creatorData.id }}</p>
        </v-flex> -->
        <!-- <v-flex xs12 md4>
          <nuxt-link :to="`/employee/${creatorData.id}`">
            Go to creator's profile
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
      feedbackData: {},
      creatorData: {}
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('feedback/getFeedback', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.feedbackData = res.data
    this.creatorData = res.creator
    // console.log('feedback data', this.feedbackData)
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
