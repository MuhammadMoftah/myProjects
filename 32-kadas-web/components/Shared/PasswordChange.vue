<template>
  <div>
    <v-form ref="form" v-model="valid" @submit.prevent="save">
      <v-card class="card">
        <v-card-title class="card-title">
          <span class="headline px-2">
            Change your password
          </span>
        </v-card-title>

        <v-card-text>
          <v-layout wrap column>
            <v-flex
              xs12
            >
              <v-text-field
                v-model="password"
                :rules="passwordRules"
                :disabled="buttonLoading"
                type="password"
                label="New Password"
                required
              />
            </v-flex>
            <v-flex
              xs12
            >
              <v-text-field
                v-model="confirm_password"
                :rules="confirmPasswordRules"
                :disabled="buttonLoading"
                type="password"
                label="Confirm Password"
                required
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
    </v-form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      buttonLoading: false,
      valid: false,
      passwordRules: [v => !!v || 'Password is required'],
      password: '',
      confirmPasswordRules: [
        v => !!v || 'Password is required',
        v => v === this.password || `Passwords don't match`
      ],
      confirm_password: ''
    }
  },
  methods: {
    async save() {
      this.$refs.form.validate()
      if (!this.valid) return
      this.buttonLoading = true
      const res = await this.$store
        .dispatch('users/updateUser', {
          user_id: this.$store.state.auth.user.id,
          password: this.password
        })
        .catch(() => {
          this.buttonLoading = false
        })
      this.buttonLoading = false
      if (!res || res === 'error') return
      this.$store
        .dispatch('snackbar/show', {
          message: 'Your password has been successfully changed.',
          timeout: 2000
        })
        .catch(() => {
          this.buttonLoading = false
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
