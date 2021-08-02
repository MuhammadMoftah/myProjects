<template>
   <div class="relative bg-white border-b border-gray-200">
      <span
         class="absolute w-2 h-full"
         :class="[
            item.status === 'new'
               ? 'bg-white'
               : item.status === 'Being cooked.'
               ? 'bg-yellow-300'
               : item.status === 'Ready to deliver'
               ? 'bg-green-300'
               : 'bg-white',
         ]"
      ></span>

      <div class="px-4 pt-1">
         <small class="flex items-center justify-between">
            <span>
               {{ type }}
            </span>
            <div class="flex">
               <span v-for="(variant, i) in item.variant" :key="'variant' + i">
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
            <!--  -->
         </small>

         <section class="flex items-center justify-between" v-if="item.product">
            <p class="font-bold capitalize">
               {{ item.quantity }}x {{ item.product.name }}
            </p>
            <!-- <p v-if="price">
               euro
               {{
                  ((item.prices.price * item.prices.vat) / 1000) * item.amount
               }}
            </p> -->
            <p>
               {{ item.product.display_price }}
            </p>
         </section>
      </div>

      <div class="flex px-4 pb-2" v-if="item.product">
         <p
            v-for="(xtra, i) in item.product.product_variation"
            :key="'extra' + i"
            class="px-1 py-1 my-1 text-xs text-blue-700 bg-blue-300 rounded"
         >
            {{ xtra.options.name }}
         </p>
      </div>
   </div>
</template>

<script>
export default {
   name: "Order",
   props: {
      item: Object,
      price: Boolean,
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
};
</script>

<style>
@media print {
   .no-print,
   .no-print * {
      display: none !important;
   }
}
</style>