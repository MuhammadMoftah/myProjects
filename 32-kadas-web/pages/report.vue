<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        <v-form ref="form" v-model="valid" @submit.prevent="save(x,y)">
          <v-card>
            <!-- <input v-model="x" type="date">
            <input v-model="y" type="date"> -->
            <div class="row">
              <div class="col-6">
                <label class="label">
                  From :
                </label>
                <br>
                <v-date-picker
                  v-model="x"
                  year-icon="mdi-calendar-blank"
                  prev-icon="mdi-skip-previous"
                  next-icon="mdi-skip-next"
                  class="mt-4"
                />
              </div>
              <div class="col-md-6">
                <label class="label">
                  To :
                </label>
                <br>

                <v-date-picker
                  v-model="y"
                  year-icon="mdi-calendar-blank"
                  prev-icon="mdi-skip-previous"
                  next-icon="mdi-skip-next"
                  class="mt-4"
                />
              </div>
            </div>

            <v-card-actions class="px-3 pb-3">
              <v-spacer />
              <v-btn color="red darken-1" flat :disabled="buttonLoading">
                Cancel
              </v-btn>
              <v-btn v-if="x || y == 0" color="primary" type="submit" :loading="buttonLoading">
                Save
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-form>
      </h1>
    </v-flex>
  </v-layout>
</template>
<script>
import axios from 'axios'

export default {
  props: {
    list: {
      type: Array,
      default: null
    }
  },
  data: () => ({
    buttonLoading: false,
    valid: false,
    requiredRule: [v => !!v || 'This field is required'],
    loading: true,
    x: '',
    y: '',
    picker: new Date().toISOString().substr(0, 10),
    menu: false,
    modal: false
  }),
  methods: {
    async save(x, y) {
      this.buttonLoading = true
      const token =
        'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjI3ZDUyZGYyNWEzOGNkMjVhYTQ1ZWE3MzQ3NWE1ZjI3Mjg5NmQxZjViMmQ4YWYxY2Y0ZDgxMDkyMTc1YTZiOGM4NWRmMGIxOTg3OTQxZjIwIn0.eyJhdWQiOiIxIiwianRpIjoiMjdkNTJkZjI1YTM4Y2QyNWFhNDVlYTczNDc1YTVmMjcyODk2ZDFmNWIyZDhhZjFjZjRkODEwOTIxNzVhNmI4Yzg1ZGYwYjE5ODc5NDFmMjAiLCJpYXQiOjE1ODIxMzA0NjgsIm5iZiI6MTU4MjEzMDQ2OCwiZXhwIjoxNjEzNzUyODY4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.Ax4TDrHelpivuBVaodcovhGChRX7ZVx8osi9sEVA-zQ04K3kah8qosOwjmDdcCCnXGl9-C12FUwrts4AmOUwAPwzUar0DOlg25vmldYj0fd8hXG3Ws4pwqXLUI4-SHgZ_bkSPm02pj7jUpv7meKonp317Ax2rzdUC_Jlw9lR45uZOStfQUM2fatMjabcPKBtetT1GBRI2Lv9QGDd0rFVxBVGVnw9k7BkoMFt4wEX5vnC45ExjZrS_N8Aj4R9oRwSjPzb9bHA6N0jrlwT5d87FBRo4wcB4jI-quUT5-DoR4blVosCfSQYvVk6_0HIpl6kJ773ZJjS2whZDQn2Hw0lgEe-4dF5HyfiMASoMQeataJO76EB5Fka0wE3NO8bVkk3kk1QJqup-rzNrNJx9gJ5LvepBmYi5RfG2Y0KEaw-W6ST3hror_ut4wI_rCY5gIIY_lr7xI1qT0kHcqsUW1f-3spEcnEir9dZlByXwXtutssb0JGF8cIV8fv7ztizZYymR22T1RRH_-AIvTkYMPrywQD9b_yPmMTmcc3-No-0_30HWZMQqy7pg-nGg-ORRghzk362WNfbPc7cAl3_946dxdm8iH0ZQ2BKdu-b4Svi1xGqGDbXDCCmFc9g1FSHSVv3mltZmA4UMhAl9kj2_JlD-0Ji8W1FnTFY_VhmWj1QC-w'
      const url = `http://gmail.kadas.co/api/reports/generate?to_date=${x}&from_date=${y}`
      await axios
        .get(url, {
          headers: {
            Authorization: 'Bearer ' + token // the token is a variable which holds the token
          }
        })
        .then(res => {
          console.log(res)
          if (!res || res === 'error') return
          this.$store.dispatch('snackbar/show', {
            message: 'Success!',
            timeout: 2000,
            color: 'success'
          })
        })
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false
    }
  }
}
</script>
<style lang="stylus" scoped>
.row{
  display: flex;
  justify-content: space-around;
}
.label{
  font-size: 20px;
}
</style>
