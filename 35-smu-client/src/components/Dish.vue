<template>
  <q-expansion-item
    ref="details"
    group="somegroup"
    header-class="text-primary no-margin no-padding "
    :expand-icon-class="[
      dish.variations.length ? 'icon ' : 'hidden',
      $t('dir') == 'rtl' ? 'rtl' : '',
    ]"
    dense
    @show="scrollWhenOpen"
    v-model="open"
    :duration="300"
    @click="openDish(dish.variations.length)"
  >
    <div slot="header" class="q-px-sm" v-ripple:blue-grey-6>
      <q-item-section
        class="q-py-sm text-capitalize text-bold text-h6 text-blue-grey-10 dish-title"
      >
        <q-icon
          name="add_shopping_cart"
          size="sm"
          color="blue-7"
          class="icon border1 q-px-sm q-py-xs"
          style="top: -1px; border-radius: 2px; border-top: none !important"
          :style="$t('dir') == 'rtl' ? 'left:0px;right:auto' : ''"
          v-if="!dish.variations.length"
        />

        {{ dish.name }}
      </q-item-section>
      <div class="flex justify-between row reverse no-wrap">
        <q-avatar size="90px" rounded class="q-mx-sm">
          <q-img
            v-if="dish.media[0]"
            :src="dish.media[0].image_url"
            placeholder-src="~/assets/logo.jpg"
          />
          <q-img
            v-else
            src="~/assets/logo.jpg"
            placeholder-src="~/assets/logo.jpg"
          />
        </q-avatar>

        <span
          class="text-grey-7 text-caption"
          style="display: block; line-height: 18px"
        >
          {{ dish.description ? dish.description : "" }}
        </span>
      </div>
      <div class="text-subtitle2 q-py-xs" v-if="!dish.sale_price">
        {{ dish.display_price }}
      </div>
      <div class="text-subtitle2 q-py-xs" v-else>
        {{ dish.display_sale_price }}
        <span class="text-grey-6" style="text-decoration: line-through">
          {{ dish.display_price }}
        </span>
      </div>
    </div>
    <q-card class="bg-grey-3">
      <q-card-section>
        <template v-for="variation in dish.variations">
          <DishSize
            :key="variation.id"
            v-if="!variation.incremental"
            :variation="variation"
            @mainPrice="mainPrice($event)"
          />
          <MultiVar
            v-if="variation.incremental && variation.multi_select"
            :variation="variation"
            :key="variation.id"
            @addMultiOption="addMultiOption($event)"
          />
          <SideDish
            v-if="variation.incremental && !variation.multi_select"
            :variation="variation"
            :key="variation.id"
            @AddSingleOption="AddSingleOption($event)"
            @addMultiOption="addMultiOption($event)"
          />
        </template>

        <div class="justify-between row q-mt-lg">
          <q-btn-group
            unelevated
            class="justify-between"
            style="width: 47%; border: 2px solid grey"
          >
            <q-btn
              flat
              outline
              color="grey-7"
              :disable="quantity < 2"
              @click="quantity--"
              icon="remove"
            />
            <q-btn
              flat
              outline
              color="blue-gray-10"
              style="width: 50px"
              :label="quantity"
            />
            <q-btn flat outline color="grey-7" @click="quantity++" icon="add" />
          </q-btn-group>
          <q-btn
            dense
            style="width: 47%"
            color="primary"
            align="center"
            unelevated
            icon="add_shopping_cart"
            @click="add()"
          >
            <transition name="rotate-vertical" appear mode="out-in">
              <span class="q-mx-sm" :key="totalPrice">
                {{ totalPrice / 100 }} EGP
              </span>
            </transition>
          </q-btn>
        </div>
      </q-card-section>
    </q-card>
  </q-expansion-item>
</template>

<script>
import DishSize from "components/DishSize.vue";
import SideDish from "components/SideDish.vue";
import MultiVar from "components/MultiVar.vue";
import { scroll } from "quasar";
const { getScrollTarget, setScrollPosition, getScrollPosition } = scroll;
export default {
  components: {
    DishSize,
    SideDish,
    MultiVar,
  },
  props: {
    dishProp: {
      type: Object,
      default: {},
    },
  },
  data() {
    return {
      quantity: 1,
      selectedVariations: {},
      variationPrices: {},
      totalVariationsPrice: 0,
      variationsIDs: [],
      dish: { ...this.dishProp },
      open: false,
      domain: "//" + window.location.hostname,
    };
  },
  computed: {
    totalPrice() {
      return (this.dish.price + this.totalVariationsPrice) * this.quantity;
    },
  },

  methods: {
    resetDish() {
      this.$root.$emit("resetDish");
    },
    openDish(haveVars) {
      if (haveVars) {
      } else {
        this.open = false;
        this.add();
      }
    },
    scrollWhenOpen() {
      setTimeout(() => {
        const el = this.$refs.details.$el;
        const target = getScrollTarget(el);
        const offset = el.offsetTop - 35;
        const duration = 200;
        setScrollPosition(target, offset, duration);
      }, 300);
    },
    mainPrice(variation) {
      if (variation.sale_price) {
        this.dish.price = variation.sale_price;
      } else {
        this.dish.price = variation.price;
      }
      this.selectedVariations[variation.type_id] = variation.id;
      this.getVariationsIDs(this.selectedVariations);
    },
    addMultiOption(option) {
      this.selectedVariations[option.id] = option.variationsIDs;
      this.getVariationsIDs(this.selectedVariations);

      this.variationPrices[option.id] = option.price;
      this.calculateVariationsPrice(this.variationPrices);
    },
    AddSingleOption(option) {
      this.selectedVariations[option.id] = option.variation_id;
      this.getVariationsIDs(this.selectedVariations);

      this.variationPrices[option.id] = option.price;
      this.calculateVariationsPrice(this.variationPrices);
    },
    calculateVariationsPrice(prices) {
      let price = 0;
      for (const x in prices) {
        price += prices[x];
      }
      this.totalVariationsPrice = price;
    },
    getVariationsIDs(variations) {
      let IDs = [];
      for (const x in variations) {
        if (Array.isArray(variations[x])) {
          IDs.push(...variations[x]);
        } else {
          IDs.push(variations[x]);
        }
      }
      this.variationsIDs = IDs;
    },
    async add() {
      //to detect mobile device
      // if (!this.$q.platform.is.mobile || navigator.maxTouchPoints < 2) {
      //    this.$q.notify({
      //       type: "info",
      //       position: "top",
      //       color: "yellow-10",
      //       badgeColor: "orange-8",
      //       message: `Open from your Mobile to enjoy our system :)`,
      //       group: false,
      //    });
      //    return;
      // }

      const payload = {
        products: [
          {
            id: this.dish.id,
            variations: this.variationsIDs,
            quantity: this.quantity,
          },
        ],
      };
      try {
        const res = await this.$store.dispatch("basket/addToBasket", payload);
        //update basket
        this.$store.commit("basket/updateBasket", res.data.data);
        this.resetDish();
      } catch (error) {
        if (error.response.data.modal) {
          this.$router.push("/menus");
          this.$q.notify({
            position: "top",
            type: "info",
            color: "light-blue-8",
            message: this.$t("fill_the_dialog"),
          });
          return;
        }
        this.$q.notify({
          position: "top",
          type: "negative",
          color: "red-7",
          message: error.response.data.message,
        });
      }
    },
    async updateBasket() {
      const res = await this.$store.dispatch("basket/getBasket");
    },
  },
};
</script>

<style scoped >
>>> .q-item {
  display: block;
}

>>> .rtl .q-field__label {
  text-align: right !important;
}
>>> .icon {
  position: absolute;
  top: 8px;
  right: 0;
}
>>> .rtl .icon {
  position: absolute;
  top: 8px;
  left: 5px;
  right: auto;
}
>>> .rtl.icon {
  position: absolute;
  top: 8px;
  left: 5px;
  right: auto;
}
.dish-title {
  max-width: 90%;
  font-size: 18px;
  line-height: 22px;
  padding-top: 12px;
}
</style>