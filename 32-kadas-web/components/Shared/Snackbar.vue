<template>
  <v-snackbar :value="snackbar.show" :timeout="snackbar.timeout" :color="snackbar.color">
    {{ snackbar.message }}
    <v-btn flat color="contrast" @click.native="hide">
      Close
    </v-btn>
  </v-snackbar>
</template>

<script>
export default {
  computed: {
    snackbar() {
      return this.$store.state.snackbar
    }
  },
  methods: {
    hide() {
      this.$store.dispatch('snackbar/hide')
    }
  }
}
</script>
