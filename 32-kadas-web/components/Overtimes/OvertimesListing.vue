<template>
  <div>
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Overtimes" name="Overtimes.xls" class="download-excel-btn">
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Overtimes')">
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Overtimes</v-toolbar-title>
      <!-- <v-divider
        class="mx-2"
        inset
        vertical
      /> -->
      <v-spacer />
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Search"
        class="pt-0"
        single-line
        hide-details
      />
      <!-- Add Over Time -->
      <v-dialog v-model="dialog" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-btn v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('task_create')" slot="activator" color="primary" dark class="mb-2">
          Add
        </v-btn>
        <!-- Form Dialog -->
        <v-form ref="form" v-model="valid" @submit.prevent="save">
          <v-card>
            <!-- Title Popup -->
            <v-card-title class="card-title">
              <span class="headline px-2">
                {{ formTitle }}
              </span>
            </v-card-title>
            <!-- Body Popup -->
            <v-card-text>
              <v-layout wrap column>
                <!-- Description Field  -->
                <v-flex class="px-2">
                  <v-textarea
                    v-model="editedItem.reason"
                    :rules="requiredRule"
                    required
                    rows="2"
                    label="Reason"
                    prepend-inner-icon="textsms"
                  />
                </v-flex>

                <v-flex class="px-2">
                  <v-dialog
                    ref="requested_at"
                    v-model="requested_at"
                    :return-value.sync="editedItem.requested_at"
                    persistent
                    lazy
                    full-width
                    width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="editedItem.requested_at"
                      :rules="requiredRule"
                      required
                      label="Requested At"
                      prepend-inner-icon="event"
                      readonly
                    />
                    <v-date-picker
                      v-model="editedItem.requested_at"
                      scrollable
                    >
                      <v-spacer />
                      <v-btn flat color="primary" @click="requested_at = false">
                        Cancel
                      </v-btn>
                      <v-btn flat color="primary" @click="$refs.requested_at.save(editedItem.requested_at)">
                        OK
                      </v-btn>
                    </v-date-picker>
                  </v-dialog>
                </v-flex>

                <v-flex class="px-2">
                  <v-dialog
                    ref="date_start"
                    v-model="date_start"
                    :return-value.sync="editedItem.date_start"
                    persistent
                    lazy
                    full-width
                    width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="editedItem.date_start"
                      :rules="requiredRule"
                      required
                      label="Start date"
                      prepend-inner-icon="event"
                      readonly
                    />
                    <v-date-picker
                      v-model="editedItem.date_start"
                      scrollable
                    >
                      <v-spacer />
                      <v-btn flat color="primary" @click="date_start = false">
                        Cancel
                      </v-btn>
                      <v-btn flat color="primary" @click="$refs.date_start.save(editedItem.date_start)">
                        OK
                      </v-btn>
                    </v-date-picker>
                  </v-dialog>
                </v-flex>

                <v-flex class="px-2">
                  <v-dialog
                    ref="date_end"
                    v-model="date_end"
                    :return-value.sync="editedItem.date_end"
                    persistent
                    lazy
                    full-width
                    width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="editedItem.date_end"
                      :rules="requiredRule"
                      required
                      label="End date"
                      prepend-inner-icon="event"
                      readonly
                    />
                    <v-date-picker
                      v-model="editedItem.date_end"
                      scrollable
                    >
                      <v-spacer />
                      <v-btn flat color="primary" @click="date_end = false">
                        Cancel
                      </v-btn>
                      <v-btn flat color="primary" @click="$refs.date_end.save(editedItem.date_end)">
                        OK
                      </v-btn>
                    </v-date-picker>
                  </v-dialog>
                </v-flex>
              </v-layout>
            </v-card-text>
            <!-- Actions Popup -->
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
      <!-- End Over Time -->
      <v-dialog v-model="confirm" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-card>
          <v-card-title class="card-title">
            <span class="headline px-2">
              Are you sure?
            </span>
          </v-card-title>
          <v-card-text class="px-4 py-0">
            {{ confirmWhat === 'approved' ? 'This action will APPROVE this overtime.' : '' }}
            {{ confirmWhat === 'rejected' ? 'This action will REJECT this overtime.' : '' }}
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
      :items="overtimes"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <nuxt-link tag="tr" :to="`/overtime/${props.item.id}`">
          <!-- <td>{{ props.item.employee_fullname }}</td> -->
          <td class="text-xs-left">
            {{ props.item.reason }}
          </td>
          <td class="text-xs-left">
            {{ props.item.date_start }}
          </td>
          <td class="text-xs-left">
            {{ props.item.date_end }}
          </td>
          <td class="text-xs-left">
            {{ props.item.requested_at }}
          </td>
          <td class="text-xs-left">
            {{ props.item.status ? props.item.status.name : '' }}
          </td>
          <td v-if="props.item.status.name.includes('PENDING')" class="justify-center align-center layout px-0">
            <v-icon
              v-if="canChangeStatus(props.item, 'approve')"
              small
              class="mr-2"
              @click.stop="showConfirm('approved', props.item)"
            >
              check
            </v-icon>
            <v-icon
              v-if="canChangeStatus(props.item, 'reject')"
              small
              class="mr-2"
              @click.stop="showConfirm('rejected', props.item)"
            >
              close
            </v-icon>
          </td>
          <td v-else class="justify-center align-center layout px-0">
            <v-icon
              small
              class="mr-2"
            >
              done_all
            </v-icon>
          </td>
        </nuxt-link>
      </template>
    </v-data-table>
  </div>
</template>

<script>
export default {
  props: {
    list: {
      type: Array,
      default: null
    }
  },
  data: () => ({
    search: '',
    loading: true,
    buttonLoading: false,
    dialog: false,
    confirm: false,
    confirmWhat: '',
    tempItem: null,
    headers: [
      // { text: 'Employee Name', value: 'employee_fullname' },
      { text: 'Reason', value: 'reason' },
      { text: 'Start date', value: 'date_start' },
      { text: 'End Date', value: 'date_end' },
      { text: 'Requested at', value: 'requested_at' },
      { text: 'Status', value: 'status' },
      { text: 'Actions', align: 'center', value: 'name', sortable: false }
    ],
    editedIndex: -1,
    requiredRule: [v => !!v || 'This field is required'],
    valid: false,
    editedItem: {},
    defaultItem: {},
    date_start: '',
    date_end: '',
    requested_at: ''
  }),
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'New Overtime' : 'Edit Overtime'
    },
    overtimes() {
      if (this.list) return this.list
      return this.$store.state.overtimes.list
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
    await this.$store.dispatch('overtimes/getOvertimes')
    this.loading = false
  },
  methods: {
    getRoleStatus(role) {
      return this.$store.getters['status/getRoleStatus']({
        what: 'overtimes',
        role
      })
    },
    canChangeStatus(item, change) {
      if (!this.$store.state.auth.user.permissions) return false
      if (!item.status || !item.status.name) return false
      const arr = item.status.name.split('_')
      if (arr.length <= 1) return false
      const permissions = this.$store.state.auth.user.permissions
      const el = permissions.find(
        perm => perm.includes(arr[1].toLowerCase()) && perm.includes(change)
      )
      return el
    },
    showConfirm(what, item) {
      this.tempItem = item
      this.confirmWhat = what
      this.confirm = true
    },
    doAction(item) {
      if (this.confirmWhat === 'approved') this.approveOvertime(item)
      if (this.confirmWhat === 'rejected') this.rejectOvertime(item)
    },
    async approveOvertime(item) {
      if (!item.status || !item.status.name) return false
      const arr = item.status.name.split('_')
      if (arr.length <= 1) return false
      this.buttonLoading = true
      const res = await this.$store
        .dispatch('overtimes/approveOvertime', {
          id: item.id,
          status: this.getRoleStatus(arr[1].toLowerCase()).approved
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
    async rejectOvertime(item) {
      if (!item.status || !item.status.name) return false
      const arr = item.status.name.split('_')
      if (arr.length <= 1) return false
      this.buttonLoading = true
      const res = await this.$store
        .dispatch('overtimes/rejectOvertime', {
          id: item.id,
          status: this.getRoleStatus(arr[1].toLowerCase()).rejected
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
    editItem(item) {
      this.editedIndex = this.tasks.indexOf(item)
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
          .dispatch('overtimes/updateOvertime', {
            ...this.editedItem
          })
          .catch(() => {
            this.buttonLoading = false
          })
        this.buttonLoading = false
      } else {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('overtimes/newOverTime', this.editedItem)
          .catch(() => {
            this.buttonLoading = false
          })
        this.buttonLoading = false
      }
      if (!res || res === 'error') return
      this.close()
      this.$store.dispatch('snackbar/show', {
        message: 'Success!',
        timeout: 2000,
        color: 'success'
      })
    }
  }
}
</script>

<style lang="stylus" scoped>
tr {
  cursor pointer
}
</style>
