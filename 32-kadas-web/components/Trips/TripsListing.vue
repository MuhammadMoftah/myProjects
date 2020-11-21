<template>
  <div class="trips-listing">
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Trips" name="Trips.xls" class="download-excel-btn">
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Trips')">
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Trips</v-toolbar-title>
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
        <v-btn v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('trip_create')" slot="activator" color="primary" dark class="mb-2">
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
                  <v-text-field v-model="editedItem.title" :rules="requiredRule" required label="Title" prepend-inner-icon="text_format" />
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
                    ref="date"
                    v-model="date"
                    :return-value.sync="editedItem.date"
                    persistent
                    lazy
                    full-width
                    width="290px"
                  >
                    <v-text-field
                      slot="activator"
                      v-model="editedItem.date"
                      :rules="requiredRule"
                      required
                      label="Date"
                      prepend-inner-icon="event"
                      readonly
                    />
                    <v-date-picker
                      v-model="editedItem.date"
                      :min="new Date().toISOString().substr(0, 10)"
                      scrollable
                    >
                      <v-spacer />
                      <v-btn flat color="primary" @click="date = false">
                        Cancel
                      </v-btn>
                      <v-btn flat color="primary" @click="$refs.date.save(editedItem.date)">
                        OK
                      </v-btn>
                    </v-date-picker>
                  </v-dialog>
                </v-flex>
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.latitude" :rules="requiredRule" required label="Latitude" prepend-inner-icon="place" />
                </v-flex>
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.longitude" :rules="requiredRule" required label="Longitude" prepend-inner-icon="place" />
                </v-flex>
                <v-flex class="px-2">
                  <GmapAutocomplete class="autocomplete mb-4 mt-3" @place_changed="updatePosition" />
                  <GmapMap
                    :center="position"
                    :zoom="6"
                    style="width: 100%; height: 300px"
                    @click="updatePosition"
                  >
                    <GmapMarker
                      :position="position"
                      :draggable="true"
                      @dragend="updatePosition"
                    />
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
      :items="trips"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <nuxt-link tag="tr" :to="`/trip/${props.item.id}`">
          <td>{{ props.item.creator }}</td>
          <td>{{ props.item.title }}</td>
          <td class="text-xs-left">
            {{ props.item.description }}
          </td>
          <td class="text-xs-left">
            {{ props.item.status }}
          </td>
          <td class="text-xs-left">
            {{ props.item.date }}
          </td>
          <td class="text-xs-left">
            {{ props.item.latitude }}
          </td>
          <td class="text-xs-left">
            {{ props.item.longitude }}
          </td>
          <td>{{ props.item.created_at }}</td>
          <td class="justify-center align-center layout px-0">
            <v-icon
              v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('trip_update')"
              small
              class="mr-2"
              @click.stop="editItem(props.item)"
            >
              edit
            </v-icon>
            <v-icon
              v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('trip_delete')"
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
    date: false,
    valid: false,
    requiredRule: [v => !!v || 'This field is required'],
    headers: [
      { text: 'Creator', value: 'creator' },
      { text: 'Title', value: 'title' },
      { text: 'Description', value: 'description' },
      { text: 'Status', value: 'status' },
      { text: 'Date', value: 'date' },
      { text: 'Latitude', value: 'latitude' },
      { text: 'Longitude', value: 'longitude' },
      { text: 'Created at', value: 'created_at' },
      { text: 'Actions', align: 'center', value: 'name', sortable: false }
    ],
    toBeDeleted: '',
    editedIndex: -1,
    editedItem: {
      name: '',
      description: '',
      date: new Date().toISOString().substr(0, 10),
      latitude: '30.3333',
      longitude: '30.3333'
    },
    defaultItem: {
      name: '',
      description: '',
      date: new Date().toISOString().substr(0, 10),
      latitude: '30.3333',
      longitude: '30.3333'
    }
  }),
  computed: {
    trips() {
      if (this.list) return this.list
      return this.$store.state.trips.list
    },
    formTitle() {
      return this.editedIndex === -1 ? 'New Trip' : 'Edit Trip'
    },
    position() {
      return {
        lat: Number(this.editedItem.latitude),
        lng: Number(this.editedItem.longitude)
      }
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
    await this.$store.dispatch('trips/getTrips')
    this.loading = false
  },
  methods: {
    updatePosition(e) {
      // console.log(e)
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
    close() {
      this.dialog = false
      this.confirm = false
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      }, 300)
    },
    editItem(item) {
      this.editedIndex = this.trips.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialog = true
    },
    deleteItem(item) {
      this.confirm = true
      this.toBeDeleted = item
    },
    async del(item) {
      this.buttonLoading = true
      await this.$store.dispatch('trips/deleteTrip', item.id).catch(() => {
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
          .dispatch('trips/updateTrip', {
            ...this.editedItem
          })
          .catch(() => {
            this.buttonLoading = false
          })
        this.buttonLoading = false
      } else {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('trips/newTrip', this.editedItem)
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
.autocomplete {
  border-bottom 1px solid rgba(0,0,0,0.4)
  width 100%
  outline none
}
</style>
