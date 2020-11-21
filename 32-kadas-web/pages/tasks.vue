<template>
  <v-layout column>
    <v-flex class="mb-5">
      <h1 class="page-title display-1 font-weight-thin">
        Manage Tasks
      </h1>
      <TasksListing />
    </v-flex>
  </v-layout>
</template>

<script>
import TasksListing from '~/components/Tasks/TasksListing'

export default {
  components: {
    TasksListing
  }
}
</script>

<style lang="stylus" scoped>
.page-title {
  margin-bottom: 30px;
}

.card-title {
  padding-bottom: 0;
}

.dialog {
  overflow-x: hidden;
}
</style>
