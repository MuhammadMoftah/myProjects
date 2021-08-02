<template>
   <div
      class="q-pa-sm q-my-sm text-weight-bold"
      style="border-radius: 5px; border: 1px solid #bcbcbc"
      v-if="sideDishQuantity"
   >
      <p class="text-title2 no-margin text-blue-grey-9" v-if="isSwticherExists">
         {{ $t("select") }} {{ sideDishQuantity }} {{ variation.name }}
         {{ $t("or_one") }}
         <span class="text-red-7"> {{ $t("special_side") }}</span>
      </p>
      <p class="text-title2 no-margin text-blue-grey-9" v-else>
         {{ $t("select") }} {{ sideDishQuantity }} {{ variation.name }}
      </p>
      <q-select
         v-for="(n, i) in sideDishQuantity"
         :key="n"
         outlined
         color="blue-grey-8"
         :disable="variations[i].dis"
         :style="variations[i].dis ? 'display:none' : ''"
         v-model="variations[i]"
         :label="variation.name"
         :options="variation.options"
         class="q-my-sm text-capitalize bg-white"
         :class="$i18n.locale == 'ar' ? 'rtl' : ''"
         option-label="name"
         options-selected-class="text-blue-grey-10 bg-blue-grey-2"
         behavior="menu"
         dense
      >
         <template v-slot:option="scope">
            <q-item
               v-bind="scope.itemProps"
               v-on="scope.itemEvents"
               :dir="$t('dir')"
               class="text-grey-7"
            >
               <q-item-section>
                  <q-item-label>
                     {{ scope.opt.name }}
                     <span v-if="scope.opt.price">
                        ({{ scope.opt.display_price }})
                     </span>
                     <span v-else> ({{ $t("free") }})</span>
                     <span
                        v-if="scope.opt.price_switch"
                        class="text-bold text-red-7"
                     >
                        {{ $t("special_side") }}
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
      arr: [],
      variations: [],

      varsToEmit: {
         price: 0,
         variationsIDs: [],
      },
      sideDishQuantity: 1,
      isSwticherExists: false,
   }),
   created() {
      if (this.$store.state.tables.orderAction === "edit") {
         this.fillOldData();
      } else {
         this.fillWithVaries();
      }
   },

   methods: {
      fillOldData() {
         const oldVars = this.$store.state.tables.activeOrder.product
            .product_variation;
         let count = 0;
         this.variation.options.forEach((op) => {
            oldVars.forEach((oldV) => {
               oldV.options.forEach((oldOp) => {
                  if (oldOp.id === op.id) {
                     this.variations.push(op);
                     count += 1;
                  }
               });
            });
            if (op.price_switch) {
               this.isSwticherExists = true;
            }
         });
         this.sideDishQuantity = count;
      },
      fillWithVaries() {
         let count = 0;
         this.variation.options.forEach((element) => {
            //limit the chooses
            if (element.default_selection) {
               this.variations.push(element);
               count += 1;
            }
            if (element.price_switch) {
               this.isSwticherExists = true;
            }
         });
         this.sideDishQuantity = count;
      },
   },
   watch: {
      variations(v) {
         let price = 0;
         let vars = [];

         if (v.some((el) => el.price_switch)) {
            this.variation.options.map((e) => (e.dis = true));
            v.forEach((vr) => {
               if (vr.price_switch) {
                  vr.dis = false;
                  price += vr.price;
                  vars.push(vr.id);
               }
            });
         } else {
            v.forEach((vr) => {
               delete vr.dis;
               price += vr.price;
               vars.push(vr.id);
            });
         }

         this.varsToEmit.variationsIDs = vars;
         this.varsToEmit.price = price;
         this.varsToEmit.id = this.variation.id;
         this.$emit("addMultiOption", this.varsToEmit);
      },
   },
};
</script>

<style scoped>
>>> .q-select__dialog label {
   text-transform: capitalize;
   padding: 10px 0;
}
>>> .q-item__section {
   text-transform: capitalize;
}
</style>

