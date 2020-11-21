<template>
  <div class="employee-listing">
    <div v-if="$refs.table" class="buttons mb-3">
      <div>
        <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
          <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Employees" name="employees.xls" class="download-excel-btn">
            Export to Excel
          </DownloadExcel>
        </v-btn>
        <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Employees')">
          Export to PDF
        </v-btn>
      </div>
      <div>
        <v-btn color="secondary" href="KadasCSV.csv" download="KadasCSV.csv">
          Download CSV template
        </v-btn>
      </div>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Employees</v-toolbar-title>
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
      <!-- Form that will be used to create employees and edit them as well -->
      <v-dialog v-model="dialog" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-btn v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('employee_create')" slot="activator" color="primary" dark class="mb-2">
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
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.email" :rules="requiredRule" required label="Email" prepend-inner-icon="email" />
                </v-flex>
                <v-flex>
                  <v-layout row wrap>
                    <v-flex xs12 md6 class="pa-2">
                      <v-text-field v-model="editedItem.first_name" :rules="requiredRule" required label="First Name" prepend-inner-icon="text_format" />
                    </v-flex>
                    <v-flex xs12 md6 class="pa-2">
                      <v-text-field v-model="editedItem.last_name" :rules="requiredRule" required label="Last Name" prepend-inner-icon="text_format" />
                    </v-flex>
                  </v-layout>
                </v-flex>
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.full_name" :rules="requiredRule" required label="Full name" prepend-inner-icon="text_format" />
                </v-flex>
                <v-flex xs12 class="px-2">
                  <v-text-field v-model="editedItem.kin_name" label="Kin name" prepend-inner-icon="text_format" />
                </v-flex>
                <v-flex xs12 class="px-2">
                  <v-text-field v-model="editedItem.kin_phone" label="Kin phone" prepend-inner-icon="phone" />
                </v-flex>
                <v-flex class="px-2">
                  <v-select
                    v-model="editedItem.app_version"
                    :items="[{text: 'Lite', value: 'lite'}, {text: 'Pro', value: 'pro'}]"
                    label="App Version"
                    prepend-inner-icon="apps"
                    :rules="requiredRule"
                    required
                  />
                </v-flex>
                <v-flex class="px-2">
                  <v-dialog
                    ref="birthPicker"
                    v-model="birthPickerModal"
                    :return-value.sync="editedItem.date_of_birth"
                    persistent
                    lazy
                    full-width
                    width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="editedItem.date_of_birth"
                      label="Date of birth"
                      prepend-inner-icon="event"
                      readonly
                    />
                    <v-date-picker
                      v-model="editedItem.date_of_birth"
                      :max="new Date().toISOString().substr(0, 10)"
                      min="1950-01-01"
                    >
                      <v-spacer />
                      <v-btn flat color="primary" @click="birthPickerModal = false">
                        Cancel
                      </v-btn>
                      <v-btn flat color="primary" @click="$refs.birthPicker.save(editedItem.date_of_birth)">
                        OK
                      </v-btn>
                    </v-date-picker>
                  </v-dialog>
                </v-flex>
                <v-flex class="px-2">
                  <v-select
                    v-model="editedItem.gender"
                    :items="[{text: 'Male', value: 'male'}, {text: 'Female', value: 'female'}, {text: 'Other', value: 'other'}]"
                    :rules="requiredRule"
                    required
                    label="Gender"
                    prepend-inner-icon="person"
                  />
                </v-flex>
                <v-flex class="px-2">
                  <v-text-field
                    v-model="editedItem.phone"
                    min="0"
                    prepend-inner-icon="phone"
                    label="Phone"
                  />
                </v-flex>
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.national_id" prepend-inner-icon="flag" label="National ID" />
                </v-flex>
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.national_type" prepend-inner-icon="flag" label="National type" />
                  <!-- </v-flex>
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.military_status" prepend-inner-icon="text_format" label="Military status" />
                </v-flex> -->
                  <v-flex class="px-2">
                    <v-text-field v-model="editedItem.car_reg" prepend-inner-icon="directions_car" label="Car reg." />
                  </v-flex>
                  <v-flex class="px-2">
                    <v-text-field v-model="editedItem.address" prepend-inner-icon="pin_drop" label="Address" />
                  </v-flex>
                  <v-flex class="px-2">
                    <v-select
                      v-model="editedItem.highest_qualification"
                      :items="qualifications"
                      label="Highest qualification"
                      prepend-inner-icon="grade"
                    />
                  </v-flex>
                  <v-flex class="px-2">
                    <v-text-field v-model="editedItem.type_of_employment" prepend-inner-icon="text_format" label="Type of employment" />
                  </v-flex>
                  <v-flex class="px-2">
                    <v-text-field v-model="editedItem.performance_assessment" prepend-inner-icon="text_format" label="Performance assessment" />
                  </v-flex>
                  <v-flex class="px-2">
                    <v-text-field v-model="editedItem.ref_id" :rules="requiredRule" required prepend-inner-icon="layers" label="Ref ID" />
                  </v-flex>
                  <v-flex class="px-2">
                    <v-dialog
                      ref="lastEmploymentDatePicker"
                      v-model="lastEmploymentDatePicker"
                      :return-value.sync="editedItem.last_date_of_employment"
                      persistent
                      lazy
                      full-width
                      width="290px"
                    >
                      <v-text-field
                        slot="activator"
                        v-model="editedItem.last_date_of_employment"
                        label="Last employment date"
                        prepend-inner-icon="event"
                        readonly
                      />
                      <v-date-picker
                        v-model="editedItem.last_date_of_employment"
                        :max="new Date().toISOString().substr(0, 10)"
                        min="1950-01-01"
                      >
                        <v-spacer />
                        <v-btn flat color="primary" @click="lastEmploymentDatePicker = false">
                          Cancel
                        </v-btn>
                        <v-btn flat color="primary" @click="$refs.lastEmploymentDatePicker.save(editedItem.last_date_of_employment)">
                          OK
                        </v-btn>
                      </v-date-picker>
                    </v-dialog>
                  </v-flex>
                  <v-flex class="px-2">
                    <v-dialog
                      ref="lastAssessmentDatePicker"
                      v-model="lastAssessmentDatePicker"
                      :return-value.sync="editedItem.date_of_last_assement"
                      persistent
                      lazy
                      full-width
                      width="290px"
                    >
                      <v-text-field
                        slot="activator"
                        v-model="editedItem.date_of_last_assement"
                        label="Last assessment date"
                        prepend-inner-icon="event"
                        readonly
                      />
                      <v-date-picker
                        v-model="editedItem.date_of_last_assement"
                        :max="new Date().toISOString().substr(0, 10)"
                        min="1950-01-01"
                      >
                        <v-spacer />
                        <v-btn flat color="primary" @click="lastAssessmentDatePicker = false">
                          Cancel
                        </v-btn>
                        <v-btn flat color="primary" @click="$refs.lastAssessmentDatePicker.save(editedItem.date_of_last_assement)">
                          OK
                        </v-btn>
                      </v-date-picker>
                    </v-dialog>
                  </v-flex>
                  <v-flex class="px-2">
                    <v-dialog
                      ref="hiredAt"
                      v-model="hiredAtPickerModal"
                      :return-value.sync="editedItem.hired_at"
                      persistent
                      lazy
                      full-width
                      width="290px"
                    >
                      <v-text-field
                        slot="activator"
                        v-model="editedItem.hired_at"
                        label="Hired at"
                        prepend-inner-icon="event"
                        readonly
                      />
                      <v-date-picker
                        v-model="editedItem.hired_at"
                        :max="new Date().toISOString().substr(0, 10)"
                        min="1950-01-01"
                      >
                        <v-spacer />
                        <v-btn flat color="primary" @click="hiredAtPickerModal = false">
                          Cancel
                        </v-btn>
                        <v-btn flat color="primary" @click="$refs.hiredAt.save(editedItem.hired_at)">
                          OK
                        </v-btn>
                      </v-date-picker>
                    </v-dialog>
                  </v-flex>
                  <v-flex class="px-2">
                    <v-select
                      v-model="editedItem.department_id"
                      :items="departments"
                      :rules="requiredRule"
                      :disabled="!!department"
                      required
                      item-text="name"
                      item-value="id"
                      label="Department"
                      prepend-inner-icon="location_city"
                    />
                  </v-flex>
                  <v-flex class="px-2">
                    <v-select
                      v-model="editedItem.job_title_id"
                      :items="jobTitles"
                      :rules="requiredRule"
                      required
                      item-text="name"
                      item-value="id"
                      label="Job Title"
                      prepend-inner-icon="build"
                    />
                  </v-flex>
                  <v-flex class="px-2">
                    <v-text-field v-model="editedItem.comment" prepend-inner-icon="sms" label="comment" />
                  </v-flex>
                </v-flex>
              </v-layout>
            </v-card-text>

            <v-card-actions class="px-3 pb-3">
              <v-spacer />
              <v-btn color="red darken-1" :disabled="buttonLoading" flat @click="close">
                Cancel
              </v-btn>
              <v-btn color="primary" type="submit" :loading="buttonLoading">
                Save
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-form>
      </v-dialog>
      <v-dialog v-if="importEnabled" v-model="importModal" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-btn slot="activator" color="secondary" dark class="mb-2">
          Import
        </v-btn>
        <v-card>
          <v-card-title class="card-title">
            <span class="headline px-2">
              Import employees data
            </span>
          </v-card-title>
          <v-card-text>
            <v-layout>
              <v-flex class="px-2">
                <span class="caption">
                  Select your document
                </span>
                <div class="file-upload">
                  <input id="upload" ref="upload" type="file" name="upload" @change="handleUpload">
                  <label for="upload">
                    <v-btn color="primary" class="ml-0">
                      Upload
                    </v-btn>
                  </label>
                  <span>{{ file_name }}</span>
                </div>
              </v-flex>
            </v-layout>
          </v-card-text>
          <v-card-actions class="px-3 pb-3">
            <v-spacer />
            <v-btn color="primary" flat :disabled="buttonLoading" @click="close">
              Cancel
            </v-btn>
            <v-btn color="red" :dark="!!file" :loading="buttonLoading" :disabled="!file" @click="importData">
              Import
            </v-btn>
          </v-card-actions>
        </v-card>
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
            <v-btn color="red" dark :loading="buttonLoading" @click="deleteItem(toBeDeleted)">
              Yes
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-toolbar>
    <v-data-table
      ref="table"
      :headers="headers"
      :items="employees"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <nuxt-link tag="tr" :to="`/employee/${props.item.id}`">
          <td>
            <div class="employee-name-avatar">
              <div v-if="props.item.avatar">
                <img :src="props.item.avatar" :alt="props.item.full_name" class="employee-img">
              </div>
              <span>{{ props.item.full_name }}</span>
            </div>
          </td>
          <td class="text-xs-left">
            {{ props.item.department_name }}
          </td>
          <td class="text-xs-left">
            {{ props.item.job_title_name }}
          </td>
          <td class="text-xs-left">
            {{ props.item.phone }}
          </td>
          <td class="text-xs-left">
            {{ props.item.hired_at && props.item.hired_at.includes(' ') ? props.item.hired_at.split(' ')[0] : props.item.hired_at }}
          </td>
          <td class="text-xs-left">
            {{ props.item.ref_id }}
          </td>
          <td class="justify-center align-center layout px-0">
            <v-icon
              v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('employee_update')"
              small
              class="mr-2"
              @click.stop="editItem(props.item)"
            >
              edit
            </v-icon>
            <v-icon
              v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('employee_delete')"
              small
              class="mr-2"
              @click.stop="confirm = true; toBeDeleted = props.item"
            >
              delete
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
    },
    department: {
      type: String,
      default: ''
    },
    importEnabled: {
      type: Boolean,
      default: false
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
    importModal: false,
    lastEmploymentDatePicker: false,
    lastAssessmentDatePicker: false,
    birthPickerModal: false,
    hiredAtPickerModal: false,
    toBeDeleted: '',
    headers: [
      { text: 'Name', value: 'full_name' },
      { text: 'Department', value: 'department_name' },
      { text: 'Job Title', value: 'job_title_name' },
      { text: 'Phone', value: 'phone' },
      { text: 'Hired at', value: 'hired_at' },
      { text: 'Ref ID', value: 'ref_id' },
      { text: 'Actions', align: 'center', value: 'actions', sortable: false }
    ],
    appVersionItem: ['lite', 'pro'],
    qualifications: [
      'NQF 1',
      'NQF 2',
      'NQF 3',
      'NQF 4',
      'NQF 5',
      'NQF 6',
      'NQF 7',
      'NQF 8',
      'NQF 9',
      'NQF 10'
    ],
    editedIndex: -1,
    editedItem: {
      job_title_id: '',
      department_id: '',
      department_name: '',
      job_title_name: '',
      email: '',
      first_name: '',
      last_name: '',
      app_version: '',
      date_of_birth: '',
      gender: '',
      phone: '',
      address: '',
      qualifications: '',
      ref_id: '',
      performance_assessment: '',
      hired_at: ''
    },
    defaultItem: {
      job_title_id: '',
      department_id: '',
      department_name: '',
      job_title_name: '',
      email: '',
      first_name: '',
      last_name: '',
      app_version: '',
      date_of_birth: '',
      gender: '',
      phone: '',
      address: '',
      qualifications: '',
      ref_id: '',
      performance_assessment: '',
      hired_at: ''
    },
    orig: {},
    expandData: {},
    file_name: '',
    file: null
  }),
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'New Employee' : 'Edit Employee'
    },
    employees() {
      if (this.list) return this.list
      return this.$store.state.employees.list
    },
    departments() {
      return this.$store.state.departments.list
    },
    jobTitles() {
      return this.$store.state.jobTitles.list
    }
  },
  watch: {
    dialog(val) {
      if (val === true) this.$refs.form.resetValidation()
      val || this.close()
    },
    confirm(val) {
      val || this.close()
    },
    importModal(val) {
      val || this.close()
    }
  },
  async mounted() {
    this.$store.dispatch('departments/getDepartments')
    this.$store.dispatch('jobTitles/getJobTitles')
    await this.$store.dispatch('employees/getEmployees')
    if (this.department) {
      this.defaultItem.department_id = this.department
      this.editedItem.department_id = this.department
    }
    this.loading = false
  },
  methods: {
    handleUpload(e) {
      const file = e.target.files[0]
      // console.log(file)
      if (!file) return
      this.file_name = file.name
      this.file = file
    },
    async editItem(item) {
      this.loading = true
      this.editedIndex = this.employees.indexOf(item)
      const res = await this.$store.dispatch('employees/getSingle', item.id)
      this.loading = false
      if (!res || res === 'error') return
      const data = {
        ...this.editedItem,
        ...res
      }
      if (data.full_emp_name) {
        data.full_name = data.full_emp_name
        delete data.full_emp_name
      }
      if (data.hired_at) data.hired_at = data.hired_at.split(' ')[0]
      if (data.date_of_last_assement)
        data.date_of_last_assement = data.date_of_last_assement.split(' ')[0]
      if (data.last_date_of_employment)
        data.last_date_of_employment = data.last_date_of_employment.split(
          ' '
        )[0]
      this.editedItem = data
      this.orig = data
      this.dialog = true
    },
    async deleteItem(item) {
      this.buttonLoading = true
      await this.$store
        .dispatch('employees/deleteEmployee', item.id)
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false
      this.confirm = false
      this.toBeDeleted = ''
    },
    close() {
      this.dialog = false
      this.confirm = false
      this.importModal = false
      this.file_name = ''
      this.file = null
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      }, 300)
    },
    async save() {
      this.$refs.form.validate()
      if (!this.valid) return
      let res
      if (this.editedIndex > -1) {
        this.buttonLoading = true
        const data = { ...this.editedItem }
        if (data.ref_id === this.orig.ref_id) delete data.ref_id
        if (data.national_id) data.national_id = String(data.national_id)
        Object.keys(data).forEach(key => {
          if (!data[key]) delete data[key]
        })
        res = await this.$store
          .dispatch('employees/updateEmployee', data)
          .catch(() => {
            this.buttonLoading = false
          })
        this.buttonLoading = false
      } else {
        this.buttonLoading = true
        const password = Math.random()
          .toString(36)
          .slice(-8)
        const data = {
          ...this.editedItem,
          password
        }
        Object.keys(data).forEach(key => {
          if (!data[key]) delete data[key]
        })
        res = await this.$store
          .dispatch('employees/newEmployee', data)
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
    },
    async importData() {
      if (!this.file) return false
      this.buttonLoading = true
      const res = await this.$store
        .dispatch('employees/importData', this.file)
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false
      if (!res || res === 'error') return
      this.close()
      // console.log(res)
      this.$store.dispatch('snackbar/show', {
        message: 'Success!',
        timeout: 2000,
        color: 'success'
      })
      await this.$store.dispatch('employees/getEmployees')
    }
  }
}
</script>

<style lang="stylus" scoped>
tr {
  cursor pointer
}
.file-upload {
  input {
    display none
  }
  label {
    cursor pointer
    display inline-block
    position relative
    z-index 9
    button {
      pointer-events none
    }
  }
}

.employee-img {
  width 20px
  height 20px
  object-fit cover
  display block
}

.employee-name-avatar {
  display flex
  align-items center
  & > div {
    display flex
    align-items center
    margin-right 8px
  }
}

.buttons {
  display flex
  justify-content space-between
}
</style>
