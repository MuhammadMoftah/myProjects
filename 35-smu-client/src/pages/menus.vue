<template>
  <q-page>
    <!-- Head Section -->
    <section v-if="settings && disableSelectBranch">
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
    </section>
    <template v-if="false">
      <h2
        class="text-center text-bold text-h6 text-blue-grey-9 col-12 text-capitalize"
      >
        {{ $t("select_branch") }}
      </h2>

      <div class="col-12 q-px-sm">
        <q-select
          color="blue-grey-8"
          v-model="selectedBranch"
          :label="$t('select_branch')"
          :options="branches"
          class="bg-white text-capitalize"
          option-label="name"
          options-selected-class="text-blue-grey-10 bg-blue-grey-2"
          behavior="menu"
          dense
          outlined
        />
      </div>
    </template>

    <div class="text-center col-12 q-pa-lg" v-if="loader === 'menus'">
      <q-spinner-cube color="red-5" size="7.5em" />
    </div>
    <template v-else>
      <h2
        class="block text-center text-h6 text-blue-grey-9 col-12 text-capitalize q-mt-xl q-mb-none"
      >
        {{ $t("select_menu") }}
      </h2>

      <div dir="ltr">
        <carousel-3d
          :clickable="false"
          :controls-visible="true"
          width="200"
          height="190"
          :animationSpeed="400"
          :border="0"
        >
          <slide
            v-for="(menu, i) in menus"
            :key="i"
            :index="i"
            class="shadow-5"
          >
            <div
              class="bg-white"
              style="height: 100%"
              @click="
                $router.push(
                  `/branches/${selectedBranch.slug}/menus/${menu.slug}`
                )
              "
            >
              <q-img
                v-if="menu.media[0]"
                :src="menu.media[0].image_url"
                :ratio="1.5"
                placeholder-src="~/assets/logo.jpg"
              />
              <q-img v-else src="~/assets/logo.jpg" :ratio="1.5" />

              <article class="bg-white q-px-sm">
                <p
                  class="text-center text-bold text-blue-grey-8 text-body2 q-py-md"
                >
                  {{ menu.name }}
                </p>
              </article>
            </div>
          </slide>
        </carousel-3d>
      </div>
    </template>

    <!--  Modal to scan branch -->
    <ScanModal
      v-if="
        !$store.state.general.meData.fingerprint &&
        $store.state.general.meData.type === 'pickup'
      "
      @branchSelected="selectedBranch = $event"
    />
  </q-page>
</template>

<script>
import { Carousel3d, Slide } from "vue-carousel-3d";
import ScanModal from "components/ScanModal";

export default {
  components: {
    Carousel3d,
    Slide,
    ScanModal,
  },
  data() {
    return {
      selectedBranch: "",
      menus: [],
      loader: "",
      disableSelectBranch: false,
      client: "",
    };
  },
  created() {
    //if there is active branch
    if (this.activeBranch.id) {
      this.getClientData();
      this.createFingerPrint();
      this.selectedBranch = this.activeBranch;
      this.disableSelectBranch = true;

      // this.createFingerPrint();
      this.$store.commit("general/setInfo", this.selectedBranch.settings);
      this.$q.localStorage.set("settings", this.selectedBranch.settings);
      this.$store.commit("general/setScanModal", false);
    } else {
      // if no branch scanned
      this.$store.commit("general/setScanModal", true);
    }
  },
  computed: {
    branches() {
      const branches = [...this.$store.state.general.branches];
      return branches;
    },
    activeBranch() {
      const activeBranch = { ...this.$store.state.general.activeBranch };
      if (activeBranch.id) {
        return activeBranch;
      } else {
        return false;
      }
    },
    settings() {
      if (this.$store.state.general.info) {
        let set = { ...this.$store.state.general.info };
        return set;
      }
      let set = this.$q.localStorage.getItem("settings");
      return set;
    },
  },

  methods: {
    createFingerPrint() {
      const payload = {
        fingerprint: { ...this.client },
        type_id: 2,
        branch_id: this.activeBranch.id,
      };
      this.$axios.post("en/fp", payload).then(() => {
        //lunch updateMeData event
        this.$root.$emit("updateMeData");
      });
    },
    getMenus() {
      this.loader = "menus";
      const lang = this.$store.state.general.lang
        ? this.$store.state.general.lang
        : "en";
      this.$axios
        .get(`${lang}/branches/${this.selectedBranch.slug}/menus`)
        .then((res) => {
          if (res.data.data.length === 2) {
            this.menus = [...res.data.data, ...res.data.data];
          } else {
            this.menus = res.data.data;
          }
          if (this.menus.length === 1) {
            this.$router.push(
              `/branches/${this.selectedBranch.slug}/menus/${this.menus[0].slug}`
            );
          }
          this.loader = false;
        })
        .catch((err) => {
          this.loader = false;
        });
    },
    getClientData() {
      const client = new ClientJS();
      var mobile = false;
      if (client.isMobile() && client.isMobileIOS()) mobile = "ios";
      if (client.isMobile() && client.isMobileAndroid()) mobile = "android";
      if (client.isMobile() && client.isMobileBlackBerry())
        mobile = "blackberry";
      this.client = {
        fingerprint: client.getFingerprint(),
        mobile: mobile,
        cpu: client.getCPU(),
        locale: {
          timeZone: client.getTimeZone(),
          language: client.getLanguage(),
          systemLanguage: client.getSystemLanguage(),
        },
        browser: {
          name: client.getBrowser(),
          version: client.getBrowserVersion(),
          majorVersion: client.getBrowserMajorVersion(),
        },
        engine: {
          name: client.getEngine(),
          version: client.getEngineVersion(),
        },
        os: {
          name: client.getOS(),
          version: client.getOSVersion(),
        },
        device: {
          name: client.getDevice(),
          type: client.getDeviceType(),
          vendor: client.getDeviceVendor(),
        },
        screen: {
          screenPrint: client.getScreenPrint(),
          colorDepth: client.getColorDepth(),
          currentResolution: client.getCurrentResolution(),
          availableResolution: client.getAvailableResolution(),
          deviceXDPI: client.getDeviceXDPI(),
          deviceYDPI: client.getDeviceYDPI(),
        },
      };
    },
  },
  watch: {
    selectedBranch() {
      this.getMenus();
    },
    activeBranch(n) {
      if (n.id) {
        this.selectedBranch = this.activeBranch;
        this.disableSelectBranch = true;
      }
    },
  },
};
</script>

<style scoped>
.my_card:hover article {
  background: rgb(224, 224, 224) !important;
}
.carousel-3d-slide {
  border-radius: 10px;
}
.carousel-3d-container {
  height: 250px !important;
}
</style>