<template>
  <section class="flex flex-col justify-center">
    <!-- header -->
    <p class="mb-6 text-2xl font-bold text-center text-gray-600 capitalize">
      Create blank menu
    </p>
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
              <span>{{ $t("upload_file") }}</span>
              <input
                id="file-upload"
                name="file-upload"
                type="file"
                @change="setBlankImage($event)"
                class="sr-only"
                accept="image/x-png,image/png,image/jpeg,image/jpg"
              />
            </label>
          </div>
          <p class="text-xs text-gray-500" v-if="blankMenu.file">
            {{ blankMenu.file.name }}
          </p>
          <p class="text-xs text-gray-500" v-else>PNG, JPG up to 1MB</p>
        </div>
      </div>
    </div>
    <div class="mb-6">
      <label for="name" class="block mb-2 text-sm text-gray-600">
        {{ $t("menu_name") }}
      </label>
      <input
        type="text"
        name="name"
        id="name"
        v-model="blankMenu.name"
        placeholder="Example Menu"
        required
        class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
      />
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      blankMenu: { name: "", file: "" },
    };
  },
  methods: {
    setBlankImage(e) {
      if (e.target.files[0].size > 1000000) {
        this.$store.dispatch("noti/pushError", {
          body: "Image larger than 1 mb",
        });
        return;
      }
      this.blankMenu.file = e.target.files[0];
    },
  },
  updated() {
    this.$emit("blankMenuData", this.blankMenu);
  },
};
</script>

<style>
</style>