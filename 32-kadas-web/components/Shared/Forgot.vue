<template>
  <v-card :elevation="2" class="login-form">
    <v-card-title class="card-header">
      <h4 class="display-1">
        Forgot your password?
      </h4>
    </v-card-title>
    <v-form ref="form" v-model="valid" @submit.prevent="submit">
      <v-container>
        <v-layout column>
          <v-flex
            xs12
          >
            <v-text-field
              v-model="email"
              :rules="emailRules"
              label="E-mail"
              required
            />
          </v-flex>
          <v-card-actions>
            <v-btn type="submit" color="primary" :loading="loading">
              Submit
            </v-btn>
            <nuxt-link to="/login" class="ml-3">
              Remember your password?
            </nuxt-link>
          </v-card-actions>
        </v-layout>
      </v-container>
    </v-form>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      email: '',
      /* eslint-disable */
      emailRules: [
        v => !!v || 'E-mail is required',
        v =>
          /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
            v
          ) || 'E-mail must be valid'
      ],
      /* eslint-enable */
      valid: false,
      loading: false
    }
  },
  methods: {
    async submit() {
      this.$refs.form.validate()
      if (!this.valid) return false
      this.loading = true
      const res = await this.$store
        .dispatch('auth/forgot', {
          email: this.email
        })
        .catch(err => {
          this.loading = false
          if (err.request && !err.response) {
            this.$store.dispatch('snackbar/show', {
              message: `Couldn't connect to the API.`,
              timeout: 3000
            })
          }
        })
      this.loading = false
      if (!res || res === 'error') return
      this.$store.dispatch('snackbar/show', {
        message: res,
        timeout: 5000
      })
    }
  }
}
</script>

<style lang="stylus" scoped>
.login-form {
  max-width 400px
  width 100%
  margin 0 auto
  background-color transparent
  & > form {
    background-color #fff
  }
}

.card-header {
  background-color var(--primary)
  color var(--contrast)
  // padding 8px 15px
}
</style>
