<template>
  <section class="flex flex-wrap pb-40">
    <div
      class="flex flex-col w-full p-16 pb-32 border-r border-gray-200 md:w-1/3"
    >
      <div class="pb-6">
        <div
          class="flex justify-center max-w-xs px-6 pt-5 pb-6 mx-auto mt-1 border-2 border-gray-300 border-dashed rounded-md"
        >
          <div class="text-center">
            <svg
              class="w-12 h-12 mx-auto text-gray-400"
              stroke="currentColor"
              fill="none"
              viewBox="0 0 48 48"
              aria-hidden="true"
            >
              <path
                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
            <div class="mb-1 text-sm text-gray-600">
              <label
                for="file-upload"
                class="relative font-medium text-center text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500"
              >
                <span>Upload a file</span>
                <input
                  id="file-upload"
                  name="file-upload"
                  type="file"
                  @change="setImage($event)"
                  class="sr-only"
                  accept="image/x-png,image/png,image/jpeg,image/jpg"
                />
              </label>
            </div>
            <p class="text-xs text-gray-500" v-if="customMenu.file">
              {{ customMenu.file.name }}
            </p>
            <p class="text-xs text-gray-500" v-else>PNG, JPG up to 1MB</p>
          </div>
        </div>
      </div>
      <div class="mb-6">
        <label for="name" class="block mb-2 text-sm text-gray-600">
          Menu name
        </label>
        <input
          type="text"
          name="name"
          id="name"
          v-model="customMenu.name"
          placeholder="Example Menu"
          required
          class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
        />
      </div>

      <div class="mb-6" v-if="selectedCategories.length">
        <label for="name" class="block mb-1 text-sm text-gray-600">
          Selected Categories
        </label>
        <div class="flex flex-wrap -mx-1">
          <span
            v-for="cat in selectedCategories"
            :key="cat.id"
            class="flex flex-col px-3 py-2 mx-1 my-1 text-sm font-bold leading-none text-white bg-blue-600 rounded"
          >
            {{ cat.name }}
            <span class="block pt-1 text-xs font-medium">
              {{ cat.menu_name }}
            </span>
          </span>
        </div>
      </div>
    </div>

    <div class="w-full px-6 md:w-2/3">
      <div v-for="menu in menus" :key="menu.id" class="my-10">
        <template v-if="menu.categories.length">
          <h2
            class="block pt-5 pb-1 text-lg font-bold text-gray-600 capitalize"
          >
            {{ menu.name }}
          </h2>
          <div class="-mx-2">
            <div
              v-for="cat in menu.categories"
              :key="cat.id"
              class="inline-block"
            >
              <input
                :id="cat.id"
                class="hidden cat-input"
                type="checkbox"
                name="branch"
                @click="chooseCat($event, cat, menu)"
              />

              <label
                :for="cat.id"
                class="relative flex flex-col justify-center p-2 m-2 capitalize truncate border border-gray-100 rounded shadow cursor-pointer hover:bg-gray-200"
              >
                <p class="px-2 mt-2 font-bold text-gray-700">
                  {{ cat.name }}
                </p>
                <span class="px-2 text-sm text-gray-600">
                  {{ menu.name }}
                </span>
              </label>
            </div>
          </div>
        </template>
      </div>
      <button
        class="fixed bottom-0 left-0 right-0 z-30 block w-full max-w-xs py-3 mx-auto mb-20 text-lg font-bold text-blue-600 capitalize bg-white border border-blue-600 rounded-lg shadow lg:mb-8 hover:bg-blue-200"
        @click="createMenu()"
        v-if="!loader"
      >
        {{ $t("create_menu") }}
      </button>

      <button
        class="fixed bottom-0 left-0 right-0 z-30 block w-full max-w-xs py-3 mx-auto mb-20 text-lg font-bold text-white bg-blue-500 shadow sm:mb-8 rounded-xl"
        disabled
        v-else
      >
        <font-awesome-icon :icon="['fas', 'spinner']" class="fa-spin" />
      </button>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      customMenu: { name: "", file: "", categories: "" },
      menus: [],
      selectedCategories: [],
      loader: false,
    };
  },
  mounted() {
    // set route name
    this.$store.commit("locales/setRouteName", "create_custom_menu");

    this.$axios.get("menus/categories?per_page=99999").then((res) => {
      this.menus = res.data.data;
    });
  },
  methods: {
    setImage(e) {
      if (e.target.files[0]?.size > 1000000) {
        this.$store.dispatch("noti/pushError", {
          body: "Image larger than 1 mb",
        });
        return;
      }
      this.customMenu.file = e.target.files[0];
    },

    chooseCat(event, cat, menu) {
      const checked = event.target.checked;
      cat.menu_name = menu.name;
      if (checked) {
        this.selectedCategories.push(cat);
      } else {
        this.selectedCategories.pop(cat);
      }
    },
    createMenu() {
      this.loader = true;
      var payload = new FormData();
      for (const n in this.selectedCategories) {
        payload.append("categories[]", this.selectedCategories[n].id);
      }
      payload.append("name", this.customMenu.name);

      if (this.customMenu.file) {
        payload.append("file", this.customMenu.file);
      }
      this.$axios
        .post("/menus", payload)
        .then(() => {
          this.loader = false;
          this.$router.push(this.localePath("/manager/menus"));
          this.$store.dispatch("menus/refreshMenus");
        })
        .catch((err) => {
          this.loader = false;
          for (const error in err.response.data?.errors) {
            this.$store.dispatch("noti/pushError", {
              body: err.response.data.errors[error][0],
            });
          }
        });
    },
  },
};
</script>

<style scoped>
.cat-input:checked + label {
  @apply border-blue-200;
  @apply bg-blue-200;
}
</style>