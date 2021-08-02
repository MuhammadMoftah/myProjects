<template>
  <div>
    <transition name="fade">
      <Modal v-if="$store.state.modal.show === 'returnItem'" max_width="600">
        <!-- header -->
        <div class="capitalize" slot="modal-header">
          {{ $t("return_item") }}
        </div>

        <section class="mb-4 capitalize">
          {{ $t("return") }}

          <span class="font-bold">
            {{ item.quantity }} {{ item.product.name }},
          </span>
          {{ $t("tables.are_you_sure") }}
        </section>

        <div v-if="item.status == 'Being cooked.'">
          <label class="inline-flex items-center mt-3 cursor-pointer">
            <input
              v-model="forceDelete"
              type="checkbox"
              class="w-4 h-4 text-green-600 bg-red-500 form-checkbox"
            />
            <span class="px-2 text-grey-700">
              {{ $t("force_return_item") }}
            </span>
          </label>
          <p class="mt-3 text-orange-600 text-md" v-if="forceDelete">
            <font-awesome-icon
              class="text-xl"
              style="vertical-align: sub"
              :icon="['fas', 'exclamation-triangle']"
            />
            {{ $t("return_item_warning") }}
          </p>
        </div>

        <div class="flex">
          <div class="w-1/2">
            <textarea
              class="w-full p-2 mt-1 text-sm text-gray-700 border rounded resize-none"
              v-model="returnNote"
              rows="3"
            ></textarea>
          </div>

          <div class="w-1/2 px-3">
            <button
              class="w-full py-3 my-1 text-sm text-gray-600 capitalize truncate border rounded shadow-sm cursor-pointer hover:bg-gray-200"
              @click="returnNote = $t('not_paid_reason')"
            >
              {{ $t("not_paid_reason") }}
            </button>

            <button
              class="w-full py-3 my-1 text-sm text-gray-600 capitalize truncate border rounded shadow-sm cursor-pointer hover:bg-gray-200"
              @click="returnNote = $t('customer_gone_reason')"
            >
              {{ $t("customer_gone_reason") }}
            </button>
            <button
              class="w-full py-3 my-1 text-sm text-gray-600 capitalize truncate border rounded shadow-sm cursor-pointer hover:bg-gray-200"
              @click="returnNote = $t('customer_gone_reason')"
            >
              {{ $t("no_customer_reason") }}
            </button>
          </div>
        </div>

        <!-- footer -->
        <template slot="confirm-button">
          <button
            :disabled="!returnNote"
            class="px-4 py-1 mx-1 text-sm text-white capitalize rounded-full 0"
            :class="
              returnNote ? 'bg-red-400  hover:bg-red-500 ' : ' bg-gray-400'
            "
            @click="returnItem()"
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

      <!-- Replace Modal  -->
      <Modal v-if="$store.state.modal.show === 'replaceItem'" max_width="700">
        <!-- header -->
        <template slot="modal-header">
          <span class="font-bold capitalize">
            <span class="font-normal">{{ $t("replace") }} </span>
            {{ item.quantity }} {{ item.product.name }}
            <span class="font-normal"> {{ $t("with") }} </span>
          </span>
        </template>

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
              class="p-1 capitalize bg-white border rounded cursor-pointer"
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
              class="p-1 capitalize bg-white border rounded cursor-pointer"
            >
              <option value="">{{ $t("select_dish") }}</option>
              <option
                v-for="dish in dishes"
                :key="dish.slug"
                :value="dish.slug"
              >
                {{ dish.name }}
              </option>
            </select>
          </div>

          <div
            class="flex flex-col w-1/5 m-2 capitalize"
            :class="dishes.length ? '' : 'disable'"
          >
            <label for="courses"> {{ $t("quantity") }} </label>
            <input
              v-model.number="quantity"
              type="number"
              class="h-10 p-1 capitalize bg-white border rounded"
            />
          </div>
        </section>

        <!-- Dish Variations -->
        <section class="px-2 py-2 mt-2 border-t-2 border-grey-700">
          <div
            class="flex flex-col w-full px-2 capitalize"
            v-for="variations in sourceVariations"
            :key="variations.id"
          >
            <template
              v-if="!variations.incremental && !variations.multi_select"
            >
              <span class="font-bold text-gray-600">
                {{ variations.name }}
              </span>
              <select
                name="dishes"
                v-model="dishSize"
                class="w-1/2 p-1 mb-4 capitalize bg-white border rounded cursor-pointer"
              >
                <option value="">
                  {{ $t("select") }} {{ variations.name }}
                </option>
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
            @click="replaceDish"
            class="px-4 py-1 mx-1 text-sm text-white capitalize bg-green-400 rounded-full hover:bg-green-500"
          >
            {{ $t("replace") }}
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

      <!-- Edit Modal  -->
      <Modal v-if="$store.state.modal.show === 'editItem'" max_width="700">
        <!-- header -->
        <template slot="modal-header">
          <span class="font-bold capitalize" v-if="item.product">
            <span class="font-normal"> {{ $t("edit") }}</span>
            <span v-once> {{ item.quantity }} </span>
            X {{ item.product.name }}
            <span class="font-normal">{{ $t("with") }}</span>
          </span>
        </template>

        <section class="flex font-bold text-black capitalize">
          <div
            class="flex flex-col w-1/2 m-2 capitalize"
            :class="dishes.length ? '' : 'disable'"
          >
            <label for="courses ">
              <font-awesome-icon :icon="['fal', 'hamburger']" class="" />
              {{ $t("menu.dish_name") }}
            </label>

            <select
              class="p-1 capitalize bg-white border rounded cursor-pointer"
            >
              <option value="">
                {{ item.product.name }}
              </option>
            </select>
          </div>

          <div class="flex flex-col w-1/5 m-2 capitalize">
            <label for="courses "> {{ $t("quantity") }} </label>
            <input
              v-model.number="editedQuantity"
              type="number"
              class="h-10 p-1 capitalize bg-white border rounded"
            />
          </div>
        </section>
        <!-- Dish Size -->
        <section class="px-2 py-2 mt-2 border-t-2 border-grey-700">
          <div
            class="flex flex-col w-full px-2 capitalize"
            v-for="variations in sourceVariations"
            :key="variations.id"
          >
            <template
              v-if="!variations.incremental && !variations.multi_select"
            >
              <span class="font-bold text-gray-600">
                {{ variations.name }}
              </span>
              <DishSize
                :options="variations.options"
                @getDishSize="getDishSize"
              />
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
            @click="editDish"
            class="px-4 py-1 mx-1 text-sm text-white capitalize bg-blue-400 rounded-full hover:bg-blue-500"
          >
            {{ $t("edit") }}
          </button>
        </template>
        <template slot="cancel-button">
          <button
            class="px-4 py-1 mx-1 text-sm text-white capitalize bg-gray-500 rounded-full hover:bg-gray-600"
            @click="cancel()"
          >
            {{ $t("cancel") }}
          </button>
        </template>
      </Modal>

      <!-- Add Item Modal -->
      <Modal v-if="$store.state.modal.show === 'addNewItem'" max_width="800">
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
              class="p-1 capitalize bg-white border rounded cursor-pointer"
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
              class="p-1 capitalize bg-white border rounded cursor-pointer"
            >
              <option value="">{{ $t("select_dish") }}</option>
              <option
                v-for="dish in dishes"
                :key="dish.slug"
                :value="dish.slug"
              >
                {{ dish.name }}
              </option>
            </select>
          </div>

          <div
            class="flex flex-col w-1/5 m-2 capitalize"
            :class="dishes.length ? '' : 'disable'"
          >
            <label for="courses"> {{ $t("quantity") }} </label>
            <input
              v-model.number="quantity"
              type="number"
              class="h-10 p-1 capitalize bg-white border rounded"
            />
          </div>
        </section>

        <!-- Dish Variations -->
        <section class="px-2 py-2 mt-2 border-t-2 border-grey-700">
          <div
            class="flex flex-col w-full px-2 capitalize"
            v-for="variations in sourceVariations"
            :key="variations.id"
          >
            <template
              v-if="!variations.incremental && !variations.multi_select"
            >
              <span class="font-bold text-gray-600">
                {{ variations.name }}
              </span>
              <select
                name="dishes"
                v-model="dishSize"
                class="w-1/2 p-1 mb-4 capitalize bg-white border rounded cursor-pointer"
              >
                <option value="">
                  {{ $t("select") }} {{ variations.name }}
                </option>
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
    </transition>
  </div>
</template>

<script>
import SideDish from "~/components/products/SideDish";
import DishSize from "~/components/products/DishSize";
import Extras from "~/components/products/Extras";
export default {
  name: "EditSingleOrder",
  components: {
    DishSize,
    SideDish,
    Extras,
  },
  data() {
    return {
      returnNote: "",
      forceDelete: false,
      courseSlug: 0,
      dishes: [],
      dishSlug: "",
      dishID: "",
      quantity: 1,
      editedQuantity: "",
      sourceVariations: [],
      dishSize: "",
      extras: [],
      sideDishes: [],
      selectedVars: [],
    };
  },

  mounted() {
    if (this.$store.state.modal.show === "editItem") {
      this.editCase();
    }
  },

  computed: {
    courses() {
      return [...this.$store.state.products.branchCategories];
    },
    item() {
      // return this.$store.state.orders.itemToEdit;
      const item = { ...this.$store.state.orders.itemToEdit };
      return item;
    },
  },
  methods: {
    async editCase() {
      const res = await this.$axios.get(`products/${this.item.product.slug}`);
      this.sourceVariations = res.data.data.variations;
      this.dishID = res.data.data.id;
      this.editedQuantity = this.item.quantity;
    },
    async dishSelected(dish) {
      try {
        const res = await this.$axios.get(`products/${dish}`);
        this.sourceVariations = res.data.data.variations;
        this.dishID = res.data.data.id;
      } catch (err) {}
    },
    async courseSelected(course) {
      this.sourceVariations = [];
      this.dishes = [];
      try {
        const res = await this.$axios.get(`categories/${course}`);
        this.dishes = res.data.data.products;
      } catch (err) {}
    },
    async returnItem() {
      try {
        const res = await this.$axios.put(
          `/orders/${this.item.order_id}/items/${this.item.id}/cancel`,
          {
            //cancelled status is 305
            st: 305,
            note: this.returnNote,
          }
        );
        //live update single order in the store
        if (this.$store.state.orders.activeGeneralOrder) {
          this.$store.commit("orders/storeActiveGeneralOrder", res.data.data);
        } else {
          this.$store.commit("orders/updateSingleOrder", res.data.data);
        }

        //event to refresh orders
        this.$nuxt.$emit("refreshOrders");

        //close modal
        this.$store.commit("modal/set", []);
        //reopen the orders slide with new data
        this.$store.commit("orders/closeOrders");
      } catch (err) {}
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
    async replaceDish() {
      let variations = [];
      if (this.dishSize) {
        variations = [this.dishSize, ...this.extras, ...this.sideDishes];
      } else {
        variations = [...this.extras, ...this.sideDishes];
      }

      const payload = {
        products: [
          {
            id: this.dishID,
            product_variation: variations,
            quantity: this.quantity,
          },
        ],
        //new status is 302
        st: 302,
      };

      const res = await this.$axios.put(
        `/orders/${this.item.order_id}/items/${this.item.id}`,
        payload
      );
      //live update single order in the store
      if (this.$store.state.orders.activeGeneralOrder) {
        this.$store.commit("orders/storeActiveGeneralOrder", res.data.data);
      } else {
        this.$store.commit("orders/updateSingleOrder", res.data.data);
      }

      //event to refresh orders
      this.$nuxt.$emit("refreshOrders");

      //close modal
      this.$store.commit("modal/set", []);
      //reopen the orders slide with new data
      this.$store.commit("orders/closeOrders");
    },
    async editDish() {
      let variations = [];
      if (this.dishSize) {
        variations = [this.dishSize, ...this.extras, ...this.sideDishes];
      } else {
        variations = [...this.extras, ...this.sideDishes];
      }

      const payload = {
        products: [
          {
            id: this.dishID,
            product_variation: variations,
            quantity: this.editedQuantity,
          },
        ],
        //new status is 302
        st: 302,
      };

      const res = await this.$axios.put(
        `/orders/${this.item.order_id}/items/${this.item.id}`,
        payload
      );

      //live update single order in the store
      if (this.$store.state.orders.activeGeneralOrder) {
        this.$store.commit("orders/storeActiveGeneralOrder", res.data.data);
      } else {
        this.$store.commit("orders/updateSingleOrder", res.data.data);
      }
      //global event to refresh orders
      this.$nuxt.$emit("refreshOrders");
      //close modal
      this.$store.commit("modal/set", []);
      //reopen the orders slide with new data
      this.$store.commit("orders/closeOrders");
    },
    addNewItem() {
      let order;
      if (this.$store.state.orders.activeGeneralOrder) {
        order = this.$store.state.orders.activeGeneralOrder;
      } else {
        order = this.$store.state.orders.data.orders[0];
      }

      let variations = [];
      if (this.dishSize) {
        variations = [this.dishSize, ...this.extras, ...this.sideDishes];
      } else {
        variations = [...this.extras, ...this.sideDishes];
      }
      const payload = {
        products: [
          {
            id: this.dishID,
            product_variation: variations,
            quantity: this.quantity,
          },
        ],
      };
      this.$axios.post(`orders/${order.id}/items`, payload).then((res) => {
        //live update single order in the store
        if (this.$store.state.orders.activeGeneralOrder) {
          this.$store.commit("orders/storeActiveGeneralOrder", res.data.data);
        } else {
          this.$store.commit("orders/updateSingleOrder", res.data.data);
        }
        //global event to refresh orders
        this.$nuxt.$emit("refreshOrders");

        //close modal
        this.$store.commit("modal/set", []);
        //reopen the orders slide with new data
        this.$store.commit("orders/closeOrders");
      });
    },

    cancel() {
      this.$store.commit("modal/set", []);
      this.$store.commit("orders/closeOrders");
      Object.assign(this.$data, this.$options.data());
    },
  },
};
</script>

<style>
.disable {
  opacity: 0.6;
  pointer-events: none;
}
</style>
