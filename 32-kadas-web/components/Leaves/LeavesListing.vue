<template>
  <div>
    <div v-if="$refs.table" class="buttons mb-3">
      <div>
        <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
          <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Leaves" name="Leaves.xls" class="download-excel-btn">
            Export to Excel
          </DownloadExcel>
        </v-btn>
        <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Leaves')">
          Export to PDF
        </v-btn>
      </div>
      <div v-if="status">
        <v-btn color="primary" @click="clearFilters">
          Clear filters
        </v-btn>
      </div>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Leaves</v-toolbar-title>
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
      <!-- Popup Add Leaves -->
      <v-dialog v-model="dialog" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-btn v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('task_create')" slot="activator" color="primary" dark class="mb-2">
          Add
        </v-btn>
        <!-- New Desgin and Requerment  -->
        <v-form ref="form" v-model="valid" @submit.prevent="save">
          <v-card>
            <v-card-title class="card-title">
              <span class="headline px-2">
                Add Leaves
              </span>
            </v-card-title>

            <v-card-text>
              <v-layout wrap column>
                <!-- List leaves-->
                <v-flex class="px-2">
                  <v-autocomplete
                    v-model="editedItem.leave_type_id"
                    :items="leavesTypeForm"
                    :rules="requiredRule"
                    required
                    item-text="text"
                    item-value="value"
                    label="Type"
                    prepend-inner-icon="people"
                  />
                </v-flex>

                <!-- List time-->
                <v-flex class="px-2">
                  <v-autocomplete
                    v-model="editedItem.duration_type"
                    :items="leavesDuration"
                    :rules="requiredRule"
                    item-value="id"
                    required
                    item-text="duration_type"
                    label="time"
                    prepend-inner-icon="people"
                  />
                </v-flex>

                <!-- List pay-->
                <v-flex class="px-2">
                  <v-autocomplete
                    v-model="editedItem.paid_type"
                    :items="leavesPaid"
                    :rules="requiredRule"
                    item-value="id"
                    required
                    item-text="paid_type"
                    label="pay"
                    prepend-inner-icon="people"
                  />
                </v-flex>

                <!--start Date leave-->
                <v-flex class="px-2">
                  <v-dialog
                    ref="start_date"
                    v-model="start_date"
                    :return-value.sync="editedItem.start_date"
                    persistent
                    lazy
                    full-width
                    width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="editedItem.start_date"
                      :rules="requiredRule"
                      required
                      label="Start Date"
                      prepend-inner-icon="event"
                      readonly
                    />
                    <v-date-picker
                      v-model="editedItem.start_date"
                      scrollable
                    >
                      <v-spacer />
                      <v-btn flat color="primary" @click="start_date = false">
                        Cancel
                      </v-btn>
                      <v-btn flat color="primary" @click="$refs.start_date.save(editedItem.start_date)">
                        OK
                      </v-btn>
                    </v-date-picker>
                  </v-dialog>
                </v-flex>

                <!--end  Date return-->
                <v-flex class="px-2">
                  <v-dialog
                    ref="end_date"
                    v-model="end_date"
                    :return-value.sync="editedItem.end_date"
                    persistent
                    lazy
                    full-width
                    width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="editedItem.end_date"
                      :rules="requiredRule"
                      required
                      label="End Date"
                      prepend-inner-icon="event"
                      readonly
                    />
                    <v-date-picker
                      v-model="editedItem.end_date"
                      scrollable
                    >
                      <v-spacer />
                      <v-btn flat color="primary" @click="end_date = false">
                        Cancel
                      </v-btn>
                      <v-btn flat color="primary" @click="$refs.end_date.save(editedItem.end_date)">
                        OK
                      </v-btn>
                    </v-date-picker>
                  </v-dialog>
                </v-flex>

                <!-- Houre Field  -->
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.number_of_hours" type="number" label=" Hour" prepend-inner-icon="text_format" />
                </v-flex>

                <!-- Reason Field  -->
                <v-flex class="px-2">
                  <v-textarea
                    v-model="editedItem.comment"
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
      <!-- End PopUp Add Leaves -->

      <v-dialog v-model="confirm" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-card>
          <v-card-title class="card-title">
            <span class="headline px-2">
              Are you sure?
            </span>
          </v-card-title>
          <v-card-text class="px-4 py-0">
            {{ confirmWhat === 'approved' ? 'This action will APPROVE this leave.' : '' }}
            {{ confirmWhat === 'rejected' ? 'This action will REJECT this leave.' : '' }}
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
      :items="leaves"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <nuxt-link tag="tr" :to="`/leave/${props.item.id}`">
          <td>{{ props.item.type }}</td>
          <td class="text-xs-left">
            {{ props.item.duration_type }}
          </td>
          <td class="text-xs-left">
            {{ props.item.start_date }}
          </td>
          <td class="text-xs-left">
            {{ props.item.end_date }}
          </td>
          <td class="text-xs-left">
            {{ props.item.number_of_hours }}
          </td>
          <td class="text-xs-left">
            {{ props.item.status }}
          </td>
          <td class="text-xs-left">
            {{ props.item.paid_type }}
          </td>
          <td class="text-xs-left">
            {{ props.item.comment }}
          </td>
          <td class="text-xs-left">
            <span v-if="props.item.status == 'CANCELED' ">
              Yes
            </span>
            <span v-else>
              No
            </span>
          </td>
          <td v-if="props.item.status.includes('PENDING')" class="justify-center align-center layout px-0">
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
  <!-- </div> -->
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
    status: '',
    search: '',
    valid: false,
    requiredRule: [v => !!v || 'This field is required'],
    loading: true,
    buttonLoading: false,
    confirm: false,
    confirmWhat: '',
    tempItem: null,
    headers: [
      { text: 'Type', value: 'type' },
      { text: 'Duration Type', value: 'duration_type' },
      { text: 'Start', value: 'start_date' },
      { text: 'End', value: 'end_date' },
      { text: 'Hour', value: 'number_of_hours' },
      { text: 'Status', value: 'status' },
      { text: 'Paid Type', value: 'paid_type' },
      { text: 'Comment', value: 'comment' },
      { text: 'Cancel', value: 'status' },
      { text: 'Actions', align: 'center', value: 'name', sortable: false }
    ],
    dialog: false,
    editedIndex: -1,
    editedItem: {},
    defaultItem: {},
    start_date: '',
    end_date: '',
    leavesTypeForm: [],
    leavesDuration: ['day', ' hour'],
    leavesPaid: ['paid', 'unpaid']
  }),
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'New Leave' : 'Edit Leave'
    },
    leaveTypes() {
      return this.$store.state.leaves.types
    },
    leaves() {
      if (this.list) return this.list
      if (this.status)
        return this.$store.state.leaves.list.filter(item =>
          item.status.includes(this.status)
        )
      console.log(this.$store.state.leaves.list)
      return this.$store.state.leaves.list
    }
  },
  watch: {
    dialog(val) {
      this.$store.state.leaves.types.forEach(g => {
        const x = { text: g.name, value: g.id }
        this.leavesTypeForm.push(x)
      })
      if (val === true) this.$refs.form.resetValidation()
      val || this.close()
    },
    confirm(val) {
      val || this.close()
    }
  },
  async mounted() {
    await this.$store.dispatch('leaves/getLeaves')
    if (this.$route.query.status) this.status = this.$route.query.status
    this.loading = false
  },
  methods: {
    clearFilters() {
      this.status = ''
      this.$router.push('/leaves')
    },
    getRoleStatus(role) {
      return this.$store.getters['status/getRoleStatus']({
        what: 'leaves',
        role
      })
    },
    canChangeStatus(item, change) {
      if (!this.$store.state.auth.user.permissions) return false
      if (!item.status) return false
      const arr = item.status.split('_')
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
      if (this.confirmWhat === 'approved') this.approveLeave(item)
      if (this.confirmWhat === 'rejected') this.rejectLeave(item)
    },
    async approveLeave(item) {
      if (!item.status) return false
      const arr = item.status.split('_')
      if (arr.length <= 1) return false
      this.buttonLoading = true
      // console.log(this.getRoleStatus(arr[1].toLowerCase()))
      const res = await this.$store
        .dispatch('leaves/approveLeave', {
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
    async rejectLeave(item) {
      if (!item.status) return false
      const arr = item.status.split('_')
      if (arr.length <= 1) return false
      this.buttonLoading = true
      const res = await this.$store
        .dispatch('leaves/rejectLeave', {
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
          .dispatch('leaves/updateLeave', {
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
          .dispatch('leaves/newLeaveList', this.editedItem)
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
.buttons {
  display flex
  justify-content space-between
}
</style>
