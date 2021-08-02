<template>
  <div :dir="$store.state.lang.rtl ? 'rtl' : 'ltr'">
    <div class="flex">
      <aside
        class="z-0 hidden w-full overflow-x-hidden overflow-y-auto lg:flex"
        style="height: 100vh; max-width: 115px"
      >
        <SideBar />
      </aside>

      <!-- sidebar mobile view -->
      <aside class="z-30 flex overflow-x-hidden overflow-y-auto lg:hidden">
        <SideBarMobile />
      </aside>
      <!-- w-full md:w-11/12 -->
      <div class="w-full">
        <main class="w-screen h-screen pb-32 overflow-auto lg:w-full md:pb-0">
          <TopBar />
          <Nuxt keep-alive :key="$route.fullPath" />
        </main>
      </div>
      <!-- Error Notificatoin -->
      <transition name="fade">
        <ErrorNoti v-if="$store.state.noti.show" />
      </transition>
    </div>

    <branch-select v-if="branchesModal" />
  </div>
</template>

<script>
import TopBar from "~/components/TopBar";
import SideBar from "~/components/SideBar";
import BranchSelect from "~/components/branches/BranchSelect";

export default {
  name: "default",
  components: {
    TopBar,
    SideBar,
    BranchSelect,
  },
  data: () => ({
    fontLink:
      "https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800&display=swap",
  }),
  head() {
    return {
      link: [
        {
          //Cairo font
          rel: "stylesheet",
          href: this.$store.state.lang.rtl ? this.fontLink : "",
        },
      ],
    };
  },
  fetch() {
    switch (this.$auth.$storage.getUniversal("locale")) {
      case "ar":
        this.$store.commit("lang/rtl");
        break;
      default:
        this.$store.commit("lang/ltr");
        break;
    }
  },
  computed: {
    branchesModal() {
      return this.$store.state.me.branchesModal;
    },
  },
  beforeCreate() {
    //if there is branch in Storage
    if (this.$auth.$storage.getUniversal("selectedBranch")) {
      this.$axios.onRequest((config) => {
        config.headers.common[
          "x-smu-branch"
        ] = this.$auth.$storage.getUniversal("selectedBranch");
      });
    }
  },
  mounted() {
    // if no branch selected
    if (!this.$auth.$storage.getUniversal("selectedBranch")) {
      this.$store.commit("me/branchesModal", true);
    }

    // load the branch categories and store it in VUEX
    this.$store.dispatch("products/getBranchCategories");

    this.getSettings();
    this.getUser();
    this.getKitchens();
  },
  methods: {
    getUser() {
      delete this.$axios.defaults.headers.common["X-SMU-BRANCH"];
      this.$axios.get("/account/me").then((res) => {
        this.$store.commit("me/setUser", res.data.data);

        // if one branch exist select this branch and store it
        if (res.data.data.branches.length === 1) {
          this.$axios.defaults.headers.common = {
            "X-SMU-BRANCH": res.data.data.branches[0].id,
          };
          this.$auth.$storage.setUniversal(
            "selectedBranch",
            res.data.data.branches[0].id
          );
        }

        this.$axios.defaults.headers.common = {
          accept: "application/json",
        };
      });
    },
    getKitchens() {
      this.$axios.get("/kitchens").then((res) => {
        this.$store.commit("me/setKitchens", res.data.data);
      });
    },
    getSettings() {
      //Store Settings
      this.$axios
        .get("/settings/services")
        .then((res) => {
          this.$store.commit("settings/storeServices", res.data.data.value);
        })
        .catch((err) => {});
      this.$axios
        .get("/settings/vat")
        .then((res) => {
          this.$store.commit("settings/storeTax", res.data.data.value);
        })
        .catch((err) => {});
      this.$axios
        .get("/settings/title")
        .then((res) => {
          this.$store.commit("settings/storeTitle", res.data.data.value);
        })
        .catch((err) => {});
      this.$axios
        .get("/settings/description")
        .then((res) => {
          this.$store.commit("settings/storeDesc", res.data.data.value);
        })
        .catch((err) => {});
      this.$axios
        .get("/settings/logo/media")
        .then((res) => {
          this.$store.commit("settings/storeLogo", res.data.data[0].url);
        })
        .catch((err) => {});
    },
  },
};
</script>
<style>
/* ==== Style Scrollbar ==== */
/* ==== Style Scrollbar ==== */
* {
  font-family: "Tajawal", sans-serif;
}

::-webkit-scrollbar {
  width: 6px;
}

::-webkit-scrollbar-track {
  /* -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3); */
  -webkit-box-shadow: inset 0 0 6px rgba(194, 194, 194, 0.3);
  overflow: hidden;
  border-radius: 10px;
  /* background-color: #ececec; */
  background-color: #ececec4b;
}

::-webkit-scrollbar-thumb {
  /* background-color: darkgrey; */
  background-color: rgb(255, 140, 140);
  border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
  /* background-color: #8f8f8f; */
  background-color: #ff6d6d;
}
</style>
