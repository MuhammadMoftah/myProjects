<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Tickets
      </h1>
      <TicketsListing type="internal" />
    </v-flex>

    <v-flex class="mb-5 d-none">
      <h1 class="page-title display-1 font-weight-thin">
        Manage External Tickets
      </h1>
      <TicketsListing type="external" />
    </v-flex>
  </v-layout>
</template>

<script>
import TicketsListing from '~/components/Tickets/TicketsListing'

export default {
  components: {
    TicketsListing
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
