<template>
  <div
    class="relative grid w-56 h-56 grid-flow-col grid-rows-2 gap-4 p-2 m-2 border-4 border-teal-400 border-opacity-0 rounded"
    :class="[
      table.status === 'active' || table.status === 'pending_occupation'
        ? 'bg-yellow-200'
        : table.status === 'reserved'
        ? 'bg-red-300'
        : 'bg-gray-200',
      { pulse: table.status === 'pending' },
    ]"
  >
    <div
      class="w-full px-2 text-5xl font-bold"
      :class="[
        table.status === 'active' || table.status === 'pending_occupation'
          ? 'text-yellow-700'
          : table.status === 'reserved'
          ? 'text-red-700'
          : 'text-gray-700',
      ]"
    >
      {{ table.number }}
    </div>

    <v-popover
      placement="right"
      offset="-100"
      v-if="table.status === 'pending'"
      ref="occupy"
    >
      <button
        v-if="table.status === 'pending'"
        @click="isDisabled = false"
        class="relative flex flex-col items-center justify-center w-full h-full px-2 text-sm bg-white rounded shadow-md hover:bg-yellow-200"
      >
        <font-awesome-icon
          :icon="['fal', 'utensils']"
          class="mb-2 text-yellow-500 fa-lg"
        />
        {{ $t("tables.occupy") }}
      </button>

      <!-- This will be the content of the popover -->
      <template slot="popover">
        <section class="flex">
          <div class="w-full p-4 text-white bg-gray-700 rounded shadow-2xl">
            <button
              class="block w-full px-2 py-1 mx-auto text-sm tracking-wide capitalize bg-blue-500 rounded shadow hover:bg-blue-600"
              @click="$refs.occupy.hide(), tableStatus(table.id, 'free')"
            >
              {{ $t("tables.free_table") }}
            </button>
            <button
              class="block w-full px-2 py-1 mx-auto mt-4 text-sm tracking-wide capitalize bg-orange-500 rounded shadow hover:bg-orange-600"
              @click="$refs.occupy.hide(), tableStatus(table.id, 'active')"
            >
              {{ $t("tables.occupied") }}
            </button>
          </div>
        </section>
      </template>
    </v-popover>

    <div
      v-if="table.status === 'free'"
      class="flex flex-col items-center justify-center w-full px-2 text-sm text-center bg-gray-100 rounded"
    >
      <font-awesome-icon
        :icon="['fal', 'utensils']"
        class="mb-2 text-gray-500 fa-lg"
      />
      {{ $t("tables.table_free") }}
    </div>

    <!-- OCCUPIED status and date  -->
    <div
      v-if="table.status === 'active' || table.status === 'pending_occupation'"
      class="w-full h-full p-2"
    >
      <p
        class="self-end text-sm font-bold tracking-wide text-yellow-700 uppercase"
      >
        {{ $t("tables.occupied") }}
        <small class="block font-nomal" v-if="table.updated_at">
          {{ table.updated_at.slice(0, 10) }}
        </small>

        <small class="block font-nomal" v-if="table.updated_at">
          {{ table.updated_at.slice(11, 16) }}
        </small>
      </p>
    </div>

    <!-- Reserve button with popup -->
    <v-popover
      offset="-160"
      placement="right"
      v-if="table.status === 'free'"
      ref="reserve"
    >
      <!-- This will be the popover target (for the events and position) -->
      <button
        v-if="table.status === 'free'"
        class="flex flex-col items-center justify-center w-full h-full px-2 text-sm bg-white rounded shadow-md hover:bg-red-200"
      >
        <font-awesome-icon
          :icon="['fal', 'utensils-alt']"
          class="mb-2 text-red-500 fa-lg"
        />
        {{ $t("tables.reserve") }}
      </button>

      <!-- This will be the content of the popover -->
      <template slot="popover">
        <section class="flex max-w-2xl">
          <div
            class="w-full px-6 py-3 text-white bg-gray-700 rounded shadow-2xl"
          >
            <span class="p-0 m-0 text-red-400">{{
              $t("tables.reserve_table")
            }}</span>
            <p class="w-full text-center">
              {{ $t("tables.are_you_sure") }}
            </p>

            <div class="flex">
              <button
                class="w-16 px-2 py-1 mx-auto my-2 text-sm tracking-wide uppercase bg-green-500 rounded shadow"
                @click="$refs.reserve.hide(), tableStatus(table.id, 'reserved')"
              >
                {{ $t("tables.yes") }}
              </button>
            </div>
          </div>
        </section>
      </template>
    </v-popover>

    <!-- Reserve status and date  -->
    <div v-if="table.status === 'reserved'" class="w-full h-full">
      <p class="text-sm font-bold text-red-700 uppercase">
        {{ $t("tables.reserve") }}
      </p>
      <!-- <small class="text-sm text-red-700 font-nomal">18:00 - 20:00</small> -->
    </div>

    <!-- Free button with popup -->
    <v-popover
      ref="free"
      offset="-160"
      placement="right"
      v-if="
        table.status === 'reserved' ||
        table.status === 'active' ||
        table.status === 'pending_occupation'
      "
    >
      <!-- This will be the popover target (for the events and position) -->
      <button
        class="flex flex-col items-center justify-center w-full h-full p-3 px-2 text-sm bg-white rounded shadow-md hover:bg-yellow-200"
      >
        <font-awesome-icon
          :icon="['fal', 'utensils']"
          class="mb-2 text-yellow-500 fa-lg"
        />
        {{ $t("tables.free") }}
      </button>

      <!-- This will be the content of the popover -->
      <template slot="popover">
        <section class="flex max-w-2xl">
          <div
            class="w-full px-6 py-3 text-white bg-gray-700 rounded shadow-2xl"
          >
            <span class="p-0 m-0 text-orange-400">{{
              $t("tables.free_table")
            }}</span>
            <p class="w-full text-center">
              {{ $t("tables.are_you_sure") }}
            </p>

            <div class="flex">
              <button
                class="inline-block w-16 px-2 py-1 mx-auto my-2 text-sm font-bold tracking-wide uppercase bg-green-500 rounded shadow"
                @click="setTableFree()"
              >
                {{ $t("tables.yes") }}
              </button>
            </div>
          </div>
        </section>
      </template>
    </v-popover>

    <div
      v-if="table.status === 'free' || table.status === 'pending'"
      class="flex flex-col items-center justify-center w-full px-2 text-sm text-center bg-gray-100 rounded"
    >
      <font-awesome-icon
        :icon="['fal', 'receipt']"
        class="mb-2 text-gray-500 fa-lg"
      />
      {{ $t("tables.no_orders") }}
    </div>

    <button
      v-if="table.status === 'active' || table.status === 'pending_occupation'"
      @click="$store.commit('orders/openOrders', table)"
      class="relative flex flex-col items-center justify-center w-full h-full px-2 text-sm font-bold text-gray-600 capitalize bg-white rounded shadow-md hover:bg-gray-100"
    >
      <font-awesome-icon :icon="['fal', 'receipt']" class="mb-1 fa-lg" />
      {{
        table.orders[0]
          ? table.orders[0].items.length + " " + $t("tables.items")
          : $t("tables.no_items")
      }}
      <span
        class="absolute top-0 right-0 px-2 py-1 text-sm font-bold text-white bg-red-500 rounded"
        v-if="table.orders[0]"
      >
        {{ newOrders }}
      </span>
    </button>

    <!-- this popover  removed -->
    <v-popover offset="-160" placement="right" ref="order" v-if="false">
      <!-- This will be the popover target (for the events and position) -->
      <button
        v-if="
          table.status === 'active' || table.status === 'pending_occupation'
        "
        @click="$store.commit('orders/openOrders', table)"
        class="relative flex flex-col items-center justify-center w-full h-full px-2 text-sm bg-white rounded shadow-md hover:bg-gray-100"
      >
        <font-awesome-icon :icon="['fal', 'receipt']" class="mb-2 fa-lg" />
        {{ $t("tables.orders") }}
        <span
          class="absolute top-0 right-0 p-1 text-xs text-white bg-red-500 rounded"
          v-if="table.orders[0]"
        >
          {{ table.orders[0].items.length }}
        </span>
      </button>

      <!-- This will be the content of the popover -->
      <template slot="popover">
        <section
          class="flex max-w-2xl"
          v-if="table.orders[0]"
          style="min-width: 330px"
        >
          <div class="w-full p-4 m-2 text-white bg-gray-700 rounded shadow-2xl">
            <span id="modalInvoice">
              <h2 class="w-full mb-4 text-xl font-bold text-center">
                <span class="font-normal">Table</span> #{{ table.id }}
              </h2>
              <aside class="overflow-auto orders-wrapper">
                <div
                  v-for="(item, i) in table.orders[0].items"
                  :key="'item-' + i"
                  class="text-black shadow-md"
                >
                  <Order :item="item" :price="true" />
                </div>
              </aside>

              <p class="w-full mt-2 text-center">
                {{ $t("tables.total_price") }}:
                <span class="font-bold">{{
                  table.orders[0].display_price
                }}</span>
              </p>
            </span>

            <div class="flex">
              <button
                class="inline-block w-16 px-2 py-1 mx-auto my-2 text-sm font-bold tracking-wide uppercase bg-green-500 rounded shadow"
                @click="$refs.order.hide(), payOrder()"
              >
                {{ $t("tables.pay") }}
              </button>
              <button
                class="inline-block w-16 px-2 py-1 mx-auto my-2 text-sm font-bold tracking-wide uppercase bg-blue-500 rounded shadow"
                @click="$refs.order.hide(), print()"
              >
                {{ $t("tables.print") }}
              </button>
            </div>
          </div>
        </section>
      </template>
    </v-popover>

    <!-- cancel order modal  -->
    <Modal
      max_width="800"
      v-if="$store.state.modal.show === 'cancelTable' + table.id"
    >
      <!-- header -->
      <template slot="modal-header">
        <span class="px-1 py-1 font-bold text-gray-700">
          {{ $t("tables.table") }} #{{ table.number }}
        </span>
      </template>

      <section>
        {{ $t("tables.table") }} #{{ table.number }}
        {{ $t("orders.orders") }}

        <span class="font-bold text-red-500">
          {{ $t("will_be_removed") }},
        </span>
        {{ $t("tables.are_you_sure") }}

        <div class="flex my-4">
          <div class="w-1/2">
            <textarea
              class="w-full p-3 text-sm text-gray-600 border rounded resize-none focus:outline-none"
              rows="5"
              v-model="cancelReason"
            ></textarea>
          </div>
          <div class="w-1/2 px-3">
            <button
              class="w-full py-3 my-1 text-sm text-gray-600 capitalize truncate rounded shadow-sm cursor-pointer hover:bg-gray-200"
              @click="cancelReason = $t('not_paid_reason')"
            >
              {{ $t("not_paid_reason") }}
            </button>

            <button
              class="w-full py-3 my-1 text-sm text-gray-600 capitalize truncate rounded shadow-sm cursor-pointer hover:bg-gray-200"
              @click="cancelReason = $t('customer_gone_reason')"
            >
              {{ $t("customer_gone_reason") }}
            </button>
          </div>
        </div>
      </section>

      <!-- footer -->
      <template slot="confirm-button">
        <button
          class="px-6 py-1 mx-1 text-sm text-white rounded-full"
          @click="tableStatus(table.id, 'free')"
          :class="
            !cancelReason.length
              ? 'hover:bg-gray-300 bg-gray-300 text-gray-600'
              : 'bg-red-400 hover:bg-red-500'
          "
          :disabled="!cancelReason.length"
        >
          {{ $store.state.modal.confirm_button_text }}
        </button>
      </template>
    </Modal>
  </div>
</template>

<script>
import Order from "~/components/orders/Order";

export default {
  name: "Table",
  props: ["table"],
  data() {
    return {
      isDisabled: false,
      cancelReason: "",
      order: {
        table_id: "06",
        items: [
          {
            name: "Noodles",
            amount: 2,
            prices: {
              price: 2395,
              vat: 21,
            },
            status: "Being cooked",
            type: "",
          },
        ],
      },
    };
  },
  components: {
    Order,
  },
  computed: {
    newOrders() {
      const items = this.table.orders[0].items;
      if (!items) {
        return 0;
      }
      let length = 0;
      for (let item in items) {
        if (items[item].status == "new") {
          length++;
        }
      }
      return length;
    },
  },
  methods: {
    tableStatus(table_id, status) {
      var st;
      if (status == "active") {
        st = 313;
      } else if (status == "free") {
        st = 300;
      } else if (status == "reserved") {
        st = 312;
      }
      const payload = { st: st };

      if (st === 300 && this.table.orders.length) {
        payload.note = this.cancelReason;
      }

      this.$axios
        .$patch("/tables/status/" + table_id, payload)
        .then(() => {
          this.$axios.$get("/tables").then((tables) => {
            this.$parent.tables = tables.data;
            this.$parent.table_statuses = tables.table_statuses;
            this.$store.commit("modal/set", []);
          });
        })
        .catch((e) => {
          this.$store.dispatch("noti/pushError", {
            body: e.response.data.data.message,
          });
        });
    },
    payOrder() {
      this.$axios
        .$post("/tables/" + this.table.id + "/pay_order")
        .then(() => {
          this.$axios.$get("/tables").then((tables) => {
            this.$parent.tables = tables.data;
            this.$parent.table_statuses = tables.table_statuses;
          });
        })
        .catch((e) => {
          this.$store.dispatch("noti/pushError", {
            body: e.response.data.data.message,
          });
        });
    },
    print() {
      var mywindow = window.open("", "PRINT", "height=600,width=300");

      mywindow.document.write(
        document.getElementById("modalInvoice").innerHTML
      );

      mywindow.document.close(); // necessary for IE >= 10
      mywindow.focus(); // necessary for IE >= 10*/

      mywindow.print();
      mywindow.close();

      return true;
    },
    setTableFree() {
      this.$refs.free.hide();
      if (this.table.orders.length) {
        this.$store.commit("modal/set", ["cancelTable" + this.table.id]);
      } else {
        this.tableStatus(this.table.id, "free");
      }
    },
  },
};
</script>

<style>
.pulse {
  animation-name: color;
  animation-duration: 1s;
  animation-iteration-count: infinite;
  transition: animation 1s ease;
}

.trigger {
  display: inline !important;
}

@keyframes color {
  50% {
    @apply border-green-400 border-opacity-100;
  }
}
</style>
