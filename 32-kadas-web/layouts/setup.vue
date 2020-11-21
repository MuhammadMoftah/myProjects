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
          icon: 'settings',
          title: 'Setup',
          to: '/settings',
          match: 'setting'
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
