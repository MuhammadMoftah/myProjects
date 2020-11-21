<template>
  <div>
    <div v-if="$refs.table" class="buttons mb-3">
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary">
        <DownloadExcel :data="$refs.table.filteredItems" :fields="generateExcelHeaders(headers)" title="Feedback" name="Feedback.xls" class="download-excel-btn">
          Export to Excel
        </DownloadExcel>
      </v-btn>
      <v-btn :disabled="loading || $refs.table.filteredItems.length === 0" color="primary" @click="generatePDF($refs.table.filteredItems, headers, 'Feedback')">
        Export to PDF
      </v-btn>
    </div>
    <v-toolbar flat class="elevation-1" color="white">
      <v-toolbar-title>Feedback</v-toolbar-title>
      <!-- <v-divider
        class="mx-2"
        inset
        vertical
      /> -->
      <v-spacer />
      <!-- Search Feild -->
      <v-text-field
        v-model="search"
        append-icon="search"
        label="Search"
        class="pt-0"
        single-line
        hide-details
      />

      <!-- Popup Add FeedBack -->
      <v-dialog v-model="dialog" :persistent="buttonLoading" content-class="dialog" max-width="500px">
        <v-btn v-if="$store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('task_create')" slot="activator" color="primary" dark class="mb-2">
          Add
        </v-btn>
        <!-- New Desgin and Requerment  -->
        <v-form ref="form" v-model="valid" @submit.prevent="save">
          <v-card>
            <v-card-title class="card-title">
              <span class="headline px-2">
                FeedBack
              </span>
            </v-card-title>

            <v-card-text>
              <v-layout wrap column>
                <v-flex class="px-2">
                  <v-text-field v-model="editedItem.title" :rules="requiredRule" required label="FeedBack Title" prepend-inner-icon="text_format" />
                </v-flex>
                <!-- Description Field  -->
                <v-flex class="px-2">
                  <v-textarea
                    v-model="editedItem.body"
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
      <!-- End PopUp Add FeedBack -->
    </v-toolbar>

    <v-data-table
      ref="table"
      :headers="headers"
      :items="feedback"
      :loading="loading"
      :search="search"
      disable-initial-sort
      class="elevation-1"
    >
      <template slot="items" slot-scope="props">
        <nuxt-link tag="tr" :to="`/feedback/${props.item.id}`">
          <!-- <td>{{ props.item.creator }}</td> -->
          <td>{{ props.item.title }}</td>
          <td class="text-xs-left">
            {{ props.item.body ? props.item.body.slice(0, 50) : '' }}
          </td>
          <td>{{ props.item.created_at }}</td>
        </nuxt-link>
      </template>
    </v-data-table>
  </div>
</template>

<script>
export default {
  data: () => ({
    search: '',
    loading: true,
    dialog: false,
    valid: false,
    buttonLoading: false,
    requiredRule: [v => !!v || 'This field is required'],
    editedIndex: -1,
    editedItem: {},
    defaultItem: {},
    headers: [
      // { text: 'Creator', value: 'creator' },
      { text: 'Title', value: 'title' },
      { text: 'Body', value: 'body' },
      { text: 'Created at', value: 'created_at' }
    ]
  }),
  computed: {
    feedback() {
      return this.$store.state.feedback.list
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
    await this.$store.dispatch('feedback/getFeedbacks')
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
      this.editedIndex = this.feedback.indexOf(item)
      this.editedItem = {
        ...item
      }
      this.dialog = true
    },
    async save() {
      this.$refs.form.validate()
      if (!this.valid) return
      let res
      if (this.editedIndex > -1) {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('feedback/updateFeedBack', {
            ...this.editedItem
          })
          .catch(() => {
            this.buttonLoading = false
          })
        this.buttonLoading = false
      } else {
        this.buttonLoading = true
        res = await this.$store
          .dispatch('feedback/newFeedBack', this.editedItem)
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
