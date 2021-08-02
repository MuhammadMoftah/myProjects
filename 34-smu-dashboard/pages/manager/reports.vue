<template>
   <main class="p-4 pb-32">
      <!-- charts section  -->
      <section class="flex flex-wrap">
         <div class="w-full px-5 mt-5 lg:w-1/2">
            <div class="mx-auto" style="max-width: 500px">
               <h2
                  class="py-2 mb-6 text-xl font-bold text-center text-gray-600"
               >
                  {{ $t("orders_graph") }}
               </h2>
               <LineChart
                  :chartdata="chartdata"
                  :options="options"
                  ref="chart"
               />
            </div>
         </div>

         <div class="w-full px-5 mt-5 lg:w-1/2">
            <div class="flex flex-wrap justify-between text-center">
               <h2
                  class="w-full py-2 mb-6 text-xl font-bold text-center text-gray-600"
               >
                  {{ $t("top_sold_items") }}
               </h2>
               <div class="w-8/12">
                  <PieChart :chartdata="pie_data" ref="pie_chart" />
               </div>

               <aside
                  class="flex flex-col flex-wrap w-4/12 bg-gray-200 rounded shadow-lg"
                  style="max-width: 150px"
               >
                  <p
                     v-for="(value, i) in pie_data.labels"
                     :key="i"
                     class="flex justify-between px-2 py-2 text-xs font-bold text-gray-600 border-b border-gray-400"
                  >
                     <span>{{ value }}</span>
                     <span> {{ pie_data.datasets[0].data[i] }}</span>
                  </p>
               </aside>
            </div>
         </div>
      </section>

      <hr class="my-12" />

      <!-- Reports table  -->
      <ReportsTable @sendStats="getStats" />

      <!-- sidebar order -->
      <ReportsSideBarOrders v-if="$store.state.orders.show === true" />
   </main>
</template>

<script>
import LineChart from "@/components/charts/LineChart.vue";
import PieChart from "@/components/charts/PieChart.vue";
import ReportsTable from "@/components/reports/ReportsTable.vue";
import ReportsSideBarOrders from "@/components/reports/ReportsSideBarOrders.vue";

export default {
   components: {
      LineChart,
      PieChart,
      ReportsTable,
      ReportsSideBarOrders,
   },
   fetch() {
      // set route name
      this.$store.commit("locales/setRouteName", "reports");
   },
   fetchOnServer: false,
   activated() {
      this.$fetch();
   },
   data() {
      return {
         chartdata: {
            labels: [],
            datasets: [
               {
                  label: "Cancelled Orders",
                  borderColor: "#ff7675",
                  // backgroundColor: "rgba(255, 15, 15, 0.38)",
                  data: [0, 10, 5, 2, 20, 30, 45],
               },
               {
                  label: "Finished Orders",
                  borderColor: "#2ecc71",
                  // backgroundColor: "rgba(31, 255, 15, 0.38)",
                  data: [7, 5, 4, 6, 8, 4, 12],
               },
               {
                  label: "Total Orders",
                  borderColor: "#0984e3",
                  // backgroundColor: "rgba(15, 83, 255, 0.38)",
                  data: [12, 23, 14, 2, 9, 16, 1],
               },
            ],
         },
         pie_data: {
            datasets: [
               {
                  data: [],
                  backgroundColor: [],
                  // borderColor: "#ff7675",
                  borderWidth: 1,
               },
            ],
            labels: [],
         },
         //chart options
         options: {
            responsive: true,
         },

         pie_table: {},
      };
   },

   methods: {
      getStats(stats) {
         //  console.log("stats from paretent", stats);

         // set pie chart data and colors
         this.pie_data.datasets[0].backgroundColor = stats.productPie.colors;
         this.pie_data.labels = stats.productPie.y;
         this.pie_data.datasets[0].data = stats.productPie.x;

         // set line chart data
         // cancelled
         this.chartdata.datasets[0].data =
            stats.ordersByDays.canceled.order_count;
         // finished
         this.chartdata.datasets[1].data = stats.ordersByDays.done.order_count;
         // total
         this.chartdata.datasets[2].data = stats.ordersByDays.total.order_count;
         //dates
         this.chartdata.labels = stats.ordersByDays.total.dates;

         //fire the charts
         this.$refs.chart.refreshChart();
         this.$refs.pie_chart.refreshChart();
      },
   },
};
</script>


<style scoped>
.mx-datepicker {
   width: 100%;
}
>>> .mx-input {
   height: 39px;
   border-radius: 10px;
   border: 1px solid #e7e7e7;
   box-shadow: 0 1px 3px 0 rgb(0 0 0 / 10%), 0 1px 2px 0 rgb(0 0 0 / 6%);
}
th {
   max-width: 150px !important;
   width: 150px !important;
}
</style>