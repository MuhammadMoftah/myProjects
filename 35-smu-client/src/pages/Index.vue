<template>
   <q-page class="flex flex-center">
      <div class="text-center rounded" style="margin-top: -20%">
         <img
            v-if="settings"
            alt="Logo"
            class="q-m-lg q-pa-lg"
            style="border-radius: 10px"
            width="200px"
            :src="settings.logo"
         />
         <img
            v-else
            alt="SMU logo"
            class="q-m-lg q-pa-lg bg-red-7"
            style="border-radius: 10px"
            width="200px"
            src="~assets/smu-logo.png"
         />

         <div class="q-mt-md">
            <q-fab
               :loading="loading"
               :label="$t('select_lang')"
               vertical-actions-align="center"
               color="red"
               icon-right="keyboard_arrow_down"
               direction="down"
               icon="language"
               padding=" 10px"
               unelevated
            >
               <q-fab-action
                  v-for="lang in languages"
                  :key="lang.id"
                  unelevated
                  color="red-5"
                  :label="lang.name"
                  padding="5px 25px"
                  @click="enter(lang.iso)"
               />
            </q-fab>
         </div>
      </div>
   </q-page>
</template>

<script>
import "clientjs";

export default {
   name: "PageIndex",
   Layout: "MenuLayout",
   mounted() {
      if (this.$store.state.general.table_id !== null) {
         // this.getUserFingerPrint();
         this.$store.commit("general/setTable", null);
      }
      // this.getClientData();
   },
   data: ({ $store }) => ({
      loading: false,
      message: "",
      client: {},
      table: $store.state.general.table_id,
   }),
   computed: {
      settings() {
         if (this.$store.state.general.info) {
            return this.$store.state.general.info;
         }
         return this.$q.localStorage.getItem("settings");
      },
      languages() {
         const lang = [...this.$store.state.general.languages];
         return lang;
      },
   },
   methods: {
      async enter(lang) {
         this.loading = true;
         try {
            this.$q.localStorage.set("lang", lang);
            this.$store.commit("general/setLang", lang);
            this.$i18n.locale = lang;
            this.loading = false;
            this.$router.push("/menus");
         } catch (error) {
            this.loading = false;
            this.$q.notify({
               position: "center",
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
         }
      },
      async getUserFingerPrint() {
         this.getClientData();
         this.requestUserLocation();
         try {
            await this.$axios
               .post(`/en/web/scan/${this.table}`, {
                  fingerprint: this.client,
               })
               .then(() => {
                  this.$q.notify({
                     position: "top",
                     type: "positive",
                     message: "You can make orders now, Enjoy :) ",
                     classes: "q-mt-xl text-body1",
                  });
               });
         } catch (error) {
            this.$q.notify({
               position: "top",
               type: "negative",
               color: "red-8",
               message: error.response.data.message,
               classes: "q-mt-xl text-body1",
            });
         }
      },
      requestUserLocation() {
         const self = this;
         navigator.geolocation.getCurrentPosition(
            function (pos) {
               var crd = pos.coords;
               self.client.location = {
                  latitude: crd.latitude,
                  longitude: crd.longitude,
                  accuracy: crd.accuracy,
               };
               self.message = "Thanks";
            },
            function (err) {
               self.message = "Loading ...";
            },
            {
               enableHighAccuracy: true,
               timeout: 5000,
               maximumAge: 0,
            }
         );
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
   watch: {},
};
</script>