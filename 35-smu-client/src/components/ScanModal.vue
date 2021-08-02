<template>
  <section>
    <!-- Verification Dialog -->
    <q-dialog v-model="globalScanModal" persistent>
      <q-card class="q-dialog-plugin q-pa-md">
        <q-img
          v-if="false"
          src="~/assets/location-icon.svg"
          width="200px"
          class="q-mx-auto block q-my-lg"
        />

        <p class="text-blue-grey-8 text-center text-h6 text-weight-bold">
          Please scan table or select branch
        </p>

        <!-- user info  -->
        <q-tabs
          v-model="orderType"
          dense
          class="text-grey q-my-sm"
          active-color="red-7"
          align="justify"
          narrow-indicator
        >
          <q-tab name="2" icon="takeout_dining" label="pickup" />
          <q-tab name="3" icon="delivery_dining" label="delivery" />
        </q-tabs>

        <section class="row q-mb-lg q-px-md">
          <h2
            class="text-bold text-center text-h6 text-blue-grey-9 col-12 q-mb-sm text-capitalize"
          >
            {{ $t("select_branch") }}
          </h2>

          <div class="col-12 q-px-sm">
            <q-select
              color="blue-grey-8"
              v-model="selectedBranch"
              :label="$t('select_branch')"
              :options="branches"
              class="text-capitalize"
              option-label="name"
              options-selected-class="text-blue-grey-10 bg-blue-grey-2 "
              behavior="menu"
              filled
              input-class="text-red-8 text-capitalize "
              :disable="branches.length === 1"
            >
              <template v-slot:option="{ itemProps, itemEvents, opt }">
                <q-item v-bind="itemProps" v-on="itemEvents">
                  <q-item-section>
                    <q-item-label class="text-capitalize">{{
                      opt.name
                    }}</q-item-label>
                  </q-item-section>
                </q-item>
              </template>
            </q-select>
          </div>
        </section>

        <!-- buttons example -->
        <q-card-actions align="right" class="q-px-lg">
          <q-btn
            color="red-6"
            :label="$t('go')"
            @click="done()"
            class="full-width text-h6"
            :disable="selectedBranch.id ? false : true"
            unelevated
          />
        </q-card-actions>
      </q-card>
    </q-dialog>
  </section>
</template>

<script>
export default {
  data() {
    return {
      orderType: "2",
      selectedBranch: "",
      client: "",
    };
  },
  mounted() {
    this.getClientData();

    // if have only one branch => select it
    if (this.branches.length === 1) {
      this.selectedBranch = this.branches[0];
    }
  },
  computed: {
    globalScanModal() {
      return this.$store.state.general.scanModal;
    },

    branches() {
      if (this.$store.state.general.meData.branches) {
        return this.$store.state.general.meData.branches;
      } else {
        return [];
      }
    },
  },
  watch: {
    orderType(n, o) {
      this.$q.localStorage.set("order_type", n);
    },
    branches(n, o) {
      // if have only one branch => select it
      if (n.length === 1) {
        this.selectedBranch = this.branches[0];
      }
    },
  },

  methods: {
    done() {
      const payload = {
        fingerprint: { ...this.client },
        type_id: this.orderType,
        branch_id: this.selectedBranch.id,
      };
      this.$axios
        .post("en/fp", payload)
        .then(() => {
          this.$store.commit("general/setScanModal", false);

          //lunch updateMeData event
          this.$root.$emit("updateMeData");

          this.$emit("branchSelected", this.selectedBranch);
        })
        .catch((error) => {
          this.$store.commit("general/setScanModal", false);
          this.$q.notify({
            position: "top",
            type: "negative",
            color: "red-8",
            message: error.response.data.message,
            classes: "q-mt-xl text-body1",
          });
        });
    },
    close() {
      this.$store.commit("general/setScanModal", false);
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
};
</script>

<style>
</style>