<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage your departments
      </h1>
      <DepartmentListing />
    </v-flex>
    <v-flex>
      <h1 class="page-title display-1 font-weight-thin">
        Manage your departments types
      </h1>
      <DepartmentTypesListing />
    </v-flex>
  </v-layout>
</template>

<script>
import DepartmentListing from '~/components/Departments/DepartmentListing'
import DepartmentTypesListing from '~/components/Departments/DepartmentTypesListing'

export default {
  components: {
    DepartmentListing,
    DepartmentTypesListing
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
