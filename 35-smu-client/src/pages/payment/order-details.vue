<template>
  <q-page class="q-ma-md">
    <q-btn
      v-if="false"
      color="grey-6"
      icon="arrow_back"
      class="fixed-top"
      style="margin-top: 70px; left: 0px !important; z-index: 1"
      flat
      size="lg"
      @click="$router.push('/payment/details')"
    />
    <!-- user info  -->
    <q-tabs
      v-model="orderType"
      dense
      class="text-grey"
      active-color="primary"
      indicator-color="primary"
      align="justify"
      narrow-indicator
    >
      <q-tab name="2" icon="takeout_dining" label="pickup" />
      <q-tab name="3" icon="delivery_dining" label="delivery" />
    </q-tabs>

    <div class="row q-gutter-sm aligns-center q-mt-md no-wrap">
      <q-input
        color="blue-grey-8"
        v-model="user.phone"
        :label="$t('your_phone_here')"
        dense
        type="number"
        filled
        maxlength="11"
        style="width: 100%"
      />
      <q-btn
        no-caps
        v-if="false"
        icon="lock_open"
        class="text-capitalize q-px-xs"
        outline
        color="green-6"
        dense
      />
    </div>

    <q-input
      color="blue-grey-8"
      class="q-my-md"
      v-model="user.name"
      :label="$t('your_name_here')"
      dense
      filled
      maxlength="255"
    />

    <q-input
      color="blue-grey-8"
      class="q-my-md"
      v-model="user.email"
      :label="$t('your_email_here') + ' (' + $t('optional') + ')'"
      dense
      filled
      maxlength="255"
    />

    <q-select
      v-if="orderType == 3 && user.id"
      filled
      dense
      color="green"
      v-model="address"
      :options="addresses"
      :label="$t('address')"
      behavior="menu"
    >
      <template v-slot:selected>
        <span class="text-blue-grey-7 text-caption text-bold text-capitalize">
          {{ address.name }}
        </span>
      </template>

      <template v-slot:option="scope">
        <q-item v-bind="scope.itemProps" v-on="scope.itemEvents">
          <q-item-section>
            <q-item-label class="text-capitalize">
              <span class="text-bold"> {{ scope.opt.name }}:</span>
              {{ scope.opt.number }} {{ scope.opt.street }},
              {{ scope.opt.country }} {{ scope.opt.region }}
            </q-item-label>
          </q-item-section>
        </q-item>
      </template>
    </q-select>

    <q-btn
      v-if="orderType == 3 && user.id"
      class="text-green-5 text-subtitle2 q-mt-xs"
      @click="AddAddressDialog = true"
      flat
      icon="add"
      size="sm"
      dense
    >
      {{ $t("add_address") }}
    </q-btn>

    <!-- buttons example -->
    <q-btn
      color="red-5"
      class="full-width text-h6 fixed-bottom"
      padding="15px 0"
      unelevated
      :label="`done`"
      @click="userLogin()"
      :loading="loading === 'userlogin'"
    />

    <!-- Verification Dialog -->
    <q-dialog v-model="verificationDialog" @hide="verTimer = 0" persistent>
      <q-card class="q-dialog-plugin">
        <q-img
          src="~/assets/phone-ver.svg"
          width="200px"
          class="block q-mx-auto q-my-lg"
        />

        <p
          class="text-center text-blue-grey-8 no-margin text-h6 text-weight-bold"
        >
          {{ $t("vertify_number") }}
        </p>

        <q-card-section>
          <span class="block text-grey-9 text-caption q-mb-xs">
            {{ $t("verfication_code_sent") }} {{ this.user.phone }}
          </span>
          <q-input
            color="blue-grey-8"
            v-model="pin"
            :label="$t('code')"
            dense
            filled
            maxlength="255"
          />

          <q-btn
            :disable="verTimer > 0"
            dense
            color="blue-grey-9"
            class="q-mt-sm q-px-md"
            no-caps
            @click="userLogin"
          >
            {{ $t("resend") }}
            <span v-if="verTimer > 0" class="q-mx-sm"> {{ verTimer }}</span>
          </q-btn>
        </q-card-section>

        <!-- buttons example -->
        <q-card-actions align="right">
          <q-btn
            color="grey-8"
            outline
            label="Cancel"
            dense
            no-caps
            @click="closeVerification()"
          />
          <q-btn
            color="blue-9"
            outline
            dense
            :loading="loading === 'note'"
            :label="$t('verify')"
            @click="verifyPin()"
            no-caps
          />
        </q-card-actions>
      </q-card>
    </q-dialog>

    <!-- Add Address Dialog -->
    <q-dialog v-model="AddAddressDialog">
      <q-card class="q-dialog-plugin q-pa-md">
        <h6
          class="justify-between text-blue-grey-8 q-py-sm no-margin text-capitalize col-12 row"
        >
          {{ $t("address_details") }}
          <q-btn
            color="green-5"
            flat
            icon="gps_fixed"
            dense
            :label="$t('auto_fill')"
            @click="requestLocation()"
            :loading="loading === 'autofill'"
            no-caps
          />
        </h6>
        <q-input
          color="blue-grey-8"
          class="q-my-xs col-12"
          v-model="addressToAdd.name"
          :label="$t('address_type')"
          dense
          filled
          type="text"
        />
        <q-input
          color="blue-grey-8"
          class="q-my-xs col-12"
          v-model="addressToAdd.number"
          :label="$t('house_no')"
          dense
          filled
          type="text"
        />
        <q-input
          color="blue-grey-8"
          class="q-my-xs col-12"
          v-model="addressToAdd.street"
          :label="$t('street')"
          dense
          filled
          type="text"
        />
        <q-input
          color="blue-grey-8"
          class="q-my-xs col-12"
          v-model="addressToAdd.city"
          :label="$t('city')"
          dense
          filled
          type="text"
        />

        <q-input
          color="blue-grey-8"
          class="q-my-xs col-12"
          v-model="addressToAdd.region"
          :label="$t('region')"
          dense
          filled
          type="text"
        />

        <q-input
          color="blue-grey-8"
          class="q-my-xs col-12"
          v-model="addressToAdd.country"
          :label="$t('country')"
          dense
          filled
          type="text"
        />

        <!-- buttons example -->
        <q-card-actions class="no-padding q-mt-md" align="right">
          <q-btn
            color="blue-7"
            unelevated
            class="full-width"
            :loading="loading === 'address'"
            :label="$t('add_address')"
            @click="addAddress()"
          />
        </q-card-actions>
      </q-card>
    </q-dialog>
  </q-page>
</template>

<script>
import "clientjs";

export default {
  data() {
    return {
      orderType: "",
      user: {},
      address: {},
      addresses: [],
      addressToAdd: {},
      verificationDialog: false,
      AddAddressDialog: false,
      verTimer: 0,
      pin: "",
      loading: "",
    };
  },
  created() {
    // if cart empty = escape from the page
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
    //fill the user data
    this.$axios.get("/me").then((res) => {
      this.user = res.data.user ?? {};

      this.addresses = res.data.user ? res.data.user.addresses : [];
    });

    //auto fill the address
    this.requestLocation();
    this.addressAutoFill();

    //auto choose order type
    this.orderType = this.$q.localStorage.getItem("order_type") ?? "2";
  },
  methods: {
    addAddress() {
      this.loading = "address";
      const lang = this.$q.localStorage.getItem("lang") ?? "en";
      this.$axios
        .post(`${lang}/members/${this.user.id}/addresses`, this.addressToAdd)
        .then((res) => {
          this.addresses.push(res.data.data);
          this.address = res.data.data;
          this.$q.notify({
            position: "top",
            type: "negative",
            color: "green-5",
            message: this.$t("address_added_successfully"),
          });
          this.AddAddressDialog = false;
          this.loading = false;
        })
        .catch((error) => {
          this.loading = false;
          this.AddAddressDialog = false;
          for (const i in error.response.data?.errors) {
            this.$q.notify({
              position: "top",
              type: "negative",
              color: "red-6",
              message: error.response.data.errors[i],
            });
          }
        });
    },
    userLogin() {
      this.loading = "userlogin";
      const lang = this.$q.localStorage.getItem("lang") ?? "en";
      const payload = {
        name: this.user.name,
        phone: this.user.phone,
        email: this.user.email,
      };
      this.$axios
        .post(`${lang}/login`, payload)
        .then(() => {
          this.done();
          this.loading = false;
        })
        .catch((error) => {
          this.loading = false;
          if (error.response.data.verify) {
            this.verificationDialog = true;
            this.startTimer(120);
            return;
          }
          for (const i in error.response.data?.errors) {
            this.$q.notify({
              position: "top",
              type: "negative",
              color: "red-6",
              message: error.response.data.errors[i],
            });
          }
        });
    },
    done() {
      if (!this.address.id && this.orderType == 3) {
        this.$q.notify({
          position: "top",
          type: "negative",
          color: "orange-6",
          message: this.$t("please_choose_address"),
        });
      }

      if (this.address.id && this.orderType == 3) {
        const payload = {
          type_id: 3,
          address_id: this.address.id,
        };
        this.$store.commit("general/setOrderPayload", payload);
        this.$router.push("/payment/details");
      }

      if (this.orderType == 2) {
        const payload = {
          type_id: 2,
        };
        this.$store.commit("general/setOrderPayload", payload);
        this.$router.push("/payment/details");
      }
    },
    verifyPin() {
      const lang = this.$q.localStorage.getItem("lang") ?? "en";
      const payload = {
        phone: this.user.phone,
        pin: this.pin,
        fingerprint: this.getClientData(),
      };
      this.$axios
        .post(`${lang}/verify`, payload)
        .then((res) => {
          this.verificationDialog = false;
          this.$q.notify({
            position: "top",
            type: "negative",
            color: "green-6",
            message: this.$t("you_logged_in"),
          });
          this.user.id = res.data.data.user.id;
        })
        .catch((error) => {
          this.$q.notify({
            position: "top",
            type: "negative",
            color: "red-7",
            message: error.response.data.message,
          });
        });
    },
    startTimer(secounds) {
      this.verTimer = secounds;
      setTimeout(() => {
        this.verTimer = this.verTimer - 1;

        if (this.verTimer > 0) {
          this.startTimer(this.verTimer);
        } else {
          return 0;
        }
      }, 1000);
    },
    getClientData() {
      var mobile = false;
      let client = new ClientJS();
      if (client.isMobile() && client.isMobileIOS()) mobile = "ios";
      if (client.isMobile() && client.isMobileAndroid()) mobile = "android";
      if (client.isMobile() && client.isMobileBlackBerry())
        mobile = "blackberry";
      var clientTosend = {
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
      return clientTosend;
    },
    closeVerification() {
      this.verificationDialog = false;
      this.pin = "";
      this.$q.notify({
        position: "top",
        type: "info",
        color: "blue-6",
        message: this.$t("verify_number_to_order"),
      });
    },
    addressAutoFill() {
      if (this.$store.state.location.detailed) {
        this.$set(
          this.addressToAdd,
          "number",
          this.$store.state.location.detailed.house_number
        );
        this.$set(
          this.addressToAdd,
          "street",
          this.$store.state.location.detailed.road
        );
        this.$set(
          this.addressToAdd,
          "city",
          this.$store.state.location.detailed.neighbourhood
        );
        this.$set(
          this.addressToAdd,
          "country",
          this.$store.state.location.detailed.country
        );
        this.$set(
          this.addressToAdd,
          "region",
          this.$store.state.location.detailed.state
        );
      }
    },
    requestLocation() {
      this.loading = "autofill";

      const successfulLookup = (position) => {
        const { latitude, longitude } = position.coords;
        fetch(
          `https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=b759720cbecf4c248ac6535a3e63e0bb`
        )
          .then((response) => response.json())
          .then((response) => {
            var apikey = "b759720cbecf4c248ac6535a3e63e0bb";
            var latitude = response.results[0].geometry.lat;
            var longitude = response.results[0].geometry.lng;
            console.log(latitude);
            console.log(longitude);

            var api_url = "https://api.opencagedata.com/geocode/v1/json";

            var request_url =
              api_url +
              "?" +
              "key=" +
              apikey +
              "&q=" +
              encodeURIComponent(latitude + "," + longitude) +
              "&pretty=1" +
              "&no_annotations=1";

            // see full list of required and optional parameters:
            // https://opencagedata.com/api#forward

            var request = new XMLHttpRequest();
            request.open("GET", request_url, true);

            request.onload = () => {
              // see full list of possible response codes:
              // https://opencagedata.com/api#codes

              if (request.status === 200) {
                // Success!
                var data = JSON.parse(request.responseText);
                console.log(data);

                this.$store.commit(
                  "location/setGeometry",
                  data.results[0].geometry
                );

                this.$store.commit(
                  "location/setFormatted",
                  data.results[0].formatted
                );

                this.$store.commit(
                  "location/setDetailed",
                  data.results[0].components
                );

                //store data into local Storage
                this.$q.localStorage.set(
                  "location",
                  this.$store.state.location
                );

                // add general headers to requests
                const geometryString = JSON.stringify(data.results[0].geometry);
                this.$axios.defaults.headers.common[
                  "geometry"
                ] = geometryString;

                this.loading = false;

                this.addressAutoFill();
              } else if (request.status <= 500) {
                // We reached our target server, but it returned an error

                this.loading = false;
                this.$q.notify({
                  position: "top",
                  type: "negative",
                  color: "red-8",
                  message: "failed to get location",
                  classes: "q-mt-xl text-body1",
                });
                console.log(
                  "unable to geocode! Response code: " + request.status
                );
                var data = JSON.parse(request.responseText);
                console.log("error msg: " + data.status.message);
              } else {
                console.log("server error");
                this.loading = false;
                this.$q.notify({
                  position: "top",
                  type: "negative",
                  color: "red-8",
                  message: "failed to get location",
                  classes: "q-mt-xl text-body1",
                });
              }
            };

            request.onerror = () => {
              // There was a connection error of some sort
              console.log("unable to connect to server");
              this.loading = false;
              this.$q.notify({
                position: "top",
                type: "negative",
                color: "red-8",
                message: "failed to get location",
                classes: "q-mt-xl text-body1",
              });
            };

            request.send(); // make the request
          });
      };

      const failure = () => {
        console.log("Failed !!!!!");
        this.loading = false;
        this.$q.notify({
          position: "top",
          type: "negative",
          color: "red-8",
          message: "failed to get location",
          classes: "q-mt-xl text-body1",
        });
      };
      return navigator.geolocation.getCurrentPosition(
        successfulLookup,
        failure
      );
    },
  },
  watch: {
    orderType(n, o) {
      this.$q.localStorage.set("order_type", n);
    },
  },
};
</script>

<style>
</style>