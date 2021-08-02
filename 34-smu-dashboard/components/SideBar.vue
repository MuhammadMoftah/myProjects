<template>
  <div
    class="flex flex-col min-h-screen overflow-auto text-white bg-gradient-to-b to-red-700 from-red-500 lg:w-40"
  >
    <NuxtLink to="/manager" exact-active-class>
      <img
        src="~/assets/logo.png"
        class="w-full mx-auto my-3"
        style="max-width: 100px; min-width: 80px"
      />
    </NuxtLink>

    <nav class="flex flex-col items-center justify-around my-auto capitalize">
      <NuxtLink
        :to="localePath('/manager')"
        class="flex flex-col items-center w-full py-4 text-xs text-center hover:bg-red-700"
        active-class="py-5 font-bold bg-red-700"
        exact
      >
        <font-awesome-icon :icon="['fal', 'home']" class="mb-2 fa-2x" />
        {{ $t("sidebar.overview") }}
      </NuxtLink>

      <NuxtLink
        :to="localePath('/manager/tables')"
        class="flex flex-col items-center w-full py-4 text-xs text-center hover:bg-red-700"
        active-class="py-5 font-bold bg-red-700"
      >
        <font-awesome-icon :icon="['fal', 'users']" class="mb-2 fa-2x" />
        {{ $t("sidebar.tables") }}
      </NuxtLink>

      <NuxtLink
        :to="localePath('/manager/kitchen')"
        class="flex flex-col items-center w-full py-4 text-xs text-center hover:bg-red-700"
        active-class="py-5 font-bold bg-red-700"
      >
        <font-awesome-icon :icon="['fal', 'utensils']" class="mb-2 fa-2x" />
        {{ $t("kitchen") }}
      </NuxtLink>

      <NuxtLink
        :to="localePath('/manager/orders')"
        active-class="py-5 font-bold bg-red-700"
        class="flex flex-col items-center w-full py-4 text-xs text-center hover:bg-red-700"
      >
        <font-awesome-icon :icon="['fal', 'receipt']" class="mb-2 fa-2x" />
        {{ $t("sidebar.orders") }}
      </NuxtLink>

      <NuxtLink
        :to="localePath('/manager/menus')"
        active-class="py-5 font-bold bg-red-700"
        class="flex flex-col items-center w-full py-4 text-xs text-center hover:bg-red-700"
      >
        <font-awesome-icon
          :icon="['fal', 'clipboard-list']"
          class="mb-2 fa-2x"
        />
        {{ $t("menus") }}
      </NuxtLink>

      <NuxtLink
        :to="localePath('/manager/settings')"
        class="flex flex-col items-center w-full py-4 text-xs text-center transition-all ease-in-out hover:bg-red-700"
        active-class="py-5 font-bold bg-red-700"
      >
        <font-awesome-icon :icon="['fas', 'cog']" class="mb-2 fa-2x" />
        {{ $t("sidebar.settings") }}
      </NuxtLink>
    </nav>

    <!-- Language -->
    <select
      class="w-24 h-10 px-2 mx-auto my-2 text-xs text-white bg-red-600 border rounded cursor-pointer"
      @change="selectChangeLang()"
      v-model="selectedLang"
      v-if="false"
    >
      <option
        :value="locale.code"
        v-for="locale in availableLocales"
        :key="locale.code"
      >
        {{ locale.name }}
      </option>
    </select>

    <footer class="flex items-center justify-center mb-4" dir="ltr">
      <p class="mx-1 my-0">SMU</p>
      <p class="text-sm text-red-200">V0.2.04</p>
    </footer>
  </div>
</template>

<script>
export default {
  name: "SideBar",
  data() {
    return {
      selectedLang: this.$i18n.localeProperties.code,
      lang: this.$auth.$storage.getUniversal("locale")
        ? this.$auth.$storage.getUniversal("locale")
        : "en",
    };
  },
  mounted() {
    this.changeAxios();
  },
  computed: {
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
    changeAxios() {
      this.$i18n.beforeLanguageSwitch = async (oldLocale, newLocale) => {
        let lang = this.$i18n.locales.filter((i) => i.code === newLocale);
        this.$store.commit("lang/setDirection", lang[0].code);
        // this.$axios.setHeader("X-SMU-LOCALE", app.store.state.lang.code);
        this.$axios.setHeader("X-SMU-LOCALE", lang[0].code);
        await this.$store.dispatch("products/getCourses");
        await this.$store.dispatch("products/getTypes");
      };
      this.changeLang(this.$i18n.loadedLanguages[0]);
    },
    async changeLang(localCode) {
      switch (localCode) {
        case "ar":
          this.$auth.$storage.setUniversal("locale", "ar");
          this.$store.commit("lang/setDirection", "ar");
          // this.$store.commit("locales/SET_LANG", "ar");
          break;
        case "en":
          this.$auth.$storage.setUniversal("locale", "en");
          this.$store.commit("lang/setDirection", "en");
          // this.$store.commit("locales/SET_LANG", "en");
          break;
      }
    },
    selectChangeLang() {
      this.$router.push(this.switchLocalePath(this.selectedLang));
    },
  },
};
</script>

<style scoped>
a {
  transition: all 0.3s ease;
}
</style>
