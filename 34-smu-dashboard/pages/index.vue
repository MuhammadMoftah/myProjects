<template>
  <section class="flex items-center justify-center w-full h-full bg-red-600">
    <span class="flex flex-col justify-center w-1/4">
      <div class="self-center mb-20">
        <img src="~/assets/logo.png" style="margin: auto" />
      </div>

      <NuxtLink
        to="/manager/login"
        class="flex justify-center w-32 py-4 mx-auto my-2 text-center text-red-600 bg-white rounded shadow hover:bg-gray-200"
      >
        <font-awesome-icon :icon="['fal', 'plug']" class="mr-2 fa-lg" />
        Login
      </NuxtLink>
    </span>
  </section>
</template>

<script>
export default {
  name: "home",
  layout: "login",
  middleware: ["redirectIfAuthenticated"],
};
</script>

<style>
</style>