<template>
  <q-page class="q-ma-md">
    <q-btn
      color="grey-6"
      icon="arrow_back"
      class="q-mb-md"
      flat
      size="lg"
      @click="$router.back()"
      style="left: 0px !important; z-index: 1"
    />
    <section>
      <!-- Delivery Details -->
      <div
        class="flex justify-between border1 q-pa-md rounded2 text-blue-grey-8 text-weight-bold q-mb-lg"
        @click="$router.push('/payment/order-details')"
      >
        <div>
          <q-icon name="home" size="sm" />
          Delivery Details
        </div>

        <div>
          <q-icon
            name="fiber_manual_record"
            size="xs"
            class="q-mx-md"
            :color="
              $store.state.general.orderPayload.type_id ? 'green-6' : 'grey-5'
            "
          />
          <q-icon
            :name="$t('dir') === 'rtl' ? 'chevron_left' : 'chevron_right'"
            size="sm"
          />
        </div>
      </div>

      <!-- Time  -->
      <q-select
        color="blue-grey-8"
        outlined
        label-color="blue-grey-8"
        v-model="time"
        :options="times"
        option-label="hours"
        :label="$t('time')"
        @input="timeSelected(time)"
        class="text-capitalize q-mb-lg"
        options-selected-class="text-blue-grey-10 bg-blue-grey-2 "
        behavior="menu"
      >
        <template v-slot:prepend>
          <q-icon name="schedule" color="blue-grey-8" />
        </template>
        <template v-slot:append>
          <q-icon
            name="fiber_manual_record"
            size="xs"
            :color="
              $store.state.general.orderPayload.delivery_time
                ? 'green-6'
                : 'grey-5'
            "
          />
        </template>
      </q-select>

      <!-- payment type -->
      <q-select
        color="blue-grey-8"
        outlined
        label-color="blue-grey-8"
        v-model="paymentType"
        :options="paymentMethods"
        option-label="name"
        :label="$t('payment_type')"
        @input="choosePaymentMethod()"
        class="text-capitalize"
        :disable="paymentMethods.length === 1"
      >
        <template v-slot:prepend>
          <q-icon name="local_atm" color="blue-grey-8" />
        </template>
        <template v-slot:append>
          <q-icon
            name="fiber_manual_record"
            size="xs"
            :color="
              $store.state.general.orderPayload.payment_method
                ? 'green-6'
                : 'grey-5'
            "
          />
        </template>
        <template
          v-slot:option="{ itemProps, itemEvents, opt, selected, toggleOption }"
        >
          <q-item v-bind="itemProps" v-on="itemEvents">
            <q-item-section>
              <q-item-label style="text-transform: capitalize">
                {{ opt.name }}
              </q-item-label>
            </q-item-section>
            <q-item-section side>
              <img
                src="https://image.freepik.com/free-icon/visa_318-1586.jpg"
                alt=""
                width="40px"
              />
            </q-item-section>
          </q-item>
        </template>
      </q-select>
    </section>

    <!-- order button  -->
    <div
      class="bg-white q-pt-md q-px-xs fixed-bottom full-width q-pb-lg"
      style="border-top: 1px solid #e5e5e5"
    >
      <q-btn
        class="full-width q-py-xs"
        color="blue-6"
        no-caps
        :disable="!activeOrderButton"
        size="lg"
        @click="makeOrder()"
      >
        <transition name="slide-vertical" appear mode="out-in">
          <span :key="$store.state.basket.total" class="text-capitalize">
            {{ $t("order") }}
          </span>
        </transition>
      </q-btn>
    </div>
  </q-page>
</template>

<script>
export default {
  data() {
    return {
      times: [],
      time: "",
      orderType: "pickup",
      paymentMethods: [],
      paymentType: "",
    };
  },
  computed: {
    activeOrderButton() {
      if (
        this.$store.state.general.orderPayload.delivery_time &&
        this.paymentType.id &&
        this.$store.state.general.orderPayload.type_id
      ) {
        return true;
      } else {
        return false;
      }
    },
  },

  created() {
    //if cart empty = escape from the page
    const lang = this.$q.localStorage.getItem("lang") ?? "en";
    this.$axios
      .get(`${lang}/pickup/cart`)
      .then((res) => {
        if (!res.data.data.products.length) {
          this.$router.push("/menus");
          this.$q.notify({
            position: "top",
            type: "negative",
            color: "red-5",
            message: this.$t("fill_your_cart"),
          });
        }
      })
      .catch((error) => {
        this.$router.push("/menus");
        this.$q.notify({
          position: "top",
          type: "negative",
          color: "red-7",
          message: error.response.data.message,
        });
      });
  },
  mounted() {
    this.getPaymentMethods();
    //get resturant hours
    this.getTimes();
  },
  methods: {
    getPaymentMethods() {
      const lang = this.$q.localStorage.getItem("lang") ?? "en";
      this.$axios
        .get(`${lang}/payment_methods`)
        .then((res) => {
          this.paymentMethods = res.data.data;
          if (this.paymentMethods.length === 1) {
            this.paymentType = this.paymentMethods[0];
            const orderPayload = { ...this.$store.state.general.orderPayload };
            orderPayload.payment_method = this.paymentType.id;
            this.$store.commit("general/setOrderPayload", orderPayload);
          }
        })
        .catch((error) => {
          this.$q.notify({
            position: "top",
            type: "negative",
            color: "red-8",
            message: error.response.data.message,
            classes: "q-mt-xl text-body1",
          });
        });
    },
    getTimes() {
      this.$axios.get("/me").then((res) => {
        this.times = res.data.active_branch.slots;
        if (this.times[0].asap) {
          this.timeSelected(this.times[0]);
          this.times[0].hours = this.$t("asap");
        }
      });
    },
    timeSelected(time) {
      const orderPayload = { ...this.$store.state.general.orderPayload };
      orderPayload.delivery_time = time.hours;
      this.$store.commit("general/setOrderPayload", orderPayload);
      this.time = time;
    },
    choosePaymentMethod() {
      const orderPayload = { ...this.$store.state.general.orderPayload };
      orderPayload.payment_method = this.paymentType.id;
      this.$store.commit("general/setOrderPayload", orderPayload);
    },
    makeOrder() {
      const lang = this.$q.localStorage.getItem("lang") ?? "en";
      const payload = { ...this.$store.state.general.orderPayload };
      this.$axios
        .post(`${lang}/pickup/orders`, payload)
        .then((res) => {
          this.$store.commit("basket/closeBasket");
          if (!res.data.payment_url.length) {
            //if choose cash

            //lunch updateMeData event
            this.$root.$emit("updateMeData");
            this.$router.push("/menus");

            this.$q.notify({
              position: "top",
              color: "green-6",
              message: this.$t("your_order_created"),
              classes: "q-mt-xl text-body1",
            });
          } else {
            //if choose not cash
            window.location.href = res.data.payment_url;
          }
        })
        .catch((error) => {
          this.$store.commit("basket/closeBasket");
          this.$q.notify({
            position: "top",
            type: "negative",
            color: "red-8",
            message: error.response.data.message,
            classes: "q-mt-xl text-body1",
          });
        });
    },
  },
};
</script>

<style>
</style>