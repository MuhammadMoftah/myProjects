<template>
   <q-page class="section-container q-mx-auto">
      <!-- main header -->
      <MainHeader :title="'Replace Order'" />

      <!-- order name  -->
      <section
         class="q-mx-auto bg-white rounded flex justify-between q-pa-sm q-mt-sm"
      >
         <h6 class="no-margin q-pa-sm text-grey-7 text-h4 text-weight-bold">
            {{ order.quantity }} X {{ order.product.name }}
         </h6>
      </section>

      <!-- new order  -->
      <section
         class="q-mx-auto bg-white rounded flex justify-between q-pa-sm q-mt-sm"
      >
         <p class="text-bold text-grey-7">Replace with</p>

         <q-scroll-area
            class="full-width flex"
            :thumb-style="thumbStyle"
            horizontal
            style="height: 140px"
         >
            <div class="flex no-wrap" style="margin: 0 -5px">
               <div
                  v-for="cat in categories"
                  :key="cat.id"
                  class="q-pa-sm rounded q-mx-xs text-center bg-grey-2 cursor-pointer"
                  :class="cat.id === selectedCat.id ? 'bg-grey-4' : ''"
                  style="width: 120px"
                  @click="selectCategory(cat)"
               >
                  <q-img
                     v-if="cat.media[0]"
                     :src="cat.media[0].url"
                     placeholder-src="~/assets/imgs/logo.jpg"
                     :ratio="1"
                     width="80px"
                     height="80px"
                     spinner-color="blue-5"
                     spinner-size="25px"
                     class="rounded q-mb-xs"
                  />
                  <q-img
                     v-else
                     src="~/assets/imgs/logo.jpg"
                     :ratio="1"
                     width="80px"
                     height="80px"
                     spinner-color="blue-5"
                     spinner-size="25px"
                     class="rounded q-mb-xs"
                  />
                  <p class="no-margin text-blue-grey-9 text-bold">
                     {{ cat.name }}
                  </p>
               </div>
            </div>
         </q-scroll-area>

         <!-- select dish -->
         <div class="full-width" v-if="selectedCat.id">
            <q-select
               filled
               v-model="dish"
               :options="selectedCat.products"
               label="Select Dish"
               color="teal"
               options-selected-class="text-teal-7 bg-teal-1"
               option-label="name"
               option-value="id"
               behavior="menu"
            >
               <template v-slot:option="scope">
                  <q-item v-bind="scope.itemProps" v-on="scope.itemEvents">
                     <q-item-section avatar>
                        <q-img
                           v-if="scope.opt.media[0]"
                           :src="scope.opt.media[0].url"
                           placeholder-src="~/assets/imgs/logo.jpg"
                           :ratio="1"
                           width="60px"
                           height="60px"
                           spinner-color="blue-5"
                           spinner-size="25px"
                           class="rounded q-mb-xs"
                        />
                        <q-img
                           v-else
                           src="~/assets/imgs/logo.jpg"
                           :ratio="1"
                           width="60px"
                           height="60px"
                           spinner-color="blue-5"
                           spinner-size="25px"
                           class="rounded q-mb-xs"
                        />
                     </q-item-section>
                     <q-item-section>
                        <q-item-label
                           v-html="scope.opt.name"
                           class="text-bold"
                        />
                        <q-item-label caption>{{
                           scope.opt.description
                        }}</q-item-label>
                     </q-item-section>
                  </q-item>
               </template>
            </q-select>
         </div>

         <!-- select dish variations -->
         <div
            class="full-width q-my-sm q-px-xs"
            v-for="variation in dish.variations"
            :key="variation.id"
            v-if="dish.id"
         >
            <DishSize
               :key="variation.id"
               v-if="!variation.incremental"
               :variation="variation"
               @mainPrice="mainPrice($event)"
            />
            <MultiVar
               v-if="variation.incremental && variation.multi_select"
               :variation="variation"
               :key="variation.id"
               @addMultiOption="addMultiOption($event)"
            />
            <SideDish
               v-if="variation.incremental && !variation.multi_select"
               :variation="variation"
               :key="variation.id"
               @AddSingleOption="AddSingleOption($event)"
               @addMultiOption="addMultiOption($event)"
            />
         </div>
      </section>

      <!-- quantity and submit -->
      <section
         class="fixed-bottom section-container q-mx-auto shadow-2"
         v-if="dish.id"
      >
         <div class="text-center bg-white q-py-sm">
            <div
               class="flex q-mx-auto justify-between items-center"
               style="width: 170px"
            >
               <q-btn
                  color="black"
                  round
                  :disable="quantity < 2"
                  @click="quantity--"
                  icon="remove"
               />
               <q-btn
                  flat
                  outline
                  class="text-h4 text-bold"
                  padding="10px"
                  color="blue-gray-10"
                  :label="quantity"
               />
               <q-btn color="black" round @click="quantity++" icon="add" />
            </div>
         </div>
         <q-btn
            color="green-5"
            class="full-width text-h6"
            padding="15px 0"
            unelevated
            :label="`Replace Order (${totalPrice / 100} EGP)`"
            @click="replaceOrder()"
            :loading="loader"
         />
      </section>
   </q-page>
</template>

<script>
import DishSize from "components/dish/DishSize.vue";
import SideDish from "components/dish/SideDish.vue";
import MultiVar from "components/dish/MultiVar.vue";
import MainHeader from "components/MainHeader";

export default {
   components: {
      DishSize,
      SideDish,
      MultiVar,
      MainHeader,
   },
   data() {
      return {
         // styling scroll bar
         loader: false,
         thumbStyle: {
            borderRadius: "5px",
            backgroundColor: "#027be3",
            height: "0.5vw",
            opacity: 0.75,
         },
         quantity: 1,
         selectedCat: {},
         dish: "",
         dishPrice: "",
         selectedVariations: {},
         variationsIDs: [],
         variationPrices: {},
         totalVariationsPrice: "",
      };
   },
   computed: {
      totalPrice() {
         return (this.dishPrice + this.totalVariationsPrice) * this.quantity;
      },

      order({ $store }) {
         const order = $store.state.tables.activeOrder;
         return order;
      },
      table({ $store }) {
         const table = $store.state.tables.activeTable;
         return table;
      },
      categories() {
         const categories = [...this.$store.state.general.categories];
         return [...categories];
      },
      isTouch() {
         if (navigator.maxTouchPoints < 2) {
            return false;
         }
         return ture;
      },
   },
   methods: {
      selectCategory(cat) {
         const test = { ...cat };
         this.selectedCat = { ...test };
         this.dish = "";
      },
      mainPrice(variation) {
         if (variation.sale_price) {
            this.dishPrice = variation.sale_price;
         } else {
            this.dishPrice = variation.price;
         }
         this.selectedVariations[variation.type_id] = variation.id;
         this.getVariationsIDs(this.selectedVariations);
      },
      addMultiOption(option) {
         this.selectedVariations[option.id] = option.variationsIDs;
         this.getVariationsIDs(this.selectedVariations);

         this.variationPrices[option.id] = option.price;
         this.calculateVariationsPrice(this.variationPrices);
      },
      AddSingleOption(option) {
         this.selectedVariations[option.id] = option.variation_id;
         this.getVariationsIDs(this.selectedVariations);

         this.variationPrices[option.id] = option.price;
         this.calculateVariationsPrice(this.variationPrices);
      },
      calculateVariationsPrice(prices) {
         let price = 0;
         for (const x in prices) {
            price += prices[x];
         }
         this.totalVariationsPrice = price;
      },
      getVariationsIDs(variations) {
         let IDs = [];
         for (const x in variations) {
            if (Array.isArray(variations[x])) {
               IDs.push(...variations[x]);
            } else {
               IDs.push(variations[x]);
            }
         }
         this.variationsIDs = IDs;
      },
      replaceOrder() {
         this.loader = true;
         const payload = {
            products: [
               {
                  id: this.dish.id,
                  product_variation: this.variationsIDs,
                  quantity: this.quantity,
               },
            ],
            //new status is 302
            st: 302,
         };

         this.$axios
            .put(
               `/tables/${this.table.number}/orders/${this.order.order_id}/items/${this.order.id}`,
               payload
            )
            .then((res) => {
               //live update single order in the store
               this.$store.commit("tables/updateSingleOrder", res.data.data);

               this.$q.notify({
                  message: "You order has been updated!",
                  color: "green-6",
               });
               this.loader = false;
               this.$router.go(-1);
            })
            .catch((err) => {
               for (const error in err.response.data.errors) {
                  this.$q.notify({
                     message: err.response.data?.errors[error][0],
                  });
               }
               this.loader = false;
            });
      },
   },
   beforeCreate() {
      if (!this.$store.state.tables.activeOrder.id) {
         this.$router.push("/");
      }
   },
};
</script>

<style>
</style>