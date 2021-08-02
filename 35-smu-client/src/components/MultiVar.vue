<template>
   <div>
      <p class="text-capitalize no-margin text-subtitle2 text-blue-grey-9">
         {{ variation.name }}
      </p>
      <div v-for="option in variation.options" :key="option.option_id">
         <q-checkbox v-model="variations" :val="option" color="blue-grey-8">
            <template v-slot:default>
               <span
                  class="text-capitalize text-weight-medium text-caption text-blue-grey-10"
               >
                  {{ option.name }} <span>({{ option.price / 100 }} EGP)</span>
               </span>
            </template>
         </q-checkbox>
      </div>
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
      variations: [],
      varsToEmit: {
         price: 0,
         variationsIDs: [],
      },
   }),
   created() {
      this.$root.$on("resetDish", this.resetComponent);
   },
   beforeDestroy() {
      this.$root.$off("resetDish", this.resetComponent);
   },
   methods: {
      resetComponent() {
         Object.assign(this.$data, this.$options.data());
      },
   },
   watch: {
      variations(v, o) {
         let price = 0;
         let vars = [];
         v.forEach((element) => {
            price += element.price;
            vars.push(element.id);
         });
         this.varsToEmit.variationsIDs = vars;
         this.varsToEmit.price = price;
         this.varsToEmit.id = this.variation.id;
         this.$emit("addMultiOption", this.varsToEmit);
      },
   },
};
</script>

<style>
</style>