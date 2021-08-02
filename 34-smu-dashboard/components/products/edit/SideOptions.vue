<template>
   <section>
      <nav class="pb-1 text-center border-b">
         <h1
            class="flex justify-center w-full text-xl font-bold tracking-wide text-gray-800 capitalize"
         >
            {{ $t("menu.options_extra") }}
            <button
               @click="$parent.isOpen = false"
               class="w-6 h-6 mx-2 text-sm text-red-500 border border-red-500 rounded-full hover:bg-red-200"
            >
               <font-awesome-icon :icon="['fas', 'times']" class="mt-1" />
               <span class="font-bold"></span>
            </button>
         </h1>

         <button
            class="px-2 py-1 mx-1 mt-2 text-sm text-blue-600 rounded hover:bg-blue-200"
            @click="
               $store.commit('modal/set', [
                  'CreateType',
                  $t('menu.new_option_group'),
                  $t('menu.add_option_group'),
                  null,
               ])
            "
         >
            <font-awesome-icon :icon="['fal', 'plus']" class="" />
            <font-awesome-icon :icon="['fal', 'apple-crate']" class="" />
            {{ $t("menu.option_group") }}
         </button>

         <button
            class="px-2 py-1 mx-1 mt-2 text-sm text-blue-600 rounded hover:bg-blue-200"
            @click="
               $store.commit('modal/set', [
                  'CreateOption',
                  $t('menu.new_option'),
                  $t('menu.add_option'),
                  null,
               ])
            "
         >
            <font-awesome-icon :icon="['fal', 'plus']" class="" />
            <font-awesome-icon :icon="['fal', 'apple-alt']" class="" />
            {{ $t("menu.option") }}
         </button>
      </nav>

      <section class="z-50">
         <!-- {{types}} -->
         <div v-for="(type, i) in types" :key="'types' + i" class="w-full">
            <Type :type="type" />
         </div>
      </section>
   </section>
</template>

<script>
import Type from "~/components/products/Type";
export default {
   name: "SideOptions",
   components: {
      Type,
   },
   props: {
      types: {
         type: Array,
         default: null,
      },
   },
};
</script>

<style>
</style>