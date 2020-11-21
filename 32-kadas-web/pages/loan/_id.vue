<template>
  <div v-if="id" class="cont">
    <div v-if="pageLoading" class="overlay">
      <v-progress-circular
        indeterminate
        color="primary"
      />
    </div>
    <v-card class="pa-4">
      <v-layout row wrap>
        <v-flex xs12 class="mb-4">
          <h1 class="display-1 font-weight-thin">
            {{ 'Loan for ' + (loanData.employee_fullname || '') }}
          </h1>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Type:</strong> {{ loanData.type }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Request amount:</strong> {{ loanData.request_amount }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Deduction amount:</strong> {{ loanData.deduction_amount }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Loan date:</strong> {{ loanData.loan_date }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Created at:</strong> {{ loanData.created_at }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Status:</strong> {{ loanData.status }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Comment:</strong> {{ loanData.comment }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <nuxt-link :to="`/employee/${employeeData.id}`">
            Go to {{ loanData.employee_fullname || 'employee' }}'s profile
          </nuxt-link>
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Documents
          </h1>
        </v-flex>
        <v-flex xs12>
          <Documents :list="documents" />
        </v-flex>
      </v-layout>
    </v-card>
  </div>
</template>

<script>
import Documents from '~/components/Shared/Documents'

export default {
  components: {
    Documents
  },
  data() {
    return {
      id: '',
      loading: false,
      pageLoading: false,
      loanData: {},
      employeeData: {},
      documents: []
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('loans/getLoan', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.loanData = res.data
    this.employeeData = res.employee
    // console.log('loan data', this.loanData)

    const documents = await this.$store.dispatch(
      'loans/getLoanDocuments',
      this.id
    )
    if (!documents || documents === 'error') return
    this.documents = documents
    // console.log('documents data', this.documents)
    this.pageLoading = false
  }
}
</script>

<style lang="stylus" scoped>
.cont {
  position relative
}
.overlay {
  width 100%
  height 100%
  background-color rgba(255,255,255, 0.7)
  z-index 2
  position absolute
  top 0
  left 0
  display flex
  justify-content center
  padding-top 200px
}
</style>
