<template>
   <q-page>
      <MainHeader :title="'All Tables'" />
      <section
         class="q-mb-md rounded q-py-sm bg-white q-mx-auto"
         style="max-width: 400px"
      >
         <div class="q-my-xs">
            <span
               class="q-mx-xs inline-block bg-grey-3 rounded-full"
               style="
                  width: 17px;
                  height: 17px;
                  vertical-align: sub;
                  border: 2px dotted grey;
               "
            ></span>
            <span class="text-bold text-grey-8"> 42 Free table </span>
         </div>
         <div class="q-my-xs">
            <span
               class="q-mx-xs inline-block bg-orange-2 rounded-full"
               style="
                  width: 17px;
                  height: 17px;
                  vertical-align: sub;
                  border: 2px dotted orange;
               "
            ></span>
            <span class="text-bold text-grey-8"> 7 Active Table </span>
         </div>

         <div class="q-my-xs">
            <span
               class="q-mx-xs inline-block bg-green-2 rounded-full"
               style="
                  width: 17px;
                  height: 17px;
                  vertical-align: sub;
                  border: 2px dotted green;
               "
            ></span>

            <span class="text-bold text-grey-8">9 Waiting to occupy</span>
         </div>

         <div class="q-my-xs">
            <span
               class="q-mx-xs inline-block bg-red-2 rounded-full"
               style="
                  width: 17px;
                  height: 17px;
                  vertical-align: sub;
                  border: 2px dotted red;
               "
            ></span>
            <span class="text-bold text-grey-8"> 7 Reserved Table </span>
         </div>
      </section>

      <div class="flex justify-center">
         <Table
            @click.native="setActiveTable(table)"
            v-for="table in tables"
            :key="table.id"
            :table="table"
         />
      </div>

      <!-- table actions -->
      <q-dialog v-model="tableActions" position="bottom">
         <q-card class="bg-grey-2">
            <div class="text-h6 q-mt-md q-px-md">
               Table {{ activeTable.number }}

               <p
                  class="text-subtitle2 text-bold text-capitalize q-px-xs no-margin"
                  :class="
                     activeTable.status == 'free'
                        ? 'text-grey-7'
                        : activeTable.status == 'pending'
                        ? 'text-green-6'
                        : activeTable.status == 'reserved'
                        ? 'text-red-6'
                        : 'text-orange-7'
                  "
               >
                  {{ activeTable.status }}
               </p>

               <span
                  class="absolute-right q-mx-md text-subtitle2 text-grey-8"
                  style="top: 19px"
                  v-if="activeTable.orders"
               >
                  {{
                     activeTable.orders[0]
                        ? activeTable.orders[0].items.length + " Orders"
                        : "No Orders"
                  }}
               </span>
            </div>

            <q-card-section class="flex justify-center">
               <q-btn
                  color="grey-7"
                  flat
                  icon="fastfood"
                  class="q-ma-xs text-center"
                  label="Free"
                  style="width: 100%"
                  v-if="activeTable.status !== 'free'"
                  @click="ensureDialog('free')"
               />
               <q-btn
                  color="primary"
                  style="width: 100%"
                  class="q-ma-xs"
                  flat
                  icon="no_food"
                  label="Reserve"
                  v-if="activeTable.status === 'free'"
                  @click="tableStatus(activeTable.id, 'reserved')"
               />
               <q-btn
                  color="orange-6"
                  style="width: 100%"
                  class="q-ma-xs"
                  flat
                  icon="fastfood"
                  label="Occupy"
                  v-if="activeTable.status === 'pending'"
                  @click="tableStatus(activeTable.id, 'active')"
               />
               <q-btn
                  color="blue-6"
                  style="width: 100%"
                  class="q-mb-xs"
                  flat
                  icon="info"
                  label="Table Details"
                  :to="'/tables/' + activeTable.id"
               />
            </q-card-section>
         </q-card>
      </q-dialog>
   </q-page>
</template>

<script>
import Table from "components/tables/Table";
import MainHeader from "components/MainHeader";

export default {
   components: { Table, MainHeader },
   name: "PageIndex",

   mounted() {
      this.getTables();
   },

   data() {
      return {
         tables: [],
         tableActions: false,
      };
   },
   computed: {
      activeTable({ $store }) {
         const table = $store.state.tables.activeTable;
         return table;
      },
   },
   methods: {
      getTables() {
         this.$axios.get("/tables").then((res) => {
            this.tables = res.data.data;
         });
      },
      setActiveTable(table) {
         this.$store.commit("tables/setActiveTable", table);
         this.tableActions = true;
      },
      ensureDialog(status) {
         this.$q
            .dialog({
               title: `Free Table #${this.activeTable.number} `,
               dark: true,
               html: true,
               message: `<p class="text-red-5 text-title- text-bold">Orders in this table will be removed, continue ?</p>`,
               ok: {
                  color: "red-8",
                  label: " Free Table",
                  unelevated: true,
               },
               cancel: {
                  color: "grey-7",
                  label: "Keep",
                  unelevated: true,
               },
               persistent: true,
            })
            .onOk(() => {
               this.tableStatus(this.activeTable.id, status);
            })
            .onCancel(() => {});
      },
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
            .patch("/tables/status/" + table_id, { st: st })
            .then(() => {
               this.getTables();
               this.tableActions = false;
            })
            .catch((err) => {
               for (const error in err.response.data.errors) {
                  this.$q.notify({
                     message: err.response.data?.errors[error][0],
                  });
               }
            });
      },
   },
};
</script>
