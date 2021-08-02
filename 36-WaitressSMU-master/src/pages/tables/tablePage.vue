<template>
   <q-page>
      <!-- main header  -->
      <MainHeader :title="'Table Details'" />

      <!-- table status -->
      <section
         class="section-container q-mx-auto bg-white rounded flex justify-between q-pa-sm q-mt-sm"
      >
         <q-btn
            color="blue-grey-10"
            class="text-bold"
            icon="deck"
            flat
            disable
            unelevated
         >
            <template slot:label>
               <span class="q-mx-sm">
                  No.
                  <span class="text-body">
                     {{ activeTable.number }}
                  </span>
               </span>
            </template>
         </q-btn>

         <q-btn color="blue-grey-10" icon="fastfood" flat disable unelevated>
            <template slot:label>
               <span class="q-mx-sm" v-if="activeTable.orders">
                  <span class="text-body">
                     {{
                        activeTable.orders[0]
                           ? activeTable.orders[0].items.length + " Orders"
                           : "No Orders"
                     }}
                  </span>
               </span>
               <span class="q-mx-sm" v-else> No Orders </span>
            </template>
         </q-btn>
      </section>

      <!-- table orders -->
      <section
         v-if="activeTable.orders[0]"
         class="section-container q-mx-auto bg-white rounded q-mt-sm"
      >
         <div
            class="flex justify-between relative-position"
            :class="i ? 'border-top1' : ''"
            v-for="(order, i) in activeTable.orders[0].items"
            :key="order.id"
         >
            <q-btn
               color="grey-7"
               icon="content_paste"
               unelevated
               round
               size="sm"
               class="note-button glossy"
               v-if="order.product.note"
            >
               <q-tooltip
                  content-class="bg-grey-9 text-bold"
                  content-style="font-size: 16px"
                  :offset="[10, 10]"
               >
                  {{ order.product.note }}
               </q-tooltip>
            </q-btn>
            <div
               class="row justify-between items-center text-bold text-grey-8 q-pa-sm order"
               style="width: 100%; min-height: 100px"
               @click="setActiveOrder(order)"
            >
               <div class="text-capitalize" style="width: 45%">
                  <p class="no-margin text-h6">{{ order.product.name }}</p>
                  <template v-for="type in order.product.product_variation">
                     <span
                        class="text-bold text-grey-6 flex"
                        style="line-height: 16px; font-size: 12.5px"
                        :key="type.id"
                     >
                        <span
                           v-for="op in type.options"
                           :key="op.key"
                           class="q-mx-xs"
                        >
                           {{ op.name }}
                        </span>
                     </span>
                  </template>
               </div>
               <span class="flex items-center text-h5 text-bold">
                  x {{ order.product.quantity }}
               </span>

               <div
                  v-if="order.status === 'Being cooked.'"
                  class="flex items-center justify-end"
                  style="width: 40%"
               >
                  <span class="text-capitalize">Cooking</span>
                  <span
                     class="q-mx-sm inline-block cooking rounded-full"
                     style="
                        width: 20px;
                        height: 20px;
                        vertical-align: sub;
                        border: 2px dotted orange;
                     "
                  />
               </div>

               <div
                  v-else-if="order.status === 'new'"
                  class="flex items-center justify-end"
                  style="width: 40%"
               >
                  <span class="text-capitalize">new</span>
                  <span
                     class="q-mx-sm inline-block bg-blue-3 rounded-full"
                     style="
                        width: 20px;
                        height: 20px;
                        vertical-align: sub;
                        border: 2px dotted blue;
                     "
                  />
               </div>

               <div
                  v-else-if="order.status === 'delivered'"
                  class="flex items-center justify-end"
                  style="width: 40%"
               >
                  <span class="text-capitalize">delivered</span>
                  <span
                     class="q-mx-sm inline-block bg-grey-3 rounded-full"
                     style="
                        width: 20px;
                        height: 20px;
                        vertical-align: sub;
                        border: 2px dotted grey;
                     "
                  />
               </div>

               <div
                  v-else-if="order.status === 'cancelled'"
                  class="flex items-center justify-end"
                  style="width: 40%"
               >
                  <span class="text-capitalize">cancelled</span>
                  <span
                     class="q-mx-sm inline-block bg-red-3 rounded-full"
                     style="
                        width: 20px;
                        height: 20px;
                        vertical-align: sub;
                        border: 2px dotted red;
                     "
                  />
               </div>

               <div
                  v-else-if="order.status === 'ready'"
                  class="flex items-center justify-end"
                  style="width: 40%"
               >
                  <span class="text-capitalize">ready</span>
                  <span
                     class="q-mx-sm inline-block bg-green-3 rounded-full"
                     style="
                        width: 20px;
                        height: 20px;
                        vertical-align: sub;
                        border: 2px dotted green;
                     "
                  />
               </div>

               <div
                  v-else-if="order.status !== 'Being cooked.'"
                  class="flex items-center justify-end"
                  style="width: 40%"
               >
                  <span class="text-capitalize">Cooking</span>
                  <span
                     class="q-mx-sm inline-block bg-blue-3 rounded-full"
                     style="
                        width: 20px;
                        height: 20px;
                        vertical-align: sub;
                        border: 2px dotted blue;
                     "
                  />
               </div>

               <div
                  v-else
                  class="flex items-center justify-end"
                  style="width: 40%"
               >
                  <span class="text-capitalize">{{ order.status }}</span>
                  <span
                     class="q-mx-sm inline-block bg-indigo-3 rounded-full"
                     style="
                        width: 20px;
                        height: 20px;
                        vertical-align: sub;
                        border: 2px dotted indigo;
                     "
                  />
               </div>
            </div>
         </div>
      </section>

      <!-- order for customer -->
      <section class="text-center">
         <q-btn
            color="green-5"
            text-color=""
            style="max-width: 270px"
            icon="add"
            size="large"
            unelevated
            class="full-width q-my-lg shadow-1"
            label="Add Order"
            padding="10px 30px"
            :to="`/tables/${activeTable.id}/add-order`"
         />
      </section>
      <!-- orders actions -->
      <q-dialog v-model="ordersActions" position="bottom">
         <q-card class="bg-grey-1">
            <q-card-section class="flex justify-center">
               <q-btn
                  color="cyan-8"
                  style="width: 100%"
                  class="q-ma-xs border-bottom1"
                  flat
                  icon="border_color"
                  label="Edit Order"
                  :to="
                     '/orders/' + $store.state.tables.activeOrder.id + '/edit'
                  "
               />
               <q-btn
                  color="teal-7"
                  style="width: 100%"
                  class="q-py-sm border-bottom1"
                  flat
                  icon="cached"
                  label="Replace Order"
                  :to="'/orders/' + $store.state.tables.activeOrder.id"
               />
               <q-btn
                  color="grey-7"
                  flat
                  icon="do_disturb"
                  class="q-py-sm"
                  label="Cancel Order"
                  style="width: 100%"
                  @click="cancelOrder()"
               />
            </q-card-section>
         </q-card>
      </q-dialog>
   </q-page>
</template>

<script>
import MainHeader from "components/MainHeader";
export default {
   name: "tablePage",
   components: {
      MainHeader,
   },
   created() {
      //return of no active table
      if (!this.activeTable.id) this.$router.push("/");
   },
   data() {
      return {
         ordersActions: false,
      };
   },
   computed: {
      activeTable({ $store }) {
         const table = $store.state.tables.activeTable;
         return table;
      },
   },
   methods: {
      setActiveOrder(order) {
         if (order.status === "cancelled" || order.status === "delivered") {
            return;
         }
         this.ordersActions = true;
         this.$store.commit("tables/setActiveOrder", order);
      },

      cancelOrder() {
         const item = this.$store.state.tables.activeOrder;
         this.$q
            .dialog({
               title: `Return ${item.product.name} `,
               dark: true,
               message:
                  "This order will be removed from the receipt, continue ?",
               ok: {
                  color: "red-8",
                  label: "Cancel Order",
                  unelevated: true,
               },
               cancel: {
                  color: "grey-7",
                  label: "Keep",
                  unelevated: true,
               },
               persistent: true,
            })
            .onOk(() => {
               this.$axios
                  .put(
                     `/tables/${this.activeTable.number}/orders/${item.order_id}/items/${item.id}/cancel`,
                     {
                        //cancelled status is 305
                        st: 305,
                     }
                  )
                  .then((res) => {
                     // this.$store.commit("tables/setActiveOrder", res.data.data);
                     this.$store.commit(
                        "tables/updateSingleOrder",
                        res.data.data
                     );
                     this.ordersActions = false;
                  });
            })
            .onCancel(() => {});
      },
   },
};
</script>

<style scoped>
.cooking {
   border: 2px dashed rgb(73, 255, 118);
   -webkit-animation: glow 1s ease-in-out infinite alternate;
   -moz-animation: glow 1s ease-in-out infinite alternate;
   animation: glow 0.7s ease-in-out infinite alternate;
   animation-name: glow-yellow;
}

@keyframes glow-yellow {
   from {
      background: rgb(255, 214, 81);
      /* transform: translate3d(0px, -4px, 50px); */
   }
   to {
      /* transform: translate3d(0px, 4px, 50px); */
      background: white;
   }
}
.order:hover {
   background: rgb(218, 238, 255);
   cursor: pointer;
}
.note-button {
   position: absolute;
   right: 0;
   left: 0;
   margin: auto;
   bottom: 5px;
}
</style>
