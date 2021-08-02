<template>
  <section>
    <div
      class="fixed top-0 left-0 z-40 w-full h-full bg-black opacity-75"
      @click="$store.commit('orders/storeActiveGeneralOrder', null)"
    ></div>
    <transition name="slide-fade">
      <section
        class="fixed top-0 z-50 w-4/5 h-screen max-h-full p-3 overflow-hidden bg-white rounded xl:w-2/5 lg:w-3/4 edit"
        :class="$store.state.lang.rtl ? 'left-0' : 'right-0'"
        v-if="slideEdit"
      >
        <div class="flex items-center justify-between mb-3 text-black">
          <aside class="flex items-center text-lg">
            <font-awesome-icon class="mx-1" :icon="['fas', 'utensils-alt']" />

            {{ $t("orders.order") }}

            <span class="mx-1 font-bold text-red-500">
              #{{ order.pincode }} {{ order.type }}
            </span>
          </aside>
          <button
            class="w-8 h-8 rounded hover:bg-gray-300"
            @click="$store.commit('orders/storeActiveGeneralOrder', null)"
          >
            X
          </button>
        </div>
        <p class="text-center text-gray-500" v-if="!table">
          {{ $t("menu.no_orders") }} ...
        </p>

        <!-- orders list  -->
        <div
          class="flex flex-col w-full text-white rounded edit-body"
          v-if="order.items.length && !receipt"
        >
          <aside class="overflow-auto orders-wrapper">
            <div
              v-for="(item, i) in order.items"
              :key="'item-' + i"
              class="text-black shadow-md"
            >
              <OrderInSidebar :item="item" :price="true" />
            </div>
          </aside>

          <!-- add item button -->
          <div class="w-full text-center">
            <button
              class="w-full max-w-sm px-2 py-3 my-1 font-bold bg-green-500 rounded shadow-md hover:bg-green-400"
              @click="
                $store.commit('orders/closeOrders');
                $store.commit('modal/set', [
                  'addNewItem',
                  null,
                  $t('add'),
                  null,
                ]);
              "
            >
              <font-awesome-icon class="mx-1" :icon="['fas', 'plus']" />
              {{ $t("add_item") }}
            </button>
          </div>

          <table
            class="w-full px-2 py-3 my-1 text-sm font-bold text-gray-800 border border-collapse border-gray-700 rounded shadow-md"
          >
            <tr>
              <th>
                {{ $t("menu.total_price") }}
              </th>
              <th>{{ order.display_price }}</th>
            </tr>

            <tr class="border border-gray-700">
              <th>
                {{ $t("orders.services") }}:
                {{ order.type == "table" ? order.services.percentage : "0" }}%
              </th>
              <th>
                {{ order.services.value }}
              </th>
            </tr>
            <tr class="border border-gray-700">
              <th>{{ $t("orders.tax") }}: {{ order.vat.percentage }}%</th>
              <th>{{ order.vat.value }}</th>
            </tr>
            <tr>
              <th>
                {{ $t("menu.total_price") }}
              </th>
              <th>
                {{ order.final_total_price }}
              </th>
            </tr>
          </table>

          <div class="relative flex">
            <button
              disabled
              v-if="loader === 'paid'"
              class="inline-block px-10 py-2 mx-auto mt-4 text-sm tracking-wide uppercase bg-gray-500 rounded shadow"
            >
              <font-awesome-icon :icon="['fad', 'spinner']" class="fa-spin" />
            </button>
            <button
              class="inline-block px-10 py-2 mx-auto mt-4 text-sm tracking-wide uppercase bg-blue-500 rounded shadow hover:bg-blue-400"
              @click="setOrder(true), (loader = 'paid')"
              v-else
            >
              {{ $t("set_paid_order") }}
            </button>

            <button
              disabled
              v-if="loader === 'notpaid'"
              class="inline-block px-10 py-2 mx-auto mt-4 text-sm tracking-wide uppercase bg-gray-500 rounded shadow"
            >
              <font-awesome-icon :icon="['fad', 'spinner']" class="fa-spin" />
            </button>

            <button
              v-else
              class="inline-block px-10 py-2 mx-auto mt-4 text-sm tracking-wide uppercase bg-blue-500 rounded shadow hover:bg-blue-400"
              @click="setOrder(false), (loader = 'notpaid')"
            >
              {{ $t("set_paid_not_order") }}
            </button>
          </div>
        </div>
      </section>
    </transition>
  </section>
</template>

<script>
import OrderInSidebar from "~/components/orders/OrderInSidebar";
export default {
  name: "SideBarOrders",
  components: { OrderInSidebar },
  fetch() {
    setTimeout(() => {
      this.slideEdit = true;
    }, 200);
  },
  data: () => ({
    slideEdit: false,
    paymentWindow: false,
    receipt: false,
    loader: false,
  }),

  methods: {
    storePaymentType(type) {
      this.paymentWindow = false;
      this.receipt = true;
      this.$store.commit("settings/storePaymentType", type);
    },
    print() {
      var mywindow = window.open("", "PRINT", "height=400,width=600");
      mywindow.document.write(
        "<html><head> <link href='https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' rel='stylesheet'>"
      );
      // mywindow.document.write(
      //   `</head><body style="max-width: 450px;margin: auto;" >`
      // );
      mywindow.document.write(`</head><body>`);
      mywindow.document.write(document.getElementById("receipt").innerHTML);
      mywindow.document.write("</body></html>");

      mywindow.document.close(); // necessary for IE >= 10
      mywindow.focus(); // necessary for IE >= 10*/

      mywindow.print();
    },

    setOrder(payment) {
      this.$axios
        .$post("/pickup/accept", {
          pincode: this.order.pincode,
          payment_status: payment,
        })
        .then((response) => {
          this.$store.commit("orders/storeActiveGeneralOrder", null);
          this.$parent.getGeneralOrders();
          this.loader = false;
          // handle success
        })
        .catch((e) => {
          this.$store.dispatch("noti/pushError", {
            body: e.response.data.data.message,
          });
        });
    },
  },
  computed: {
    table() {
      if (this.$store.state.orders.activeGeneralOrder) {
        const table = {
          ...this.$store.state.orders.activeGeneralOrder.table,
        };
        return table;
      }
      return [];
    },
    order() {
      if (this.$store.state.orders.activeGeneralOrder) {
        const order = {
          ...this.$store.state.orders.activeGeneralOrder,
        };
        return order;
      }
      return [];
    },
    domain() {
      return window.location.hostname;
    },
  },
};
</script>

<style>
.orders-wrapper::-webkit-scrollbar {
  width: 4px;
}
.orders-wrapper {
  /* max-height: 300px; */
  height: 100%;
}
.edit-body {
  height: calc(100% - 45px);
}
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
