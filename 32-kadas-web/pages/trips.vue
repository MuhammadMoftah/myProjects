<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Trips
      </h1>
      <TripsListing />
    </v-flex>
  </v-layout>
</template>

<script>
import TripsListing from '~/components/Trips/TripsListing'

export default {
  components: {
    TripsListing
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
