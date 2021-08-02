<script>
import { Pie } from "vue-chartjs";

export default {
   extends: Pie,
   props: {
      chartdata: {
         type: Object,
         default: null,
      },
      options: {
         type: Object,
         default: null,
      },
   },
   data() {
      return {};
   },
   mounted() {
      this.refreshChart();
   },
   methods: {
      refreshChart() {
         this.renderChart(this.chartdata, this.option);
      },
   },
};
</script>
