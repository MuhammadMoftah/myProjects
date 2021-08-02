<template>
  <q-page style="margin-bottom: 100px" dir="ltr" class="q-ma-md">
    <!-- head section -->
    <section>
      <div class="text-center scroll-target-class">
        <q-img
          :src="settings.banner"
          placeholder-src="~/assets/cover.jpg"
          :ratio="2.5"
          spinner-color="primary"
        >
        </q-img>
        <q-avatar
          size="80px"
          style="margin: -40px auto auto auto"
          class="shadow-2"
        >
          <q-img
            :src="settings.logo"
            placeholder-src="~/assets/logo.jpg"
            spinner-color="primary"
            ratio="1"
          >
          </q-img>
        </q-avatar>
      </div>
    </section>
    <div
      class="text-center full-width q-py-xl text-weight-medium text-h6"
      v-if="!orders.length"
    >
      <span class="text-center"> {{ $t("no_orders_yet") }} </span>
    </div>

    <template v-else>
      <div
        class="font-bold roboto text-h6 q-px-md q-my-md text-capitalize text-center"
      >
        {{ settings.title ? settings.title : "" }}
      </div>

      <div
        v-for="order in orders"
        :key="order.id"
        class="bg-grey-1 shadow-1 q-pa-xs q-mb-xl"
        style="border-radius: 10px"
      >
        <div v-if="order.type === 'pickup'" class="text-center">
          <p
            class="bg-blue-1 q-px-md q-py-xs q-my-md text-blue-6 inline-block text-weight-bold"
            style="border-radius: 5px"
          >
            <span class="material-icons text-h5"> takeout_dining </span>
            {{ $t("pickup_order_num") }}. {{ order.id }}
          </p>

          <p
            v-if="order.status === 'ready'"
            class="bg-blue-1 text-capitalize q-mx-lg q-px-md q-py-xs q-my-md text-blue-6 inline-block text-weight-bold"
            style="border-radius: 5px"
          >
            {{ $t("ready") }}
          </p>
        </div>
        <div v-if="order.type === 'table'" class="text-center">
          <p
            class="bg-green-1 q-px-md q-py-xs q-my-md text-green-6 inline-block text-weight-bold"
            style="border-radius: 5px"
          >
            <span class="material-icons text-h5"> restaurant </span>
            {{ $t("table_no") }} {{ order.table.id }}
          </p>
        </div>

        <div v-if="order.type === 'delivery'" class="text-center">
          <p
            class="bg-teal-1 q-px-md q-py-xs q-my-md text-teal-6 inline-block text-weight-bold"
            style="border-radius: 5px"
          >
            <span class="material-icons text-h5"> two_wheeler </span>
            {{ $t("delivery_order_no") }} {{ order.id }}
          </p>
        </div>

        <template v-for="item in order.items">
          <div
            class="flex justify-between q-px-md"
            style="min-height: 50px"
            :key="item.id"
            v-if="item.status !== 'cancelled'"
          >
            <p>
              <span class="text-body1 roboto text-weight-medium">
                {{ item.quantity }} X {{ item.product.name }}
              </span>
              <br />
              <template v-for="type in item.product.product_variation">
                <span
                  class="text-grey-7 text-bold text-capitalize"
                  v-for="op in type.options"
                  :key="op.id"
                >
                  {{ op.name }}
                </span>
              </template>
            </p>
            <p class="roboto text-weight-medium">
              {{ item.product.display_price }}
            </p>
          </div>
        </template>

        <!-- order calculations -->
        <div
          class="q-px-md q-pt-md"
          style="border-top: 1px solid #e1e1e1"
          :dir="$t('dir')"
        >
          <p class="flex justify-between text-bold text-grey-8 q-mb-xs">
            <span>{{ $t("subtotal") }}</span>
            <span>{{ order.display_price }} </span>
          </p>
          <p
            class="flex justify-between text-bold text-grey-8 q-mb-xs"
            v-if="order.services.percentage != 0"
          >
            <span>{{ $t("services") }} {{ order.services.percentage }} % </span>
            <span>{{ order.services.value }}</span>
          </p>
          <p
            class="flex justify-between text-bold text-grey-8 q-mb-xs"
            v-if="order.vat.percentage != 0"
          >
            <span>{{ $t("tax") }} {{ order.vat.percentage }} %</span>
            <span>{{ order.vat.value }}</span>
          </p>
          <p class="flex justify-between text-bold">
            <span>
              {{ $t("final_price") }}
            </span>
            <span>{{ order.final_total_price }} </span>
          </p>
        </div>
      </div>
    </template>

    <!-- orders total price -->
    <div
      class="fixed-bottom text-h4 bg-white text-center border1 q-py-lg text-weight-medium text-grey-9"
    >
      {{ totalOrdersPrice }}
    </div>
  </q-page>
</template>

<script>
export default {
  data() {
    return {
      orders: [],
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
    totalOrdersPrice() {
      let price = 0;
      for (let order in this.orders) {
        price = price + this.orders[order].total_price;
      }

      return this.formatePrice(price);
    },
  },
  methods: {
    formatePrice(price) {
      const formatter = new Intl.NumberFormat("en-US", {
        style: "currency",
        currency: "EGP",
      });
      const x = formatter.format(price / 100);
      return x;
    },
    async getOrders() {
      try {
        const res = await this.$axios.get("en/orders");
        this.orders = res.data.data;
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
