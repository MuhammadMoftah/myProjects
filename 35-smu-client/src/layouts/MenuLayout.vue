<template>
   <q-layout view="lHh Lpr lFf">
      <q-header> </q-header>

      <q-page-container>
         <router-view />
      </q-page-container>

      <!-- <q-footer>
         <q-tabs indicator-color="transparent" align="justify" dense>
            <q-route-tab to="/" icon="language" name="mails" />
            <q-route-tab to="/menu" icon="content_paste" name="alarms" />
            <q-route-tab to="/test-page" name="Testing" icon="build" />
         </q-tabs>
      </q-footer> -->
   </q-layout>
</template>

<script>
export default {
   name: "MenuLayout",
   components: {},
   mounted() {},

   data() {
      return {
         leftDrawerOpen: false,
         tab2: "",
         footer: "",
      };
   },
};
</script>
<style scoped>
>>> .q-tab__icon {
   font-size: 18px;
}
>>> .q-tab__label {
   font-size: 11px;
}
</style>