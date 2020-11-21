<template>
  <div>
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Tasks" name="Tasks.xls" class="download-excel-btn">
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Tasks')">
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Tasks</v-toolbar-title>
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
      <!-- Popup Add Task -->
      <v-dialog v-model="dialog" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-btn v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('task_create')" slot="activator" color="primary" dark class="mb-2">
          Add
        </v-btn>
        <v-form ref="form" v-model="valid" @submit.prevent="save">
          <v-card>
            <v-card-title class="card-title">
              <span class="headline px-2">
                {{ formTitle }}
              </span>
            </v-card-title>

            <v-card-text>
              <v-layout wrap column>
                <!-- New Desgin and Requerment  -->
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.name" :rules="requiredRule" required label="Task Title" prepend-inner-icon="text_format" />
                </v-flex>
                <!-- Description Field  -->
                <v-flex class="px-2">
                  <v-textarea
                    v-model="editedItem.description"
                    :rules="requiredRule"
                    required
                    rows="2"
                    label="Description"
                    prepend-inner-icon="textsms"
                  />
                </v-flex>
                <v-flex class="px-2">
                  <v-autocomplete
                    v-model="editedItem.employee_id"
                    :items="employees"
                    :rules="requiredRule"
                    required
                    item-text="full_name"
                    item-value="id"
                    label="Employee"
                    prepend-inner-icon="people"
                  />
                </v-flex>
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
                      label="Start date"
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
                      label="End date"
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
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.comment" label="Comment" prepend-inner-icon="sms" />
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
      <!-- End PopUp Add Task -->
      <!-- Start PopUp Final Action -->
      <v-dialog v-model="confirm" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-card>
          <v-card-title class="card-title">
            <span class="headline px-2">
              Are you sure?
            </span>
          </v-card-title>
          <v-card-text class="px-4 py-0">
            {{ confirmWhat === 'started' ? 'This action will mark this task as STARTED.' : '' }}
            {{ confirmWhat === 'completed' ? 'This action will mark this task as COMPLETED.' : '' }}
            {{ confirmWhat === 'deleted' ? 'This action will DELETE this task.' : '' }}
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
      <!-- End PopUp Final Action -->
    </v-toolbar>
    <v-data-table
      ref="table"
      :headers="headers"
      :items="tasks"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <!-- Tabel  Details Task-->
      <template slot="items" slot-scope="props">
        <nuxt-link tag="tr" :to="`/task/${props.item.id}`">
          <!-- <td>{{ props.item.employee_fullname }}</td> -->
          <td class="text-xs-left">
            {{ props.item.name }}
          </td>
          <td class="text-xs-left">
            {{ props.item.start_date }}
          </td>
          <td class="text-xs-left">
            {{ props.item.end_date }}
          </td>
          <td class="text-xs-left">
            {{ props.item.status }}
          </td>
          <td class="text-xs-left">
            {{ props.item.description }}
          </td>
          <td class="text-xs-left">
            {{ props.item.comment }}
          </td>
          <td class="justify-center align-center layout px-0">
            <v-tooltip bottom>
              <v-icon
                v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('task_update')"
                slot="activator"
                small
                class="mr-2"
                @click.stop="editItem(props.item)"
              >
                edit
              </v-icon>
              <span>Edit task</span>
            </v-tooltip>
            <v-tooltip bottom>
              <v-icon
                v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('task_delete')"
                slot="activator"
                small
                class="mr-2"
                @click.stop="showConfirm('deleted', props.item)"
              >
                close
              </v-icon>
              <span>Delete task</span>
            </v-tooltip>
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
    valid: false,
    requiredRule: [v => !!v || 'This field is required'],
    loading: true,
    buttonLoading: false,
    dialog: false,
    confirm: false,
    confirmWhat: '',
    tempItem: null,
    headers: [
      // { text: 'Employee name', value: 'employee_fullname' },
      { text: 'Task Title', value: 'name' },
      { text: 'Start', value: 'start_date' },
      { text: 'End', value: 'end_date' },
      { text: 'Status', value: 'status' },
      { text: 'Description', value: 'description' },
      { text: 'Comment', value: 'comment' },
      { text: 'Actions', align: 'center', value: 'name', sortable: false }
    ],
    toBeDeleted: '',
    editedIndex: -1,
    editedItem: {},
    defaultItem: {},
    start_date: '',
    end_date: ''
  }),
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'New Task' : 'Edit Task'
    },
    taskTypes() {
      return this.$store.state.tasks.types
    },
    tasks() {
      if (this.list) return this.list
      return this.$store.state.tasks.list
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
    await this.$store.dispatch('tasks/getTasks')
    this.loading = false
  },
  methods: {
    showConfirm(what, item) {
      this.tempItem = item
      this.confirmWhat = what
      this.confirm = true
    },
    doAction(item) {
      if (this.confirmWhat === 'started') this.startTask(item)
      if (this.confirmWhat === 'completed') this.completeTask(item)
      if (this.confirmWhat === 'deleted') this.deleteTask(item)
    },
    async deleteTask(item) {
      this.buttonLoading = true
      const res = await this.$store
        .dispatch('tasks/deleteTask', item.id)
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false
      if (!res || res === 'error') return
      this.confirm = false
      this.toBeDeleted = ''
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
          .dispatch('tasks/updateTask', {
            ...this.editedItem
          })
          .catch(() => {
            this.buttonLoading = false
          })
        this.buttonLoading = false
      } else {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('tasks/newTask', this.editedItem)
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
