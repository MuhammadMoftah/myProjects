<template>
   <section>
      <label
         class="inline-flex items-center px-2 mt-1 cursor-pointer"
         v-for="option in options"
         :key="option.id"
      >
         <input
            type="checkbox"
            :value="extras[option.id]"
            class="w-5 h-5 form-checkbox"
            :checked="extras[option.id] == true"
            @click="select(option.id, $event)"
         />
         <span class="px-3 text-grey-700">
            {{ option.name }}
         </span>
      </label>
   </section>
</template>

<script>
export default {
   name: "Extras",
   props: {
      options: {
         default: Array,
         value: [],
      },
   },
   data() {
      return {
         extras: {},
      };
   },
   computed: {
      selectedVars() {
         const selectedVars = [];
         const item = { ...this.$store.state.orders.itemToEdit };
         item.product.product_variation.forEach((el) => {
            el.options.forEach((op) => {
               selectedVars.push(op);
            });
         });

         return selectedVars;
      },
   },
   created() {
      // get old selected
      if (this.$store.state.modal.show === "editItem") {
         this.selectedVars.forEach((el) => {
            this.options.forEach((op) => {
               if (op.slug == el.slug) {
                  this.extras[el.id] = true;
               }
            });
         });
         this.emitValues(this.extras);
      }
   },
   methods: {
      select(val, event) {
         this.extras[val] = event.target.checked;
         this.emitValues(this.extras);
      },
      emitValues(object) {
         let arr = [];
         for (const n in object) {
            if (object[n]) {
               arr.push(parseInt(n));
            }
         }
         this.$emit("getExtras", arr);
      },
   },

   watch: {
      extras: {
         handler(val) {
            this.emitValues(val);
         },
         deep: true,
      },
   },
};
</script>

<style>
</style>