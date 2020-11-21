<template>
  <v-container grid-list-xl>
    <v-layout wrap>
      <v-flex xs12>
        <SettingsSetup v-if="$store.state.auth.user.setup" />
        <SettingsUpdate v-else />
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import SettingsSetup from '~/components/Shared/SettingsSetup'
import SettingsUpdate from '~/components/Shared/SettingsUpdate'

export default {
  components: {
    SettingsSetup,
    SettingsUpdate
  },
  layout(ctx) {
    return ctx.store.state.auth.user.setup ? 'setup' : 'default'
  }
}
</script>

<style lang="stylus" scoped>
.sheet {
  padding 15px 15px
  display flex
  align-items center
}
.icon {
  border-radius 50%
  padding 8px
  margin-right 15px
}
.nuxt-link {
  text-decoration none
}
</style>
