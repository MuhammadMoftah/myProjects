<template>
  <q-dialog
    :value="$store.state.basket.openBasket"
    position="bottom"
    transition-show="slide-up"
    transition-hide="slide-down"
    :dir="$t('dir')"
    @hide="close"
  >
    <q-toolbar class="bg-white no-border-radius">
      <q-toolbar-title>{{ $t("basket") }}</q-toolbar-title>
      <q-btn flat round dense icon="close" padding="0" @click="close" />
    </q-toolbar>
    <q-card
      class="no-border-radius items-container"
      :style="loading ? 'overflow:hidden' : ''"
    >
      <transition-group name="slide-fade" appear>
        <BasketItem v-for="item in items" :key="item.cart_id" :item="item" />
      </transition-group>

      <div class="q-px-sm q-pt-sm">
        <p class="flex justify-between text-bold text-grey-8 q-mb-xs">
          <span>{{ $t("subtotal") }}</span>
          <span>{{ this.$store.state.basket.subtotal }}</span>
        </p>
        <p class="flex justify-between text-bold text-grey-8 q-mb-xs">
          <span>
            {{ $t("services") }}
            {{ this.$store.state.basket.services.percentage }}%
          </span>
          <span>{{ this.$store.state.basket.services.value }}</span>
        </p>
        <p class="flex justify-between text-bold text-grey-8 q-mb-xs">
          <span>
            {{ $t("tax") }} {{ this.$store.state.basket.vat.percentage }}%
          </span>
          <span>{{ this.$store.state.basket.vat.value }}</span>
        </p>
        <p class="flex justify-between text-bold">
          <span>{{ $t("final_price") }}</span>
          <span>{{ this.$store.state.basket.total }}</span>
        </p>
      </div>

      <div
        class="q-pt-md q-px-xs fixed-bottom full-width bg-white q-pb-lg"
        style="border-top: 1px solid #e5e5e5"
      >
        <q-btn
          class="full-width q-py-xs"
          color="blue-6"
          no-caps
          @click="checkForUser()"
        >
          <transition name="slide-vertical" appear mode="out-in">
            <span :key="$store.state.basket.total" class="text-capitalize">
              {{ $t("order") }} ({{ this.$store.state.basket.total }})
            </span>
          </transition>
        </q-btn>
      </div>
      <q-inner-loading :showing="loading">
        <q-spinner-bars color="primary" size="4em" />
      </q-inner-loading>

      <!-- user info  -->
      <q-dialog v-model="userDialog" persistent>
        <q-card class="q-dialog-plugin">
          <q-card-section>
            <q-tabs
              v-model="orderType"
              dense
              class="text-grey"
              active-color="primary"
              indicator-color="primary"
              align="justify"
              narrow-indicator
            >
              <q-tab name="pickup" icon="takeout_dining" label="pickup" />
              <!-- <q-tab
                        name="delivery"
                        icon="delivery_dining"
                        label="delivery"
                     /> -->
            </q-tabs>
            <q-input
              color="blue-grey-8"
              class="q-my-md"
              v-model="userName"
              :label="$t('your_name_here')"
              dense
              filled
              maxlength="255"
            />
            <q-input
              color="blue-grey-8"
              class="q-my-md"
              v-model="userPhone"
              :label="$t('your_phone_here')"
              dense
              type="text"
              filled
              maxlength="11"
            />

            <!-- <q-input
                     color="blue-grey-8"
                     class="q-my-md"
                     v-if="orderType === 'delivery'"
                     v-model="userAddress"
                     :label="$t('your_address_here')"
                     dense
                     filled
                     type="text"
                  /> -->

            <p class="text-weight-medium q-px-xs text-red-8 text-caption">
              Please send your information to keep you updated with your order
            </p>
          </q-card-section>
          <!-- buttons example -->
          <q-card-actions align="right">
            <q-btn
              color="grey-8"
              outline
              label="Cancel"
              @click="userDialog = false"
              dense
              no-caps
            />
            <q-btn
              color="blue-9"
              outline
              dense
              :loading="loading === 'note'"
              label="Send"
              @click="order"
              no-caps
            />
          </q-card-actions>
        </q-card>
      </q-dialog>
    </q-card>
  </q-dialog>
</template>

<script>
import BasketItem from "components/BasketItem";
export default {
  components: {
    BasketItem,
  },
  data: () => ({
    loading: false,
    userDialog: false,
    orderType: "pickup",
    userAddress: "",
    userPhone: "",
    userName: "",
    lat: "",
    long: "",
  }),
  computed: {
    items() {
      return this.$store.getters["basket/list"];
    },
  },
  mounted() {
    // get user location in pickup case
    if (this.$store.state.general.scanType === "pickup") {
      navigator.geolocation.getCurrentPosition((position) => {
        this.lat = position.coords.latitude;
        this.long = position.coords.longitude;
      });
    }
  },
  methods: {
    checkForUser() {
      if (this.$store.state.general.scanType !== "table") {
        this.$router.push("/payment/details");
      } else {
        this.order();
      }
    },
    async order() {
      try {
        this.loading = true;

        const lang = this.$q.localStorage.getItem("lang") ?? "en";
        if (this.$store.state.general.scanType === "table") {
          const res = await this.$axios.post(`${lang}/orders`, {
            type_id: 1,
          });
          this.loading = false;
          this.$store.commit("basket/closeBasket");

          this.$store.dispatch("basket/getBasket");
          this.$q.notify({
            position: "top",
            type: "positive",
            message: "Your order has been delivered ",
            classes: "q-mt-xl",
            timeout: 1500,
          });
        }
        if (this.$store.state.general.scanType === "pickup") {
          const payload = {
            type: this.orderType,
            name: this.userName,
            phone: this.userPhone,
            address: this.userAddress,
            lat: this.lat,
            long: this.long,
          };
          const res = await this.$axios.post(`${lang}/pickup/orders`, payload);
          this.$store.commit("general/setPickupOrder", res.data.data);
          this.loading = false;
          this.$store.commit("basket/closeBasket");

          this.$store.dispatch("basket/getBasket");
          this.$q.notify({
            position: "top",
            type: "positive",
            message: "Your order has been delivered ",
            classes: "q-mt-xl",
            timeout: 1500,
          });
        }
      } catch (error) {
        this.$q.notify({
          position: "top",
          type: "negative",
          color: "red-7",
          badgeTextColor: "white",
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

        this.loading = false;
      }
    },

    close() {
      this.$store.commit("basket/closeBasket");
    },
  },
  watch: {},
};
</script>

<style scoped>
.items-container {
  /* height: calc(100vh - 100px) !important; */
  height: 80vh !important;
  width: 100%;
  padding-bottom: 150px;
}
.basket-item {
  position: relative;
}
</style>