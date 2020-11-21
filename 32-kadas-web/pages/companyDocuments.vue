<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Company Documents
      </h1>
      <CompanyDocumentsListing />
    </v-flex>
  </v-layout>
</template>

<script>
import CompanyDocumentsListing from '~/components/CompanyDocuments/CompanyDocumentsListing'

export default {
  components: {
    CompanyDocumentsListing
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
