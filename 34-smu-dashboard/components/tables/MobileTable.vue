<template>
  <section
    class="flex flex-wrap items-center justify-between w-full px-2 py-3 -mx-6 border-t border-gray-300"
  >
    <div class="flex flex-col">
      <p class="flex items-baseline text-xl font-bold text-gray-700">
        <span class="block w-12 text-xl font-bold text-gray-700">
          #{{ table.number }}
        </span>
        <span
          class="flex items-center text-sm font-bold text-gray-600 capitalize"
          style="line-height: initial"
        >
          <span
            class="w-4 h-4 mx-1 rounded-full"
            :class="[
              table.status === 'active'
                ? 'bg-yellow-400'
                : table.status === 'reserved'
                ? 'bg-red-400'
                : 'bg-gray-400',
              { pulse: table.status === 'pending' },
            ]"
          >
          </span>
          {{ table.status }}
        </span>
      </p>
      <p class="text-xs font-bold text-gray-500">
        {{ table.updated_at.slice(0, 10) }},
        {{ table.updated_at.slice(11, 16) }}
      </p>
    </div>

    <!-- actions -->
    <div class="flex items-center">
      <!-- occupy button  -->
      <button
        v-if="table.status === 'pending'"
        @click="showConfirm = 'pending'"
        class="h-8 px-2 mx-1 text-center border border-yellow-500 rounded hover:bg-yellow-200"
      >
        <font-awesome-icon
          :icon="['fal', 'utensils']"
          class="text-yellow-500 fa-lg"
        />
        <span class="text-xs font-bold text-yellow-600">
          {{ $t("tables.occupy") }}
        </span>
      </button>

      <!-- Reserve button with popup -->
      <button
        v-if="table.status === 'free'"
        class="h-8 px-2 mx-1 text-center border border-red-500 rounded hover:bg-red-200"
        @click="showConfirm = 'reserve'"
      >
        <font-awesome-icon
          :icon="['fal', 'utensils-alt']"
          class="text-red-500 fa-lg"
        />

        <span class="text-xs font-bold text-red-600">
          {{ $t("tables.reserve") }}
        </span>
      </button>

      <!-- Free button with popup -->
      <button
        class="h-8 px-2 mx-1 text-center border border-gray-500 rounded hover:bg-gray-200"
        @click="showConfirm = 'free'"
        v-if="table.status === 'reserved' || table.status === 'active'"
      >
        <font-awesome-icon
          :icon="['fal', 'utensils']"
          class="text-gray-500 fa-lg"
        />

        <span class="text-xs font-bold text-gray-600">
          {{ $t("tables.free") }}
        </span>
      </button>

      <!-- orders button -->
      <button
        v-if="table.status === 'active'"
        @click="$store.commit('orders/openOrders', table)"
        class="relative h-8 px-2 mx-1 text-center border rounded shadow hover:bg-gray-200"
      >
        <font-awesome-icon
          :icon="['fal', 'receipt']"
          class="text-gray-500 fa-lg"
        />

        <span class="text-xs font-bold text-gray-600">
          {{
            table.orders[0]
              ? table.orders[0].items.length + " " + $t("tables.items")
              : $t("tables.no_items")
          }}
        </span>

        <span
          class="absolute top-0 right-0 w-5 h-5 -mt-3 text-xs font-bold leading-6 text-white bg-red-500 rounded-full"
          v-if="table.orders[0]"
        >
          {{ newOrders }}
        </span>
      </button>
    </div>
    <transition name="slide-fade" appear>
      <aside class="flex flex-col w-full py-2" v-if="showConfirm">
        <p class="block w-full mb-2 font-bold text-center text-gray-700">
          <span v-if="showConfirm === 'reserve'">Reserve</span>
          <span v-if="showConfirm === 'free'">Free</span>
          <span v-if="showConfirm === 'pending'">Occupy</span>
          table #{{ table.number }}, Are you sure?
        </p>

        <div class="flex items-center justify-center w-full">
          <span
            v-if="showConfirm === 'reserve'"
            class="px-2 py-1 mx-1 text-sm font-bold text-center text-white capitalize bg-red-500 rounded"
            @click="tableStatus(table.id, 'reserve')"
          >
            <font-awesome-icon
              :icon="['fas', 'utensils-alt']"
              class="mx-1 fa-lg"
            />
            Reserve
          </span>
          <span
            v-if="showConfirm === 'pending'"
            class="px-2 py-1 mx-1 text-sm font-bold text-center text-white capitalize bg-green-500 rounded"
            @click="tableStatus(table.id, 'active')"
          >
            <font-awesome-icon :icon="['fas', 'utensils']" class="mx-1 fa-lg" />
            Occupy
          </span>
          <span
            v-if="showConfirm === 'free' || showConfirm === 'pending'"
            class="px-2 py-1 mx-1 text-sm font-bold text-center text-white capitalize bg-gray-600 rounded"
            @click="tableStatus(table.id, 'free')"
          >
            <font-awesome-icon :icon="['fas', 'utensils']" class="mx-1 fa-lg" />
            free
          </span>

          <span
            class="px-2 py-1 mx-1 text-sm font-bold text-center text-gray-600 capitalize border rounded"
            @click="showConfirm = ''"
          >
            Close
          </span>
        </div>
      </aside>
    </transition>
  </section>
</template>

<script>
import Order from "~/components/orders/Order";

export default {
  name: "Table",
  props: ["table"],
  data() {
    return {
      isDisabled: false,
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
      showConfirm: false,
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

      this.$axios
        .$patch("/tables/status/" + table_id, { st: st })
        .then(() => {
          this.$axios.$get("/tables").then((tables) => {
            this.$parent.tables = tables.data;
            this.showConfirm = "";
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
        .then((response) => {
          // handle success
          // console.log(response);
        })
        .then(() => {
          this.$axios.$get("/tables").then((table) => {
            this.$parent.tables = table.data;
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

      /*const modal = document.getElementById("modalInvoice")
			const cloned = modal.cloneNode(true)
			let section = document.getElementById("print")

			if (!section) {
				section  = document.createElement("div")
				section.id = "print"
				document.body.appendChild(section)
			}

			section.innerHTML = "";
			section.appendChild(cloned);
			window.print()*/
    },
  },
};
</script>

<style scoped>
.pulse {
  /* animation-name: color;
   animation-duration: 2s;
   animation-iteration-count: infinite;
   transition: animation 2s ease; */

  -webkit-animation: color 0.5s ease-in-out infinite alternate;
  -moz-animation: color 0.5s ease-in-out infinite alternate;
  animation: color 0.5s ease-in-out infinite alternate;
  animation-name: color;
}

.trigger {
  display: inline !important;
}

@keyframes color {
  from {
    box-shadow: none;
    @apply bg-green-300 border-opacity-100;
  }
  to {
    box-shadow: 0px 0px 5px 10px rgb(174, 255, 174);
    @apply bg-green-500 border-opacity-100;
  }
}
</style>
