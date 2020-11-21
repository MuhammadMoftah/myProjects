<template>
  <div class="announcement-listing">
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Participants" name="Participants.xls" class="download-excel-btn">
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Participants')">
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Participants</v-toolbar-title>
      <v-spacer />
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Search"
        single-line
        hide-details
      />
      <v-dialog v-model="dialog" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-btn slot="activator" color="primary" dark class="mb-2">
          Add
        </v-btn>
        <v-form ref="form" v-model="valid" @submit.prevent="save">
          <v-card>
            <v-card-title class="card-title">
              <span class="headline px-2">
                Add participant
              </span>
            </v-card-title>

            <v-card-text>
              <v-layout wrap column>
                <v-flex class="px-2">
                  <v-autocomplete
                    v-model="editedItem.employee_id"
                    :items="employees"
                    :rules="requiredRule"
                    multiple
                    required
                    item-text="full_name"
                    item-value="id"
                    label="Employee"
                    prepend-inner-icon="people"
                  >
                    <v-list-tile
                      slot="prepend-item"
                      ripple
                      @click="toggleSelectAll"
                    >
                      <v-list-tile-action>
                        <v-icon>done_all</v-icon>
                      </v-list-tile-action>
                      <v-list-tile-title>Select {{ editedItem.employee_id.length === employees.length ? "None" : "All" }}</v-list-tile-title>
                    </v-list-tile>
                    <v-divider
                      slot="prepend-item"
                      class="mt-2"
                    />
                  </v-autocomplete>
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
      <v-dialog v-model="confirm" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-card>
          <v-card-title class="card-title">
            <span class="headline px-2">
              Are you sure?
            </span>
          </v-card-title>
          <v-card-actions class="px-3 pb-3">
            <v-spacer />
            <v-btn color="primary" flat :disabled="buttonLoading" @click="close">
              No
            </v-btn>
            <v-btn color="red" dark :loading="buttonLoading" @click="del(toBeDeleted)">
              Yes
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-toolbar>
    <v-data-table
      ref="table"
      :headers="headers"
      :items="participants"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <td class="text-xs-left">
          {{ props.item.full_name }}
        </td>
        <td class="text-xs-left">
          {{ props.item.job_title }}
        </td>
        <td class="text-xs-left">
          {{ props.item.phone }}
        </td>
        <td class="text-xs-left">
          {{ props.item.registered_at }}
        </td>
        <td class="justify-center align-center layout px-0">
          <v-icon
            small
            class="mr-2"
            @click.stop="deleteItem(props.item)"
          >
            delete
          </v-icon>
        </td>
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
    },
    id: {
      type: String,
      default: ''
    }
  },
  data: () => ({
    search: '',
    loading: true,
    buttonLoading: false,
    dialog: false,
    confirm: false,
    date: false,
    valid: false,
    requiredRule: [v => !!v || 'This field is required'],
    headers: [
      { text: 'Name', value: 'full_name' },
      { text: 'Job title', value: 'job_title' },
      { text: 'Phone', value: 'phone' },
      { text: 'Registered at', value: 'registered_at' },
      { text: 'Actions', align: 'center', value: 'name', sortable: false }
    ],
    toBeDeleted: '',
    editedIndex: -1,
    editedItem: {
      employee_id: []
    },
    defaultItem: {
      employee_id: []
    }
  }),
  computed: {
    participants() {
      return this.$store.state.announcements.participants
    },
    employees() {
      return this.$store.state.employees.list
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
    this.$store.dispatch('employees/getEmployees')
    await this.$store.dispatch('announcements/getParticipants', this.id)
    this.loading = false
  },
  methods: {
    toggleSelectAll() {
      if (this.editedItem.employee_id.length === this.employees.length) {
        this.editedItem.employee_id = []
      } else {
        this.editedItem.employee_id = this.employees.map(item => item.id)
      }
    },
    close() {
      this.dialog = false
      this.confirm = false
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      }, 300)
    },
    deleteItem(item) {
      this.confirm = true
      this.toBeDeleted = item
    },
    async del(item) {
      this.buttonLoading = true
      await this.$store
        .dispatch('announcements/deleteAnnouncementParticipant', {
          id: item.id,
          announcement_id: this.id
        })
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false
      this.confirm = false
      this.toBeDeleted = ''
    },
    async save() {
      this.$refs.form.validate()
      if (!this.valid) return
      this.buttonLoading = true
      const res = await this.$store
        .dispatch('announcements/newAnnouncementParticipant', {
          ...this.editedItem,
          announcement_id: this.id
        })
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false

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
