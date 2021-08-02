<template>
  <tr class="hover:bg-gray-100" :class="isSelected ? 'bg-gray-100 ' : ''">
    <td scope="col" class="relative w-12">
      <label
        :for="order.id"
        class="absolute top-0 bottom-0 flex items-center justify-center w-full h-full cursor-pointer hover:bg-gray-100"
      >
        <input
          :id="order.id"
          type="checkbox"
          @click="selectOrder(order, $event)"
          class="cursor-pointer"
          name="ReportsTableRowChk"
        />
      </label>
    </td>

    <td class="px-6 py-4 whitespace-nowrap">
      <div class="flex items-center">
        <div class="text-sm font-bold text-gray-500">
          {{ order.id }}
        </div>
      </div>
    </td>
    <td class="px-6 py-4 text-center whitespace-nowrap">
      <div class="text-xl font-bold text-gray-700" v-if="order.table">
        {{ $t("tables.table") }} {{ order.table.number }}
      </div>
      <div
        class="p-1 mx-auto text-sm font-bold text-center text-orange-700 capitalize bg-orange-200 rounded"
        style="max-width: 180px"
        v-else-if="order.type == 'delivery'"
      >
        {{ $t("delivery") }}
      </div>
      <div
        class="p-1 mx-auto text-sm font-bold text-center text-pink-700 capitalize bg-pink-200 rounded"
        style="max-width: 180px"
        v-else
      >
        {{ $t("pickup") }}
      </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
      <div class="text-sm text-gray-900">
        {{ order.created_at.slice(0, 10) }}
      </div>
      <div class="text-sm text-gray-600">
        {{ order.created_at.slice(11, 16) }}
      </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
      <span
        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
      >
        {{ order.final_total_price }}
      </span>
    </td>
    <td class="px-6 whitespace-nowrap">
      <span
        class="flex items-center justify-center h-6 px-1 text-xs font-bold leading-5 text-center text-red-600 capitalize bg-red-200 rounded-md"
        style="max-width: 100px"
        v-if="order.status === 'cancelled'"
      >
        {{ $t("cancelled") }}
      </span>
      <span
        class="flex items-center justify-center h-6 px-1 text-xs font-bold leading-5 text-center text-green-600 capitalize bg-green-200 rounded-md"
        style="max-width: 100px"
        v-if="order.status === 'new'"
      >
        {{ $t("orders.new") }}
      </span>
      <span
        class="flex items-center justify-center h-6 px-1 text-xs font-bold leading-5 text-center text-gray-600 capitalize bg-gray-200 rounded-md"
        style="max-width: 100px"
        v-if="order.status === 'done'"
      >
        {{ $t("done") }}
      </span>
      <span
        class="flex items-center justify-center h-6 px-1 text-xs font-bold leading-5 text-center text-orange-600 capitalize bg-orange-200 rounded-md"
        style="max-width: 100px"
        v-if="order.status === 'pending'"
      >
        {{ $t("pending") }}
      </span>
    </td>
    <td>
      <ul class="flex">
        <li
          class="relative flex items-center justify-center w-8 h-8 mx-1 rounded cursor-pointer hover:bg-gray-300"
          @click="openSideBar()"
        >
          <font-awesome-icon
            :icon="['fad', 'eye']"
            class="relative text-gray-700 fa-md"
          />
        </li>
        <li
          class="relative flex items-center justify-center w-8 h-8 mx-1 rounded cursor-pointer hover:bg-gray-300"
          @click="actionsMenu = true"
          @mouseleave="actionsMenu = false"
          @keydown.enter="actionsMenu = !actionsMenu"
        >
          <font-awesome-icon
            :icon="['fas', 'ellipsis-h']"
            class="relative text-gray-700 fa-md"
          />

          <transition
            enter-active-class="transition duration-300 ease-out transform"
            enter-class="scale-95 -translate-y-3 opacity-0"
            enter-to-class="scale-100 translate-y-0 opacity-100"
            leave-active-class="transition duration-150 ease-in transform"
            leave-class="translate-y-0 opacity-100"
            leave-to-class="-translate-y-3 opacity-0"
          >
            <div
              v-show="actionsMenu"
              class="absolute top-0 z-20 text-center"
              style="min-width: 170px"
            >
              <div
                class="relative bg-white border border-gray-200 rounded-md shadow-xl"
              >
                <div class="relative">
                  <button
                    class="block w-full px-4 py-2 text-sm font-semibold text-gray-700 bg-transparent border-b md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    @click="print()"
                  >
                    <font-awesome-icon
                      :icon="['fad', 'print']"
                      class="relative mx-1"
                    />
                    {{ $t("orders.print") }}
                  </button>

                  <button
                    class="block w-full px-4 py-2 text-sm font-semibold text-gray-700 bg-transparent md:mt-0 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                    @click="createPDF(order.id)"
                  >
                    <font-awesome-icon
                      :icon="['fad', 'file-pdf']"
                      class="relative mx-1"
                    />
                    PDF
                  </button>
                </div>
              </div>
            </div>
          </transition>
        </li>
      </ul>
    </td>

    <section
      v-if="orderFullData.id"
      ref="to_print"
      class="hidden"
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
        <p>{{ $t("orders.order") }}#: {{ orderFullData.id }}</p>
        <p>{{ $t("date") }} {{ orderFullData.created_at.slice(0, 10) }}</p>
        <p>{{ $t("time") }} {{ orderFullData.created_at.slice(11, 16) }}</p>
        <p>{{ domain }}</p>
      </div>
      <div
        v-for="(item, i) in orderFullData.items"
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

          <div v-if="item.product.product_variation.length" class="py-0">
            <div
              width="100"
              class="my-0 text-xs font-gray-800"
              v-for="options in item.product.product_variation"
              :key="options.id"
            >
              <span class="m-0 text-gray-800"
                >{{ options.name }}:
                <span v-for="op in options.options" :key="op.id" class="mx-1">
                  {{ op.name }}
                </span>
              </span>
            </div>
          </div>
        </section>
      </div>

      <!-- price details-->
      <div class="px-2 py-4 my-4 text-sm text-black border-t border-gray-600">
        <p class="flex justify-between my-1 font-bold">
          <span>Payment type</span>
          <span>{{ this.$store.getters["settings/paymentType"] }}</span>
        </p>
        <p class="flex justify-between my-1 font-bold">
          <span>Subtotal</span>
          <span>{{ orderFullData.display_price }}</span>
        </p>
        <p class="flex justify-between my-1 font-bold">
          <span>
            Services
            {{ orderFullData.services.percentage }}%</span
          >
          <span>{{ orderFullData.services.value }}</span>
        </p>
        <p class="flex justify-between my-1 font-bold">
          <span>Tax {{ orderFullData.vat.percentage }}%</span>
          <span>{{ orderFullData.vat.value }}</span>
        </p>
        <p
          class="flex justify-between pt-2 my-1 font-bold border-t-2 border-gray-600"
        >
          <span>Total</span>
          <span class="text-sm font-bold">
            {{ orderFullData.final_total_price }}
          </span>
        </p>
        <p class="mt-2 text-xs font-bold text-center">
          Thank you for Choosing
          {{ this.$store.getters["settings/title"] }}
        </p>
      </div>
    </section>
  </tr>
</template>

<script>
export default {
  props: ["order"],
  data() {
    return {
      orderFullData: [],
      actionsMenu: false,
    };
  },
  methods: {
    getOrderDetails() {
      return this.$axios
        .post(`/reports/print/`, {
          orders: [this.order.id],
        })
        .then((res) => {
          this.orderFullData = res.data.data[0];
          return res;
        })
        .catch((err) => {});
    },
    openSideBar() {
      this.getOrderDetails().then((res) => {
        this.$store.commit("orders/openOrders", this.orderFullData);
      });
    },
    createPDF(id) {
      this.$axios
        .post("reports/pdf/", {
          orders: [id],
        })
        .then((res) => {
          var downloadLink = document.createElement("a");
          downloadLink.target = "_blank";
          downloadLink.download = "name_to_give_saved_file.pdf";

          // convert downloaded data to a Blob
          var blob = new Blob([res.data], {
            type: "application/pdf",
          });

          // create an object URL from the Blob
          var URL = window.URL || window.webkitURL;
          var downloadUrl = URL.createObjectURL(blob);

          // set object URL as the anchor's href
          downloadLink.href = downloadUrl;

          // append the anchor to document body
          document.body.append(downloadLink);

          // fire a click event on the anchor
          downloadLink.click();

          // cleanup: remove element and revoke object URL
          document.body.removeChild(downloadLink);
          URL.revokeObjectURL(downloadUrl);
        });
    },
    print() {
      this.getOrderDetails().then(() => {
        var mywindow = window.open("", "PRINT", "height=400,width=600");
        mywindow.document.write(
          "<html><head> <link href='https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' rel='stylesheet'>"
        );
        mywindow.document.write(`</head><body>`);
        mywindow.document.write(this.$refs.to_print.innerHTML);
        mywindow.document.write("</body></html>");

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10*/
        mywindow.onload = function () {
          mywindow.print();
        };
      });
    },

    selectOrder(order, $event) {
      let selectedOrders = [...this.$store.state.orders.selectedOrders];
      if ($event.target.checked) {
        selectedOrders.push(order.id);
      } else {
        // selectedOrders.pop(order.id);
        selectedOrders = selectedOrders.filter((el) => el !== order.id);
      }
      this.$store.commit("orders/setSelectedOrders", selectedOrders);
    },
  },
  computed: {
    isSelected() {
      let selectedOrders = [...this.$store.state.orders.selectedOrders];
      return selectedOrders.includes(this.order.id);
    },
    domain() {
      return window.location.hostname;
    },
  },
};
</script>

<style scoped>
</style>