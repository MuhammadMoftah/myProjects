<template>
  <div class="documents-listing">
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Documents" name="Documents.xls" class="download-excel-btn">
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Documents')">
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Documents</v-toolbar-title>
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
      :items="list"
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
      </template>
    </v-data-table>
  </div>
</template>

<script>
export default {
  props: {
    list: {
      type: Array,
      default: () => []
    }
  },
  data: () => ({
    search: '',
    loading: false,
    headers: [
      { text: 'Name', value: 'name' },
      { text: 'Type', value: 'type' },
      { text: 'URL', value: 'url' }
    ]
  })
}
</script>
