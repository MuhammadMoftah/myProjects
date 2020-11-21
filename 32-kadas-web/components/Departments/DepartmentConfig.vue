<template>
  <div>
    <v-form ref="form" v-model="valid" @submit.prevent="save">
      <v-card class="card mb-4">
        <div v-if="pageLoading" class="overlay">
          <v-progress-circular
            indeterminate
            color="primary"
          />
        </div>

        <v-card-text>
          <v-layout wrap>
            <v-flex xs12 class="px-2">
              <v-text-field v-model="data.allowed_check_in_meters" type="number" label="Allowed check-in meters" prepend-inner-icon="place" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.work_start" label="Work start" prepend-inner-icon="access_time" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.work_end" label="Work end" prepend-inner-icon="access_time" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.break_start" label="Break start" prepend-inner-icon="access_time" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.break_end" label="Break end" prepend-inner-icon="access_time" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-select
                v-model="data.week_start"
                :items="weekDays"
                label="Week start"
                prepend-inner-icon="access_time"
              />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.work_start_time" label="Work start time" prepend-inner-icon="access_time" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.work_end_time" label="Work end time" prepend-inner-icon="access_time" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.overtime_start_time" label="Overtime start time" prepend-inner-icon="access_time" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.double_rate_start_time" label="Double rate start time" prepend-inner-icon="access_time" />
            </v-flex>
          </v-layout>
        </v-card-text>

        <v-card-actions class="px-3 pb-3">
          <v-btn color="primary" type="submit" :loading="buttonLoading">
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-form>
  </div>
</template>

<script>
export default {
  props: {
    department: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
      pageLoading: false,
      buttonLoading: false,
      valid: false,
      data: {},
      weekDays: [
        { text: 'Saturday', value: 'Sat' },
        { text: 'Sunday', value: 'Sun' },
        { text: 'Monday', value: 'Mon' },
        { text: 'Tuesday', value: 'Tue' },
        { text: 'Wednesday', value: 'Wed' },
        { text: 'Thursday', value: 'Thu' },
        { text: 'Friday', value: 'Fri' }
      ]
    }
  },
  async created() {
    this.pageLoading = true
    const res = await this.$store
      .dispatch('departments/getSettings', this.department)
      .catch(() => {
        this.pageLoading = false
      })
    this.pageLoading = false
    if (!res || res === 'error') return
    // console.log(res)
    const data = {
      ...res.data
    }
    this.data = data
  },
  methods: {
    async save() {
      this.$refs.form.validate()
      if (!this.valid) return
      this.buttonLoading = true
      const data = { ...this.data, id: this.department }
      const res = await this.$store
        .dispatch('departments/updateSettings', data)
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false
      if (!res || res === 'error') return
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
.card {
  position relative
}
.overlay {
  width 100%
  height 100%
  background-color rgba(255,255,255, 0.7)
  z-index 2
  position absolute
  top 0
  left 0
  display flex
  justify-content center
  align-items center
  padding-top 0
}

.upload-cont {
  display flex
  align-items center
}

.image {
  width 100px
  height 100px
  img {
    width 100%
    height 100%
    object-fit cover
  }
}

.upload {
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
