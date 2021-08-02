<template>
   <q-page class="section-container q-mx-auto">
      <!-- main header -->
      <MainHeader :title="'Make Order'" />

      <!-- order name  -->
      <section
         class="q-mx-auto bg-white rounded flex justify-between q-pa-sm q-mt-sm"
      >
         <h6 class="no-margin q-pa-sm text-grey-7 text-h4 text-weight-bold">
            Table {{ table.number }}
         </h6>
      </section>

      <!-- new order  -->
      <section
         class="q-mx-auto bg-white rounded flex justify-between q-pa-sm q-mt-sm"
      >
         <p class="text-bold q-px-xs text-grey-7">Make order</p>

         <q-scroll-area
            class="full-width flex"
            :thumb-style="thumbStyle"
            horizontal
            style="height: 130px"
         >
            <div class="flex no-wrap" style="margin: 0 -5px">
               <div
                  class="q-pa-sm rounded q-mx-xs text-center bg-grey-2 cursor-pointer text-h4 flex justify-center items-center"
                  style="width: 120px"
                  :class="selectedCat.id === 'all' ? 'bg-grey-4' : ''"
                  @click="selectCategory({ id: 'all' })"
               >
                  <p class="no-margin text-blue-grey-9 text-bold">All</p>
               </div>
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
         <div class="full-width q-my-md">
            <q-select
               filled
               use-input
               fill-input
               hide-selected
               v-model="dish"
               :options="dishes"
               label="Select Dish"
               color="teal"
               options-selected-class="text-teal-7 bg-teal-1"
               option-label="name"
               option-value="id"
               behavior="menu"
               @filter="filterFn"
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
               <template v-slot:no-option>
                  <q-item>
                     <q-item-section class="text-grey">
                        No results
                     </q-item-section>
                  </q-item>
               </template>
            </q-select>
         </div>

         <!-- select dish variations -->
         <template v-if="dish.id">
            <div
               class="full-width q-my-sm q-px-xs"
               v-for="variation in dish.variations"
               :key="variation.id"
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
         </template>
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
            :label="`Add to basket (${totalPrice / 100} EGP)`"
            @click="addToBasket()"
            :loading="loader"
         />
      </section>

      <!-- Basket  -->
      <q-btn
         class="text-bold glow-green q-py-sm text-grey-8 fixed"
         size="large"
         padding="5px 10px"
         icon="receipt"
         v-if="this.$store.state.basket.list.length"
         @click="$store.commit('basket/toggleBasket')"
      >
         <q-badge color="green-5" class="text-bold q-py-xs" floating>
            {{ this.$store.state.basket.list.length }}
         </q-badge>
      </q-btn>

      <Basket />
   </q-page>
</template>

<script>
import DishSize from "components/dish/DishSize.vue";
import SideDish from "components/dish/SideDish.vue";
import MultiVar from "components/dish/MultiVar.vue";
import MainHeader from "components/MainHeader";
import Basket from "components/Basket";

export default {
   components: {
      DishSize,
      SideDish,
      MultiVar,
      MainHeader,
      Basket,
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
         selectedCat: { id: "all" },
         dishes: [],
         arrayToSearch: [],
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
      generalDishes() {
         const dishes = [...this.$store.state.general.dishes];
         return [...dishes];
      },
      isTouch() {
         if (navigator.maxTouchPoints < 2) {
            return false;
         }
         return ture;
      },
   },
   created() {
      this.selectCategory({ id: "all" });
      this.getBasket();
   },
   methods: {
      filterFn(val, update) {
         const filteredDishes = [...this.arrayToSearch];

         update(() => {
            if (val === "") {
               this.dishes = [...this.arrayToSearch];
            } else {
               const needle = val.toLowerCase();

               this.dishes = filteredDishes.filter((v) =>
                  v.name.toLowerCase().includes(needle.toLowerCase())
               );
            }
         });
      },
      getBasket() {
         // this.$axios.get(`tables/${this.table.id}/cart`).then((res) => {
         //    this.$store.commit("basket/updateBasket", res.data.data);
         // });
      },
      selectCategory(cat) {
         this.selectedCat = { ...cat };
         if (cat.id === "all") {
            this.arrayToSearch = this.generalDishes;
            this.dishes = this.arrayToSearch;
            return;
         }

         this.arrayToSearch = cat.products;
         this.dishes = this.arrayToSearch;
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
      addToBasket() {
         this.loader = true;

         const payload = {
            products: [
               {
                  id: this.dish.id,
                  variations: this.variationsIDs,
                  quantity: this.quantity,
               },
            ],
            //new status is 302
            // st: 302,
         };

         this.$axios
            .post(`tables/${this.table.id}/cart`, payload)
            .then((res) => {
               this.loader = false;
               this.dish = "";
               this.$store.commit("basket/updateBasket", res.data.data);
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
      if (!this.$store.state.tables.activeTable.id) {
         this.$router.push("/");
      }
   },
};
</script>

<style scoped>
.glow-green {
   -webkit-animation: glow 0.6s ease-in-out infinite alternate;
   -moz-animation: glow 0.6s ease-in-out infinite alternate;
   animation: glow 0.6s ease-in-out infinite alternate;
   animation-name: glow-green;
}

@keyframes glow-green {
   from {
      background: rgb(255, 255, 255);
      transform: translate3d(0px, -2px, 50px);
   }
   to {
      transform: translate3d(0px, 2px, 50px);
      background: rgb(236, 236, 236);
   }
}
</style>