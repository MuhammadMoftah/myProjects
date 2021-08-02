<template>
  <section class="w-full p-4">
    <div class="flex flex-wrap py-6 mb-4 -mx-2 rounded" v-if="settings.length">
      <template v-for="setting in settings">
        <div
          class="w-full py-1 mb-2 lg:w-1/3"
          v-if="setting.key == 'banner'"
          :key="setting.id"
        >
          <img
            v-if="setting.value.length"
            :src="setting.value[0].url"
            class="block object-cover h-32 max-w-sm p-1 mx-auto rounded"
          />
          <img
            v-else
            :src="require('@/static/icon.png')"
            class="block object-cover h-32 max-w-sm p-4 mx-auto border rounded"
          />
          <label
            for="coverfile"
            class="block px-2 py-1 mx-auto my-1 text-sm font-bold text-center text-red-600 capitalize border border-red-600 rounded cursor-pointer hover:bg-red-200"
            style="width: max-content"
          >
            {{ $t("settings.change_cover") }}
          </label>

          <input
            type="file"
            accept="image/*"
            hidden
            name=""
            id="coverfile"
            ref="coverfile"
            @change="changeSingleSetting(setting, $event)"
          />
        </div>

        <div
          class="w-full py-1 mb-2 lg:w-1/3"
          v-if="setting.key == 'logo'"
          :key="setting.id"
        >
          <img
            v-if="setting.value.length"
            :src="setting.value[0].url"
            class="block object-cover w-32 h-32 p-1 mx-auto rounded"
          />
          <img
            v-else
            :src="require('@/static/icon.png')"
            class="block object-cover h-32 p-4 mx-auto border rounded"
          />
          <label
            for="logofile"
            class="block px-2 py-1 mx-auto my-1 text-sm font-bold text-center text-red-600 capitalize border border-red-600 rounded cursor-pointer hover:bg-red-200"
            style="width: max-content"
          >
            {{ $t("settings.change_logo") }}
          </label>

          <input
            type="file"
            accept="image/*"
            hidden
            name=""
            id="logofile"
            ref="logofile"
            @change="changeSingleSetting(setting, $event)"
          />
        </div>

        <!-- Offer banner -->
        <div
          class="w-full py-1 mb-2 lg:w-1/3"
          v-if="setting.key == 'offer_banner'"
          :key="setting.id"
        >
          <img
            v-if="setting.value.length"
            :src="setting.value[0].url"
            class="block object-cover h-32 max-w-sm p-1 mx-auto rounded"
          />

          <img
            v-else
            :src="require('@/static/icon.png')"
            class="block object-cover h-32 max-w-sm p-4 mx-auto border rounded"
          />

          <label
            :for="setting.id"
            class="block px-2 py-1 mx-auto my-1 text-sm font-bold text-center text-red-600 capitalize border border-red-600 rounded cursor-pointer hover:bg-red-200"
            style="width: max-content"
          >
            {{ $t("settings.change_offer_banner") }}
          </label>
          <input
            type="file"
            accept="image/*"
            hidden
            name=""
            :id="setting.id"
            ref="offerbanner"
            @change="changeSingleSetting(setting, $event)"
          />
        </div>

        <!-- select case  -->
        <div
          class="relative w-full p-2 mb-2 capitalize rounded sm:w-1/3"
          v-if="setting.data_type == 'array'"
          :key="setting.id"
        >
          <label class="block mb-2 font-bold text-red-600" :for="setting.key">
            {{ $t("settings." + setting.key) }}
          </label>
          <select
            class="input"
            :id="setting.id"
            @change="changeSingleSetting(setting, $event)"
          >
            <option
              v-for="variable in setting.data_variable"
              :key="variable"
              :value="setting.value"
            >
              {{ variable }}
            </option>
          </select>

          <span
            v-if="setting.key == 'description' && setting.value"
            class="flex justify-end px-1 font-light"
            :class="
              setting.value.length === 255 ? 'font-bold text-green-500' : ''
            "
          >
            {{ setting.value.length }}/255
          </span>
        </div>

        <!-- Rest of settings -->
        <div
          class="relative w-full p-2 mb-2 capitalize rounded sm:w-1/3"
          v-if="
            setting.key !== 'banner' &&
            setting.key !== 'offer_banner' &&
            setting.key !== 'logo' &&
            setting.data_type !== 'array'
          "
          :key="setting.id"
        >
          <span
            v-if="setting.key == 'services' || setting.key == 'vat'"
            class="absolute inset-y-0 left-0 flex items-center h-20 pt-5 pl-5 mt-2"
          >
            <font-awesome-icon
              class="text-red-500"
              :icon="['fas', 'percent']"
            />
          </span>
          <label class="block mb-2 font-bold text-red-600" :for="setting.key">
            {{ $t("settings." + setting.key) }}
          </label>
          <input
            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded lappearance-none focus:outline-none focus:shadow-outline"
            :class="
              setting.key == 'services' || setting.key == 'vat' ? 'px-8' : ''
            "
            :id="setting.id"
            :type="setting.type"
            :placeholder="setting.name"
            v-model="setting.value"
            maxlength="255"
            @change="changeSingleSetting(setting, $event)"
          />
          <span
            v-if="setting.key == 'description' && setting.value"
            class="flex justify-end px-1 font-light"
            :class="
              setting.value.length === 255 ? 'font-bold text-green-500' : ''
            "
          >
            {{ setting.value.length }}/255
          </span>
        </div>
      </template>

      <!-- disable actions for now  -->
      <div
        class="flex items-start w-full mt-4 text-base border-red-400 border-top"
        v-if="false"
      >
        <button
          class="px-2 py-1 mx-2 my-1 text-sm font-bold text-blue-600 border border-blue-600 rounded hover:bg-blue-200"
          @click="storeSetting()"
        >
          <font-awesome-icon :icon="['fal', 'check']" class="" />
          {{ $t("settings.save") }}
        </button>
        <button
          class="px-2 py-1 mx-2 my-1 text-sm font-bold text-gray-600 border border-gray-600 rounded hover:bg-gray-200"
          @click="getOldData()"
        >
          <font-awesome-icon :icon="['fal', 'times']" class="" />
          {{ $t("settings.reset") }}
        </button>
      </div>
    </div>

    <transition name="fade">
      <ErrorNoti v-if="$store.state.noti.show" />
    </transition>

    <!-- loader section  -->
    <div
      class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full bg-white bg-opacity-50"
      v-show="loader"
    >
      <img src="~/assets/red-spinner.gif" alt="loading" />
    </div>
  </section>
</template>

<script>
export default {
  name: "settings",
  middleware: ["redirectIfGuest"],
  data() {
    return {
      settings: [],
      previewImg: "",
      previewCover: "",
      previewOfferCover: "",
      imageToUpload: null,
      coverToUpload: null,
      offerBannerToUpload: null,
      loader: false,
    };
  },
  fetch() {
    // set route name
    this.$store.commit("locales/setRouteName", "settings.settings");
    //get settings
    this.getSettings();
  },
  fetchOnServer: false,
  activated() {
    this.$fetch();
  },
  methods: {
    changeSingleSetting(setting, event) {
      this.loader = true;
      const branch = this.$auth.$storage.getUniversal("selectedBranch");

      //file case
      if (setting.type === "file") {
        const payload = new FormData();
        payload.append("file", event.target.files[0]);
        this.$axios
          .post(
            `settings/${setting.key}?_method=patch`,
            payload
          )
          .then((res) => {
            this.settings = res.data.data;
            this.loader = false;
          })
          .catch((err) => {
            //reset the component
            this.loader = false;
            Object.assign(this.$data, this.$options.data());
            for (const error in err.response.data.errors) {
              this.$store.dispatch("noti/pushError", {
                body: err.response.data.errors[error][0],
              });
            }
          });
        return;
      }

      // select case
      if (setting.data_type === "array") {
        const payload = {
          value: event.target.options[event.target.options.selectedIndex].text,
        };

        this.$axios
          .post(
            `settings/${setting.key}?_method=patch`,
            payload
          )
          .then((res) => {
            this.loader = false;
            this.settings = res.data.data;
          })
          .catch((err) => {
            //reset the component
            this.loader = false;
            Object.assign(this.$data, this.$options.data());
            for (const error in err.response.data.errors) {
              this.$store.dispatch("noti/pushError", {
                body: err.response.data.errors[error][0],
              });
            }
          });
        this.loader = false;
        return;
      }

      //rest of inputs case
      this.$axios
        .patch(`settings/${setting.key}`, {
          value: event.target.value,
        })
        .then((res) => {
          this.settings = res.data.data;
          this.loader = false;
        })
        .catch((err) => {
          //reset the component
          Object.assign(this.$data, this.$options.data());
          for (const error in err.response.data.errors) {
            this.$store.dispatch("noti/pushError", {
              body: err.response.data.errors[error][0],
            });
          }
        });
    },
    getSettings() {
      const branch = this.$auth.$storage.getUniversal("selectedBranch");
      this.$axios
        .$get(`settings`)
        .then((res) => {
          this.settings = res.data;
        })
        .catch(() => {});
    },
  },
};
</script>
