<template>
  <div>
    <select name="dishes" v-model="dishSize" class="w-1/2 p-1 mb-4 input">
      <option value="empty">{{ $("select") }}</option>
      <option v-for="option in options" :key="option.id" :value="option.id">
        {{ option.name }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  name: "DishSize",
  props: {
    options: {
      default: Array,
      value: [],
    },
  },
  data() {
    return {
      dishSize: "",
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
  mounted() {
    //get old selected
    if (this.$store.state.modal.show === "editItem") {
      this.selectedVars.forEach((el) => {
        this.options.forEach((op) => {
          if (op.name == el.name) {
            this.dishSize = op.id;
          }
        });
      });
    }
  },
  watch: {
    dishSize: {
      handler(val) {
        this.$emit("getDishSize", val);
      },
      deep: true,
    },
  },
};
</script>

<style>
</style>