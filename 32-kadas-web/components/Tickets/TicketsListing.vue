<template>
  <div>
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Tickets" name="Tickets.xls" class="download-excel-btn">
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Tickets')">
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Tickets</v-toolbar-title>
      <!-- <v-divider
        class="mx-2"
        inset
        vertical
      /> -->
      <v-spacer />
      <!-- Search Feild -->
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Search"
        class="pt-0"
        single-line
        hide-details
      />

      <!-- Popup Add Tickets -->
      <v-dialog v-model="dialog" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-btn v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('task_create')" slot="activator" color="primary" dark class="mb-2">
          Add
        </v-btn>
        <!-- New Desgin and Requerment  -->
        <v-form ref="form" v-model="valid" @submit.prevent="save">
          <v-card>
            <v-card-title class="card-title">
              <span class="headline px-2">
                Add Tickets
              </span>
            </v-card-title>

            <v-card-text>
              <v-layout wrap column>
                <!-- Title Tickets -->
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.title" :rules="requiredRule" required label="Tickets Title" prepend-inner-icon="text_format" />
                </v-flex>
                <!-- Types Tickes-->
                <v-flex class="px-2">
                  <v-autocomplete
                    v-model="editedItem.type"
                    :items="allTypes"
                    :rules="requiredRule"
                    required
                    item-text="type"
                    item-value="value"
                    label="Type"
                    prepend-inner-icon="people"
                  />
                </v-flex>

                <!-- Discription Field  -->
                <v-flex class="px-2">
                  <v-textarea
                    v-model="editedItem.description"
                    :rules="requiredRule"
                    required
                    rows="2"
                    label="Reason"
                    prepend-inner-icon="textsms"
                  />
                </v-flex>
              </v-layout>
            </v-card-text>

            <v-card-actions class="px-3 pb-3">
              <v-spacer />
              <v-btn color="red darken-1" flat :disabled="buttonLoading" @click="close">
                Cancel
              </v-btn>
              <v-btn color="primary" type="submit" :loading="buttonLoading">
                Save
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-form>
      </v-dialog>
      <!-- End PopUp Add Tickets -->

      <v-dialog v-model="confirm" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-card>
          <v-card-title class="card-title">
            <span class="headline px-2">
              Are you sure?
            </span>
          </v-card-title>
          <v-card-text class="px-4 py-0">
            {{ confirmWhat === 'opened' ? 'This action will OPEN this ticket.' : '' }}
            {{ confirmWhat === 'closed' ? 'This action will CLOSE this ticket.' : '' }}
          </v-card-text>
          <v-card-actions class="px-3 pb-3">
            <v-spacer />
            <v-btn color="primary" flat :disabled="buttonLoading" @click="close">
              No
            </v-btn>
            <v-btn color="red" dark :loading="buttonLoading" @click="doAction(tempItem)">
              Yes
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-toolbar>
    <v-data-table
      ref="table"
      :headers="headers"
      :items="tickets"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <nuxt-link tag="tr" :to="`/ticket/${props.item.id}`">
          <td>{{ props.item.creator }}</td>
          <td>{{ props.item.title }}</td>
          <td class="text-xs-left">
            {{ props.item.description }}
          </td>
          <td class="text-xs-left">
            {{ props.item.type }}
          </td>
          <td class="text-xs-left">
            {{ props.item.ref_no }}
          </td>
          <td class="text-xs-left">
            {{ props.item.status }}
          </td>
          <td class="text-xs-left">
            <span v-if="props.item.img" class="primary--text" @click.stop="open(props.item.img)">
              Link
            </span>
            <!-- <a v-if="props.item.img" :href="props.item.img" target="_blank" rel="noopener">
              Link
            </a> -->
          </td>
          <td>{{ props.item.created_at }}</td>
          <!-- <td v-if="props.item.status.includes('PENDING')" class="justify-center align-center layout px-0">
            <v-tooltip bottom>
              <v-icon
                slot="activator"
                small
                class="mr-2"
                @click.stop="showConfirm('opened', props.item)"
              >
                person_add
              </v-icon>
              <span>Open ticket</span>
            </v-tooltip>
            <v-tooltip bottom>
              <v-icon
                slot="activator"
                small
                class="mr-2"
                @click.stop="showConfirm('closed', props.item)"
              >
                close
              </v-icon>
              <span>Close ticket</span>
            </v-tooltip>
          </td>
          <td v-else class="justify-center align-center layout px-0">
            <v-icon
              small
              class="mr-2"
            >
              done_all
            </v-icon>
          </td> -->
        </nuxt-link>
      </template>
    </v-data-table>
  </div>
</template>

<script>
export default {
  props: {
    type: {
      type: String,
      default: ''
    }
  },
  data: () => ({
    search: '',
    loading: true,
    buttonLoading: false,
    confirm: false,
    confirmWhat: '',
    tempItem: null,
    headers: [
      { text: 'Creator', value: 'creator' },
      { text: 'Title', value: 'title' },
      { text: 'Description', value: 'description' },
      { text: 'Type', value: 'type' },
      { text: 'Ref No.', value: 'ref_no' },
      { text: 'Status', value: 'status' },
      { text: 'Image', value: 'img' },
      { text: 'Created at', value: 'created_at' }
      // { text: 'Actions', align: 'center', value: 'name', sortable: false }
    ],
    valid: false,
    requiredRule: [v => !!v || 'This field is required'],
    dialog: false,
    editedIndex: -1,
    editedItem: {},
    defaultItem: {},
    allTypes: ['internal', 'external']
  }),
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'New Ticket' : 'Edit Ticket'
    },
    ticketTypes() {
      console.log(this.$store.state.tickets.list)
      return this.$store.state.tickets.types
    },
    tickets() {
      const arr = this.$store.state.tickets.list
      if (this.type && this.type === 'internal') {
        return arr.filter(item => item.type === 'internal')
      } else if (this.type && this.type === 'external') {
        return arr.filter(item => item.type === 'external')
      }
      return arr
    }
  },
  watch: {
    dialog(val) {
      if (val === true) this.$refs.form.resetValidation()
      val || this.close()
    },
    confirm(val) {
      val || this.close()
    }
  },
  async mounted() {
    await this.$store.dispatch('tickets/getTickets')
    this.loading = false
  },
  methods: {
    getRoleStatus(role) {
      return this.$store.getters['status/getRoleStatus']({
        what: 'tickets',
        role: this.$store.state.auth.user.roles[0]
      })
    },
    open(url) {
      window.open(url)
    },
    showConfirm(what, item) {
      this.tempItem = item
      this.confirmWhat = what
      this.confirm = true
    },
    doAction(item) {
      if (this.confirmWhat === 'opened') this.openTicket(item)
      if (this.confirmWhat === 'closed') this.closeTicket(item)
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
      this.confirmWhat = ''
      this.confirm = false
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
      this.confirmWhat = ''
      this.confirm = false
    },
    close() {
      this.dialog = false
      this.confirm = false
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      }, 300)
    },
    // Add Update and new Item
    editItem(item) {
      this.editedIndex = this.leaves.indexOf(item)
      this.editedItem = {
        ...item
      }
      this.dialog = true
    },
    async save() {
      this.$refs.form.validate()
      if (!this.valid) return
      let res
      if (this.editedIndex > -1) {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('tickets/updateTicket', {
            ...this.editedItem
          })
          .catch(() => {
            this.buttonLoading = false
          })
        this.buttonLoading = false
        console.log(this.editedItem)
      } else {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('tickets/newTicketList', this.editedItem)
          .catch(() => {
            this.buttonLoading = false
          })
        this.buttonLoading = false
        console.log(this.editedItem)
      }
      if (!res || res === 'error') return
      this.close()
      this.$store.dispatch('snackbar/show', {
        message: 'Success!',
        timeout: 2000,
        color: 'success'
      })
      console.log(this.editedItem)
    }
  }
}
</script>

<style lang="stylus" scoped>
tr {
  cursor pointer
}
</style>
