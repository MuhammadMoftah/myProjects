<template>
  <div>
    <v-container fluid class="cont">
      <Logo class="logo" />
      <v-img class="img" gradient="to top right, rgba(100,115,201,.33), rgba(25,32,72,.7)" src="https://source.unsplash.com/1600x900/?orange-cloud" lazy-src="https://source.unsplash.com/10x9/?orange-cloud" />
      <Reset />
    </v-container>
  </div>
</template>

<script>
import Reset from '~/components/Shared/Reset'
import Logo from '~/components/Shared/Logo'

export default {
  watchQuery: ['token'],
  components: {
    Reset,
    Logo
  },
  layout() {
    return 'plain'
  },
  middleware: 'reset'
}
</script>

<style lang="stylus" scoped>
.cont {
  min-height 100vh
  display flex
  align-items center
  position relative
  overflow hidden
  .img {
    position absolute
    top 0
    left 0
    width 100%
    height 100%
  }
  .logo {
    position absolute
    top 30px
    left 90px
    transform translateX(-50%)
    z-index 9
  }
}
</style>
