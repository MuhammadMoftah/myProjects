<template>
  <q-page style="margin-bottom: 50px" dir="ltr">
    <!-- head section -->
    <section v-if="false">
      <div class="text-center scroll-target-class">
        <q-img
          :src="
            settings.banner
              ? settings.banner
              : 'https://via.placeholder.com/350x150?text=Cover'
          "
          :ratio="2.5"
          spinner-color="primary"
        >
        </q-img>
        <q-avatar
          size="80px"
          style="margin: -40px auto auto auto"
          class="border"
        >
          <img
            :src="
              settings.logo
                ? settings.logo
                : 'https://via.placeholder.com/150x150?text=Logo'
            "
            style="
              object-fit: contain;
              background: black;
              border: 1px solid black;
            "
          />
        </q-avatar>
      </div>
    </section>

    <div
      class="full-width text-center q-py-xl text-bold text-body2"
      v-if="!orders.length"
    >
      <span class="text-center"> {{ $t("no_orders_yet") }}</span>
    </div>
    <template v-else>
      <q-timeline layout="comfortable" class="q-py-md" side="right">
        <q-timeline-entry
          icon="fastfood"
          v-for="order of orders"
          :key="order.id"
        >
          <template slot="title">
            <span
              class="text-blue-grey-10 text-bold text-capitalize d-block"
              style="margin-bottom: -24px !important"
            >
              {{ order.quantity }} x {{ order.product.name }}
            </span>
          </template>
          <template slot="subtitle">
            <span> {{ order.product.display_price }} </span>
          </template>

          <template slot="default">
            <div
              class="text-bold text-blue-grey-6 text-caption text-capitalize"
            >
              <template v-for="vari in order.product.product_variation">
                <span v-for="op in vari.options" :key="op.id">
                  {{ op.name }}
                </span>
              </template>
            </div>
          </template>
        </q-timeline-entry>
      </q-timeline>

      <div
        class="q-px-md q-pt-md"
        style="border-top: 1px solid #e1e1e1"
        :dir="$t('dir')"
      >
        <p class="flex justify-between text-bold text-grey-8 q-mb-xs">
          <span>{{ $t("subtotal") }}</span>
          <span>{{ total }}</span>
        </p>
        <p class="flex justify-between text-bold text-grey-8 q-mb-xs">
          <span>{{ $t("services") }}</span>
          <span>{{ services }}%</span>
        </p>
        <p class="flex justify-between text-bold text-grey-8 q-mb-xs">
          <span>{{ $t("tax") }}</span>
          <span>{{ vat }}%</span>
        </p>
        <p class="flex justify-between text-bold">
          <span>
            {{ $t("final_price") }}
          </span>
          <span>{{ final_total }}</span>
        </p>
      </div>
    </template>
  </q-page>
</template>

<script>
export default {
  data() {
    return {
      orders: [],
      total: "",
      final_total: "",
      services: "",
      vat: "",
    };
  },
  mounted() {
    this.getOrders();
  },
  computed: {
    settings() {
      const settings = this.$q.localStorage.getItem("settings");
      return settings;
    },
  },
  methods: {
    async getOrders() {
      try {
        const res = await this.$axios.get("en/orders");
        this.orders = res.data.data[0].items;
        this.services = res.data.data[0].services;
        this.vat = res.data.data[0].vat;
        this.total = res.data.data[0].display_price;
        this.final_total = res.data.data[0].final_total_price;
      } catch (error) {
        this.$q.notify({
          position: "top",
          type: "negative",
          color: "red-7",
          textColor: "white",
          message: error.response.data.message
            ? error.response.data.message
            : "Some Error happend",
          classes: "q-mt-xl",
          actions: [
            {
              label: "X",
              color: "white",
            },
          ],
        });
      }
    },
  },
};
</script>

<style scoped>
>>> .q-timeline__subtitle {
  opacity: 1;
}
>>> .q-timeline h6 {
  font-size: 18px;
  margin-bottom: 5px;
}
>>> .q-timeline--comfortable--right .q-timeline__content {
  padding-left: 15px;
}
>>> .q-timeline--comfortable--right .q-timeline__subtitle {
  padding-right: 20px;
}
</style>