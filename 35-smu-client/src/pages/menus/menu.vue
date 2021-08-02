<template>
  <q-page style="margin-bottom: 100px">
    <q-page-sticky expand position="top" :offset="[0, -1]" style="z-index: 10">
      <q-tabs
        v-model="tab"
        align="justify"
        dense
        class="bg-white full-width text-blue-grey-5"
        active-color="blue-grey-10 "
      >
        <template v-if="cats.length">
          <template v-for="cat in cats">
            <q-tab
              :key="cat.id"
              v-if="cat.products.length"
              unelevated
              flat
              class="text-h6"
              :name="cat.slug"
              :label="cat.name"
              @click="scrollToElement(cat.slug)"
            />
          </template>
        </template>
        <template v-else>
          <q-tab unelevated flat :label="$t('loading') + '...'" />
        </template>
      </q-tabs>
    </q-page-sticky>

    <!-- Head Section -->
    <section v-if="settings" class="q-mt-lg">
      <div class="text-center scroll-target-class">
        <q-img
          :src="settings.banner"
          placeholder-src="~/assets/cover.jpg"
          :ratio="2"
          spinner-color="primary"
        >
        </q-img>
        <q-avatar size="80px" style="margin: -40px auto auto auto">
          <q-img
            :src="settings.logo"
            placeholder-src="~/assets/logo.jpg"
            spinner-color="primary"
            ratio="1"
          >
          </q-img>
        </q-avatar>
      </div>

      <div class="q-px-sm q-py-md">
        <div
          class="flex items-center justify-between text-subtitle2 text-capitalize"
        >
          <span> {{ settings.title }} </span>
          <q-btn
            size="md"
            flat
            padding="xs"
            color="grey-7"
            icon="info"
            @click="info = !info"
          >
          </q-btn>
        </div>
        <template v-if="settings.description">
          <p
            class="text-caption text-grey-8 q-my-xs"
            :class="
              !allDesc && settings.description.length > 140
                ? 'ellipsis-2-lines'
                : ''
            "
          >
            {{ settings.description }}
          </p>
          <span
            class="text-primary"
            @click="allDesc = !allDesc"
            v-if="settings.description.length > 140 && !allDesc"
          >
            See more
          </span>
        </template>
      </div>
    </section>

    <q-list v-for="cat in cats" :key="cat.id">
      <!-- disable empty categories -->
      <template v-if="cat.products.length">
        <q-img
          :id="cat.slug"
          v-intersection="activeTab"
          :src="cat.media.length ? cat.media[0].image_url : ''"
          :ratio="3"
          spinner-color="primary"
          placeholder-src="~/assets/cover.jpg"
        >
          <div class="text-center absolute-bottom text-h6 text-capitalize">
            {{ cat.name }}
          </div>
        </q-img>
        <Dish v-for="dish in cat.products" :dishProp="dish" :key="dish.id" />
      </template>
    </q-list>

    <!-- basket button  -->
    <div
      class="bg-white q-pt-md q-pb-lg q-px-xs fixed-bottom full-width"
      style="border-top: 1px solid #e5e5e5"
      v-if="$store.state.basket.price"
    >
      <transition name="slide-fade" appear mode="out-in">
        <q-btn
          align="around"
          :key="$store.state.basket.total"
          style="font-size: 16px"
          icon="shopping_cart"
          class="full-width q-py-xs"
          color="blue-7"
          @click="$store.commit('basket/toggleBasket')"
        >
          {{ $store.state.basket.total }}
        </q-btn>
      </transition>
    </div>

    <!-- Basket  -->
    <Basket />

    <InfoDialog :open="info" />
  </q-page>
</template>

<script>
import Dish from "components/Dish";
import Basket from "components/Basket";
import InfoDialog from "components/InfoDialog";
import { scroll } from "quasar";
const { getScrollTarget, setScrollPosition } = scroll;
export default {
  components: {
    Dish,
    Basket,
    InfoDialog,
  },
  data() {
    return {
      allDesc: false,
      openBasket: false,
      loading: "",
      tab: "",
      expanded: false,
      variations: "",
      cats: [],
      info: false,
      domain: "//" + window.location.hostname,
      nextCats: null,
    };
  },
  computed: {
    settings() {
      if (this.$store.state.general.info) {
        return this.$store.state.general.info;
      }
      return this.$q.localStorage.getItem("settings");
    },
  },
  mounted() {
    this.getBasket();
    //show search button
    this.$store.commit("general/setSearchButton", true);

    const lang = this.$q.localStorage.getItem("lang") ?? "en";
    this.getMenu(
      `${lang}/branches/${this.$route.params.branch_slug}/menus/${this.$route.params.id}?page=1`
    );

    // get all dishes for search
    this.getDishes();
  },
  destroyed() {
    //show search button
    this.$store.commit("general/setSearchButton", false);
  },
  methods: {
    getDishes() {
      const lang = this.$q.localStorage.getItem("lang") ?? "en";
      this.$axios
        .get(
          `${lang}/branches/${this.$route.params.branch_slug}/menus/${this.$route.params.id}/products`
        )
        .then((res) => {
          this.$store.commit("general/setDishes", res.data.data);
        });
    },
    async getMenu(link) {
      this.loading = true;

      try {
        const res = await this.$axios.get(link);

        this.cats.push(...res.data.data);
        this.nextCats = res.data.links.next;
        if (this.nextCats == null) return;

        this.getMenu(this.nextCats);

        this.loading = false;
      } catch (error) {
        this.loading = false;
        this.$q.notify({
          position: "top",
          type: "negative",
          color: "red-9",
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
      }
    },
    activeTab(el) {
      if (el.isIntersecting) {
        this.tab = el.target.id;
      }
    },
    scrollToElement(x) {
      const el = document.getElementById(x);
      const target = getScrollTarget(el);
      const offset = el.offsetTop;
      const duration = 400;
      setScrollPosition(target, offset, duration);
    },
    getBasket() {
      this.$store.dispatch("basket/getBasket");
    },
  },
};
</script>

<style scoped>
>>> .q-expansion-item {
  border-bottom: 1px solid #e8e8e8 !important;
}
>>> .q-tab__label {
  /* font-size: 16px; */
  font-weight: 800;
}
</style>