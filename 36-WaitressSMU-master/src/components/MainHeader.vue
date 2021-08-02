<template>
   <section
      class="section-container q-mx-auto rounded flex justify-between q-my-lg items-center"
   >
      <q-btn
         color="grey-7"
         flat
         dense
         round
         outline
         size="lg"
         icon="arrow_back"
         @click="$router.back()"
         :style="{ visibility: router == '/' ? 'hidden' : '' }"
      />
      <span class="text-grey-7 text-h6 text-bold">{{ title }}</span>

      <q-btn
         flat
         dense
         round
         size="lg"
         color="grey-7"
         icon="menu"
         @click="$root.$emit('toggleDrawer')"
      />
   </section>
</template>

<script>
export default {
   props: {
      title: {
         type: String,
         default: "",
      },
   },
   name: "GlobalHeader",
   computed: {
      router() {
         const router = this.$route.path;
         return router;
      },
   },
};
</script>

<style>
</style>