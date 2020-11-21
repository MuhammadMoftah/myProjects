<template>
  <div class="container">
    <h1 v-if="error.statusCode === 404" class="display-1 font-weight-thin">
      This is not the page you're looking for.
    </h1>
    <h1 v-else class="display-1 font-weight-thin">
      Somthing went wrong, please make sure you have a working and stable internet connection.
    </h1>
    <v-btn color="primary mt-4" nuxt to="/">
      Home
    </v-btn>
  </div>
</template>

<script>
export default {
  props: {
    error: {
      type: Object,
      required: true
    }
  },
  mounted() {
    console.log(this.error)
  }
}
</script>
