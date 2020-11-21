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
          <h1 class="display-1 font-weight-thin">
            {{ 'Task for ' + (taskData.employee_fullname || '') }}
          </h1>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Name:</strong> {{ taskData.name }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Start date:</strong> {{ taskData.start_date }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>End date:</strong> {{ taskData.end_date }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Description:</strong> {{ taskData.description }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Status:</strong> {{ taskData.status }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Comment:</strong> {{ taskData.comment }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Creator:</strong> {{ creatorData.full_name }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <p><strong>Creator ID:</strong> {{ creatorData.id }}</p>
        </v-flex>
        <v-flex xs12 md4>
          <!-- <p><strong>Creator ID:</strong> {{ creatorData.id }}</p> -->
        </v-flex>
        <!-- <v-flex xs12 md4>
          <nuxt-link :to="`/employee/${creatorData.id}`">
            Go to creator's profile
          </nuxt-link>
        </v-flex>
        <v-flex xs12 md4>
          <nuxt-link :to="`/employee/${employeeData.id}`">
            Go to {{ taskData.employee_fullname || 'employee' }}'s profile
          </nuxt-link>
        </v-flex> -->
      </v-layout>
    </v-card>
  </div>
</template>

<script>
export default {
  data() {
    return {
      id: '',
      loading: false,
      pageLoading: false,
      taskData: {},
      employeeData: {},
      creatorData: {}
    }
  },
  async created() {
    if (!this.$route.params.id) return
    this.id = this.$route.params.id
    this.pageLoading = true
    const res = await this.$store.dispatch('tasks/getTask', this.id)
    this.pageLoading = false
    if (!res || res === 'error') return
    this.taskData = res.data
    this.employeeData = res.employee
    this.creatorData = res.creator
    // console.log('task data', this.taskData)
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
