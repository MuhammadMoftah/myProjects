<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Events
      </h1>
      <EventsListing />
    </v-flex>
    <v-flex>
      <h1 class="page-title display-1 font-weight-thin">
        Manage your Event types
      </h1>
      <EventTypesListing />
    </v-flex>
  </v-layout>
</template>

<script>
import EventsListing from '~/components/Events/EventsListing'
import EventTypesListing from '~/components/Events/EventTypesListing'

export default {
  components: {
    EventsListing,
    EventTypesListing
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
