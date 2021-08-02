<template>
   <div class="relative">
      <div
         v-if="!dish.published"
         class="absolute z-10 w-full h-full overflow-hidden bg-black bg-opacity-75 rounded cursor-pointer hover:opacity-50"
         @click="$store.dispatch('edit/openEdit', dish)"
      >
         <span
            class="block w-full h-full text-lg text-center text-red-500"
            style="transform: translateY(calc(50% - 14px))"
         >
            {{ $t("menu.unpublished") }}
         </span>
      </div>
      <section
         class="relative border-b rounded cursor-pointer group hover:bg-gray-200"
         @click="$store.dispatch('edit/openEdit', dish)"
      >
         <span class="flex items-center justify-between px-3 pt-3">
            <!-- name & edit -->
            <div class="flex flex-col items-start w-full py-1">
               <!-- name -->
               <span class="flex items-center">
                  <span
                     class="relative z-0 w-16 h-16 overflow-hidden bg-gray-300 rounded"
                  >
                     <img
                        class="object-cover w-16 h-16"
                        :src="updatedDish.media[0].url"
                        :alt="updatedDish.media.name"
                        v-if="updatedDish.media.length"
                     />
                     <p
                        v-else-if="!updatedDish.media.url"
                        class="my-auto text-xs leading-snug text-center text-gray-400 cursor-pointer"
                     >
                        {{ $t("menu.upload_image") }}
                     </p>
                  </span>

                  <b class="mx-2 capitalize">{{ updatedDish.name }} </b>
               </span>

               <!-- variants -->
               <p class="flex">
                  <span
                     v-for="(variant, i) in updatedDish.variant"
                     :key="'variant' + i"
                     class="flex items-center py-1"
                  >
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
               </p>
            </div>

            <!-- price -->
            <div
               class="py-1 pr-2"
               v-if="
                  updatedDish.sale_price &&
                  $store.state.products.generalOffers == 1
               "
            >
               <p class="text-sm font-bold text-orange-400">
                  <font-awesome-icon
                     :icon="['fas', 'fire']"
                     class="text-orange-500"
                  />
                  {{ $t("menu.sale") }}!
               </p>
               <p class="text-base font-bold text-blue-500">
                  {{ currencyFormatter(updatedDish.sale_price) }}
               </p>
               <p class="text-sm text-gray-500 line-through">
                  {{ currencyFormatter(updatedDish.price) }}
               </p>
            </div>
            <div class="py-1 pr-2" v-else>
               <p class="text-base font-bold text-blue-500">
                  {{ currencyFormatter(updatedDish.price) }}
               </p>
            </div>
         </span>

         <div
            class="w-full px-3 pb-3 text-gray-600"
            :class="{ 'bg-blue-300': edit }"
         >
            <div
               v-if="updatedDish.description"
               class="flex flex-wrap items-center w-full"
            >
               <span class="font-bold">Details:</span>
               <span class="text-sm">{{ updatedDish.description }}</span>
            </div>
            <div
               class="flex flex-wrap w-full"
               :class="{ 'text-black': edit }"
               v-if="updatedDish.variations.length"
            >
               <span
                  class="flex flex-wrap my-0 mr-2"
                  v-for="variation in updatedDish.variations"
                  :key="'variation_' + variation.id"
               >
                  <p class="self-center mr-2 font-bold capitalize">
                     {{ variation.name }}:
                  </p>
                  <p
                     v-for="(option, i) in variation.options"
                     class="mr-2 group"
                     :key="'option_' + i"
                  >
                     <span
                        class="inline-block p-1 my-1 text-xs text-gray-500 capitalize bg-gray-100 border rounded"
                     >
                        {{ option.name }}

                        <span
                           class=""
                           v-if="
                              option.sale_price &&
                              updatedDish.sale_price &&
                              $store.state.products.generalOffers == 1
                           "
                        >
                           <span class="mx-1 line-through text-grey-500">
                              {{ currencyFormatter(option.price) }}
                           </span>

                           <span class="font-bold text-orange-500">
                              {{ currencyFormatter(option.sale_price) }}
                           </span>
                        </span>
                        <span class="font-bold text-blue-500" v-else>
                           {{ currencyFormatter(option.price) }}
                        </span>
                     </span>
                  </p>
               </span>
            </div>
         </div>
      </section>
   </div>
</template>

<script>
export default {
   name: "Dish",
   props: {
      dish: Object,
   },
   watch: {
      dish: {
         immediate: true,
         deep: true,
         handler(val, oldVal) {
            this.updatedDish = val;
         },
      },
   },
   mounted() {},
   data() {
      return {
         courses: this.$store.state.products.courses,
         updatedDish: {
            category_id: this.dish.category_id,
            name: this.dish.name,
            slug: this.dish.slug,
            price: this.dish.price,
            description: this.dish.description,
            variations: this.dish.variations,
         },
         edit: false,
         editImage: false,

         // currency settings

         // iso: this.$store.state.lang.rtl ? "ar-EG" : "en-EG",
         currency: "EGP",
         currencyDisplay: "code",
      };
   },
   computed: {
      iso() {
         return this.$store.state.lang.rtl ? "ar-EG" : "en-EG";
      },
   },
   methods: {
      currencyFormatter(number) {
         if (number) {
            return new Intl.NumberFormat(this.iso, {
               style: "currency",
               currency: this.currency,
               // currencyDisplay: this.currencyDisplay,
            }).format(number / 100);
         }

         return "";
      },
   },
};
</script>

<style>
</style>