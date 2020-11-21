<template>
  <div class="spots-listing">
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Spots" name="Spots.xls" class="download-excel-btn">
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Spots')">
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Spots</v-toolbar-title>
      <v-spacer />
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Search"
        class="pt-0"
        single-line
        hide-details
      />
      <v-dialog v-if="!list" v-model="dialog" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-btn v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('spot_create')" slot="activator" color="primary" dark class="mb-2">
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
                  <v-text-field v-model="editedItem.comment" :rules="requiredRule" required label="Comment" prepend-inner-icon="sms" />
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
      :items="spots"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <nuxt-link tag="tr" :to="`/spot/${props.item.id}`">
          <td>{{ props.item.creator }}</td>
          <td>{{ props.item.employee }}</td>
          <td>{{ props.item.comment }}</td>
          <td class="text-xs-left">
            {{ props.item.is_responded ? 'Yes' : 'No' }}
          </td>
          <td>{{ props.item.latitude }}</td>
          <td>{{ props.item.longitude }}</td>
          <td>{{ props.item.created_at }}</td>
          <td class="justify-center align-center layout px-0">
            <!-- <v-icon
            small
            class="mr-2"
            @click="editItem(props.item)"
          >
            edit
          </v-icon> -->
            <v-icon
              v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('spot_delete')"
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
export default {
  props: {
    list: {
      type: Array,
      default: null
    }
  },
  data: () => ({
    location,
    search: '',
    loading: true,
    buttonLoading: false,
    dialog: false,
    confirm: false,
    date: false,
    valid: false,
    requiredRule: [v => !!v || 'This field is required'],
    headers: [
      { text: 'Creator', value: 'creator' },
      { text: 'Employee', value: 'employee' },
      { text: 'Comment', value: 'comment' },
      { text: 'Responded', value: 'is_responded' },
      { text: 'latitude', value: 'latitude' },
      { text: 'longitude', value: 'longitude' },
      { text: 'Created at', value: 'created_at' },
      { text: 'Actions', align: 'center', value: 'name', sortable: false }
    ],
    toBeDeleted: '',
    editedIndex: -1,
    editedItem: {},
    defaultItem: {}
  }),
  computed: {
    spots() {
      if (this.list) return this.list
      // eslint-disable-next-line vue/no-side-effects-in-computed-properties
      const arr = []
      this.$store.state.spots.list.forEach(item => {
        const latitude = item.location ? item.location.latitude : ''
        const longitude = item.location ? item.location.longitude : ''
        arr.push({
          ...item,
          latitude,
          longitude
        })
      })
      return arr
    },
    employees() {
      return this.$store.state.employees.list
    },
    formTitle() {
      return this.editedIndex === -1 ? 'New Spot' : 'Edit Spot'
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
    await this.$store.dispatch('spots/getSpots')
    this.loading = false
  },
  methods: {
    close() {
      this.dialog = false
      this.confirm = false
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      }, 300)
    },
    editItem(item) {
      this.editedIndex = this.spots.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },
    deleteItem(item) {
      this.confirm = true
      this.toBeDeleted = item
    },
    async del(item) {
      this.buttonLoading = true
      await this.$store.dispatch('spots/deleteSpot', item.id).catch(() => {
        this.buttonLoading = false
      })
      this.buttonLoading = false
      this.confirm = false
      this.toBeDeleted = ''
    },
    async save() {
      this.$refs.form.validate()
      if (!this.valid) return
      let res
      if (this.editedIndex > -1) {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('spots/updateSpot', {
            ...this.editedItem
          })
          .catch(() => {
            this.buttonLoading = false
          })
        this.buttonLoading = false
      } else {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('spots/newSpot', this.editedItem)
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
