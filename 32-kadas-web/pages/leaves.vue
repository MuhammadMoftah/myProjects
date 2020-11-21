<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Leaves
      </h1>
      <LeaveListing />
    </v-flex>
    <v-flex v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('leave-type_read')" class="d-none">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Leave types
      </h1>
      <LeaveTypesListing />
    </v-flex>
  </v-layout>
</template>

<script>
import LeaveListing from '~/components/Leaves/LeavesListing'
import LeaveTypesListing from '~/components/Leaves/LeaveTypesListing'

export default {
  components: {
    LeaveListing,
    LeaveTypesListing
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
