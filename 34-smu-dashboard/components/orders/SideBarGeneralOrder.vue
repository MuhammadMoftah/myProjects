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

            <span class="mx-1 font-bold text-red-500"> #{{ order.id }} </span>
            <span class="mx-1" v-if="order.type == 'table'">
              <span>{{ $t("tables.table") }}</span>
              <span class="font-bold text-red-500">
                #{{ order.table.number }}</span
              >
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
              <OrderInSidebar
                :item="item"
                :price="true"
                :orderPaid="order.payment_status"
              />
            </div>
          </aside>

          <!-- add item button -->
          <div class="w-full text-center" v-if="order.payment_status != true">
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
            <!-- Payment Types -->
            <transition name="slide-fade">
              <div
                class="absolute top-0 left-0 w-full p-3 -mt-24 bg-white border rounded shadow paytype"
                v-if="paymentWindow"
              >
                <div class="flex justify-between pb-3">
                  <p class="text-sm font-bold text-gray-800">
                    <font-awesome-icon
                      class="mx-1"
                      :icon="['fas', 'money-bill-wave']"
                    />
                    {{ $t("orders.choose_pay") }}
                  </p>
                  <button
                    class="w-6 h-6 text-white bg-gray-600 rounded-full"
                    @click="paymentWindow = false"
                  >
                    X
                  </button>
                </div>

                <div class="flex">
                  <button
                    @click="storePaymentType('Visa')"
                    class="px-2 py-1 mx-2 my-1 text-sm font-bold text-blue-600 border border-blue-600 rounded hover:bg-blue-200"
                  >
                    <font-awesome-icon
                      class="mx-1"
                      :icon="['fas', 'credit-card']"
                    />
                    {{ $t("orders.credit") }}
                  </button>
                  <button
                    @click="storePaymentType('Cash')"
                    class="px-2 py-1 mx-2 my-1 text-sm font-bold text-blue-600 border border-blue-600 rounded hover:bg-blue-200"
                  >
                    <font-awesome-icon class="mx-1" :icon="['fas', 'coins']" />
                    {{ $t("orders.cash") }}
                  </button>
                </div>
              </div>
            </transition>
            <button
              class="inline-block px-10 py-2 mx-auto mt-4 text-sm font-bold tracking-wide uppercase bg-blue-500 rounded shadow hover:bg-blue-400"
              @click="checkIfPaid()"
            >
              {{ $t("orders.show_recipt") }}
            </button>
          </div>
        </div>
        <!-- order.payment_status -->
        <!-- Orders Receipt -->
        <transition name="slide-fade">
          <div
            class="flex flex-col w-full p-4 m-2 text-white rounded edit-body"
            v-if="order.items.length && receipt"
          >
            <aside
              id="receipt"
              class="w-full mx-auto overflow-auto bg-white rounded orders-wrapper"
              style="max-width: 450px"
            >
              <div class="py-2 mx-auto my-2 text-sm text-center text-black">
                <img
                  v-if="this.$store.getters['settings/logo'].length"
                  :src="this.$store.getters['settings/logo']"
                  class="w-full mx-auto mb-3"
                  style="max-width: 100px; max-height: 150px"
                  alt="logo"
                />

                <p class="font-bold">
                  {{ this.$store.getters["settings/title"] }}
                </p>
                <p>Order#: {{ order.id }}</p>

                <p>Date {{ order.created_at.slice(0, 10) }}</p>
                <p>Time {{ order.created_at.slice(11, 16) }}</p>
                <p>{{ domain }}</p>
              </div>

              <div
                v-if="order.address"
                class="flex justify-between px-2 mb-2 text-sm font-bold text-gray-800"
              >
                <span>Address: &nbsp; </span>
                <span class="capitalize">
                  {{ order.address.number }} {{ order.address.street }} st,
                  {{ order.address.city }}, {{ order.address.country }}
                </span>
              </div>

              <div
                v-for="(item, i) in order.items"
                :key="'item-' + i"
                class="text-black rounded"
              >
                <section
                  class="px-2 pt-1 my-1 border-t border-gray-300 shadow-none rounded-0"
                  v-if="item.status !== 'cancelled'"
                >
                  <div
                    class="flex justify-between py-0 my-0 font-bold text-black border-0"
                  >
                    <span class="text-xs font-bold">
                      {{ item.product.quantity }} X
                      {{ item.product.name }}
                    </span>
                    <span class="text-xs font-bold text-gray-800">
                      {{ item.product.display_price }}
                    </span>
                  </div>

                  <div
                    v-if="item.product.product_variation.length"
                    class="py-0"
                  >
                    <div
                      width="100"
                      class="my-0 text-xs font-gray-800"
                      v-for="options in item.product.product_variation"
                      :key="options.id"
                    >
                      <span class="m-0 text-gray-800"
                        >{{ options.name }}:
                        <span
                          v-for="op in options.options"
                          :key="op.id"
                          class="mx-1"
                        >
                          {{ op.name }}
                        </span>
                      </span>
                    </div>
                  </div>
                </section>
              </div>

              <!-- price details-->
              <div
                class="px-2 py-4 my-4 text-sm text-black border-t border-gray-600"
              >
                <p class="flex justify-between my-1 font-bold">
                  <span>Payment type</span>
                  <span>{{ this.$store.getters["settings/paymentType"] }}</span>
                </p>
                <p class="flex justify-between my-1 font-bold">
                  <span>Subtotal</span>
                  <span>{{ order.display_price }}</span>
                </p>
                <p class="flex justify-between my-1 font-bold">
                  <span>
                    Services
                    {{ order.services.percentage }}%</span
                  >
                  <span>{{ order.services.value }}</span>
                </p>
                <p class="flex justify-between my-1 font-bold">
                  <span> Tax {{ order.vat.percentage }}%</span>
                  <span>{{ order.vat.value }}</span>
                </p>
                <p
                  class="flex justify-between pt-2 my-1 font-bold border-t-2 border-gray-600"
                >
                  <span>Total</span>
                  <span class="text-sm font-bold">
                    {{ order.final_total_price }}
                  </span>
                </p>
                <p class="mt-2 text-xs font-bold text-center">
                  Thank you for Choosing
                  {{ this.$store.getters["settings/title"] }}
                </p>
              </div>
            </aside>
            <div class="relative flex mx-auto my-3" style="max-width: 450px">
              <button
                class="inline-block px-3 py-2 mx-auto text-xs font-bold tracking-wide uppercase bg-gray-500 rounded shadow hover:bg-gray-400"
                @click="receipt = false"
              >
                {{ $t("orders.back") }}
              </button>
              <button
                class="inline-block px-3 py-2 mx-2 text-xs font-bold tracking-wide uppercase bg-blue-500 rounded shadow hover:bg-blue-400"
                @click="print()"
              >
                {{ $t("orders.print") }}
              </button>

              <button
                class="inline-block px-3 mx-auto text-xs font-bold tracking-wide uppercase rounded shadow"
                @click="payOrder()"
                :class="
                  loader === 'finish'
                    ? 'bg-gray-200 hover:bg-gray-200 '
                    : 'bg-red-500 hover:bg-red-400'
                "
              >
                {{ $t("orders.finish_order") }}

                <font-awesome-icon
                  v-if="loader === 'finish'"
                  :icon="['fad', 'spinner']"
                  class="fa-spin"
                />
              </button>
            </div>
          </div>
        </transition>
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
    payOrder() {
      this.loader = "finish";
      this.$axios
        .$post("/orders/payment", {
          order_id: this.order.id,
        })
        .then((response) => {
          if (this.$store.state.orders.activeGeneralOrder.id) {
            this.$parent.getGeneralOrders();
            this.loader = false;
            this.$store.commit("orders/storeActiveGeneralOrder", null);
          } else {
            this.$parent.updateTable();
            this.$store.dispatch("orders/closeOrders");
            this.loader = false;
          }
        })
        .catch((e) => {
          this.$store.dispatch("noti/pushError", {
            body: e.response.data.data.message,
          });
        });
    },
    checkIfPaid() {
      if (this.order.payment_status) {
        this.storePaymentType("Cash");
      } else {
        this.paymentWindow = !this.paymentWindow;
      }
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