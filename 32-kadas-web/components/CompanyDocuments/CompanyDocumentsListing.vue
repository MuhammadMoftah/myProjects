<template>
  <div class="companyDocuments-listing">
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="CompanyDocuments" name="CompanyDocuments.xls" class="download-excel-btn">
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'CompanyDocuments')">
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Company Documents</v-toolbar-title>
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
        <v-btn v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('document_create')" slot="activator" color="primary" dark class="mb-2">
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
                  <v-text-field v-model="editedItem.name" prepend-inner-icon="text_format" label="Name" />
                </v-flex>
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.type" prepend-inner-icon="text_format" label="Type" />
                </v-flex>
                <v-flex v-if="editedIndex === -1" class="px-2">
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
                    <span>{{ file_name || editedItem.url }}</span>
                  </div>
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
      :items="companyDocuments"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <td class="text-xs-left">
          {{ props.item.name }}
        </td>
        <td class="text-xs-left">
          {{ props.item.type }}
        </td>
        <td class="text-xs-left">
          <a v-if="props.item.url" :href="props.item.url" target="_blank" rel="noopener noreferrer">
            Link
          </a>
        </td>
        <td class="justify-center align-center layout px-0">
          <v-icon
            v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('document_update')"
            small
            class="mr-2"
            @click="editItem(props.item)"
          >
            edit
          </v-icon>
          <v-icon
            v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('document_delete')"
            small
            class="mr-2"
            @click="deleteItem(props.item)"
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
    }
  },
  data: () => ({
    search: '',
    file_name: '',
    file: null,
    loading: true,
    buttonLoading: false,
    dialog: false,
    confirm: false,
    date: false,
    valid: false,
    requiredRule: [v => !!v || 'This field is required'],
    headers: [
      { text: 'Name', value: 'name' },
      { text: 'Type', value: 'type' },
      { text: 'URL', value: 'url' },
      { text: 'Actions', align: 'center', value: 'name', sortable: false }
    ],
    toBeDeleted: '',
    editedIndex: -1,
    editedItem: {},
    defaultItem: {}
  }),
  computed: {
    companyDocuments() {
      if (this.list) return this.list
      return this.$store.state.companyDocuments.list
    },
    formTitle() {
      return this.editedIndex === -1
        ? 'New Company Document'
        : 'Edit Company Document'
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
    await this.$store.dispatch('companyDocuments/getCompanyDocuments')
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
    close() {
      this.dialog = false
      this.confirm = false
      if (this.$refs.upload) this.$refs.upload.value = ''
      this.file_name = ''
      this.file = null
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      }, 300)
    },
    editItem(item) {
      this.editedIndex = this.companyDocuments.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },
    deleteItem(item) {
      this.confirm = true
      this.toBeDeleted = item
    },
    async del(item) {
      this.buttonLoading = true
      await this.$store
        .dispatch('companyDocuments/deleteCompanyDocument', item.id)
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
      let res
      if (this.editedIndex > -1) {
        if (!this.editedItem.name && !this.editedItem.type) {
          this.close()
          return
        }
        this.buttonLoading = true
        res = await this.$store
          .dispatch('companyDocuments/updateCompanyDocument', {
            id: this.companyDocuments[this.editedIndex].id,
            name: this.editedItem.name,
            type: this.editedItem.type
          })
          .catch(() => {
            this.buttonLoading = false
          })
        this.buttonLoading = false
      } else {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('companyDocuments/newCompanyDocument', {
            document: this.file,
            name: this.editedItem.name,
            type: this.editedItem.type
          })
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
</style>
