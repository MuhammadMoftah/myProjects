<template>
   <q-dialog
      :value="$store.state.basket.openBasket"
      position="bottom"
      transition-show="slide-up"
      transition-hide="slide-down"
      :dir="$t('dir')"
      @hide="close"
   >
      <q-toolbar class="bg-white no-border-radius q-py-md text-grey-7">
         <q-toolbar-title class="text-bold">
            Orders for Table #{{ table.number }}
         </q-toolbar-title>
         <q-btn flat round dense icon="close" padding="0" @click="close" />
      </q-toolbar>
      <q-card
         class="no-border-radius items-container"
         :style="loading ? 'overflow:hidden' : ''"
      >
         <transition-group name="slide-fade" appear>
            <BasketItem
               v-for="item in items"
               :key="item.cart_id"
               :item="item"
            />
         </transition-group>

         <div class="q-px-sm q-pt-sm">
            <p class="flex justify-between text-bold text-grey-8 q-mb-xs">
               <span class="text-capitalize">{{ $t("subtotal") }} </span>
               <span>{{ this.$store.state.basket.subtotal }}</span>
            </p>
            <p class="flex justify-between text-bold text-grey-8 q-mb-xs">
               <span class="text-capitalize">
                  {{ $t("services") }}
                  {{ this.$store.state.basket.services.percentage }}%
               </span>
               <span>{{ this.$store.state.basket.services.value }}</span>
            </p>
            <p class="flex justify-between text-bold text-grey-8 q-mb-xs">
               <span class="text-capitalize">
                  {{ $t("tax") }} {{ this.$store.state.basket.vat.percentage }}%
               </span>
               <span>{{ this.$store.state.basket.vat.value }}</span>
            </p>
            <p class="flex justify-between text-bold">
               <span class="text-capitalize">{{ $t("final_price") }}</span>
               <span>{{ this.$store.state.basket.total }}</span>
            </p>
         </div>

         <div class="fixed-bottom full-width bg-white">
            <q-btn
               color="green-5"
               class="full-width text-h6"
               padding="15px 0"
               @click="order()"
            >
               <transition name="slide-vertical" appear mode="out-in">
                  <span :key="$store.state.basket.total">
                     {{ $t("order") }} {{ this.$store.state.basket.total }}
                  </span>
               </transition>
            </q-btn>
         </div>

         <q-inner-loading :showing="loading">
            <q-spinner-bars color="primary" size="4em" />
         </q-inner-loading>
      </q-card>
   </q-dialog>
</template>

<script>
import BasketItem from "components/BasketItem";
export default {
   components: {
      BasketItem,
   },
   data: () => ({
      loading: false,
   }),
   computed: {
      items() {
         return this.$store.getters["basket/list"];
      },
      table({ $store }) {
         const table = $store.state.tables.activeTable;
         return table;
      },
   },

   methods: {
      async order() {
         try {
            this.loading = true;
            const res = await this.$axios.post(
               `/tables/${this.table.id}/orders`
            );
            this.loading = false;
            this.$store.commit("basket/closeBasket");
            this.$store.commit("basket/resetBasket");
            this.$q.notify({
               position: "top",
               type: "positive",
               message: "Your order has been delivered ",
               classes: "q-mt-xl",
               timeout: 1500,
            });
            if (this.table.status === "free") {
               this.$axios
                  .patch("/tables/status/" + this.table.id, {
                     st: 313,
                  })
                  .then((res) => {
                     this.$store.commit("tables/setActiveTable", res.data.data);
                  });
            } else {
               this.$axios.get("/tables/" + this.table.id).then((res) => {
                  this.$store.commit("tables/setActiveTable", res.data.data);
               });
            }
            this.$router.back();
         } catch (error) {
            this.$q.notify({
               position: "top",
               type: "negative",
               color: "red-7",
               badgeTextColor: "white",
               textColor: "white",
               message: error.response.data.message
                  ? error.response.data.message
                  : "Some Error happend",
               classes: "q-mt-xl",
               actions: [
                  {
                     label: "X",
                     color: "white",
                  },
               ],
            });

            this.loading = false;
         }
      },

      close() {
         this.$store.commit("basket/closeBasket");
      },
   },
};
</script>

<style scoped>
.items-container {
   /* height: calc(100vh - 100px) !important; */
   height: 80vh !important;
   width: 100%;
   padding-bottom: 150px;
}
.basket-item {
   position: relative;
}
</style>