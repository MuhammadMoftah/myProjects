<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Stocks
      </h1>
      <StocksListing />
    </v-flex>
  </v-layout>
</template>

<script>
import StocksListing from '~/components/Stocks/StocksListing'

export default {
  components: {
    StocksListing
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
