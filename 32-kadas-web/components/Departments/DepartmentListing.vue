<template>
  <div>
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel
          :data="$refs.table.filteredItems"
          :fields="generateExcelHeaders(headers)"
          title="Departments"
          name="Departments.xls"
          class="download-excel-btn"
        >
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn
        :disabled="loading || $refs.table.filteredItems.length === 0"
        color="primary"
        @click="generatePDF($refs.table.filteredItems, headers, 'Departments')"
      >
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Departments</v-toolbar-title>
      <!-- <v-divider
        class="mx-2"
        inset
        vertical
      />-->
      <v-spacer />
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Search"
        class="pt-0"
        single-line
        hide-details
      />
      <!-- Form that will be used to create departments and edit them as well -->
      <v-dialog
        v-model="dialog"
        :persistent="buttonLoading"
        content-class="dialog"
        max-width="500px"
      >
        <v-btn
          v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('department_create')"
          slot="activator"
          color="primary"
          dark
          class="mb-2"
        >
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
                  <v-text-field
                    v-model="editedItem.name"
                    :rules="requiredRule"
                    required
                    label="Name"
                    prepend-inner-icon="text_format"
                  />
                </v-flex>
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
                  <v-select
                    v-model="editedItem.department_type_id"
                    :items="departmentTypes"
                    :rules="requiredRule"
                    required
                    item-text="name"
                    item-value="id"
                    label="Type"
                    prepend-inner-icon="location_city"
                  />
                </v-flex>
                <v-flex class="px-2">
                  <v-autocomplete
                    v-model="editedItem.timezone"
                    :items="timezones"
                    :rules="requiredRule"
                    required
                    label="Timezone"
                    prepend-inner-icon="access_time"
                  />
                </v-flex>
                <v-flex class="px-2">
                  <v-text-field
                    v-model="editedItem.latitude"
                    :rules="requiredRule"
                    required
                    label="Latitude"
                    prepend-inner-icon="place"
                  />
                </v-flex>
                <v-flex class="px-2">
                  <v-text-field
                    v-model="editedItem.longitude"
                    :rules="requiredRule"
                    required
                    label="Longitude"
                    prepend-inner-icon="place"
                  />
                </v-flex>
                <v-flex class="px-2">
                  <v-autocomplete
                    v-model="editedItem.hod_id"
                    :items="employees"
                    item-text="full_name"
                    item-value="id"
                    label="HOD"
                    prepend-inner-icon="people"
                  />
                </v-flex>
                <v-flex v-if="position" class="px-2">
                  <GmapAutocomplete class="autocomplete mb-4 mt-3" @place_changed="updatePosition" />
                  <GmapMap
                    :center="position"
                    :zoom="6"
                    style="width: 100%; height: 300px"
                    @click="updatePosition"
                  >
                    <GmapMarker :position="position" :draggable="true" @dragend="updatePosition" />
                  </GmapMap>
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
      <v-dialog
        v-model="confirm"
        :persistent="buttonLoading"
        content-class="dialog"
        max-width="500px"
      >
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
      :items="departments"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <nuxt-link tag="tr" :to="`/department/${props.item.id}`">
          <td>{{ props.item.name }}</td>
          <td class="text-xs-left">
            {{ props.item.type }}
          </td>
          <td class="text-xs-left">
            {{ props.item.hod }}
          </td>
          <td class="text-xs-left">
            {{ props.item.description }}
          </td>
          <td class="text-xs-left">
            {{ props.item.latitude }}
          </td>
          <td class="text-xs-left">
            {{ props.item.longitude }}
          </td>
          <td class="justify-center align-center layout px-0">
            <v-icon
              v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('department_update')"
              small
              class="mr-2"
              @click.stop="editItem(props.item)"
            >
              edit
            </v-icon>
            <v-icon
              v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('department_delete')"
              small
              class="mr-2"
              @click.stop="deleteItem(props.item)"
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
import timezones from '~/assets/timezones'

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
    timezones,
    zoneSearch: '',
    toBeDeleted: '',
    headers: [
      { text: 'Name', value: 'name' },
      { text: 'Type', value: 'type' },
      { text: 'HOD', value: 'hod_id' },
      { text: 'Description', value: 'description' },
      { text: 'Latitude', value: 'latitude' },
      { text: 'Longitude', value: 'longitude' },
      { text: 'Actions', align: 'center', value: 'name', sortable: false }
    ],
    editedIndex: -1,
    editedItem: {
      name: '',
      description: '',
      hod_id: '',
      department_type_id: '',
      timezone: Intl.DateTimeFormat().resolvedOptions().timeZone || '',
      latitude: '30.3333',
      longitude: '30.3333'
    },
    defaultItem: {
      name: '',
      description: '',
      hod_id: '',
      department_type_id: '',
      timezone: Intl.DateTimeFormat().resolvedOptions().timeZone || '',
      latitude: '30.3333',
      longitude: '30.3333'
    }
  }),
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'New Department' : 'Edit Department'
    },
    departmentTypes() {
      return this.$store.state.departments.types
    },
    departments() {
      return this.$store.state.departments.list
    },
    position() {
      return {
        lat: Number(this.editedItem.latitude),
        lng: Number(this.editedItem.longitude)
      }
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
    await this.$store.dispatch('departments/getDepartments')
    await this.$store.dispatch('employees/getEmployees')
    this.loading = false
  },
  methods: {
    updatePosition(e) {
      if (
        e.geometry &&
        e.geometry.location.lat() &&
        e.geometry.location.lng()
      ) {
        this.editedItem.latitude = e.geometry.location.lat()
        this.editedItem.longitude = e.geometry.location.lng()
        return
      }
      this.editedItem.latitude = e.latLng.lat()
      this.editedItem.longitude = e.latLng.lng()
    },
    async editItem(item) {
      this.loading = true
      this.editedIndex = this.departments.indexOf(item)
      const res = await this.$store.dispatch('departments/getSingle', item.id)
      this.loading = false
      if (!res || res === 'error') return
      this.editedItem = {
        ...res.data,
        department_type_id: res.department_type.id,
        hod_id: res.hod.id
      }
      this.dialog = true
    },
    deleteItem(item) {
      this.confirm = true
      this.toBeDeleted = item
    },
    async del(item) {
      this.buttonLoading = true
      await this.$store
        .dispatch('departments/deleteDepartment', item.id)
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
        res = await this.$store
          .dispatch('departments/updateDepartment', {
            ...this.editedItem
          })
          .catch(() => {
            this.buttonLoading = false
          })
        this.buttonLoading = false
      } else {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('departments/newDepartment', this.editedItem)
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
  cursor: pointer;
}

.autocomplete {
  border-bottom: 1px solid rgba(0, 0, 0, 0.4);
  width: 100%;
  outline: none;
}
</style>
