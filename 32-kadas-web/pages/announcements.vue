<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Announcements
      </h1>
      <AnnouncementsListing />
    </v-flex>
  </v-layout>
</template>

<script>
import AnnouncementsListing from '~/components/Announcements/AnnouncementsListing'

export default {
  components: {
    AnnouncementsListing
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
