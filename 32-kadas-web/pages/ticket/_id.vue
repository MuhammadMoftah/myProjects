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
          <h1 class="display-1 font-weight-thin text-uppercase">
            {{ 'Ticket #' + (ticketData.id || '') }}
          </h1>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>ID:</strong> {{ ticketData.id }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Ref no:</strong> {{ ticketData.ref_no }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Title:</strong> {{ ticketData.title }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Type:</strong> {{ ticketData.type }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Description:</strong> {{ ticketData.description }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Status:</strong> {{ ticketData.status }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Creator:</strong> {{ creatorData.full_name }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <nuxt-link :to="`/employee/${creatorData.id}`">
            Go to {{ creatorData.full_name || 'creator' }}'s profile
          </nuxt-link>
        </v-flex>
        <v-flex xs12 class="align-content-end">
          <v-btn :disabled="!ticketData" :loading="buttonLoading" color="primary" @click="updateStatus">
            {{ statusButtonText }}
          </v-btn>
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
      buttonLoading: false,
      pageLoading: false,
      ticketData: {},
      creatorData: {},
      documents: []
    }
  },
  computed: {
    statusButtonText() {
      if (
        this.ticketData.status === 'PENDING' ||
        this.ticketData.status === 'CLOSED'
      ) {
        return 'Open ticket'
      }
      if (this.ticketData.status === 'OPEN') {
        return 'Close ticket'
      }
      return ''
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('tickets/getTicket', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.ticketData = res.data
    this.creatorData = res.creator
    // console.log('ticket data', this.ticketData)

    const documents = await this.$store.dispatch(
      'tickets/getTicketDocuments',
      this.id
    )
    if (!documents || documents === 'error') return
    this.documents = documents
    // console.log('documents data', this.documents)
    this.pageLoading = false
  },
  methods: {
    getRoleStatus(role) {
      return this.$store.getters['status/getRoleStatus']({
        what: 'tickets',
        role: this.$store.state.auth.user.roles[0]
      })
    },
    updateStatus() {
      if (
        this.ticketData.status === 'PENDING' ||
        this.ticketData.status === 'CLOSED'
      ) {
        this.openTicket(this.ticketData)
      }
      if (this.ticketData.status === 'OPEN') {
        this.closeTicket(this.ticketData)
      }
    },
    async openTicket(item) {
      if (!item.status) return false
      this.buttonLoading = true
      // console.log(this.getRoleStatus())
      const res = await this.$store
        .dispatch('tickets/openTicket', {
          id: item.id,
          status: this.getRoleStatus().open
        })
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false
      // console.log(res)
      if (!res || res === 'error') return
      this.ticketData = res
      this.$store.dispatch('snackbar/show', {
        message: 'Success!',
        color: 'success',
        timeout: 2000
      })
    },
    async closeTicket(item) {
      if (!item.status) return false
      this.buttonLoading = true
      const res = await this.$store
        .dispatch('tickets/closeTicket', {
          id: item.id,
          status: this.getRoleStatus().closed
        })
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false
      if (!res || res === 'error') return
      this.ticketData = res
      this.$store.dispatch('snackbar/show', {
        message: 'Success!',
        color: 'success',
        timeout: 2000
      })
    }
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
.align-content-end {
  display flex
  justify-content flex-end
}
</style>
