<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Feedback Listing
      </h1>
      <FeedbackListing />
    </v-flex>
  </v-layout>
</template>

<script>
import FeedbackListing from '~/components/Feedback/FeedbackListing'

export default {
  components: {
    FeedbackListing
  }
}
</script>

<style lang="stylus" scoped>
.page-title {
  margin-bottom: 30px;
}

.card-title {
  padding-bottom: 0;
}

.dialog {
  overflow-x: hidden;
}
</style>
