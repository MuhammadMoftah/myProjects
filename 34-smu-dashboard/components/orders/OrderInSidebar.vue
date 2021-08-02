<template>
  <div
    class="relative overflow-hidden bg-white border-b border-gray-400 order-item"
    style="min-height: 80px"
  >
    <aside
      class="absolute bottom-0 z-10 flex mx-3 mb-2"
      :class="$t('dir') === 'rtl' ? 'left-0' : 'right-0'"
    >
      <button
        v-if="orderOverlay && !orderPaid"
        @click="showOverlay = true"
        class="w-6 h-6 text-white bg-blue-600 rounded cursor-pointer hover:bg-blue-700"
      >
        <font-awesome-icon :icon="['fad', 'edit']" />
      </button>
    </aside>

    <transition name="slide-fade" appear>
      <div
        v-if="showOverlay"
        class="absolute top-0 left-0 z-20 flex items-center justify-center w-full h-full bg-gray-900 cursor-pointer item-overlay"
      >
        <button
          class="absolute top-0 right-0 w-6 h-6 m-2 text-xs text-white border rounded-full hover:text-black hover:bg-gray-100"
          style="line-height: normal"
          @click="showOverlay = false"
        >
          X
        </button>
        <button
          class="px-2 py-1 mx-2 my-1 text-sm text-red-600 capitalize border border-red-600 rounded hover:bg-red-100"
          @click="itemDo('returnItem')"
        >
          {{ $t("return_item") }}
        </button>
        <button
          class="px-2 py-1 mx-2 my-1 text-sm text-green-600 capitalize border border-green-600 rounded hover:bg-green-100"
          @click="itemDo('replaceItem')"
          v-if="item.status !== 'ready'"
        >
          {{ $t("replace_with_new") }}
        </button>
        <button
          class="px-2 py-1 mx-2 my-1 text-sm text-blue-600 capitalize border border-blue-600 rounded hover:bg-blue-200"
          @click="itemDo('editItem')"
          v-if="item.status !== 'ready'"
        >
          {{ $t("edit_item") }}
        </button>
      </div>
    </transition>
    <span
      class="absolute flex items-center justify-center w-full h-full overflow-y-auto text-xs font-bold capitalize bg-opacity-25"
      :class="[
        item.status === 'new'
          ? 'bg-blue-300 text-blue-600'
          : item.status === 'Being cooked.'
          ? 'bg-yellow-300 text-yellow-600'
          : item.status === 'ready'
          ? 'bg-green-300 text-green-600'
          : item.status === 'delivered'
          ? 'bg-purple-300 text-purple-600'
          : item.status === 'cancelled'
          ? ' bg-gray-800  text-gray-800'
          : 'bg-white',
      ]"
    >
      {{ item.status }}
    </span>

    <div class="px-4 pt-1">
      <small class="flex items-center justify-between">
        <span> {{ type }} </span>
        <div class="flex">
          <span v-for="(variant, i) in item.variant" :key="'variant' + i">
            <p v-if="variant.name === 'vegan'">
              <font-awesome-icon
                :icon="['fas', 'leaf']"
                class="text-green-500"
              />
            </p>
            <p v-if="variant.name === 'spicy'">
              <font-awesome-icon
                :icon="['fas', 'pepper-hot']"
                class="text-red-600"
              />
            </p>
          </span>
        </div>
        <!--  -->
      </small>
      <section
        class="flex items-center justify-between py-3"
        v-if="item.product"
      >
        <p class="font-bold capitalize">
          {{ item.quantity }}x {{ item.product.name }}
        </p>
        <!-- <p v-if="price">
               euro
               {{
                  ((item.prices.price * item.prices.vat) / 1000) * item.amount
               }}
            </p> -->
        <p class="text-sm font-bold">
          {{ item.product.display_price }}
        </p>
      </section>
    </div>
    <template v-if="item.product">
      <div
        class="flex px-4 pb-2 font-bold"
        v-for="(options, i) in item.product.product_variation"
        :key="'extra' + i"
      >
        <p
          class="px-1 py-1 my-0 text-xs border rounded"
          v-for="op in options.options"
          :key="op.id"
        >
          {{ op.name }}
        </p>
      </div>
    </template>

    <!-- note section -->
    <div
      style="max-width: 90%; max-height: 100px"
      v-if="item.product.note"
      class="block px-5 pb-2 text-sm font-bold text-gray-700"
    >
      <span class="text-indigo-700">Note:</span>
      {{ item.product.note }}
    </div>
  </div>
</template>

<script>
export default {
  name: "OrderInSidebar",
  props: {
    item: Object,
    price: Boolean,
    orderPaid: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      showOverlay: false,
    };
  },
  computed: {
    orderOverlay() {
      if (this.item.status === "cancelled") {
        return false;
      }
      if (this.item.status === "delivered") {
        return false;
      }
      return true;
    },
    type() {
      switch (this.item.type) {
        case 1:
          return "Starter";
          break;

        case 2:
          return "Main";
          break;

        case 3:
          return "Desert";
          break;

        case 4:
          return "Drinks";
          break;

        default:
          break;
      }
    },
  },
  methods: {
    itemDo(ev) {
      this.$store.commit("orders/setItemToEdit", this.item);
      this.$store.commit("orders/closeOrders");
      this.$store.commit("modal/set", [ev, null, this.$t("tables.yes"), null]);
    },
  },
};
</script>

<style  >
.popover {
  max-width: 300px;
  z-index: 999 !important;
}
@media print {
  .no-print,
  .no-print * {
    display: none !important;
  }
}
.item-overlay {
  /* visibility: hidden; */
  --bg-opacity: 0.9;
}
.order-item:hover .item-overlay {
  /* visibility: visible; */
  /* --bg-opacity: 0.9; */
}
</style>