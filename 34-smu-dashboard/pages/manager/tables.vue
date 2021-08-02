<template>
  <section class="flex flex-wrap w-full p-4 mb-48">
    <div class="flex flex-wrap items-end justify-between w-full px-2">
      <!-- tables counter  -->
      <section
        class="flex flex-wrap justify-between w-full p-2 mx-auto mb-3 font-bold text-gray-600 capitalize bg-gray-100 rounded md:w-2/3 md:mx-0"
      >
        <div class="w-1/2 my-2 xl:w-1/4">
          <span
            class="inline-block w-4 h-4 mx-2 rounded-full bg-grey-300"
            style="border: 2px dotted grey; vertical-align: sub"
          ></span>
          <span class="text-bold text-grey-8">
            {{ table_statuses.free ? table_statuses.free : 0 }}
            {{ $t("free_table") }}
          </span>
        </div>

        <div class="w-1/2 my-2 xl:w-1/4">
          <span
            class="inline-block w-4 h-4 mx-2 bg-orange-200 rounded-full"
            style="vertical-align: sub; border: 2px dotted orange"
          ></span>
          <span class="text-bold text-grey-8">
            {{ table_statuses.active ? table_statuses.active : 0 }}
            {{ $t("active_table") }}
          </span>
        </div>

        <div class="w-1/2 my-2 xl:w-1/4">
          <span
            class="inline-block w-4 h-4 mx-2 bg-green-200 rounded-full pulse-green"
            style="vertical-align: sub; border: 2px dotted green"
          ></span>

          <span class="text-bold text-grey-8">
            {{ table_statuses.pending ? table_statuses.pending : 0 }}
            {{ $t("waiting_table") }}
          </span>
        </div>

        <div class="w-1/2 my-2 xl:w-1/4">
          <span
            class="inline-block w-4 h-4 mx-2 bg-red-200 rounded-full"
            style="vertical-align: sub; border: 2px dotted red"
          ></span>
          <span class="text-bold text-grey-8">
            {{ table_statuses.reserved ? table_statuses.reserved : 0 }}
            {{ $t("reserved_table") }}
          </span>
        </div>
      </section>

      <!-- search  -->
      <div class="w-full md:w-1/4">
        <div class="relative block w-full mx-auto mb-3 text-gray-600">
          <input
            type="search"
            name="serch"
            v-model="search"
            autocomplete="off"
            :placeholder="$t('search_table_number')"
            class="w-full h-10 px-5 pr-10 text-sm bg-white border rounded-lg shadow"
          />
          <button class="absolute top-0 right-0 mt-3 mr-4">
            <svg
              class="w-4 h-4 fill-current"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              version="1.1"
              id="Capa_1"
              x="0px"
              y="0px"
              viewBox="0 0 56.966 56.966"
              style="enable-background: new 0 0 56.966 56.966"
              xml:space="preserve"
              width="512px"
              height="512px"
            >
              <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
              />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <div class="flex-wrap hidden w-full sm:flex">
      <Table :table="table" v-for="table in tables" :key="table.id" />
    </div>

    <div class="flex flex-wrap justify-center w-full sm:hidden">
      <MobileTable :table="table" v-for="table in tables" :key="table.id" />
    </div>

    <!-- Orders side bar  -->
    <transition name="fade">
      <SideBarOrders
        v-if="$store.state.orders.data && !$store.state.modal.show"
      />
    </transition>

    <!-- Edit single item in order -->
    <EditSingleOrder v-if="$store.state.modal.show" />
  </section>
</template>

<script>
import Table from "~/components/tables/Table";
import MobileTable from "~/components/tables/MobileTable";
import SideBarOrders from "~/components/products/edit/SideBarOrders";
import EditSingleOrder from "~/components/forms/EditSingleOrder";

export default {
  name: "tabels",
  middleware: ["redirectIfGuest"],

  async fetch() {
    // set route name
    this.$store.commit("locales/setRouteName", "tables.tables");
    const res = await this.$axios.$get("/tables");
    this.tables = res.data;
    this.filteredTables = res.data;
    this.table_statuses = res.table_statuses;
    this.subscribe();
  },
  fetchOnServer: false,
  activated() {
    this.$fetch();
  },
  beforeRouteLeave(to, from, next) {
    this.pusherChannel.unbind();
    next();
  },
  mounted() {},
  components: {
    Table,
    SideBarOrders,
    EditSingleOrder,
    MobileTable,
  },

  data() {
    return {
      tables: "",
      search: "",
      filteredTables: [],
      table_statuses: {},
    };
  },
  methods: {
    subscribe() {
      const sound = new Audio(
        "https://smu-prod-app.ams3.digitaloceanspaces.com/sounds/notification1.mp3"
      );
      this.pusherChannel.bind("table.scanned", (data) => {
        this.handleTableScannedEvent(data.table);
        this.$store.dispatch("noti/pushTableNoti", {
          head: "Table " + data.table.number,
          body: "has been scanned",
        });
        sound.play();
      });
      this.pusherChannel.bind("order.created", (data) => {
        this.updateTable(data.table.id, data.order);
        sound.play();
      });
    },

    async updateTable($id, payload) {
      const res = await this.$axios.$get("/tables");
      this.tables = res.data;
      this.table_statuses = res.table_statuses;
      this.$store.dispatch("noti/pushTableNoti", {
        head: " ",
        body: "New order has been added " + payload.id + " On Table " + $id,
      });
    },
    async handleTableScannedEvent(table) {
      const res = await this.$axios.$get("/tables");
      this.tables = res.data;
      this.table_statuses = res.table_statuses;
    },
  },
  watch: {
    search(v) {
      let filteredTables = [...this.filteredTables];
      if (this.search === "") {
        this.tables = [...this.filteredTables];
      } else {
        this.tables = filteredTables.filter((table) => {
          const numString = table.number.toString();
          return numString.indexOf(this.search) > -1;
        });
      }
    },
  },
};
</script>

<style scoped>
.pulse-green {
  -webkit-animation: color 0.5s ease-in-out infinite alternate;
  -moz-animation: color 0.5s ease-in-out infinite alternate;
  animation: color 0.5s ease-in-out infinite alternate;
  animation-name: color;
}

@keyframes color {
  from {
    box-shadow: none;
    @apply bg-green-300 border-opacity-100;
  }
  to {
    box-shadow: 0px 0px 4px 6px rgb(187, 245, 187);
    @apply bg-green-400 border-opacity-100;
  }
}
</style>
