<template>
  <q-page style="margin-bottom: 100px" dir="ltr" class="q-ma-md">
    <!-- head section -->
    <section>
      <div class="text-center scroll-target-class">
        <q-img
          :src="settings.banner"
          placeholder-src="~/assets/cover.jpg"
          :ratio="2.5"
          spinner-color="primary"
        >
        </q-img>
        <q-avatar
          size="80px"
          style="margin: -40px auto auto auto"
          class="shadow-2"
        >
          <q-img
            :src="settings.logo"
            placeholder-src="~/assets/logo.jpg"
            spinner-color="primary"
            ratio="1"
          >
          </q-img>
        </q-avatar>
      </div>
    </section>

    <!-- success message -->
    <section class="text-center" style="margin-top: 120px">
      <p
        class="text-white q-my-lg text-center bg-red-5 text-h6 rounded2 q-mx-auto q-pa-md"
        style="max-width: 550px"
      >
        The payment has been failed
      </p>

      <q-btn
        class="text-blue-grey-9 text-capitalize"
        outline
        to="/receipt"
        no-caps
        label="my orders"
        icon="receipt"
      >
      </q-btn>
    </section>
  </q-page>
</template>

<script>
export default {
  computed: {
    settings() {
      const settings = this.$q.localStorage.getItem("settings");
      return settings;
    },
  },
};
</script>

<style>
</style>