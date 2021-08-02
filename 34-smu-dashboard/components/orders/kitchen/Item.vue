<template>
   <div v-if="!status || item.status == status">
      <div style="margin-top: 20px" v-if="status">
         <!-- <t-radio-group v-model="item['status']" :change="changeItemStatus(item)" :options="['new', 'Being cooked.', 'ready','delivered']"></t-radio-group> -->
         <div class="inline-flex justify-center" v-if="loader">
            <button class="w-56 pt-1 font-bold bg-gray-300">
               <font-awesome-icon :icon="['fad', 'spinner']" class="fa-spin" />
            </button>
         </div>
         <div class="inline-flex w-100" v-else>
            <button
               @click="changeItemStatus(item, 'Being cooked.')"
               class="p-1 font-bold text-gray-800 bg-blue-400 btn hover:bg-blue-300"
               :disabled="
                  item.status == 'Being cooked.' ||
                  item.status == 'ready' ||
                  item.status == 'delivered'
               "
            >
               {{ $t("orders.being_cooked") }}
            </button>
            <button
               @click="changeItemStatus(item, 'ready')"
               class="p-1 font-bold text-gray-800 bg-green-400 btn hover:bg-green-300"
               :disabled="item.status == 'ready' || item.status == 'delivered'"
            >
               {{ $t("orders.ready") }}
            </button>

            <button
               @click="changeItemStatus(item, 'delivered')"
               class="p-1 font-bold text-gray-800 bg-orange-400 rounded-r btn hover:bg-orange-300"
               :disabled="item.status == 'delivered'"
               v-if="order.type !== 'pickup'"
            >
               {{ $t("orders.delivered") }}
            </button>
         </div>
      </div>
      <div class="relative py-3 bg-white border-b border-gray-200">
         <div class="px-4 pt-1">
            <!-- feature not working yet -->
            <small class="flex items-center justify-between" v-if="false">
               <span>
                  <font-awesome-icon
                     :icon="[
                        'fal',
                        item.type === 1
                           ? 'salad'
                           : item.type === 2
                           ? 'fish-cooked'
                           : item.type === 3
                           ? 'ice-cream'
                           : 'cocktail',
                     ]"
                     class=""
                  />
                  {{ type }}
               </span>
               <div class="flex">
                  <span v-for="variant in item.variant" :key="variant.id">
                     <p v-if="variant.name === 'vegan'">
                        <font-awesome-icon
                           :icon="['fas', 'leaf']"
                           class="text-green-500"
                        />
                     </p>
                     <p v-if="variant.name === 'spicy'">
                        <font-awesome-icon
                           :icon="['fas', 'pepper-hot']"
                           class="text-red-600"
                        />
                     </p>
                  </span>
               </div>
            </small>

            <section class="flex items-center justify-between">
               <p class="font-bold">
                  {{ item.product.quantity }}x {{ item.product.name }}
               </p>
            </section>
         </div>

         <aside v-if="item.product" class="mx-3 mt-1 mb-2">
            <div
               class="inline-block font-bold vertical-align-top"
               v-for="options in item.product.product_variation"
               :key="options.id"
            >
               <p
                  class="inline-block px-1 py-1 text-xs border rounded"
                  v-for="(op, i) in options.options"
                  :key="op.id + '' + i"
               >
                  {{ op.name }}
               </p>
            </div>
         </aside>
         <div
            v-if="item.product.note"
            class="block px-4 text-sm font-bold text-gray-600"
         >
            <span class="text-indigo-600">{{ $t("note") }}:</span>
            {{ item.product.note }}
         </div>
      </div>
   </div>
</template>

<script>
export default {
   name: "Item",
   props: {
      item: Object,
      price: Boolean,
      status: null,
      order: Object,
   },
   data() {
      return {
         loader: false,
      };
   },
   computed: {
      type() {
         switch (this.item.type) {
            case 1:
               return "Starter";
               break;

            case 2:
               return "Main";
               break;

            case 3:
               return "Desert";
               break;

            case 4:
               return "Drinks";
               break;

            default:
               break;
         }
      },
   },
   methods: {
      changeItemStatus(item, newStatus) {
         this.loader = true;
         var st;
         if (newStatus == "Being cooked.") {
            st = 303;
         } else if (newStatus == "ready") {
            st = 306;
         } else if (newStatus == "new") {
            st = 302;
         } else if (newStatus == "delivered") {
            st = 307;
         } else if (newStatus == "done") {
            st = 308;
         }

         this.$axios
            .$put("/order_items/" + item.id, { status: st })
            .then(() => {
               this.item.status = newStatus;
               this.loader = false;
            })
            .catch((err) => {
               this.loader = false;
               for (const error in err.response.data.errors) {
                  this.$store.dispatch("noti/pushError", {
                     body: err.response.data.errors[error][0],
                  });
               }
            });
      },
   },
};
</script>

<style scoped>
.btn {
   color: white;
   font-size: 13px;
   font-weight: 600;
}
button:disabled {
   @apply bg-gray-400;
   pointer-events: none;
}
</style>
