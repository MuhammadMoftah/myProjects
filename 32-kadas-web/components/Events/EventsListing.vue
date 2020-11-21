<template>
  <div class="events-listing">
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Events" name="Events.xls" class="download-excel-btn">
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Events')">
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Events</v-toolbar-title>
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
        <v-btn v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('event_create')" slot="activator" color="primary" dark class="mb-2">
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
                  <v-select
                    v-model="editedItem.type_id"
                    :items="eventTypes"
                    :rules="requiredRule"
                    item-text="name"
                    item-value="id"
                    required
                    label="Event Type"
                    prepend-inner-icon="person"
                  />
                </v-flex>
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.note" label="Note" prepend-inner-icon="sms" />
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
      :items="events"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <nuxt-link tag="tr" :to="`/event/${props.item.id}`">
          <td>{{ props.item.creator }}</td>
          <td>{{ props.item.name }}</td>
          <td class="text-xs-left">
            {{ props.item.description }}
          </td>
          <td class="text-xs-left">
            {{ props.item.start_date }}
          </td>
          <td class="text-xs-left">
            {{ props.item.end_date }}
          </td>
          <td class="text-xs-left">
            {{ props.item.note }}
          </td>
          <td class="justify-center align-center layout px-0">
            <v-icon
              v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('event_update')"
              small
              class="mr-2"
              @click.stop="editItem(props.item)"
            >
              edit
            </v-icon>
            <v-icon
              v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('event_delete')"
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
    search: '',
    loading: true,
    buttonLoading: false,
    dialog: false,
    confirm: false,
    start_date: false,
    end_date: false,
    valid: false,
    requiredRule: [v => !!v || 'This field is required'],
    headers: [
      { text: 'Creator', value: 'creator' },
      { text: 'Name', value: 'name' },
      { text: 'Description', value: 'description' },
      { text: 'Start date', value: 'start_date' },
      { text: 'End date', value: 'end_date' },
      { text: 'Note', value: 'note' },
      { text: 'Actions', align: 'center', value: 'name', sortable: false }
    ],
    toBeDeleted: '',
    editedIndex: -1,
    editedItem: {
      name: '',
      description: '',
      start_date: '',
      end_date: '',
      note: '',
      type_id: ''
    },
    defaultItem: {
      name: '',
      description: '',
      start_date: '',
      end_date: '',
      note: '',
      type_id: ''
    }
  }),
  computed: {
    events() {
      if (this.list) return this.list
      return this.$store.state.events.list
    },
    eventTypes() {
      return this.$store.state.events.types
    },
    formTitle() {
      return this.editedIndex === -1 ? 'New Event' : 'Edit Event'
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
    await this.$store.dispatch('events/getEvents')
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
    async editItem(item) {
      this.loading = true
      this.editedIndex = this.events.indexOf(item)
      const res = await this.$store.dispatch('events/getSingle', item.id)
      this.loading = false
      if (!res || res === 'error') return
      this.editedItem = {
        ...this.events[this.editedIndex],
        ...res
      }
      this.dialog = true
    },
    deleteItem(item) {
      this.confirm = true
      this.toBeDeleted = item
    },
    async del(item) {
      this.buttonLoading = true
      await this.$store.dispatch('events/deleteEvent', item.id).catch(() => {
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
          .dispatch('events/updateEvent', {
            ...this.editedItem
          })
          .catch(() => {
            this.buttonLoading = false
          })
        this.buttonLoading = false
      } else {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('events/newEvent', this.editedItem)
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
