<template>
  <div v-if="id" class="cont">
    <div v-if="pageLoading" class="overlay">
      <v-progress-circular
        indeterminate
        color="primary"
      />
    </div>
    <v-card class="pa-4">
      <v-layout row wrap>
        <v-flex xs12 class="mb-4">
          <h1 class="display-1 font-weight-thin text-uppercase">
            {{ 'Role - ' + (roleData.name || '') }}
          </h1>
        </v-flex>

        <v-flex xs12 class="my-4">
          <h1 class="display-1 font-weight-thin">
            Permissions
          </h1>
        </v-flex>
        <v-flex xs12>
          <RolePermissions :id="id" />
        </v-flex>
      </v-layout>
    </v-card>
  </div>
</template>

<script>
import RolePermissions from '~/components/Roles/RolePermissions'

export default {
  components: {
    RolePermissions
  },
  data() {
    return {
      id: '',
      loading: false,
      pageLoading: false,
      roleData: {}
    }
  },
  computed: {
    roles() {
      return this.$store.state.roles.list
    },
    permissions() {
      return this.$store.state.roles.permissions
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('roles/getSingle', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.roleData = res
    // console.log('role data', this.roleData)
  }
}
</script>

<style lang="stylus" scoped>
.cont {
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
</style>
