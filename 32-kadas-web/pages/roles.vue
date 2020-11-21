<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Roles
      </h1>
      <RolesListing />
    </v-flex>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Users' Roles
      </h1>
      <UsersRolesListing />
    </v-flex>
  </v-layout>
</template>

<script>
import RolesListing from '~/components/Roles/RolesListing'
import UsersRolesListing from '~/components/Roles/UsersRolesListing'

export default {
  components: {
    RolesListing,
    UsersRolesListing
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
