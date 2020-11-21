<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Loans
      </h1>
      <LoanListing />
    </v-flex>
    <v-flex class="d-none" if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('loan-type_read')">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Loan types
      </h1>
      <LoanTypesListing />
    </v-flex>
  </v-layout>
</template>

<script>
import LoanListing from '~/components/Loans/LoansListing'
import LoanTypesListing from '~/components/Loans/LoanTypesListing'

export default {
  components: {
    LoanListing,
    LoanTypesListing
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
