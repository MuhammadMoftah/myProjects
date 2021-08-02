<template>
  <section v-if="quantity" class="px-2 py-0 my-2 border rounded">
    <span class="block mt-3 font-bold text-gray-600">
      {{ name }}
    </span>
    <div class="grid grid-cols-2 gap-2">
      <template v-for="(n, i) in quantity">
        <select
          :key="n"
          v-model="sideDish[i]"
          class="block p-1 mb-4 capitalize bg-white border rounded cursor-pointer input"
          :class="sideDish[i].dis == true ? 'hidden' : ''"
        >
          <option :value="undefined">No Selection</option>
          <option v-for="option in options" :key="option.id" :value="option">
            {{ option.name }}
            <span v-if="option.price_switch" class="font-bold text-red-500">
              (Special dish)
            </span>
          </option>
        </select>
      </template>
    </div>
  </section>
</template>

<script>
export default {
  name: "SideDish",
  props: {
    options: {
      default: Array,
      value: [],
    },
    name: {
      default: String,
      value: "",
    },
  },

  beforeMount() {
    this.setQuantity();
    this.fillWithVaries();
  },
  data() {
    return {
      sideDish: [],
      quantity: "",
    };
  },
  methods: {
    setQuantity() {
      let count = 0;
      this.options.forEach((element) => {
        element.dis = false;
        //limit the chooses
        if (element.default_selection) {
          count += 1;
        }
      });
      this.quantity = count;
    },
    fillWithVaries() {
      let count = 0;
      this.options.forEach((element) => {
        //fill selected Vars
        if (element.default_selection) {
          this.sideDish[count] = element;
          this.emitValues();
          count += 1;
        }
      });
    },
    emitValues() {
      const arr = [];
      for (let n in this.sideDish) {
        if (!this.sideDish[n].dis) {
          arr.push(this.sideDish[n].id);
        }
      }
      this.$emit("getSideDishes", arr);
    },
  },

  watch: {
    sideDish: {
      handler(val) {
        if (val.some((el) => el.price_switch)) {
          this.options.map((e) => (e.dis = true));
          val.forEach((vr) => {
            if (vr.price_switch) {
              vr.dis = false;
            }
          });
        } else {
          val.forEach((vr) => {
            delete vr.dis;
          });
        }
        this.emitValues(val);
      },
      deep: true,
    },
  },
};
</script>

<style>
</style>