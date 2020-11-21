<template>
  <v-container grid-list-xl>
    <v-layout wrap>
      <v-flex
        v-if="data && data.company_subscription && $store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('setting_update')"
        xs12
        sm6
        md4
      >
        <v-sheet class="sheet" :elevation="2">
          <div>
            <v-icon class="icon blue darken-3" dark>
              date_range
            </v-icon>
          </div>
          <div>
            <h4
              class="subheading font-weight-black blue--text"
            >
              {{ data.company_subscription.remaining_days }}
            </h4>
            <span class="body-1">
              Remaining days in your plan
            </span>
          </div>
        </v-sheet>
      </v-flex>
      <v-flex
        v-if="data && data.company_subscription && $store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('setting_update')"
        xs12
        sm6
        md4
      >
        <v-sheet class="sheet" :elevation="2">
          <div>
            <v-icon class="icon pink dark-3" dark>
              people
            </v-icon>
          </div>
          <div>
            <h4
              class="subheading font-weight-black pink--text"
            >
              {{ data.company_subscription.remaining_pro_users }}
            </h4>
            <span class="body-1">
              Remaining pro users in your plan
            </span>
          </div>
        </v-sheet>
      </v-flex>
      <v-flex
        v-if="data && data.company_subscription && $store.state.auth.user.permissions && $store.state.auth.user.permissions.includes('setting_update')"
        xs12
        sm6
        md4
      >
        <v-sheet class="sheet" :elevation="2">
          <div>
            <v-icon class="icon green darken-3" dark>
              people_outline
            </v-icon>
          </div>
          <div>
            <h4
              class="subheading font-weight-black green--text"
            >
              {{ data.company_subscription.remaining_lite_users }}
            </h4>
            <span class="body-1">
              Remaining lite users in your plan
            </span>
          </div>
        </v-sheet>
      </v-flex>
      <v-flex xs12 sm6 md4>
        <nuxt-link :to="{name: 'leaves', query: {status: 'PENDING'}}" class="nuxt-link">
          <v-sheet class="sheet" :elevation="2">
            <div>
              <v-icon class="icon orange darken-3" dark>
                alarm
              </v-icon>
            </div>
            <div>
              <h4 class="subheading font-weight-black orange--text">
                {{ pendingLeaves.length }}
              </h4>
              <span class="body-1">
                Pending Leave{{ pendingLeaves.length !== 1 ? "s" : "" }}
              </span>
            </div>
          </v-sheet>
        </nuxt-link>
      </v-flex>
      <v-flex xs12 sm6 md4>
        <nuxt-link :to="{name: 'leaves', query: {status: 'APPROVED'}}" class="nuxt-link">
          <v-sheet class="sheet" :elevation="2">
            <div>
              <v-icon class="icon red lighten-1" dark>
                time_to_leave
              </v-icon>
            </div>
            <div>
              <h4 class="subheading font-weight-black red--text">
                {{ approvedLeaves.length }}
              </h4>
              <span class="body-1">
                Approved Leave{{ approvedLeaves.length !== 1 ? "s" : "" }}
              </span>
            </div>
          </v-sheet>
        </nuxt-link>
      </v-flex>
      <v-flex xs12 sm6 md4>
        <nuxt-link to="/leaves" class="nuxt-link">
          <v-sheet class="sheet" :elevation="2">
            <div>
              <v-icon class="icon accent" dark>
                logout
              </v-icon>
            </div>
            <div>
              <h4 class="subheading font-weight-black accent--text">
                {{ leaves }}
              </h4>
              <span class="body-1">
                Leave{{ leaves !== 1 ? "s" : "" }}
              </span>
            </div>
          </v-sheet>
        </nuxt-link>
      </v-flex>
      <v-flex xs12 sm6 md4>
        <nuxt-link :to="{name: 'loans', query: {status: 'PENDING'}}" class="nuxt-link">
          <v-sheet class="sheet" :elevation="2">
            <div>
              <v-icon class="icon teal" dark>
                donut_small
              </v-icon>
            </div>
            <div>
              <h4 class="subheading font-weight-black teal--text">
                {{ pendingLoans.length }}
              </h4>
              <span class="body-1">
                Pending Loan{{ pendingLoans.length !== 1 ? "s" : "" }}
              </span>
            </div>
          </v-sheet>
        </nuxt-link>
      </v-flex>
      <v-flex xs12 sm6 md4>
        <nuxt-link :to="{name: 'loans', query: {status: 'APPROVED'}}" class="nuxt-link">
          <v-sheet class="sheet" :elevation="2">
            <div>
              <v-icon class="icon accent" dark>
                done
              </v-icon>
            </div>
            <div>
              <h4 class="subheading font-weight-black accent--text">
                {{ approvedLoans.length }}
              </h4>
              <span class="body-1">
                Approved Loan{{ approvedLoans.length !== 1 ? "s" : "" }}
              </span>
            </div>
          </v-sheet>
        </nuxt-link>
      </v-flex>
      <v-flex xs12 sm6 md4>
        <nuxt-link to="/loans" class="nuxt-link">
          <v-sheet class="sheet" :elevation="2">
            <div>
              <v-icon class="icon primary" dark>
                money
              </v-icon>
            </div>
            <div>
              <h4 class="subheading font-weight-black primary--text">
                {{ loans }}
              </h4>
              <span class="body-1">
                Loan{{ loans !== 1 ? "s" : "" }}
              </span>
            </div>
          </v-sheet>
        </nuxt-link>
      </v-flex>
      <v-flex xs12 sm6 md4>
        <nuxt-link to="/tasks" class="nuxt-link">
          <v-sheet class="sheet" :elevation="2">
            <div>
              <v-icon class="icon secondary" dark>
                format_list_bulleted
              </v-icon>
            </div>
            <div>
              <h4 class="subheading font-weight-black secondary--text">
                {{ dailyTasks.length }}
              </h4>
              <span class="body-1">
                Daily Task{{ dailyTasks.length !== 1 ? "s" : "" }}
              </span>
            </div>
          </v-sheet>
        </nuxt-link>
      </v-flex>
      <v-btn
        slot="activator"
        color="primary"
        dark
        class="mb-2"
        @click="generateEmployeeReport"
      >
        Generate Employee's Report
      </v-btn>
    </v-layout>
  </v-container>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
  data() {
    return {
      data: null
    }
  },
  computed: {
    leaves() {
      return this.$store.state.leaves.list.length
    },
    loans() {
      return this.$store.state.loans.list.length
    },
    ...mapGetters('leaves', ['pendingLeaves', 'approvedLeaves']),
    ...mapGetters('loans', ['pendingLoans', 'approvedLoans']),
    ...mapGetters('tasks', ['dailyTasks'])
  },
  async created() {
    const res = await this.$store.dispatch(
      'settings/getSettings',
      this.$store.state.auth.user.employee_id
    )
    if (!res || res === 'error') return
    const data = {
      ...res
    }
    this.data = data
  },
  methods: {
    async generateEmployeeReport() {
      await this.$axios({
        url: 'reports/monthly/generate', // your url
        method: 'GET',
        responseType: 'blob' // important
      }).then(response => {
        const url = window.URL.createObjectURL(new Blob([response.data]))
        const link = document.createElement('a')
        link.href = url
        link.setAttribute('download', 'MonthlyReport.csv') // or any other extension
        document.body.appendChild(link)
        link.click()
      })
    }
  }
}
</script>

<style lang="stylus" scoped>
.sheet {
  padding: 15px 15px;
  display: flex;
  align-items: center;
}

.icon {
  border-radius: 50%;
  padding: 8px;
  margin-right: 15px;
}

.nuxt-link {
  text-decoration: none;
}
</style>
