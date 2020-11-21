<template>
  <div class="role-listing">
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="permissions" name="permissions.xls" class="download-excel-btn">
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'permissions')">
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Permissions</v-toolbar-title>
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
                Add permissions
              </span>
            </v-card-title>

            <v-card-text>
              <v-layout wrap column>
                <v-flex class="px-2">
                  <v-autocomplete
                    v-model="editedItem.permission"
                    :items="allPermissions"
                    :rules="requiredRule"
                    multiple
                    item-text="name"
                    item-value="name"
                    no-data-text="Role already has all possible permissions"
                    required
                    label="Permissions"
                    prepend-inner-icon="lock"
                  >
                    <v-list-tile
                      slot="prepend-item"
                      ripple
                      @click="toggleSelectAll"
                    >
                      <v-list-tile-action>
                        <v-icon>done_all</v-icon>
                      </v-list-tile-action>
                      <v-list-tile-title>Select {{ editedItem.permission.length === allPermissions.length ? "None" : "All" }}</v-list-tile-title>
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
      :items="permissions"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <td>{{ props.item.name }}</td>
        <td>{{ props.item.description }}</td>
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
      { text: 'Name', value: 'name' },
      { text: 'Description', value: 'description' },
      { text: 'Actions', align: 'center', value: 'name', sortable: false }
    ],
    toBeDeleted: '',
    editedIndex: -1,
    editedItem: {
      permission: []
    },
    defaultItem: {
      permission: []
    }
  }),
  computed: {
    permissions() {
      return this.$store.state.roles.permissions.filter(item => {
        return this.$store.state.roles.currentPermissions.includes(item.name)
      })
    },
    allPermissions() {
      const all = this.$store.state.roles.permissions
      return all.filter(item => {
        if (this.permissions.find(inner => inner.name === item.name))
          return false
        return true
      })
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
    await this.$store.dispatch('roles/getSingle', this.id)
    await this.$store.dispatch('roles/getPermissions', this.id)
    this.loading = false
  },
  methods: {
    toggleSelectAll() {
      if (this.editedItem.permission.length === this.allPermissions.length) {
        this.editedItem.permission = []
      } else {
        this.editedItem.permission = this.allPermissions.map(item => item.name)
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
        .dispatch('roles/deleteRolePermission', {
          permission: item,
          role_id: this.id
        })
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false
      this.confirm = false
      this.toBeDeleted = ''
      this.$store.dispatch('snackbar/show', {
        message: `Success! Please note that if you're modifying the logged in user permissions, you'll have to logout then login.`,
        timeout: 2000,
        color: 'success'
      })
    },
    async save() {
      this.$refs.form.validate()
      if (!this.valid) return
      this.buttonLoading = true
      const res = await this.$store
        .dispatch('roles/newRolePermission', {
          ...this.editedItem,
          role_id: this.id
        })
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false

      if (!res || res === 'error') return
      this.close()
      this.$store.dispatch('snackbar/show', {
        message: `Success! Please note that if you're modifying the logged in user permissions, you'll have to logout then login.`,
        timeout: 2000,
        color: 'success'
      })
    }
  }
}
</script>
