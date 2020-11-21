<template>
  <v-app :style="cssProps">
    <Snackbar />
    <nuxt />
  </v-app>
</template>

<script>
import Snackbar from '~/components/Shared/Snackbar'

export default {
  components: {
    Snackbar
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
    }
  }
}
</script>
