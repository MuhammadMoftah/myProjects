<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Overtimes
      </h1>
      <OvertimesListing />
    </v-flex>
  </v-layout>
</template>

<script>
import OvertimesListing from '~/components/Overtimes/OvertimesListing'

export default {
  components: {
    OvertimesListing
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
