<template>
  <section class="w-full h-screen p-4 overflow-auto">
    <div
      class="relative inline-block w-full h-10 mx-2 mb-3 align-top md:w-1/4"
      @mouseleave="kitchensMenu = false"
    >
      <div
        class="flex items-center justify-between w-full h-12 px-4 text-xl text-gray-600 capitalize border rounded-lg shadow cursor-pointer hover:bg-gray-100"
        @click="kitchensMenu = !kitchensMenu"
      >
        <span>
          <font-awesome-icon
            :icon="['fal', 'utensils']"
            class="mx-1 transition-transform duration-200 transform fa-md"
          />
          {{ kitchenName }}
        </span>
        <font-awesome-icon
          :icon="['fas', 'angle-down']"
          class="transition-transform duration-200 transform"
          :class="{ 'rotate-180': kitchensMenu }"
        />
      </div>

      <transition
        enter-active-class="transition duration-300 ease-out transform"
        enter-class="scale-95 -translate-y-3 opacity-0"
        enter-to-class="scale-100 translate-y-0 opacity-100"
        leave-active-class="transform "
        leave-class="translate-y-0 opacity-100"
        leave-to-class="-translate-y-3 opacity-0"
      >
        <div
          v-show="kitchensMenu"
          class="absolute top-0 z-20 w-full pt-2 mt-8 text-center"
        >
          <div
            class="relative bg-white border border-gray-200 rounded-md shadow-xl"
          >
            <div class="relative">
              <button
                @click="getKitchenOrders('all', 'All')"
                class="block w-full px-4 py-2 text-sm font-semibold bg-transparent border-t md:mt-0 hover:text-gray-800 focus:text-gray-800 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
              >
                All
              </button>
              <button
                v-for="kitchen in kitchens.data"
                :key="kitchen.id"
                @click="getKitchenOrders(kitchen.id, kitchen.name)"
                class="block w-full px-4 py-2 text-sm font-semibold bg-transparent border-t md:mt-0 hover:text-gray-800 focus:text-gray-800 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
              >
                {{ kitchen.name }}
              </button>
            </div>
          </div>
        </div>
      </transition>
    </div>

    <main class="flex flex-wrap">
      <section
        class="flex flex-col w-full my-2 overflow-auto bg-gray-100 rounded shadow-md orders-row md:w-1/2 xl:w-1/3"
      >
        <h1 class="py-2 font-bold text-center border">
          <font-awesome-icon :icon="['fad', 'receipt']" class="" />
          {{ $t("orders.new") }}
        </h1>
        <GroupedOrders :orders="orders.data" status="new" />
      </section>

      <section
        class="flex flex-col w-full my-2 overflow-auto bg-gray-100 rounded shadow-md orders-row md:w-1/2 xl:w-1/3"
      >
        <h1 class="py-2 font-bold text-center border">
          <font-awesome-icon :icon="['fad', 'hat-chef']" class="" />
          {{ $t("orders.being_cooked") }}
        </h1>
        <GroupedOrders :orders="orders.data" status="Being cooked." />
      </section>

      <section
        class="flex flex-col w-full my-2 overflow-auto bg-gray-100 rounded shadow-md orders-row md:w-1/2 xl:w-1/3"
      >
        <h1 class="py-2 font-bold text-center border">
          <font-awesome-icon :icon="['fad', 'soup']" class="" />
          {{ $t("orders.ready") }}
        </h1>
        <GroupedOrders :orders="orders.data" status="ready" />
      </section>

      <!-- Disabled for now (Do not Delete!)  -->
      <!-- <section class="flex flex-col w-1/4 mr-2 bg-gray-100 rounded">
				<h1 class="py-2 font-bold text-center border-b">
					<font-awesome-icon
						:icon="['fad', 'person-carry']"
						class=""
					/>
					Delivered
				</h1>
				<GroupedOrders :orders="orders.data" status="delivered" />
			</section> -->
    </main>

    <!--  Notificatoin -->
    <transition name="fade">
      <ErrorNoti v-if="$store.state.noti.show" />
    </transition>
  </section>
</template>

<script>
import GroupedOrders from "~/components/orders/kitchen/GroupedOrders";

export default {
  name: "kitchen",
  middleware: ["redirectIfGuest"],
  data() {
    return {
      kitchensMenu: false,
      kitchenName: "All",
      orders: [],
      tags: [],
      selectedKitchen: 1,
      kitchens: [],
    };
  },
  components: {
    GroupedOrders,
  },
  async fetch() {
    // set route name
    this.$store.commit("locales/setRouteName", "kitchen");
    // this.tags = await this.$axios.$get("/tags");
    this.kitchens = await this.$axios.$get("kitchens");
    this.orders = await this.$axios.$get(`/kitchens/?all=true`);
    this.subscribe();
  },
  fetchOnServer: false,
  activated() {
    this.$fetch();
  },
  mounted() {},
  beforeRouteLeave(to, from, next) {
    // this.pusherChannel.unsubscribe("order.created");
    this.pusherChannel.unbind();
    next();
  },
  methods: {
    subscribe() {
      this.pusherChannel.bind("order.created", (data) => {
        this.updateOrder(data.table.id, data.order);
      });
    },
    async updateOrder($id, payload) {
      const sound = new Audio(
        "https://smu-prod-app.ams3.digitaloceanspaces.com/sounds/notification1.mp3"
      );
      this.orders = await this.$axios.$get(`/kitchens/?all=true`);
      this.$store.dispatch("noti/pushTableNoti", {
        head: " ",
        body:
          " On Table " + $id + " has update the order with id " + payload.id,
      });
      sound.play();
    },
    getKitchenOrders(kitchen, name) {
      this.selectedKitchen = kitchen;
      this.kitchenName = name;
      if (kitchen == "all") {
        this.$axios.$get(`/kitchens?all=true`).then((res) => {
          this.orders = res;
        });
      } else {
        this.$axios.$get(`/kitchens/${this.selectedKitchen}`).then((res) => {
          this.orders = res;
        });
      }
    },
  },
};
</script>

<style>
.orders-row {
  height: calc(100vh - 150px);
}
.orders-row::-webkit-scrollbar {
  width: 5px;
}
</style>
