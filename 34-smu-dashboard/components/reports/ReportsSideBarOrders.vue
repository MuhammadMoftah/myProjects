<template>
  <main class="overflow-hidden" v-if="order">
    <section
      class="fixed top-0 left-0 z-50 w-full h-full bg-black opacity-50"
      @click="$store.dispatch('orders/closeOrders')"
    ></section>
    <transition name="slide-fade">
      <section
        class="absolute top-0 z-50 w-full h-screen max-h-full px-6 py-3 bg-white rounded lg:w-2/5 md:w-3/4"
        :class="$store.state.lang.rtl ? 'left-0' : 'right-0'"
        v-if="slideOrder"
      >
        <div class="flex items-center justify-between py-2 mb-3">
          <aside class="flex items-center -mx-3 text-xl capitalize">
            <font-awesome-icon
              class="mx-3 text-gray-700 fa-lg"
              :icon="['fad', 'utensils-alt']"
            />
            <p>
              {{ $t("orders.order") }}
              <span class="text-red-600"> #{{ order.id }} </span>
              <span class="mx-1" v-if="order.type == 'table'">
                {{ order.type }}
                <span class="text-red-600"> #{{ order.table.number }}</span>
              </span>
            </p>
          </aside>
          <button
            class="w-8 h-8 rounded hover:bg-gray-300"
            @click="$store.dispatch('orders/closeOrders')"
          >
            X
          </button>
        </div>

        <div class="px-1 pb-12 overflow-y-auto" style="max-height: 88%">
          <!-- order status and time  -->
          <p class="flex justify-between pb-6 mt-6 text-gray-700 capitalize">
            <span
              class="flex flex-col p-2 text-xs font-bold leading-5 text-red-500 capitalize bg-red-200 rounded-md"
              v-if="order.status === 'cancelled'"
            >
              <span class="block"> {{ $t("cancelled") }} </span>

              <p class="block max-w-sm font-normal">
                {{ order.note }}
              </p>
            </span>

            <span
              class="flex items-center justify-center h-6 px-2 text-xs font-bold leading-5 text-center text-gray-600 capitalize bg-gray-200 rounded-md"
              v-if="order.status === 'done'"
            >
              <font-awesome-icon
                class="mx-1 text-gray-700 fa-lg"
                style="color: green"
                :icon="['fas', 'check-circle']"
              />
              {{ $t("paid") }}
            </span>

            <span
              class="flex items-center justify-center h-6 px-2 text-xs font-bold leading-5 text-center text-gray-600 capitalize bg-gray-200 rounded-md"
              v-if="order.status === 'done'"
            >
              {{ $t("done") }}
            </span>
            <span>
              <font-awesome-icon
                class="mx-1 text-gray-700 fa-lg"
                :icon="['fas', 'clock']"
              />
              {{ order.created_at.slice(11, 16) }},
              {{ order.created_at.slice(0, 10) }}
            </span>
          </p>

          <!-- User data  -->
          <section class="mb-6" v-if="order.member">
            <h2
              class="p-3 mt-5 font-bold text-center text-gray-700 bg-gray-100 rounded-lg"
            >
              {{ $t("user_data") }}
            </h2>
            <div class="px-2 my-3">
              <p
                class="flex justify-between py-1 mt-3 text-gray-800 capitalize"
              >
                <span class="capitalize"> {{ $t("name") }} </span>

                <span>
                  {{ order.member.name }}
                </span>
              </p>
              <p
                class="flex justify-between py-1 mt-3 text-gray-800 capitalize"
              >
                <span class="capitalize"> {{ $t("phone") }}</span>
                <span> +{{ order.member.phone }} </span>
              </p>
            </div>
          </section>

          <!-- order details  -->
          <h2
            class="p-3 font-bold text-center text-gray-700 bg-gray-100 rounded-lg"
          >
            {{ $t("order_summary") }}
          </h2>
          <!-- order items  -->
          <div class="px-2 mt-5" v-for="item in order.items" :key="item.id">
            <p class="flex justify-between py-1 text-gray-800">
              <span class="font-bold">
                {{ item.product.quantity }}
                {{ item.product.name }}
              </span>

              <span
                class="flex flex-col p-2 text-xs font-bold leading-5 text-red-500 capitalize bg-red-200 rounded-md"
                v-if="item.status == 'cancelled'"
              >
                <span class="block"> {{ $t("cancelled") }} </span>
              </span>

              <span> {{ item.product.display_price }} </span>
            </p>

            <p class="flex justify-between px-1 text-sm text-gray-700">
              <span v-if="item.product.product_variation">
                <template v-for="type in item.product.product_variation">
                  <template v-for="op in type.options">
                    {{ op.name }}
                  </template>
                </template>
              </span>
            </p>
          </div>

          <!-- total price -->
          <p
            class="flex justify-between px-3 pt-6 pb-1 mt-6 text-gray-800 capitalize border-t border-gray-200"
          >
            <span> {{ $t("subtotal") }}</span>
            <span> {{ order.display_price }} EGP </span>
          </p>
          <p
            class="flex justify-between px-3 py-1 mt-3 text-gray-800 capitalize"
          >
            <span>  {{ $t("vat") }} {{ order.vat.percentage }}% </span>
            <span> {{ order.vat.value }} </span>
          </p>
          <p
            class="flex justify-between px-3 py-1 mt-3 text-gray-800 capitalize"
          >
            <span>
              {{ $t("services") }} {{ order.services.percentage }}%
              <!--
                 {{ $t("services") }}
              {{
                this.$store.getters["settings/services"] &&
                order.type == "table"
                  ? this.$store.getters["settings/services"]
                  : "0"
              }}% -->
            </span>
            <span> {{ order.services.value }} </span>
          </p>
          <p
            class="flex justify-between px-3 py-1 mt-3 font-bold text-gray-800 capitalize"
          >
            <span> {{ $t("menu.total_price") }} </span>
            <span> {{ order.final_total_price }} </span>
          </p>

          <h2
            class="p-3 mt-5 font-bold text-center text-gray-700 bg-gray-100 rounded-lg"
            v-if="order.fingerprint && order.fingerprint.footprint.mobile"
          >
            {{ $t("system_data") }}
          </h2>
          <div class="px-2 mt-5">
            <p
              class="flex justify-between py-1 text-gray-800 capitalize"
              v-if="order.fingerprint && order.fingerprint.footprint.mobile"
            >
              <span> {{ $t("device") }}</span>
              <span>
                {{ order.fingerprint.footprint.device.vendor }},
                {{ order.fingerprint.footprint.device.name }}
              </span>
            </p>
            <p
              class="flex justify-between py-1 mt-3 text-gray-800 capitalize"
              v-if="order.fingerprint && order.fingerprint.browser"
            >
              <span> {{ $t("browser") }} </span>
              <span>
                {{ order.fingerprint.footprint.browser.name }},
                {{ order.fingerprint.footprint.browser.majorVersion }}
              </span>
            </p>
            <p
              class="flex justify-between py-1 mt-3 text-gray-800 capitalize"
              v-if="order.fingerprint && order.fingerprint.os"
            >
              <span> {{ $t("system") }} </span>

              <span>
                {{ order.fingerprint.footprint.os.name }},
                {{ order.fingerprint.footprint.os.version }}
              </span>
            </p>
          </div>
        </div>
      </section>
    </transition>
  </main>
</template>

<script>
export default {
  name: "ReportsSideBarOrders",
  mounted() {
    setTimeout(() => {
      this.slideOrder = true;
    }, 200);
  },
  data: () => ({
    slideOrder: false,
  }),
  destroyed() {
    this.$store.commit("orders/setData", "");
  },
  computed: {
    domain() {
      return window.location.hostname;
    },
    order() {
      return this.$store.state.orders.data;
    },
  },
};
</script>

<style >
.slide-fade-enter-active {
  transition: all 0.3s ease-out;
}
.slide-fade-leave-active {
  transition: all 0.1s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-enter,
.slide-fade-leave-to {
  transform: translateX(100px);
  /* transform: translateY(-100px); */
  opacity: 0;
}
</style>
