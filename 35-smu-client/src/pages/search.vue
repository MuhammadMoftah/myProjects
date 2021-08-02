<template>
   <q-page>
      <transition-group name="rotate-vertical" appear mode="in out">
         <Dish v-for="dish in dishes" :dishProp="dish" :key="dish.id" />
      </transition-group>
      <Basket />
      <transition name="slide-fade" appear mode="out-in">
         <q-btn
            align="around"
            v-if="$store.state.basket.price"
            :key="$store.state.basket.total"
            class="fixed-bottom q-py-sm"
            style="width: calc(100% - 0px)"
            icon="shopping_cart"
            color="primary"
            @click="$store.commit('basket/toggleBasket')"
         >
            {{ $store.state.basket.total }}
         </q-btn>
      </transition>
   </q-page>
</template>

<script>
import Dish from "components/Dish";
import Basket from "components/Basket";

export default {
   components: {
      Dish,
      Basket,
   },
   data: () => ({
      searchText: "",
   }),
   created() {
      this.$root.$on("searchFire", this.search);

      //return if no dishes in store to search
      if (!this.$store.state.general.dishes.length) {
         this.$router.go(-1);
      }
   },
   methods: {
      search(value) {
         this.searchText = value;
      },
   },
   computed: {
      dishes() {
         const dishes = [...this.$store.state.general.dishes];

         return dishes.filter((dish) => {
            if (dish.name) {
               return dish.name
                  .toLowerCase()
                  .includes(this.searchText.toLowerCase());
            }
         });
      },
   },
};
</script>

<style scoped>
.list-item {
   display: inline-block;
   margin-right: 10px;
}
.list-enter-active,
.list-leave-active {
   transition: all 0.5s;
}
.list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
   opacity: 0;
   transform: translateY(30px);
}
>>> .q-expansion-item {
   border-bottom: 1px solid #e8e8e8 !important;
}
</style>