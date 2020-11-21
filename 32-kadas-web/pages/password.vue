<template>
  <v-container grid-list-xl>
    <v-layout wrap>
      <v-flex xs12>
        <PasswordChange />
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import PasswordChange from '~/components/Shared/PasswordChange'
export default {
  components: {
    PasswordChange
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
