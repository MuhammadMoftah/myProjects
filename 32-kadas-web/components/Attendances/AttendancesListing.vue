<template>
  <div class="attendance-listing">
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Attendances" name="Attendances.xls" class="download-excel-btn">
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Attendances')">
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Attendances</v-toolbar-title>
      <v-spacer />
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Search"
        single-line
        hide-details
      />
    </v-toolbar>
    <v-data-table
      ref="table"
      :headers="headers"
      :items="attendances"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <nuxt-link tag="tr" :to="`/attendance/${props.item.id}`">
          <td>{{ props.item.employee }}</td>
          <td class="text-xs-left">
            {{ props.item.action }}
          </td>
          <td class="text-xs-left">
            {{ props.item.latitude }}
          </td>
          <td class="text-xs-left">
            {{ props.item.longitude }}
          </td>
          <td class="text-xs-left">
            {{ props.item.comment }}
          </td>
          <td>{{ props.item.created_at }}</td>
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
    headers: [
      { text: 'Employee', value: 'employee' },
      { text: 'Action', value: 'action' },
      { text: 'Latitude', value: 'latitude' },
      { text: 'Longitude', value: 'longitude' },
      { text: 'Comment', value: 'comment' },
      { text: 'Created at', value: 'created_at' }
    ]
  }),
  computed: {
    attendances() {
      if (this.list) return this.list
      return this.$store.state.attendances.list
    }
  },
  async mounted() {
    if (this.list) {
      this.loading = false
      return false
    }
    await this.$store.dispatch('attendances/getAttendances')
    this.loading = false
  }
}
</script>

<style lang="stylus" scoped>
tr {
  cursor pointer
}
</style>
