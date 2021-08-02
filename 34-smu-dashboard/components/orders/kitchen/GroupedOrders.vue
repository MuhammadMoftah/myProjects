<template>
  <div class="p-2">
    <template v-for="(order, idx) in orders">
      <div
        :key="'order' + idx"
        class="p-4 mb-8 bg-gray-300 rounded"
        v-if="order.items.filter((item) => item.status == status).length"
      >
        <h2 class="flex items-center justify-between w-full mb-4 text-center">
          <span class="p-1 text-gray-600 bg-white rounded">
            {{ $t("orders.order") }}
            <span class="text-red-500"> #{{ order.id }} </span>
          </span>

          <span
            class="p-1 text-gray-700 capitalize bg-white rounded"
            v-if="order.type === 'pickup'"
          >
            <font-awesome-icon :icon="['fas', 'truck-couch']" />
            {{ order.type }}
          </span>
          <span
            class="p-1 text-gray-700 capitalize bg-white rounded"
            v-if="order.type === 'table'"
          >
            <font-awesome-icon :icon="['fas', 'utensils']" />
            {{ order.type }}
            <span class="text-red-500" v-if="order.table">
              #{{ order.table.number }}
            </span>
          </span>
        </h2>

        <template v-for="(item, i) in order.items">
          <div :key="'item-' + i" class="shadow-md">
            <Item :item="item" :order="order" :status="status" />
          </div>
        </template>
      </div>
    </template>
  </div>
</template>

<script>
import Item from "~/components/orders/kitchen/Item";

export default {
  name: "GroupedOrders",
  props: {
    orders: Array,
    status: String,
  },
  components: {
    Item,
  },

  methods: {
    changeOrderStatus(order) {
      // alert(order.status)
      const self = this;
      var st;
      if (order.status == "Being cooked.") {
        st = 303;
      } else if (order.status == "ready") {
        st = 306;
      } else if (order.status == "new") {
        st = 302;
      } else if (order.status == "delivered") {
        st = 307;
      }

      // this.$axios.$put('/orders/status_changes/'+order.id,{'status':st,"note":"test status change"})
      // .then(function (response) {
      // 	// handle success
      // })
      // .catch(function (error) {
      // 	// handle error
      // })
      // .then(function(){

      // })
    },
  },
};
</script>

<style>
</style>
