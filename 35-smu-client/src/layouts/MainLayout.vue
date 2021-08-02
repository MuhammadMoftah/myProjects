<template>
  <q-layout view="lHh Lpr lFf" :dir="$i18n.locale == 'ar' ? 'rtl' : 'ltr'">
    <q-header reveal>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          class="shadow-0"
          icon="menu"
          aria-label="Menu"
          @click="leftDrawerOpen = !leftDrawerOpen"
        />
        <transition appear name="fade" mode="out-in">
          <q-toolbar-title
            class="text-weight-medium flex justify-between items-center text-capitalize"
            v-if="!search"
            :key="search"
          >
            <span class="roboto">
              {{
                $q.localStorage.getItem("settings")
                  ? $q.localStorage.getItem("settings").title
                  : "Resturant"
              }}
            </span>

            <q-btn
              v-if="$store.state.general.searchButton"
              color="primary"
              icon="search"
              unelevated
              dense
              padding="5px 0px"
              to="/search"
              @click="$store.commit('general/setSearch', true)"
            />
          </q-toolbar-title>

          <q-toolbar-title
            class="text-weight-medium"
            v-if="search"
            :key="search"
          >
            <q-input
              v-model="searchText"
              ref="search"
              autofocus
              aria-placeholder="search"
              clear-icon="menu"
              dense
              @input="fireSearch"
              dark
              borderless
              input-class="no-margin no-padding text-body1 text-bold"
            >
              <template v-slot:append>
                <q-icon
                  v-if="searchText === ''"
                  name="west"
                  color="white"
                  @click="
                    $router.go(-1), $store.commit('general/setSearch', false)
                  "
                />
                <q-icon
                  v-else
                  name="clear"
                  class="cursor-pointer"
                  @click="searchText = ''"
                />
              </template>
            </q-input>
          </q-toolbar-title>
        </transition>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      :side="$i18n.locale == 'ar' ? 'right' : 'left'"
      content-class="bg-grey-2"
    >
      <SideNav />
    </q-drawer>

    <q-page-container>
      <transition appear name="fade" mode="out-in">
        <router-view :key="$route.path" />
      </transition>
    </q-page-container>

    <OrderCode v-if="$store.state.general.pickupOrder.id" />
    <LocationModal />
  </q-layout>
</template>

<script>
import SideNav from "components/SideNav.vue";
import OrderCode from "components/OrderCode.vue";
import LocationModal from "components/LocationModal.vue";
import "clientjs";

export default {
  name: "MainLayout",
  components: { SideNav, OrderCode, LocationModal },

  mounted() {
    this.$i18n.locale = this.$q.localStorage.getItem("lang") ?? "en";

    // get and store branch setting
    this.setSettings();

    //get user data
    this.getUser();

    //get user location
    this.checkLocation();

    //update me data at event bus
    this.$root.$on("updateMeData", this.getUser);
  },
  data() {
    return {
      leftDrawerOpen: false,
      searchText: "",
    };
  },
  computed: {
    search() {
      return this.$store.state.general.isSearch;
    },
  },
  methods: {
    checkLocation() {
      const location = this.$q.localStorage.getItem("location");
      const locationSelected = this.$q.localStorage.getItem(
        "location_selected"
      );
      if (location) {
        this.$store.commit("location/setGeometry", location.geometry);
        this.$store.commit("location/setFormatted", location.formatted);
        this.$store.commit("location/setDetailed", location.detailed);
      } else if (!location && locationSelected !== "reject") {
        this.$store.commit("location/setModal", true);
      }
    },
    fireSearch(value) {
      this.$root.$emit("searchFire", value);
    },
    searchFocus() {
      this.$refs.search.focus();
    },
    async setSettings() {
      try {
        const res = await this.$axios.get("en/settings");
        this.$store.commit("general/setInfo", res.data);
        this.$q.localStorage.set("settings", res.data);
      } catch (e) {}
    },

    getUser() {
      this.$axios.get("/me").then((res) => {
        this.$store.commit("general/setActiveBranch", res.data.active_branch);
        this.$store.commit("general/setBranches", res.data.branches);
        this.$store.commit("general/setLanguages", res.data.data);
        this.$store.commit("general/setScanType", res.data.type);
        this.$store.commit("general/setPickupOrder", res.data.pickup_orders);
        this.$store.commit("general/setFingerPrint", res.data.fingerprint);
        this.$store.commit("general/setMeData", res.data);
      });
    },
  },
  watch: {
    $route(to, from) {
      //prevent user from back to scan screen
      let scanCode = to.path.split("/").pop();
      if (to.path == `/scan/${scanCode}`) {
        this.$router.push("/");
      }
    },
  },
};
</script>

<style >
.q-notifications__list {
  margin-top: 60px !important;
}
</style>