<template>
  <div class="users-listing">
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Users" name="Users.xls" class="download-excel-btn">
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Users')">
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Users</v-toolbar-title>
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
        <v-form ref="form" v-model="valid" @submit.prevent="save">
          <v-card>
            <v-card-title class="card-title">
              <span class="headline px-2">
                Assign or remove roles
              </span>
            </v-card-title>

            <v-card-text>
              <v-layout wrap column>
                <v-flex class="px-2">
                  <v-autocomplete
                    v-model="editedItem.role"
                    :items="roles"
                    :rules="requiredRule"
                    :multiple="!toBeDeleted"
                    item-text="name"
                    item-value="name"
                    required
                    label="Roles"
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
                      <v-list-tile-title>Select {{ editedItem.role.length === roles.length ? "None" : "All" }}</v-list-tile-title>
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
    </v-toolbar>
    <v-data-table
      ref="table"
      :headers="headers"
      :items="users"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <td>{{ props.item.email }}</td>
        <td class="text-xs-left">
          {{ props.item.full_name }}
        </td>
        <td class="justify-center align-center layout px-0">
          <v-icon
            small
            class="mr-2"
            @click="editItem(props.item, false)"
          >
            settings
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
    }
  },
  data: () => ({
    search: '',
    loading: true,
    buttonLoading: false,
    dialog: false,
    valid: false,
    requiredRule: [v => !!v || 'This field is required'],
    headers: [
      { text: 'Email', value: 'email' },
      { text: 'Name', value: 'full_name' },
      { text: 'Actions', align: 'center', value: 'name', sortable: false }
    ],
    toBeDeleted: '',
    editedIndex: -1,
    editedItem: {
      role: '',
      roles: []
    },
    defaultItem: {
      role: '',
      roles: []
    }
  }),
  computed: {
    users() {
      if (this.list) return this.list
      return this.$store.state.users.list
    },
    roles() {
      // const arr = this.$store.state.roles.list.map(item => item.name)
      // if (this.toBeDeleted) return this.editedItem.roles
      // if (this.editedItem.roles && this.editedItem.roles.length > 0) {
      //   return arr.filter(item => !this.editedItem.roles.includes(item))
      // }
      return this.$store.state.roles.list
    }
  },
  watch: {
    dialog(val) {
      if (val === true) this.$refs.form.resetValidation()
      val || this.close()
    }
  },
  async mounted() {
    await this.$store.dispatch('roles/getRoles')
    await this.$store.dispatch('users/getUsers')
    this.loading = false
  },
  methods: {
    toggleSelectAll() {
      if (this.editedItem.role.length === this.roles.length) {
        this.editedItem.role = []
      } else {
        this.editedItem.role = this.roles.map(item => item.name)
      }
    },
    async asyncForEach(array, callback) {
      for (let index = 0; index < array.length; index++) {
        await callback(array[index], index, array)
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
    async editItem(item, deleting) {
      if (deleting) {
        this.toBeDeleted = item
      } else {
        this.toBeDeleted = ''
      }
      this.loading = true
      this.editedIndex = this.users.indexOf(item)
      const res = await this.$store.dispatch('users/getUserRoles', item.id)
      this.loading = false
      if (!res || res === 'error') return
      this.editedItem.role = res
      this.editedItem.orig = res
      this.dialog = true
    },
    async save() {
      this.$refs.form.validate()
      if (!this.valid) return
      let res
      const { orig, role } = this.editedItem
      const roles = this.roles.map(item => item.name)
      // console.log(orig, role, roles)
      this.buttonLoading = true
      await this.asyncForEach(roles, async item => {
        if (role.includes(item) && !orig.includes(item)) {
          res = await this.$store
            .dispatch('users/assignRole', {
              role: item,
              id: this.users[this.editedIndex].id
            })
            .catch(() => {
              this.buttonLoading = false
            })
        } else if (!role.includes(item) && orig.includes(item)) {
          res = await this.$store
            .dispatch('users/removeRole', {
              role: item,
              id: this.users[this.editedIndex].id
            })
            .catch(() => {
              this.buttonLoading = false
            })
        }
      })
      this.buttonLoading = false
      // if (this.toBeDeleted) {
      //   this.buttonLoading = true
      //   res = await this.$store
      //     .dispatch('users/removeRole', {
      //       roles: this.editedItem.role,
      //       id: this.users[this.editedIndex].id
      //     })
      //     .catch(() => {
      //       this.buttonLoading = false
      //     })
      //   this.buttonLoading = false
      // } else if (this.editedIndex > -1) {
      //   this.buttonLoading = true
      //   res = await this.$store
      //     .dispatch('users/assignRole', {
      //       role: this.editedItem.role,
      //       id: this.users[this.editedIndex].id
      //     })
      //     .catch(() => {
      //       this.buttonLoading = false
      //     })
      //   this.buttonLoading = false
      // }
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
