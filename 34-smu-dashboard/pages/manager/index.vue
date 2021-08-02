<template>
  <section class="flex flex-col w-full p-4">
    <h2 class="w-full text-3xl font-bold tracking-wide text-gray-800">
      {{ $t("overview.welcome") }}
    </h2>

    <h3
      class="w-full mt-8 text-2xl italic tracking-wide text-center text-gray-600"
    >
      {{ $t("overview.data_appear") }}
    </h3>

    <span class="flex justify-around w-3/6 mx-auto mt-auto">
      <h3 class="w-full text-2xl font-bold tracking-wide text-gray-800">
        {{ $t("overview.quick_to") }}
      </h3>
    </span>
    <nav class="flex justify-around w-3/6 mx-auto mb-auto text-white">
      <NuxtLink
        to="manager/tables"
        class="flex flex-col items-center w-full p-4 m-8 bg-red-600 border border-red-700 rounded shadow-lg hover:bg-red-700"
      >
        <font-awesome-icon :icon="['fal', 'utensils']" class="mb-2 fa-lg" />
        {{ $t("overview.tables") }}
      </NuxtLink>

      <NuxtLink
        to="manager/kitchen"
        class="flex flex-col items-center w-full p-4 m-8 bg-red-600 border border-red-700 rounded shadow-lg hover:bg-red-700"
      >
        <font-awesome-icon :icon="['fal', 'receipt']" class="mb-2 fa-lg" />
        {{ $t("kitchen") }}
      </NuxtLink>

      <NuxtLink
        to="manager/menus"
        class="flex flex-col items-center w-full p-4 m-8 bg-red-600 border border-red-700 rounded shadow-lg hover:bg-red-700"
      >
        <font-awesome-icon
          :icon="['fal', 'clipboard-list']"
          class="mb-2 fa-lg"
        />
        {{ $t("overview.menu") }}
      </NuxtLink>
    </nav>
  </section>
</template>

<script>
export default {
  name: "manager",
  activated() {
    this.$store.commit("locales/setRouteName", "login.welcome");
  },
  middleware: ["redirectIfGuest"],
};
</script>

<style>
</style>
