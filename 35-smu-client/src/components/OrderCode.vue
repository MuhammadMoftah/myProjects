<template>
  <section>
    <div>
      <q-btn
        class="code-btn q-py-md"
        text-color="white"
        icon="local_offer"
        label="Code"
        stack
        @click="open = true"
      />
    </div>

    <q-dialog
      v-model="open"
      position="bottom"
      transition-show="slide-up"
      transition-hide="slide-down"
      :dir="$t('dir')"
    >
      <q-toolbar class="bg-white no-border-radius">
        <q-toolbar-title>{{ "Your Code" }}</q-toolbar-title>
        <q-btn
          flat
          round
          dense
          icon="close"
          padding="0"
          @click="open = false"
        />
      </q-toolbar>
      <q-card class="no-border-radius items-container">
        <div class="q-px-lg q-mt-lg flex justify-center" style="height: 70vh">
          <div class="text-center no-margin no-padding">
            <p
              class="rounded bg-grey-3 q-pa-lg text-grey-9 text-weight-bold q-py-lg text-h2 text-uppercase full-width"
              style="border: 2px dashed grey; border-radius: 10px"
            >
              {{ $store.state.general.pickupOrder.pincode }}
            </p>
            <span class="text-red-7 text-body1 text-weight-bold">
              {{ $t("expired_time") }}
            </span>
          </div>

          <div class="full-width">
            <div v-if="order.type === 'pickup'" class="text-center">
              <p
                class="bg-blue-1 q-px-md q-py-xs q-my-md text-blue-6 inline-block text-weight-bold"
                style="border-radius: 5px"
              >
                <span class="material-icons text-h5"> takeout_dining </span>
                {{ $t("pickup_order") }}
              </p>
            </div>
            <div v-if="order.type === 'table'" class="text-center">
              <p
                class="bg-green-1 q-px-md q-py-xs q-my-md text-green-6 inline-block text-weight-bold"
                style="border-radius: 5px"
              >
                <span class="material-icons text-h5"> restaurant </span>
                {{ $t("table") }}
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
                <span>{{ order.display_price }} EGP</span>
              </p>
              <p class="flex justify-between text-bold text-grey-8 q-mb-xs">
                <span
                  >{{ $t("services") }} {{ order.services.percentage }}%
                </span>
                <span>{{ order.services.value }}</span>
              </p>
              <p class="flex justify-between text-bold text-grey-8 q-mb-xs">
                <span>{{ $t("tax") }} {{ order.vat.percentage }}%</span>
                <span>{{ order.vat.value }}</span>
              </p>
              <p class="flex justify-between text-bold">
                <span>
                  {{ $t("final_price") }}
                </span>
                <span>{{ order.final_total_price }} EGP</span>
              </p>
            </div>
          </div>
        </div>
      </q-card>
    </q-dialog>
  </section>
</template>

<script>
export default {
  data() {
    return {
      open: true,
    };
  },
  computed: {
    order() {
      return this.$store.state.general.pickupOrder;
    },
  },
};
</script>

<style scoped>
.q-card {
  width: 100%;
}
.q-dialog__inner--minimized > div {
  max-width: unset;
}
.code-btn {
  position: fixed;
  bottom: 90px;
  right: 10%;

  /* border: 2px dashed rgb(73, 255, 118); */
  -webkit-animation: glow 1s ease-in-out infinite alternate;
  -moz-animation: glow 1s ease-in-out infinite alternate;
  animation: glow 0.8s ease-in-out infinite alternate;
  animation-name: glow-orange;
}

@keyframes glow-orange {
  from {
    background: rgb(255, 156, 90);
    transform: translate3d(0px, -4px, 50px);
    box-shadow: none;
  }
  to {
    background: rgb(255, 132, 49);
    transform: translate3d(0px, 4px, 50px);
    box-shadow: 1px 1px 5px rgb(204, 204, 204);
  }
}
</style>