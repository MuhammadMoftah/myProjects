<template>
   <div
      class="fixed bottom-0 left-0 flex justify-center w-full text-white bg-red-600"
   >
      <nav class="flex items-center justify-around overflow-x-auto capitalize">
         <NuxtLink
            :to="localePath('/manager')"
            class="flex flex-col items-center justify-center w-20 h-full px-1 py-2 text-xs font-bold border-r border-red-500 hover:bg-red-700"
         >
            <font-awesome-icon :icon="['fal', 'home']" class="mb-1 fa-2x" />
            {{ $t("sidebar.overview") }}
         </NuxtLink>
         <NuxtLink
            :to="localePath('/manager/tables')"
            class="flex flex-col items-center justify-center w-20 h-full px-1 py-2 text-xs font-bold border-r border-red-500 hover:bg-red-700"
         >
            <font-awesome-icon :icon="['fal', 'users']" class="mb-2 fa-2x" />
            {{ $t("sidebar.tables") }}
         </NuxtLink>

         <NuxtLink
            :to="localePath('/manager/kitchen')"
            class="flex flex-col items-center justify-center w-20 h-full px-1 py-2 text-xs font-bold border-r border-red-500 hover:bg-red-700"
         >
            <font-awesome-icon :icon="['fal', 'utensils']" class="mb-2 fa-2x" />
            {{ $t("kitchen") }}
         </NuxtLink>

         <NuxtLink
            :to="localePath('/manager/orders')"
            class="flex flex-col items-center justify-center w-20 h-full px-1 py-2 text-xs font-bold border-r border-red-500 hover:bg-red-700"
         >
            <font-awesome-icon :icon="['fal', 'receipt']" class="mb-2 fa-2x" />
            {{ $t("sidebar.orders") }}
         </NuxtLink>

         <NuxtLink
            :to="localePath('/manager/menus')"
            class="flex flex-col items-center justify-center w-20 h-full px-1 py-2 text-xs font-bold border-r border-red-500 hover:bg-red-700"
         >
            <font-awesome-icon
               :icon="['fal', 'clipboard-list']"
               class="mb-2 fa-2x"
            />
            {{ $t("menus") }}
         </NuxtLink>

         <NuxtLink
            :to="localePath('/manager/settings')"
            style="max-width: 135px"
            class="flex flex-col items-center justify-center w-20 h-full px-1 py-2 text-xs font-bold border-r border-red-500 hover:bg-red-700hover:bg-red-700"
         >
            <font-awesome-icon :icon="['fas', 'cog']" class="mb-2 fa-2x" />
            {{ $t("sidebar.settings") }}
         </NuxtLink>
      </nav>

      <!-- Language -->
      <select
         v-if="false"
         class="w-24 h-10 px-2 mx-auto my-2 text-xs font-bold text-white bg-red-600 border rounded cursor-pointer"
         @change="selectChangeLang()"
         v-model="selectedLang"
      >
         <option
            :value="locale.code"
            v-for="locale in availableLocales"
            :key="locale.code"
         >
            {{ locale.name }}
         </option>
      </select>

      <footer
         v-if="false"
         class="flex flex-col items-center justify-center mb-4"
      >
         <p class="mx-1 my-0">SMU</p>
         <p class="text-sm text-red-200">V0.2.03</p>
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

<style></style>
