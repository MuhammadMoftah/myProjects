<template>
  <div>
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Event Types" name="Event Types.xls" class="download-excel-btn">
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Event Types')">
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Events types</v-toolbar-title>
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
      <!-- Form that will be used to create events and edit them as well -->
      <v-dialog v-model="dialog" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-btn v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('event-type_create')" slot="activator" color="primary" dark class="mb-2">
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
                  <v-text-field v-model="editedItem.name" :rules="requiredRule" required label="Name" prepend-inner-icon="text_format" />
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
      :items="eventTypes"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <td>{{ props.item.name }}</td>
        <td class="text-xs-left">
          {{ props.item.description }}
        </td>
        <td class="justify-center align-center layout px-0">
          <v-icon
            v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('event-type_update')"
            small
            class="mr-2"
            @click="editItem(props.item)"
          >
            edit
          </v-icon>
          <v-icon
            v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('event-type_delete')"
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
  data: () => ({
    search: '',
    valid: false,
    requiredRule: [v => !!v || 'This field is required'],
    loading: true,
    buttonLoading: false,
    dialog: false,
    confirm: false,
    toBeDeleted: '',
    headers: [
      { text: 'Name', value: 'name' },
      { text: 'Description', value: 'description' },
      { text: 'Actions', align: 'center', value: 'name', sortable: false }
    ],
    editedIndex: -1,
    editedItem: {
      name: '',
      description: ''
    },
    defaultItem: {
      name: '',
      description: ''
    }
  }),
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'New Event Type' : 'Edit Event Type'
    },
    eventTypes() {
      return this.$store.state.events.types
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
    await this.$store.dispatch('events/getEventTypes')
    this.loading = false
  },
  methods: {
    editItem(item) {
      this.editedIndex = this.eventTypes.indexOf(item)
      this.editedItem = { ...this.eventTypes[this.editedIndex] }
      this.dialog = true
    },
    deleteItem(item) {
      this.confirm = true
      this.toBeDeleted = item
    },
    async del(item) {
      this.buttonLoading = true
      await this.$store
        .dispatch('events/deleteEventType', item.id)
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
          .dispatch('events/updateEventType', {
            ...this.editedItem
          })
          .catch(() => {
            this.buttonLoading = false
          })
        this.buttonLoading = false
      } else {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('events/newEventType', this.editedItem)
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
