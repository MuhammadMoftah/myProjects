<template>
  <!-- Add Item Modal -->
  <Modal max_width="800">
    <!-- header -->
    <div class="capitalize" slot="modal-header">
      {{ $t("add_item") }}
    </div>

    <section class="flex font-bold text-black capitalize">
      <div class="flex flex-col w-1/2 m-2">
        <label for="courses capitalize">
          <font-awesome-icon :icon="['fal', 'burger-soda']" class="" />
          {{ $t("menu.select_course") }}
        </label>

        <select
          name="courses"
          v-model="courseSlug"
          id="courses"
          @change="courseSelected(courseSlug)"
          class="input"
        >
          <option value="0" disabled>{{ $t("select_course") }}</option>
          <option
            v-for="course in courses"
            :key="course.slug"
            :value="course.slug"
          >
            {{ course.name }}
          </option>
        </select>
      </div>

      <div
        class="flex flex-col w-1/2 m-2 capitalize"
        :class="dishes.length ? '' : 'disable'"
      >
        <label for="courses ">
          <font-awesome-icon :icon="['fal', 'hamburger']" class="" />
          {{ $t("menu.dish_name") }}
        </label>

        <select
          name="dishes"
          v-model="dishSlug"
          id="dishes"
          @change="dishSelected(dishSlug)"
          class="input"
        >
          <option value="">{{ $t("select_dish") }}</option>
          <option v-for="dish in dishes" :key="dish.slug" :value="dish.slug">
            {{ dish.name }}
          </option>
        </select>
      </div>

      <div
        class="flex flex-col w-1/5 m-2 capitalize"
        :class="dishes.length ? '' : 'disable'"
      >
        <label for="courses"> {{ $t("quantity") }} </label>
        <input v-model.number="quantity" type="number" class="input" />
      </div>
    </section>

    <!-- Dish Variations -->
    <section class="px-2 py-2 mt-2 border-t-2 border-grey-700">
      <div
        class="flex flex-col w-full px-2 capitalize"
        v-for="variations in sourceVariations"
        :key="variations.id"
      >
        <template v-if="!variations.incremental && !variations.multi_select">
          <span class="mt-2 mb-1 font-bold text-gray-600">
            {{ variations.name }}
          </span>
          <select
            name="dishes"
            v-model="dishSize"
            class="w-1/2 p-1 capitalize bg-white border rounded cursor-pointer input"
          >
            <option value="">{{ $t("select") }} {{ variations.name }}</option>
            <option
              v-for="option in variations.options"
              :key="option.id"
              :value="option.id"
            >
              {{ option.name }}
            </option>
          </select>
        </template>

        <!-- Extras -->
        <template v-if="variations.multi_select">
          <span class="font-bold text-gray-600">
            {{ variations.name }}
          </span>
          <Extras :options="variations.options" @getExtras="getExtras" />
        </template>

        <!-- SideDish Case -->
        <template v-if="!variations.multi_select && variations.incremental">
          <div>
            <SideDish
              :name="variations.name"
              :options="variations.options"
              @getSideDishes="getSideDishes"
            />
          </div>
        </template>
      </div>
    </section>

    <!-- footer -->
    <template slot="confirm-button">
      <button
        class="w-24 px-4 py-1 mx-2 text-sm text-white capitalize bg-gray-400 rounded-full cursor-default"
        v-if="loader"
      >
        <font-awesome-icon :icon="['fad', 'spinner']" class="fa-spin" />
      </button>
      <button
        v-else
        class="px-4 py-1 mx-1 text-sm text-white capitalize bg-blue-500 rounded-full hover:bg-blue-400"
        @click="addNewItem()"
      >
        {{ $store.state.modal.confirm_button_text }}
      </button>
    </template>
    <template slot="cancel-button">
      <button
        class="px-4 py-1 mx-1 text-sm text-white capitalize bg-gray-500 rounded-full hover:bg-gray-600"
        @click="cancel()"
      >
        {{ $t("menu.cancel") }}
      </button>
    </template>
  </Modal>
</template>

<script>
import SideDish from "~/components/products/SideDish";
import DishSize from "~/components/products/DishSize";
import Extras from "~/components/products/Extras";
export default {
  name: "AddNewItemModal",
  components: {
    DishSize,
    SideDish,
    Extras,
  },
  mounted() {},
  data() {
    return {
      courseSlug: "",
      dishSlug: "",
      dishSize: "",
      quantity: 1,
      sourceVariations: [],
      dishes: [],
      extras: [],
      sideDishes: [],
      dishID: "",
      loader: false,
    };
  },
  methods: {
    dishSelected(dish) {
      this.$axios.get(`products/${dish}`).then((res) => {
        this.sourceVariations = res.data.data.variations;
        this.dishID = res.data.data.id;
      });
    },
    async courseSelected(course) {
      this.sourceVariations = [];
      this.dishes = [];
      this.$axios.get(`categories/${course}`).then((res) => {
        this.dishes = res.data.data.products;
      });
    },
    addNewItem() {
      const obj = {
        ...this.$data,
      };
      this.$emit("sendItem", obj);
    },
    getDishSize(v) {
      this.dishSize = v;
    },
    getExtras(v) {
      this.extras = v;
    },
    getSideDishes(v) {
      this.sideDishes = v;
    },

    cancel() {
      this.$store.commit("modal/set", []);
      Object.assign(this.$data, this.$options.data());
    },
  },
  computed: {
    courses() {
      return [...this.$store.state.products.branchCategories];
    },
  },
};
</script>

<style>
</style>