<template>
  <main class="relative w-full p-4 rounded">
    <div
      class="flex h-16 max-w-md mx-auto mb-5 text-xl text-gray-600 border-b w-100"
    >
      <button
        class="w-1/2 h-full hover:bg-blue-100"
        @click="ordersStatus = ''"
        :class="
          ordersStatus === ''
            ? 'text-blue-700 bg-blue-100 border-b border-blue-700'
            : 'bg-white'
        "
      >
        {{ $t("orders.order") }}
      </button>
      <button
        class="w-1/2 h-full hover:bg-blue-100"
        @click="ordersStatus = 'open'"
        :class="
          ordersStatus === 'open'
            ? 'text-blue-700 bg-blue-100 border-b border-blue-700'
            : 'bg-white'
        "
      >
        {{ $t("open") }}
      </button>
    </div>

    <OrdersTypeTable v-if="ordersStatus === ''" />
    <OrdersTypeOpen v-if="ordersStatus === 'open'" />

    <!-- Edit single item in order -->
    <EditSingleOrder v-if="$store.state.modal.show" />
  </main>
</template>


<script>
import OrdersTypeTable from "~/components/orders/OrdersTypeTable";
import OrdersTypeOpen from "~/components/orders/OrdersTypeOpen";
import EditSingleOrder from "~/components/forms/EditSingleOrder";

export default {
  name: "orders",
  components: {
    OrdersTypeTable,
    OrdersTypeOpen,
    EditSingleOrder,
  },
  middleware: ["redirectIfGuest"],

  data() {
    return {
      ordersStatus: "",
    };
  },

  fetch() {
    // set route name
    this.$store.commit("locales/setRouteName", "orders.orders");

    this.$store.dispatch("products/getBranchCategories");
  },
};
</script>

<style scoped>
.mx-datepicker {
  width: 100%;
}
>>> .mx-input {
  height: 39px;
  border-radius: 10px;
  border: 1px solid #e7e7e7;
  box-shadow: 0 1px 3px 0 rgb(0 0 0 / 10%), 0 1px 2px 0 rgb(0 0 0 / 6%);
}
th {
  max-width: 150px !important;
  width: 150px !important;
}
</style>