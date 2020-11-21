<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Signature
      </h1>
      <Signature />
    </v-flex>
  </v-layout>
</template>
<script>
import Signature from '~/components/Signature/Signature'

export default {
  components: {
    Signature
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
.magio-link{
  h3{
    padding 15px 0;
    font-size  20px;
  }
  background #fff;
  box-shadow 0 .5rem 1rem rgba(0,0,0,.15) !important;
  padding 15px;
}
</style>
