<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Spots
      </h1>
      <SpotsListing />
    </v-flex>
  </v-layout>
</template>

<script>
import SpotsListing from '~/components/Spots/SpotsListing'

export default {
  components: {
    SpotsListing
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
