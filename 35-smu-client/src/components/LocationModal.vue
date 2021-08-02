<template>
  <section>
    <!-- Verification Dialog -->
    <q-dialog v-model="globalLocationModal" persistent>
      <q-card class="q-dialog-plugin q-pa-md">
        <q-img
          src="~/assets/location-icon.svg"
          width="200px"
          class="q-mx-auto block q-my-lg"
        />

        <p class="text-blue-grey-8 text-center text-h6 text-weight-bold">
          {{ $t("access_location_for_better_service") }}
        </p>

        <!-- buttons example -->
        <q-card-actions vertical>
          <q-btn
            color="blue-8"
            class="full-width"
            unelevated
            :label="$t('allow')"
            @click="allowLocation()"
          />
          <q-btn
            color="grey-8"
            label="Cancel"
            class="q-mt-xl"
            flat
            dense
            no-caps
            @click="close()"
          />
        </q-card-actions>
      </q-card>
    </q-dialog>
  </section>
</template>

<script>
export default {
  data() {
    return {};
  },
  mounted() {
    // check if he is already refused for access location
    // const locationSelected = this.$q.localStorage.getItem("location_selected");
    // if (locationSelected === "reject") {
    //   this.close();
    // }
  },
  computed: {
    globalLocationModal() {
      return this.$store.state.location.modal;
    },
  },

  methods: {
    getLocation() {
      //close the modal first
      this.$store.commit("location/setModal", false);
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

                // close modal
                this.$store.commit("location/setModal", false);
              } else if (request.status <= 500) {
                // We reached our target server, but it returned an error

                this.$store.commit("location/setModal", false);
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
                this.$store.commit("location/setModal", false);
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
              this.$store.commit("location/setModal", false);
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
        this.$store.commit("location/setModal", false);
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
    allowLocation() {
      this.getLocation();
      this.open = false;
    },
    close() {
      this.$store.commit("location/setModal", false);

      //store that he is refused into local Storage
      this.$q.localStorage.set("location_selected", "reject");
    },
  },
};
</script>

<style>
</style>