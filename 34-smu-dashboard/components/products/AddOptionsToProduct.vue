<template>
  <section>
    <!-- Title -->
    <div class="mx-2 mt-4">
      <p class="font-bold">
        <font-awesome-icon :icon="['fad', 'burger-soda']" />
        {{ $t("menu.options") }}
      </p>
    </div>

    <div v-for="type in types" :key="type.id" class="mt-2">
      <!-- <pre class="text-xs font-bold">{{ type }}</pre> -->
      <span class="mx-2 text-sm font-bold capitalize">{{ type.name }} </span>
      <span v-if="!type.incremental" class="text-xs text-orange-500 d-block">
        This price will be replaced with the product price
      </span>

      <span
        class="flex items-center"
        v-for="(option, idx) in type.options"
        :key="'option_' + idx"
      >
        <!-- {{ option }} -->
        <input
          hidden
          type="checkbox"
          name="option"
          :id="'yes_' + option.id"
          :checked="selectedOptions.includes(option.id)"
          @click="
            add(
              option.id,
              idx,
              $event.target.checked,
              type.id,
              newoptionPrice[option.id],
              option.price,
              newSalePrice[option.id],
              defaultSideDish[option.id],
              type.incremental,
              type.multi_select
            )
          "
          :value="option.id"
        />

        <span class="flex w-full pb-2 m-1 border-b border-gray-300">
          <label
            :for="'yes_' + option.id"
            class="flex items-center justify-center w-8 mx-1 text-sm font-bold text-gray-600 capitalize border rounded cursor-pointer hover:bg-green-300 hover:text-white hover:border-green-300 item-check"
          >
            <font-awesome-icon
              :icon="['fal', 'check']"
              class="text-sm font-bold"
            />
          </label>

          <span
            class="self-center mx-2 text-sm font-bold text-gray-600 capitalize"
            style="min-width: 70px"
          >
            {{ option.name }}
          </span>

          <!-- select side dish type  -->
          <select
            class="px-2 mx-2 text-xs font-bold text-center text-blue-600 bg-white border border-blue-500 rounded cursor-pointer optionselected font- w-42 hover:bg-blue-100"
            name="sidedish"
            v-model="defaultSideDish[option.id]"
            v-if="type.incremental && !type.multi_select"
          >
            <option :value="undefined">Select</option>
            <option value="defaultselect">Default Select</option>
            <option value="priceswitch">Price Switcher</option>
          </select>

          <currency-input
            v-model="option.price"
            :placeholder="option.price / 100 + ' ' + currency"
            class="w-32 px-2 text-sm text-center text-blue-600 border border-blue-600 rounded current-price"
            :currency="currency"
            :locale="iso"
            auto-decimal-mode
            value-as-integer
          />

          <div
            class="mx-2 text-sm font-bold text-orange-500"
            v-if="!option.incremental && is_sale > 0"
          >
            <currency-input
              v-model="newSalePrice[option.id]"
              class="w-32 px-2 text-sm text-center text-orange-600 border border-orange-600 rounded sale-price"
              :currency="currency"
              :locale="iso"
              :placeholder="'Sale Price'"
              auto-decimal-mode
              value-as-integer
            />
            <font-awesome-icon
              :icon="['fas', 'fire']"
              class="mx-1 text-orange-500"
            />
          </div>
        </span>
      </span>
    </div>
  </section>
</template>

<script>
export default {
  name: "AddOptionsToProduct",
  props: {
    dishId: Number,
    dishVars: {},
    is_sale: "",
    mainPrice: "",
    dish: "",
  },

  data() {
    return {
      types: [],
      dishVariations: [{}],
      productVariations: [],
      varType: [],

      checked: [],
      newoptionPrice: [],
      newSalePrice: [],
      // Default Side Dish
      defaultSideDish: [],
      // currency settings
      iso: this.$store.state.lang.rtl ? "ar-EG" : "en-EG",
      currency: "EGP",
      currencyDisplay: "code",
      selectedOptions: [],
    };
  },
  mounted() {
    const storeTypes = this.$store.state.products.types;
    this.types = [...storeTypes];

    this.dishVars.forEach((element) => {
      element.options.forEach((type) => {
        //set id's to selected values
        this.selectedOptions.push(type.option_id);

        // if there is custome selected price
        this.newoptionPrice[type.option_id] = type.price;
        this.newSalePrice[type.option_id] = type.sale_price;
        this.defaultSideDish[type.option_id] = type.default_selection;

        //push the selected array
        this.productVariations.push({
          option_id: type.option_id,
          product_id: this.dishId,
          type_id: type.id,
          price: type.price,
          sale_price: type.sale_price,
          side_dish: type.side_dish,
          incremental: element.incremental,
          multi_select: element.multi_select,
        });
      });
    });
  },
  destroyed() {
    this.types = [];
  },

  methods: {
    async getTypes() {
      await this.$axios.get(`types?per_page=100`).then((response) => {
        // commit("storeTypes", response.data.data);
        this.$store.commit("storeTypes", response.data.data);
      });
    },
    add(
      id,
      index,
      event,
      type,
      newPrice,
      oldPrice,
      salePrice,
      defaultSelection,
      incremental,
      multi_select
    ) {
      // console.log(
      //    id,
      //    index,
      //    event,
      //    type,
      //    newPrice,
      //    oldPrice,
      //    salePrice,
      //    defaultSelection,
      //    incremental,
      //    multi_select
      // );

      let object = {
        option_id: id,
        product_id: this.dishId,
        type_id: type,
        price: oldPrice,
        sale_price: salePrice,
        default_selection: false,
        price_switch: false,
        incremental,
        multi_select,
      };

      if (incremental && !multi_select) {
        object.side_dish = true;
      } else {
        object.side_dish = false;
      }
      if (defaultSelection === "defaultselect") {
        object.default_selection = true;
        object.price_switch = false;
      } else if (defaultSelection === "priceswitch") {
        object.default_selection = false;
        object.price_switch = true;
      }
      console.table(object);

      if (!event) {
        this.productVariations = this.productVariations.filter(
          (vr) => vr.option_id !== id
        );
      } else {
        this.productVariations = this.productVariations.filter(
          (vr) => vr.option_id !== id
        );
        this.productVariations.push(object);
      }
    },
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
    addVariations() {
      const menuSlug = this.$store.state.products.activeMenu.slug;

      this.$axios
        .post(
          `menus/${menuSlug}/categories/${this.dish.category_slug}/products/${this.dish.slug}/variations`,
          {
            product_variations: this.productVariations,
          }
        )
        .then((res) => {
          // this.$store.dispatch("products/getCourses");
          this.$store.commit("products/editSingleDish", res.data.data);
          this.$store.commit("modal/set", [false]);
          // this.$store.dispatch("edit/closeEdit");
        })
        .catch((err) => {
          // err.response.data.errors
          for (const error in err.response.data.errors) {
            this.$store.dispatch("noti/pushError", {
              body: err.response.data.errors[error][0],
            });
          }
        });
    },
  },
};
</script>

<style  scoped>
input[type="checkbox"]:checked + span .item-check {
  background-color: #48bb78;
  border-color: #48bb78;
  color: white;
}

input[type="checkbox"]:checked + span .current-price {
  opacity: 0.7;
  pointer-events: none;
  @apply bg-blue-200;
  @apply text-blue-600;
  @apply font-bold;
}

input[type="checkbox"]:checked + span .sale-price {
  opacity: 0.7;
  pointer-events: none;
  @apply bg-orange-200;
  @apply text-orange-600;
  @apply font-bold;
}
input[type="checkbox"]:checked + span .optionselected {
  opacity: 0.7;
  pointer-events: none;
}
input[type="checkbox"]:checked + span .current-price::placeholder {
  @apply text-blue-600;
}

input[type="checkbox"] + span .current-price::placeholder {
  @apply text-blue-600;
}
input[type="checkbox"] + span .sale-price::placeholder {
  @apply text-orange-600;
}
</style>