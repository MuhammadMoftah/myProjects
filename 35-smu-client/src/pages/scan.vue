<template>
   <div
      class="fullscreen bg-grey-10 text-white text-center q-pa-md flex flex-center"
   >
      <div>
         <div>
            <q-spinner-grid color="primary" size="10em" />
         </div>

         <div class="q-my-lg" style="opacity: 0.8">
            <span class="text-h4">Scanning your QR Code</span>
            <p class="text-h6">please wait</p>
         </div>
      </div>
   </div>
</template>

<script>
export default {
   name: "scan",
   mounted() {
      this.scanTable();
   },
   methods: {
      async scanTable() {
         try {
            const res = await this.$axios.get(
               "en/web/scan/" + this.$route.params.table
            );
            this.$store.commit("general/setTable", res.data.table_hash);
            setTimeout(() => {
               this.$router.push("/");
            }, 500);
         } catch (e) {}
      },
   },
};
</script>
