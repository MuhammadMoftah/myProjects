<template>
   <q-page class="section-container q-mx-auto" v-if="dish.id">
      <!-- main header -->
      <MainHeader :title="'Replace Order'" />

      <!-- order name  -->
      <section
         class="q-mx-auto bg-white rounded flex justify-between q-pa-sm q-mt-sm"
      >
         <h6
            class="no-margin q-pa-sm text-center full-width text-grey-7 text-h4 text-weight-bold"
         >
            {{ dish.product.name }}
         </h6>
      </section>

      <!-- new order  -->
      <section
         class="q-mx-auto bg-white rounded flex justify-between q-pa-sm q-mt-sm"
      >
         <p class="text-bold text-grey-7 no-margin">
            Edit
            <!-- <span class="text-blue-6"> {{ dish.product.name }}</span> -->
         </p>

         <!-- select dish variations -->
         <div
            class="full-width q-my-sm q-px-xs"
            v-for="variation in sourceVariations"
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
            color="blue-6"
            class="full-width text-h6"
            padding="15px 0"
            unelevated
            :label="`Edit Order (${totalPrice / 100} EGP)`"
            @click="editOrder()"
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
         quantity: 1,
         selectedCat: {},
         dish: { ...this.$store.state.tables.activeOrder },
         newDish: "",
         selectedVariations: [],
         //ready ID's to send
         variationsIDs: [],
         //variation of empty dish
         sourceVariations: [],
         variationPrices: {},
         totalVariationsPrice: "",
      };
   },
   computed: {
      table({ $store }) {
         const table = $store.state.tables.activeTable;
         return table;
      },
      categories() {
         return this.$store.state.general.categories;
      },
      totalPrice() {
         return (this.dish.price + this.totalVariationsPrice) * this.quantity;
      },
      oldDish({ $store }) {
         const order = $store.state.tables.activeOrder;
         return order;
      },
      isTouch() {
         if (navigator.maxTouchPoints < 2) {
            return false;
         }
         return ture;
      },
   },
   mounted() {
      //set general order action to edit state
      this.$store.commit("tables/setOrderAction", "edit");

      //get original empty dish from menu
      this.getDish();
   },
   methods: {
      getDish() {
         //get quantitiy
         this.quantity = this.$store.state.tables.activeOrder.quantity;

         //get the original empty dish
         this.$axios
            .get(
               `products/${this.$store.state.tables.activeOrder.product.slug}`
            )
            .then((res) => {
               this.newDish = res.data.data;
               this.sourceVariations = res.data.data.variations;
            });
      },
      mainPrice(variation) {
         if (variation.sale_price) {
            this.dish.price = variation.sale_price;
         } else {
            this.dish.price = variation.price;
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
      editOrder() {
         this.loader = true;
         const payload = {
            products: [
               {
                  id: this.newDish.id,
                  product_variation: this.variationsIDs,
                  quantity: this.quantity,
               },
            ],
            //new status is 302
            st: 302,
         };

         // return;
         this.$axios
            .put(
               `/tables/${this.table.number}/orders/${this.oldDish.order_id}/items/${this.oldDish.id}`,
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
   beforeDestroy() {
      //set general order action to null
      this.$store.commit("tables/setOrderAction", null);
   },
};
</script>

<style>
</style>