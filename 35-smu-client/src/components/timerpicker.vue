<template>
  <q-dialog v-model="open">
    <q-card>
      <q-card-section v-if="false">
        <div class="text-h6">Alert</div>
      </q-card-section>

      <q-card-section class="q-pt-none no-padding">
        <q-time v-model="time" flat :options="timeOptions" />
      </q-card-section>

      <q-card-actions align="right">
        <q-btn flat :label="$t('close')" color="grey-7" v-close-popup />
        <q-btn
          flat
          :label="$t('save')"
          @click="save()"
          :disable="time ? false : true"
          color="primary"
        />
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script>
export default {
  data() {
    return {
      open: false,
      time: "",
      startHour: new Date().getHours(),
    };
  },

  methods: {
    openDialog() {
      this.open = true;
    },
    closeDialog() {
      this.open = false;
    },
    save() {
      this.$emit("timeSelected", this.time);
      this.open = false;
    },
    timeOptions(hr, min, sec) {
      const closeTime =
        this.$store.getters["general/branchSettings"].working_to ?? "24:00";
      let closeHour = closeTime.slice(0, 2);
      // console.log(" end hour", closeHour);
      // console.log(" start hour", this.startHour);
      // 20
      if (hr > this.startHour && hr < closeHour) {
        return true;
      }
      // if (min !== null && (min <= 25 || min >= 58)) {
      //   return false;
      // }

      return false;
    },
  },
};
</script>

<style>
</style>