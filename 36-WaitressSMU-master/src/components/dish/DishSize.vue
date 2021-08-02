<template>
   <div>
      <q-select
         outlined
         color="grey-8"
         v-model="variations"
         :label="variation.name"
         :options="variation.options"
         class="q-my-sm text-capitalize bg-white"
         popup-content-class="text-weight-medium text-blue-grey-10"
         :class="$i18n.locale == 'ar' ? 'rtl' : ''"
         options-selected-class="text-blue-grey-10 bg-blue-grey-2"
         behavior="menu"
         dense
      >
         <template v-slot:selected>
            <span v-if="variations.sale_price">
               {{ variations.name }}

               {{ variations.display_sale_price }}
               <span class="text-grey-6" style="text-decoration: line-through">
                  {{ variations.display_price }}
               </span>
            </span>
            <span v-else>
               {{ variations.name }} {{ variations.display_price }}
            </span>
         </template>
         <template v-slot:option="scope">
            <q-item
               v-bind="scope.itemProps"
               v-on="scope.itemEvents"
               :dir="$t('dir')"
               class="text-grey-7"
            >
               <q-item-section>
                  <q-item-label v-if="!scope.opt.sale_price">
                     {{ scope.opt.name }} {{ scope.opt.display_price }}
                  </q-item-label>
                  <q-item-label v-else>
                     <span> {{ scope.opt.display_sale_price }} </span>
                     <span
                        class="text-grey-6"
                        style="text-decoration: line-through"
                     >
                        {{ scope.opt.display_price }}
                     </span>
                  </q-item-label>
               </q-item-section>
            </q-item>
         </template>

         <template v-slot:no-option>
            <q-item>
               <q-item-section class="text-grey"> No results </q-item-section>
            </q-item>
         </template>
      </q-select>
   </div>
</template>

<script>
export default {
   props: {
      variation: {
         type: Object,
         default: {},
      },
   },
   data: () => ({
      variations: "",
      model: "",
   }),
   created() {
      if (this.$store.state.tables.orderAction === "edit") {
         this.fillOldData();
      } else {
         this.fillSelect();
      }
   },

   methods: {
      fillOldData() {
         const oldVars = this.$store.state.tables.activeOrder.product
            .product_variation;

         this.variation.options.forEach((op) => {
            oldVars.forEach((oldV) => {
               oldV.options.forEach((oldOp) => {
                  if (oldOp.id === op.id) {
                     this.variations = op;
                  }
               });
            });
         });
      },
      fillSelect() {
         this.variation.options.forEach((element) => {
            if (!element.varies) {
               this.variations = element;
            }
         });
      },
   },
   watch: {
      variations(v) {
         this.$emit("mainPrice", v);
      },
   },
};
</script>

<style >
.q-select__dialog label {
   text-transform: capitalize;
   padding: 10px 0;
}
.q-item__section {
   text-transform: capitalize;
}
</style>

