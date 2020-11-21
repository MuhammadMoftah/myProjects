<template>
  <div>
    <div v-if="$refs.table" class="buttons mb-3">
      <div>
        <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
          <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Loans" name="Loans.xls" class="download-excel-btn">
            Export to Excel
          </DownloadExcel>
        </v-btn>
        <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Loans')">
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
      <v-toolbar-title>Loans</v-toolbar-title>
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

      <!-- Popup Add Loans -->
      <v-dialog v-model="dialog" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-btn v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('task_create')" slot="activator" color="primary" dark class="mb-2">
          Add
        </v-btn>
        <!-- New Desgin and Requerment  -->
        <v-form ref="form" v-model="valid" @submit.prevent="save">
          <v-card>
            <v-card-title class="card-title">
              <span class="headline px-2">
                Add Loans
              </span>
            </v-card-title>

            <v-card-text>
              <v-layout wrap column>
                <!-- List -->
                <v-flex class="px-2">
                  <v-autocomplete
                    v-model="editedItem.loan_type_id"
                    :items="items"
                    :rules="requiredRule"
                    required
                    item-text="text"
                    item-value="value"
                    label="Type"
                    prepend-inner-icon="people"
                  />
                </v-flex>
                <!-- List -->
                <!-- <v-flex class="px-2">
                  <v-autocomplete
                    v-model="editedItem.id"
                    :items="itemsId"
                    :rules="requiredRule"
                    :item-value="itemsId"
                    required
                    item-text="Types"
                    label="Type"
                    prepend-inner-icon="people"
                  />
                </v-flex> -->
                <!-- Amount -->
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.request_amount" type="number" :rules="requiredRule" required label=" Loans Amount" prepend-inner-icon="text_format" />
                </v-flex>
                <!-- Amount Deduction-->
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.deduction_amount" type="number" :rules="requiredRule" required label="Loans Deduction" prepend-inner-icon="text_format" />
                </v-flex>
                <!-- Date -->
                <v-flex class="px-2">
                  <v-dialog
                    ref="loan_date"
                    v-model="loan_date"
                    :return-value.sync="editedItem.loan_date"
                    persistent
                    lazy
                    full-width
                    width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="editedItem.loan_date"
                      :rules="requiredRule"
                      required
                      label="Date"
                      prepend-inner-icon="event"
                      readonly
                    />
                    <v-date-picker
                      v-model="editedItem.loan_date"
                      scrollable
                    >
                      <v-spacer />
                      <v-btn flat color="primary" @click="loan_date = false">
                        Cancel
                      </v-btn>
                      <v-btn flat color="primary" @click="$refs.loan_date.save(editedItem.loan_date)">
                        OK
                      </v-btn>
                    </v-date-picker>
                  </v-dialog>
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
      <!-- End PopUp Add Loans -->

      <v-dialog v-model="confirm" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-card>
          <v-card-title class="card-title">
            <span class="headline px-2">
              Are you sure?
            </span>
          </v-card-title>
          <v-card-text class="px-4 py-0">
            {{ confirmWhat === 'approved' && $store.state.auth.user.role === 'hr'? 'Please enter the approved amount for this loan.' : '' }}
            {{ confirmWhat === 'approved' && $store.state.auth.user.role !== 'hr'? 'This action will APPROVE this loan.' : '' }}
            {{ confirmWhat === 'rejected' ? 'This action will REJECT this loan.' : '' }}
            <v-form v-if="confirmWhat === 'approved' && $store.state.auth.user.role === 'hr'" ref="form" v-model="valid">
              <v-layout wrap column>
                <v-flex class="px-2">
                  <v-text-field v-model="approved_amount" :rules="requiredRule" required type="number" label="Approved amount" prepend-inner-icon="money" />
                </v-flex>
              </v-layout>
            </v-form>
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
      :items="loans"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <nuxt-link tag="tr" :to="`/loan/${props.item.id}`">
          <td>{{ props.item.type }}</td>
          <td class="text-xs-left">
            {{ props.item.request_amount }}
          </td>
          <td class="text-xs-left">
            {{ props.item.deduction_amount }}
          </td>
          <td class="text-xs-left">
            {{ props.item.loan_date }}
          </td>
          <!-- <td class="text-xs-left">
            {{ props.item.status }}
          </td> -->
          <td class="text-xs-left">
            {{ props.item.comment }}
          </td>
          <td v-if="props.item.status.includes('PENDING')" class="d-none justify-center align-center layout px-0">
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
          <td v-else class="d-none justify-center align-center layout px-0">
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
    status: '',
    search: '',
    items: [],
    itemsId: [],
    valid: false,
    loading: true,
    buttonLoading: false,
    confirm: false,
    confirmWhat: '',
    tempItem: null,
    approved_amount: 0,
    requiredRule: [v => !!v || 'This field is required'],
    headers: [
      { text: 'Type', value: 'type' },
      { text: 'Request amount', value: 'request_amount' },
      { text: 'Deduction amount', value: 'deduction_amount' },
      { text: 'Loan date', value: 'loan_date' },
      // { text: 'Status', value: 'status' },
      { text: 'Comment', value: 'comment' }
      // { text: 'Actions', align: 'center', value: 'name', sortable: false }
    ],
    editedIndex: -1,
    dialog: false,
    editedItem: {},
    defaultItem: {},
    loan_date: ''
  }),
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'New Loan' : 'Edit Loan'
    },
    loanTypes() {
      return this.$store.state.loans.types
    },
    loans() {
      if (this.list) return this.list
      if (this.status)
        return this.$store.state.loans.list.filter(item =>
          item.status.includes(this.status)
        )
      console.log(this.$store.state.loans.list)
      return this.$store.state.loans.list
    }
  },
  watch: {
    dialog(val) {
      // this.$store.state.loans.types.forEach(g => {
      //   this.items.push(g.name)
      //   this.itemsId.push(g.id)
      //   console.log(g)
      // })
      if (val === true) this.$refs.form.resetValidation()
      val || this.close()
    },
    confirm(val) {
      val || this.close()
    }
  },
  async mounted() {
    await this.$store.dispatch('loans/getLoans')
    this.$store.state.loans.types.forEach(g => {
      const x = { text: g.name, value: g.id }
      this.items.push(x)
      // this.itemsId.push(g.id)
      console.log('-------------------------------------------------->>>')
      console.log(x)
    })
    if (this.$route.query.status) this.status = this.$route.query.status
    this.loading = false
  },
  methods: {
    clearFilters() {
      this.status = ''
      this.$router.push('/loans')
    },
    getRoleStatus(role) {
      return this.$store.getters['status/getRoleStatus']({
        what: 'loans',
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
      if (this.confirmWhat === 'approved') {
        if (this.$store.state.auth.user.role === 'hr') {
          this.$refs.form.validate()
          if (!this.valid) return
        }
        this.approveLoan(item)
      }
      if (this.confirmWhat === 'rejected') this.rejectLoan(item)
    },
    async approveLoan(item) {
      // console.log(item.status)
      if (!item.status) return false
      const arr = item.status.split('_')
      if (arr.length <= 1) return false
      this.buttonLoading = true
      const resUpdate = await this.$store
        .dispatch('loans/updateLoan', {
          id: item.id,
          body: {
            approved_amount: this.approved_amount
          }
        })
        .catch(() => {
          this.buttonLoading = false
        })
      if (!resUpdate || resUpdate === 'error') {
        this.buttonLoading = false
        return
      }
      const res = await this.$store
        .dispatch('loans/approveLoan', {
          id: item.id,
          status: this.getRoleStatus(arr[1].toLowerCase()).approved
        })
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false
      if (!res || res === 'error') return
      this.confirmWhat = ''
      this.confirm = false
    },
    async rejectLoan(item) {
      if (!item.status) return false
      const arr = item.status.split('_')
      if (arr.length <= 1) return false
      this.buttonLoading = true
      const res = await this.$store
        .dispatch('loans/rejectLoan', {
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
      this.editedIndex = this.loans.indexOf(item)
      this.editedItem = {
        ...item
      }
      // this.editItem.loan_type_id ===
      this.dialog = true
    },
    async save() {
      this.$refs.form.validate()
      if (!this.valid) return
      let res
      if (this.editedIndex > -1) {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('loans/updateLoan', {
            ...this.editedItem
          })
          .catch(() => {
            this.buttonLoading = false
          })
        this.buttonLoading = false
        // console.log(this.editedItem)
      } else {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('loans/newLoanList', this.editedItem)
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
