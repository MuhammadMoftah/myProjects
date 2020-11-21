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
        <v-card-title class="card-title">
          <span class="headline px-2">
            Update company settings
          </span>
        </v-card-title>

        <v-card-text>
          <v-layout wrap>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.company_name" label="Name" prepend-inner-icon="text_format" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.company_email" type="email" label="Email" prepend-inner-icon="email" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.company_website" label="Website" prepend-inner-icon="web" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.company_address" label="Address" prepend-inner-icon="place" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.company_city" label="City" prepend-inner-icon="place" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.company_country" label="Country" prepend-inner-icon="place" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-autocomplete
                v-model="data.company_timezone"
                :items="timezones"
                label="Timezone"
                prepend-inner-icon="access_time"
              />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.company_zip_code" mask="#####" label="ZIP Code" prepend-inner-icon="local_post_office" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.company_telephone" label="Telephone" prepend-inner-icon="phone" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.company_mobile" label="Mobile" prepend-inner-icon="phone" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.company_field_of_business" label="Field of business" prepend-inner-icon="location_city" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-select
                v-model="data.company_language"
                :items="langs"
                label="Language"
                prepend-inner-icon="language"
              />
            </v-flex>
          </v-layout>
        </v-card-text>

        <v-card-actions class="px-3 pb-3">
          <v-btn color="primary" type="submit" :loading="buttonLoading">
            Save
          </v-btn>
        </v-card-actions>
      </v-card>

      <!-- <v-card class="card mb-4">
        <div v-if="pageLoading" class="overlay">
          <v-progress-circular
            indeterminate
            color="primary"
          />
        </div>
        <v-card-title class="card-title">
          <span class="headline px-2">
            Update mail settings
          </span>
        </v-card-title>

        <v-card-text>
          <v-layout wrap>
            <v-flex xs12 md6 class="px-2">
              <v-select
                v-model="data.mail_is_enabled"
                :items="[{text: 'Yes', value: '1'}, {text: 'No', value: '0'}]"
                label="Mail enabled?"
                prepend-inner-icon="check"
              />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.mail_driver" label="Mail driver" prepend-inner-icon="text_format" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.mail_host" label="Mail host" prepend-inner-icon="dns" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.mail_port" type="number" label="Mail port" prepend-inner-icon="http" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.mail_username" label="Mail username" prepend-inner-icon="person" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.mail_password" label="Mail password" prepend-inner-icon="lock" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.mail_address" label="Mail address" prepend-inner-icon="email" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.mail_name" label="Mail name" prepend-inner-icon="text_format" />
            </v-flex>
          </v-layout>
        </v-card-text>

        <v-card-actions class="px-3 pb-3">
          <v-btn color="primary" type="submit" :loading="buttonLoading">
            Save
          </v-btn>
        </v-card-actions>
      </v-card> -->

      <!-- <v-card class="card mb-4">
        <div v-if="pageLoading" class="overlay">
          <v-progress-circular
            indeterminate
            color="primary"
          />
        </div>
        <v-card-title class="card-title">
          <span class="headline px-2">
            Update backup settings
          </span>
        </v-card-title>

        <v-card-text>
          <v-layout wrap>
            <v-flex xs12 class="px-2">
              <v-select
                v-model="data.backup_is_auto"
                :items="[{text: 'Yes', value: '1'}, {text: 'No', value: '0'}]"
                label="Auto backup?"
                prepend-inner-icon="check"
              />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.backup_every" label="Backup every" prepend-inner-icon="access_time" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-text-field v-model="data.backup_when" label="Backup when" prepend-inner-icon="access_time" />
            </v-flex>
          </v-layout>
        </v-card-text>

        <v-card-actions class="px-3 pb-3">
          <v-btn color="primary" type="submit" :loading="buttonLoading">
            Save
          </v-btn>
        </v-card-actions>
      </v-card> -->

      <v-card class="card mb-4">
        <div v-if="pageLoading" class="overlay">
          <v-progress-circular
            indeterminate
            color="primary"
          />
        </div>
        <v-card-title class="card-title">
          <span class="headline px-2">
            Update attendance settings
          </span>
        </v-card-title>

        <v-card-text>
          <v-layout wrap>
            <v-flex xs12 class="px-2">
              <v-select
                v-model="data.attendance_week_start"
                :items="weekDays"
                label="Week start?"
                prepend-inner-icon="timer"
              />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-dialog
                ref="attendance_work_start_time_picker"
                v-model="attendance_work_start_time_picker"
                :return-value.sync="data.attendance_work_start_time"
                lazy
                full-width
                width="290px"
              >
                <v-text-field
                  slot="activator"
                  v-model="data.attendance_work_start_time"
                  label="Work start time"
                  prepend-inner-icon="access_time"
                  readonly
                />
                <v-time-picker
                  v-if="attendance_work_start_time_picker"
                  v-model="data.attendance_work_start_time"
                  full-width
                >
                  <v-spacer />
                  <v-btn flat color="primary" @click="attendance_work_start_time_picker = false">
                    Cancel
                  </v-btn>
                  <v-btn flat color="primary" @click="$refs.attendance_work_start_time_picker.save(data.attendance_work_start_time)">
                    OK
                  </v-btn>
                </v-time-picker>
              </v-dialog>
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-dialog
                ref="attendance_work_end_time_picker"
                v-model="attendance_work_end_time_picker"
                :return-value.sync="data.attendance_work_end_time"
                lazy
                full-width
                width="290px"
              >
                <v-text-field
                  slot="activator"
                  v-model="data.attendance_work_end_time"
                  label="Work end time"
                  prepend-inner-icon="access_time"
                  readonly
                />
                <v-time-picker
                  v-if="attendance_work_end_time_picker"
                  v-model="data.attendance_work_end_time"
                  full-width
                >
                  <v-spacer />
                  <v-btn flat color="primary" @click="attendance_work_end_time_picker = false">
                    Cancel
                  </v-btn>
                  <v-btn flat color="primary" @click="$refs.attendance_work_end_time_picker.save(data.attendance_work_end_time)">
                    OK
                  </v-btn>
                </v-time-picker>
              </v-dialog>
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-dialog
                ref="attendance_overtime_start_time_picker"
                v-model="attendance_overtime_start_time_picker"
                :return-value.sync="data.attendance_overtime_start_time"
                lazy
                full-width
                width="290px"
              >
                <v-text-field
                  slot="activator"
                  v-model="data.attendance_overtime_start_time"
                  label="Overtime start time"
                  prepend-inner-icon="access_time"
                  readonly
                />
                <v-time-picker
                  v-if="attendance_overtime_start_time_picker"
                  v-model="data.attendance_overtime_start_time"
                  full-width
                >
                  <v-spacer />
                  <v-btn flat color="primary" @click="attendance_overtime_start_time_picker = false">
                    Cancel
                  </v-btn>
                  <v-btn flat color="primary" @click="$refs.attendance_overtime_start_time_picker.save(data.attendance_overtime_start_time)">
                    OK
                  </v-btn>
                </v-time-picker>
              </v-dialog>
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-dialog
                ref="attendance_double_rate_start_time_picker"
                v-model="attendance_double_rate_start_time_picker"
                :return-value.sync="data.attendance_double_rate_start_time"
                lazy
                full-width
                width="290px"
              >
                <v-text-field
                  slot="activator"
                  v-model="data.attendance_double_rate_start_time"
                  label="Double rate start time"
                  prepend-inner-icon="access_time"
                  readonly
                />
                <v-time-picker
                  v-if="attendance_double_rate_start_time_picker"
                  v-model="data.attendance_double_rate_start_time"
                  full-width
                >
                  <v-spacer />
                  <v-btn flat color="primary" @click="attendance_double_rate_start_time_picker = false">
                    Cancel
                  </v-btn>
                  <v-btn flat color="primary" @click="$refs.attendance_double_rate_start_time_picker.save(data.attendance_double_rate_start_time)">
                    OK
                  </v-btn>
                </v-time-picker>
              </v-dialog>
            </v-flex>
          </v-layout>
        </v-card-text>

        <v-card-actions class="px-3 pb-3">
          <v-btn color="primary" type="submit" :loading="buttonLoading">
            Save
          </v-btn>
        </v-card-actions>
      </v-card>

      <v-card class="card mb-4">
        <div v-if="pageLoading" class="overlay">
          <v-progress-circular
            indeterminate
            color="primary"
          />
        </div>
        <v-card-title class="card-title">
          <span class="headline px-2">
            Update clocking settings
          </span>
        </v-card-title>

        <v-card-text>
          <v-layout wrap>
            <v-flex xs12 class="px-2">
              <v-text-field v-model="data.clockings_allowed_check_in_meters" type="number" label="Allowed check-in meters" prepend-inner-icon="place" />
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-dialog
                ref="clockings_work_start_picker"
                v-model="clockings_work_start_picker"
                :return-value.sync="data.clockings_work_start"
                lazy
                full-width
                width="290px"
              >
                <v-text-field
                  slot="activator"
                  v-model="data.clockings_work_start"
                  label="Work start"
                  prepend-inner-icon="access_time"
                  readonly
                />
                <v-time-picker
                  v-if="clockings_work_start_picker"
                  v-model="data.clockings_work_start"
                  full-width
                >
                  <v-spacer />
                  <v-btn flat color="primary" @click="clockings_work_start_picker = false">
                    Cancel
                  </v-btn>
                  <v-btn flat color="primary" @click="$refs.clockings_work_start_picker.save(data.clockings_work_start)">
                    OK
                  </v-btn>
                </v-time-picker>
              </v-dialog>
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-dialog
                ref="clockings_work_end_picker"
                v-model="clockings_work_end_picker"
                :return-value.sync="data.clockings_work_end"
                lazy
                full-width
                width="290px"
              >
                <v-text-field
                  slot="activator"
                  v-model="data.clockings_work_end"
                  label="Work end"
                  prepend-inner-icon="access_time"
                  readonly
                />
                <v-time-picker
                  v-if="clockings_work_end_picker"
                  v-model="data.clockings_work_end"
                  full-width
                >
                  <v-spacer />
                  <v-btn flat color="primary" @click="clockings_work_end_picker = false">
                    Cancel
                  </v-btn>
                  <v-btn flat color="primary" @click="$refs.clockings_work_end_picker.save(data.clockings_work_end)">
                    OK
                  </v-btn>
                </v-time-picker>
              </v-dialog>
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-dialog
                ref="clockings_break_start_picker"
                v-model="clockings_break_start_picker"
                :return-value.sync="data.clockings_break_start"
                lazy
                full-width
                width="290px"
              >
                <v-text-field
                  slot="activator"
                  v-model="data.clockings_break_start"
                  label="Break start"
                  prepend-inner-icon="access_time"
                  readonly
                />
                <v-time-picker
                  v-if="clockings_break_start_picker"
                  v-model="data.clockings_break_start"
                  full-width
                >
                  <v-spacer />
                  <v-btn flat color="primary" @click="clockings_break_start_picker = false">
                    Cancel
                  </v-btn>
                  <v-btn flat color="primary" @click="$refs.clockings_break_start_picker.save(data.clockings_break_start)">
                    OK
                  </v-btn>
                </v-time-picker>
              </v-dialog>
            </v-flex>
            <v-flex xs12 md6 class="px-2">
              <v-dialog
                ref="clockings_break_end_picker"
                v-model="clockings_break_end_picker"
                :return-value.sync="data.clockings_break_end"
                lazy
                full-width
                width="290px"
              >
                <v-text-field
                  slot="activator"
                  v-model="data.clockings_break_end"
                  label="Break end"
                  prepend-inner-icon="access_time"
                  readonly
                />
                <v-time-picker
                  v-if="clockings_break_end_picker"
                  v-model="data.clockings_break_end"
                  full-width
                >
                  <v-spacer />
                  <v-btn flat color="primary" @click="clockings_break_end_picker = false">
                    Cancel
                  </v-btn>
                  <v-btn flat color="primary" @click="$refs.clockings_break_end_picker.save(data.clockings_break_end)">
                    OK
                  </v-btn>
                </v-time-picker>
              </v-dialog>
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
import timezones from '~/assets/timezones'

export default {
  data() {
    return {
      timezones,
      zoneSearch: '',
      langs: [
        { text: 'English', value: 'us' },
        { text: 'Arabic', value: 'ar' }
      ],
      weekDays: [
        { text: 'Saturday', value: 'Sat' },
        { text: 'Sunday', value: 'Sun' },
        { text: 'Monday', value: 'Mon' },
        { text: 'Tuesday', value: 'Tue' },
        { text: 'Wednesday', value: 'Wed' },
        { text: 'Thursday', value: 'Thu' },
        { text: 'Friday', value: 'Fri' }
      ],
      /* eslint-disable */
      emailRules: [
        v =>
          /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
            v
          ) || 'E-mail must be valid'
      ],
      /* eslint-enable */
      pageLoading: false,
      loading: false,
      buttonLoading: false,
      valid: false,
      birthPickerModal: false,
      hiredAtPickerModal: false,
      preview: '',
      data: {},
      attendance_work_start_time_picker: false,
      attendance_work_end_time_picker: false,
      attendance_overtime_start_time_picker: false,
      attendance_double_rate_start_time_picker: false,
      clockings_work_start_picker: false,
      clockings_work_end_picker: false,
      clockings_break_start_picker: false,
      clockings_break_end_picker: false
    }
  },
  async created() {
    this.pageLoading = true
    const res = await this.$store.dispatch(
      'settings/getSettings',
      this.$store.state.auth.user.employee_id
    )
    if (!res || res === 'error') return
    this.pageLoading = false
    const data = {
      ...res
    }
    this.data = data
  },
  methods: {
    async save() {
      this.$refs.form.validate()
      if (!this.valid) return
      this.buttonLoading = true
      const data = { ...this.data }
      const res = await this.$store
        .dispatch('settings/updateSettings', data)
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false
      if (!res || res === 'error') return
      this.$store.dispatch('snackbar/show', {
        message: 'Your data has been successfully updated.',
        timeout: 2000
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
  padding-top 200px
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
