<template>
  <div class="flex flex-col flex-1 bg-gradient-to-r from-gray-100 to-gray-200">
    <nav class="z-20 flex justify-between h-16 px-4">
      <ul class="flex items-center">
        <li>
          <h1 class="px-2 text-xl font-bold text-gray-700 capitalize">
            {{ routeName }}
          </h1>
        </li>
      </ul>

      <!-- to bar right  -->
      <ul class="flex items-center">
        <li
          class="relative flex items-center justify-center w-12 h-12 mx-3 rounded cursor-pointer hover:bg-gray-300"
          @click="langMenu = true"
          @mouseleave="langMenu = false"
          @keydown.enter="langMenu = !langMenu"
        >
          <font-awesome-icon
            :icon="['fas', 'globe-americas']"
            class="relative text-gray-800 fa-lg"
          />

          <transition
            enter-active-class="transition duration-300 ease-out transform"
            enter-class="scale-95 -translate-y-3 opacity-0"
            enter-to-class="scale-100 translate-y-0 opacity-100"
            leave-active-class="transition duration-150 ease-in transform"
            leave-class="translate-y-0 opacity-100"
            leave-to-class="-translate-y-3 opacity-0"
          >
            <div
              v-show="langMenu"
              class="absolute top-0 z-20 mt-12 text-center"
              style="min-width: 170px"
            >
              <div
                class="relative py-1 bg-white border border-gray-200 rounded-md shadow-xl"
              >
                <div class="relative">
                  <button
                    v-for="lang in availableLocales"
                    :key="lang.code"
                    @click="selectChangeLang(lang.code)"
                    class="block w-full px-4 py-2 text-sm font-semibold bg-transparent md:mt-0 hover:text-gray-800 focus:text-gray-800 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                  >
                    {{ lang.name }}
                  </button>
                </div>
              </div>
            </div>
          </transition>
        </li>

        <li
          class="relative inline-block w-12 h-12 rounded cursor-pointer hover:bg-gray-300"
          @click="profileMenu = true"
          @mouseleave="profileMenu = false"
          @keydown.enter="profileMenu = !profileMenu"
        >
          <img
            v-if="$store.state.me.list.avatar"
            class="object-cover w-full h-full mx-auto border rounded-full hover:bg-gray-200"
            :src="$store.state.me.list.avatar"
            alt="Profile Image"
          />
          <img
            v-else
            class="object-cover w-full h-full mx-auto border rounded-full hover:bg-gray-200"
            src="~/assets/smu-2.svg"
            alt="Profile Image"
          />

          <transition
            enter-active-class="transition duration-300 ease-out transform"
            enter-class="scale-95 -translate-y-3 opacity-0"
            enter-to-class="scale-100 translate-y-0 opacity-100"
            leave-active-class="transition duration-150 ease-in transform"
            leave-class="translate-y-0 opacity-100"
            leave-to-class="-translate-y-3 opacity-0"
          >
            <div
              v-show="profileMenu"
              class="absolute z-20 text-center"
              :class="$t('dir') === 'rtl' ? 'left-0 ' : 'right-0'"
              style="min-width: 170px"
            >
              <div
                class="relative bg-white border border-gray-200 rounded-md shadow-xl"
              >
                <div class="relative">
                  <div
                    class="block w-full px-4 py-2 text-sm font-medium text-gray-600 capitalize bg-transparent border-b md:mt-0 focus:outline-none focus:shadow-outline"
                    v-if="$store.state.auth.user.name"
                  >
                    {{ $store.state.auth.user.name }}
                  </div>

                  <button
                    v-if="false"
                    class="block w-full px-4 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent md:mt-0 hover:text-gray-800 focus:text-gray-800 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                  >
                    {{ $t("account") }}
                  </button>

                  <NuxtLink
                    class="block w-full px-4 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent border-t md:mt-0 hover:text-gray-800 focus:text-gray-800 hover:bg-gray-200 focus:outline-none focus:shadow-outline"
                    tag="button"
                    exact-active-class
                    :to="localePath('/manager/reports')"
                  >
                    {{ $t("reports") }}
                  </NuxtLink>

                  <button
                    class="block w-full px-4 py-2 text-sm font-semibold text-gray-800 capitalize bg-transparent border-t md:mt-0 hover:text-gray-800 focus:text-gray-800 hover:bg-gray-200 focus:outline-none focus:shadow-outline"
                    @click="$store.commit('me/branchesModal', true)"
                  >
                    {{ $t("change_branch") }}
                  </button>

                  <button
                    @click="logout"
                    class="block w-full px-4 py-2 pt-3 font-medium text-red-500 capitalize whitespace-no-wrap border-t hover:bg-red-200 focus:outline-none hover:border-red-200"
                  >
                    <font-awesome-icon :icon="['fas', 'power-off']" />

                    {{ $t("sidebar.logout") }}
                  </button>
                </div>
              </div>
            </div>
          </transition>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  name: "TopBar",
  data() {
    return {
      profileMenu: false,
      langMenu: false,
    };
  },
  computed: {
    routeName() {
      const routeName = this.$store.state.locales.routeName;
      const translate = this.$t(routeName);
      return translate;
    },
    availableLocales() {
      //filter the selected locale
      // return this.$i18n.locales.filter((i) => i.code !== this.$i18n.locale);
      return this.$i18n.locales;
    },
    selectedLocales() {
      return this.$i18n.locales.filter((i) => i.code == this.$i18n.locale);
    },
  },

  methods: {
    selectChangeLang(code) {
      // this.$router.push(this.switchLocalePath(code));
      if (code === "en") {
        this.$router.push(`/manager`);
      } else {
        this.$router.push(`/${code}/manager`);
      }
    },
    logout() {
      delete this.$axios.defaults.headers.common["X-SMU-BRANCH"];
      this.$auth.logout();

      setTimeout(() => {
        this.$router.push("/manager/login");
      }, 200);
    },
  },
};
</script>

<style>
</style>