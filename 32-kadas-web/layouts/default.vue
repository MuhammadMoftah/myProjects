<template>
  <v-app :style="cssProps">
    <Snackbar />
    <v-navigation-drawer
      v-model="drawer"
      :mini-variant="miniVariant"
      :clipped="clipped"
      fixed
      app
      :width="250"
    >
      <v-list>
        <v-list-tile
          v-for="(item, i) in items"
          :key="i"
          :to="item.to"
          :class="$route.name && $route.name.includes(item.match) ? 'primary--text v-list__tile--active' : ''"
          router
          exact
        >
          <v-list-tile-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title v-text="item.title" />
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar
      :clipped-left="clipped"
      fixed
      app
      dark
      color="primary"
    >
      <v-toolbar-side-icon @click="drawer = !drawer" />
      <v-btn
        icon
        @click.stop="miniVariant = !miniVariant"
      >
        <v-icon>{{ `chevron_${miniVariant ? 'right' : 'left'}` }}</v-icon>
      </v-btn>
      <v-toolbar-title v-text="title" />
      <v-spacer />
      <div class="user">
        <div class="img mr-2">
          <v-img :src="userImg" :width="35" class="user-img" aspect-ratio="1" @error="handleImgError" />
        </div>
        <div class="text">
          <h6 class="subheading" v-text="user.full_name" />
          <p class="caption" v-text="user.email" />
        </div>
      </div>
      <v-menu bottom left>
        <v-btn
          slot="activator"
          dark
          icon
        >
          <v-icon>more_vert</v-icon>
        </v-btn>

        <v-list>
          <v-list-tile nuxt to="/profile">
            <v-list-tile-title>
              Profile
            </v-list-tile-title>
          </v-list-tile>
          <v-list-tile nuxt to="/password">
            <v-list-tile-title>
              Change password
            </v-list-tile-title>
          </v-list-tile>
          <v-list-tile @click="logout">
            <v-list-tile-title>
              Logout
            </v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-menu>
    </v-toolbar>
    <v-content>
      <v-container>
        <nuxt />
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
import Snackbar from '~/components/Shared/Snackbar'

export default {
  components: {
    Snackbar
  },
  data() {
    return {
      clipped: true,
      drawer: true,
      fixed: false,
      miniVariant: false,
      title: 'Kadas',
      fallback: false
    }
  },
  computed: {
    cssProps() {
      const { theme } = this.$vuetify
      return {
        '--primary': theme.primary,
        '--darkPrimary': theme.darkPrimary,
        '--lightPrimary': theme.lightPrimary,
        '--contrast': theme.contrast,
        '--accent': theme.accent,
        '--primaryText': theme.primaryText,
        '--secondaryText': theme.secondaryText,
        '--divider': theme.divider
      }
    },
    user() {
      return this.$store.state.auth.user
    },
    userImg() {
      if (this.fallback)
        return `https://ui-avatars.com/api/?size=100&font-size=0.45&rounded=true&background=fff&name=${
          this.user.full_name
        }`
      return this.user.avatar
    },
    items() {
      const arr = [
        {
          icon: 'apps',
          title: 'Dashboard',
          to: '/'
        },
        {
          icon: 'people',
          title: 'Employees',
          to: '/employees',
          match: 'employees',
          permissions: ['employee_read', 'job-title_read']
        },
        {
          icon: 'people_outline',
          title: 'Inactive users',
          to: '/inactive',
          match: 'inactive',
          permissions: ['user_read']
        },
        {
          icon: 'location_city',
          title: 'Departments',
          to: '/departments',
          match: 'department',
          permissions: ['department_read']
        },
        {
          icon: 'logout',
          title: 'Leaves',
          to: '/leaves',
          match: 'leave',
          permissions: ['leave_read']
        },
        {
          icon: 'attach_money',
          title: 'Loans',
          to: '/loans',
          match: 'loan',
          permissions: ['loan_read']
        },
        {
          icon: 'av_timer',
          title: 'Overtimes',
          to: '/overtimes',
          match: 'overtime',
          permissions: ['overtime_read']
        },
        {
          icon: 'done_all',
          title: 'Tasks',
          to: '/tasks',
          match: 'task',
          permissions: ['task_read']
        },
        {
          icon: 'notification_important',
          title: 'Announcements',
          to: '/announcements',
          match: 'announcement',
          permissions: ['announcement_read']
        },
        {
          icon: 'near_me',
          title: 'Spots',
          to: '/spots',
          match: 'spot',
          permissions: ['spot_read']
        },
        // {
        //   icon: 'navigation',
        //   title: 'Itineraries',
        //   to: '/itineraries',
        //   match: 'itinerary',
        // permissions: ['itinerarie_read']
        // },
        {
          icon: 'assignment_turned_in',
          title: 'Attendances',
          to: '/attendances',
          match: 'attendance',
          permissions: ['attendance_read']
        },
        {
          icon: 'directions_bus',
          title: 'Trips',
          to: '/trips',
          match: 'trip',
          permissions: ['trip_read']
        },
        {
          icon: 'event',
          title: 'Events',
          to: '/events',
          match: 'event',
          permissions: ['event_read']
        },
        {
          icon: 'money',
          title: 'Stocks',
          to: '/stocks',
          match: 'stock',
          permissions: ['stock_read']
        },
        {
          icon: 'feedback',
          title: 'Feedbacks',
          to: '/feedbacks',
          match: 'feedback',
          permissions: ['feedback_read']
        },
        {
          icon: 'edit',
          title: 'Signature',
          to: '/signature',
          match: 'signature',
          permissions: ['feedback_read']
        },
        {
          icon: 'help_outline',
          title: 'Tickets',
          to: '/tickets',
          match: 'ticket',
          permissions: ['ticket_read']
        },
        {
          icon: 'folder',
          title: 'Company documents',
          to: '/companyDocuments',
          match: 'companyDocument',
          permissions: ['document_read']
        },
        {
          icon: 'link',
          title: 'Procurement',
          to: '/Procurement',
          match: 'Procurement',
          permissions: ['document_read']
        },
        {
          icon: 'reports',
          title: 'reports',
          to: '/report',
          match: 'report',
          permissions: ['document_read']
        },
        {
          icon: 'lock',
          title: 'Roles & Permissions',
          to: '/roles',
          match: 'role',
          permissions: ['role_read']
        },
        {
          icon: 'settings',
          title: 'Settings',
          to: '/settings',
          match: 'setting',
          permissions: ['setting_update']
        }
      ]

      return arr.filter(item => {
        if (item.permissions && item.permissions.length > 0) {
          let re
          for (let i = 0; i < item.permissions.length; i++) {
            if (
              this.$store.state.auth.user.permissions &&
              this.$store.state.auth.user.permissions.includes(
                item.permissions[i]
              )
            ) {
              re = true
              break
            } else {
              re = false
            }
          }
          return re
        }
        return true
      })
    }
  },
  created() {
    this.$store.dispatch('leaves/getLeaves')
    this.$store.dispatch('leaves/getLeaveTypes')
    this.$store.dispatch('loans/getLoans')
    this.$store.dispatch('loans/getLoanTypes')
    this.$store.dispatch('tasks/getTasks')
    this.$store.dispatch('status/getStatuses')
  },
  methods: {
    logout() {
      this.$store.dispatch('auth/logout')
    },
    handleImgError() {
      this.fallback = true
    }
  }
}
</script>

<style lang="stylus">
.dialog {
  overflow-x: hidden
}

.user {
  display flex
  align-items center
}

.user-img {
  border-radius 50%
}

.caption {
  opacity .7
  margin 0
}
</style>
