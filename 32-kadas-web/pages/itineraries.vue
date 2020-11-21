<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Itineraries
      </h1>
      <ItinerariesListing />
    </v-flex>
  </v-layout>
</template>

<script>
import ItinerariesListing from '~/components/Itineraries/ItinerariesListing'

export default {
  components: {
    ItinerariesListing
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
