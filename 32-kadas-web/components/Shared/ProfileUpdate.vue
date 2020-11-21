<template>
  <div>
    <v-form ref="form" v-model="valid" @submit.prevent="save">
      <v-card class="card">
        <div v-if="pageLoading" class="overlay">
          <v-progress-circular
            indeterminate
            color="primary"
          />
        </div>
        <v-card-title class="card-title">
          <span class="headline px-2">
            Update your profile
          </span>
        </v-card-title>

        <v-card-text>
          <v-layout wrap column>
            <v-flex class="px-2">
              <v-text-field v-model="data.email" label="Email" prepend-inner-icon="email" />
            </v-flex>
            <v-flex>
              <v-layout row wrap>
                <v-flex xs12 md6 class="pa-2">
                  <v-text-field v-model="data.first_name" label="First Name" prepend-inner-icon="text_format" />
                </v-flex>
                <v-flex xs12 md6 class="pa-2">
                  <v-text-field v-model="data.last_name" label="Last Name" prepend-inner-icon="text_format" />
                </v-flex>
              </v-layout>
            </v-flex>
            <v-flex class="px-2">
              <v-text-field v-model="data.full_name" label="Full name" prepend-inner-icon="text_format" />
            </v-flex>
            <v-flex xs12 class="px-2">
              <v-text-field v-model="data.kin_name" label="Kin name" prepend-inner-icon="text_format" />
            </v-flex>
            <v-flex xs12 class="px-2">
              <v-text-field v-model="data.kin_phone" label="Kin phone" prepend-inner-icon="phone" />
            </v-flex>
            <v-flex class="px-2">
              <v-select
                v-model="data.app_version"
                :items="[{text: 'Lite', value: 'lite'}, {text: 'Pro', value: 'pro'}]"
                label="App Version"
                prepend-inner-icon="apps"
              />
            </v-flex>
            <v-flex class="px-2">
              <v-dialog
                ref="birthPicker"
                v-model="birthPickerModal"
                :return-value.sync="data.date_of_birth"
                persistent
                lazy
                full-width
                width="290px"
              >
                <v-text-field
                  slot="activator"
                  v-model="data.date_of_birth"
                  label="Date of birth"
                  prepend-inner-icon="event"
                  readonly
                />
                <v-date-picker
                  v-model="data.date_of_birth"
                  :max="new Date().toISOString().substr(0, 10)"
                  min="1950-01-01"
                >
                  <v-spacer />
                  <v-btn flat color="primary" @click="birthPickerModal = false">
                    Cancel
                  </v-btn>
                  <v-btn flat color="primary" @click="$refs.birthPicker.save(data.date_of_birth)">
                    OK
                  </v-btn>
                </v-date-picker>
              </v-dialog>
            </v-flex>
            <v-flex class="px-2">
              <v-select
                v-model="data.gender"
                :items="[{text: 'Male', value: 'male'}, {text: 'Female', value: 'female'}, {text: 'Other', value: 'other'}]"
                label="Gender"
                prepend-inner-icon="person"
              />
            </v-flex>
            <v-flex class="px-2">
              <v-text-field
                v-model="data.phone"
                min="0"
                prepend-inner-icon="phone"
                label="Phone"
              />
            </v-flex>
            <v-flex class="px-2">
              <v-text-field v-model="data.national_id" prepend-inner-icon="flag" label="National ID" />
            </v-flex>
            <v-flex class="px-2">
              <v-text-field v-model="data.national_type" prepend-inner-icon="flag" label="National type" />
            </v-flex>
            <!-- <v-flex class="px-2">
              <v-text-field v-model="data.military_status" prepend-inner-icon="text_format" label="Military status" />
            </v-flex> -->
            <v-flex class="px-2">
              <v-text-field v-model="data.car_reg" prepend-inner-icon="directions_car" label="Car reg." />
            </v-flex>
            <v-flex class="px-2">
              <v-text-field v-model="data.address" prepend-inner-icon="pin_drop" label="Address" />
            </v-flex>
            <v-flex class="px-2">
              <v-select
                v-model="data.highest_qualification"
                :items="qualifications"
                label="Highest qualification"
                prepend-inner-icon="grade"
              />
            </v-flex>
            <v-flex class="px-2">
              <v-text-field v-model="data.type_of_employment" prepend-inner-icon="text_format" label="Type of employment" />
            </v-flex>
            <v-flex class="px-2">
              <v-text-field v-model="data.performance_assessment" prepend-inner-icon="text_format" label="Performance assessment" />
            </v-flex>
            <v-flex class="px-2">
              <v-text-field v-model="data.ref_id" prepend-inner-icon="layers" label="Ref ID" />
            </v-flex>
            <v-flex class="px-2">
              <v-dialog
                ref="lastEmploymentDatePicker"
                v-model="lastEmploymentDatePicker"
                :return-value.sync="data.last_date_of_employment"
                persistent
                lazy
                full-width
                width="290px"
              >
                <v-text-field
                  slot="activator"
                  v-model="data.last_date_of_employment"
                  label="Last employment date"
                  prepend-inner-icon="event"
                  readonly
                />
                <v-date-picker
                  v-model="data.last_date_of_employment"
                  :max="new Date().toISOString().substr(0, 10)"
                  min="1950-01-01"
                >
                  <v-spacer />
                  <v-btn flat color="primary" @click="lastEmploymentDatePicker = false">
                    Cancel
                  </v-btn>
                  <v-btn flat color="primary" @click="$refs.lastEmploymentDatePicker.save(data.last_date_of_employment)">
                    OK
                  </v-btn>
                </v-date-picker>
              </v-dialog>
            </v-flex>
            <v-flex class="px-2">
              <v-dialog
                ref="lastAssessmentDatePicker"
                v-model="lastAssessmentDatePicker"
                :return-value.sync="data.date_of_last_assement"
                persistent
                lazy
                full-width
                width="290px"
              >
                <v-text-field
                  slot="activator"
                  v-model="data.date_of_last_assement"
                  label="Last assessment date"
                  prepend-inner-icon="event"
                  readonly
                />
                <v-date-picker
                  v-model="data.date_of_last_assement"
                  :max="new Date().toISOString().substr(0, 10)"
                  min="1950-01-01"
                >
                  <v-spacer />
                  <v-btn flat color="primary" @click="lastAssessmentDatePicker = false">
                    Cancel
                  </v-btn>
                  <v-btn flat color="primary" @click="$refs.lastAssessmentDatePicker.save(data.date_of_last_assement)">
                    OK
                  </v-btn>
                </v-date-picker>
              </v-dialog>
            </v-flex>
            <v-flex class="px-2">
              <v-dialog
                ref="hiredAt"
                v-model="hiredAtPickerModal"
                :return-value.sync="data.hired_at"
                persistent
                lazy
                full-width
                width="290px"
              >
                <v-text-field
                  slot="activator"
                  v-model="data.hired_at"
                  label="Hired at"
                  prepend-inner-icon="event"
                  readonly
                />
                <v-date-picker
                  v-model="data.hired_at"
                  :max="new Date().toISOString().substr(0, 10)"
                  min="1950-01-01"
                >
                  <v-spacer />
                  <v-btn flat color="primary" @click="hiredAtPickerModal = false">
                    Cancel
                  </v-btn>
                  <v-btn flat color="primary" @click="$refs.hiredAt.save(data.hired_at)">
                    OK
                  </v-btn>
                </v-date-picker>
              </v-dialog>
            </v-flex>
            <v-flex class="px-2">
              <v-select
                v-model="data.department_id"
                :items="departments"
                item-text="name"
                item-value="id"
                label="Department"
                prepend-inner-icon="location_city"
              />
            </v-flex>
            <v-flex class="px-2">
              <v-select
                v-model="data.job_title_id"
                :items="jobTitles"
                item-text="name"
                item-value="id"
                label="Job Title"
                prepend-inner-icon="build"
              />
            </v-flex>
            <v-flex class="px-2">
              <v-text-field v-model="data.comment" prepend-inner-icon="sms" label="comment" />
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
  data() {
    return {
      pageLoading: false,
      loading: false,
      buttonLoading: false,
      valid: false,
      lastEmploymentDatePicker: false,
      lastAssessmentDatePicker: false,
      birthPickerModal: false,
      hiredAtPickerModal: false,
      data: {},
      preview: '',
      qualifications: [
        'NQF 1',
        'NQF 2',
        'NQF 3',
        'NQF 4',
        'NQF 5',
        'NQF 6',
        'NQF 7',
        'NQF 8',
        'NQF 9',
        'NQF 10'
      ]
    }
  },
  computed: {
    departments() {
      return this.$store.state.departments.list
    },
    jobTitles() {
      return this.$store.state.jobTitles.list
    }
  },
  async created() {
    this.pageLoading = true
    this.$store.dispatch('departments/getDepartments')
    this.$store.dispatch('jobTitles/getJobTitles')
    const res = await this.$store.dispatch(
      'employees/getSingle',
      this.$store.state.auth.user.employee_id
    )
    if (!res || res === 'error') return
    this.pageLoading = false
    const data = {
      ...res,
      avatar: this.$store.state.auth.user.avatar
    }
    delete data.country
    if (data.full_emp_name) {
      data.full_name = data.full_emp_name
      delete data.full_emp_name
    }
    if (data.hired_at) data.hired_at = data.hired_at.split(' ')[0]
    if (data.date_of_last_assement)
      data.date_of_last_assement = data.date_of_last_assement.split(' ')[0]
    if (data.last_date_of_employment)
      data.last_date_of_employment = data.last_date_of_employment.split(' ')[0]
    this.data = data
  },
  methods: {
    handleUpload(e) {
      const file = e.target.files[0]
      this.data.avatar = file
      if (file) {
        const reader = new FileReader()
        reader.onload = event => {
          this.preview = event.target.result
        }
        reader.readAsDataURL(file)
      }
    },
    async save() {
      this.$refs.form.validate()
      if (!this.valid) return
      this.buttonLoading = true
      const data = { ...this.data }
      if (!this.preview) delete data.avatar
      Object.keys(data).forEach(key => {
        if (!data[key]) delete data[key]
      })
      const res = await this.$store
        .dispatch('employees/updateEmployee', data)
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false
      if (!res || res === 'error') return
      // console.log(res)
      await this.$store.dispatch('auth/updateUserData', res).catch(() => {
        this.buttonLoading = false
      })
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
