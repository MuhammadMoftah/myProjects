<template>
   <!-- modal -->
   <div>
      <!-- card wrapper -->
      <div
         class="fixed top-0 left-0 z-50 flex items-center justify-center w-screen h-screen"
      >
         <!-- card component -->
         <div
            class="overflow-y-auto bg-white rounded-lg shadow-xl dark:bg-gray-800"
            style="max-height: 95vh; width: 90%"
            :style="{ maxWidth: max_width + 'px' }"
         >
            <!-- header -->
            <header
               class="relative flex items-center justify-between p-2 bg-gray-200 rounded-t-lg dark:bg-gray-900"
            >
               <!-- dynamic header -->
               <slot name="modal-header"> </slot>

               <slot name="close-icon">
                  <button
                     class="flex items-center justify-center mx-3 hover:text-blue-500"
                     aria-label="close"
                     @click="close()"
                  >
                     <font-awesome-icon :icon="['fad', 'times-circle']" />
                  </button>
               </slot>
            </header>

            <!-- body -->
            <section class="p-4 text-gray-700">
               <!-- dynamic content ... -->
               <slot> </slot>
            </section>

            <!-- footer -->
            <footer class="flex items-center justify-end p-2 rounded-b-lg">
               <!-- dynamic confirm button -->
               <slot name="confirm-button"> </slot>

               <!-- <template slot:cancel-button>
                  <button
                     class="px-4 py-1 text-sm capitalize bg-gray-300 rounded-full hover:bg-gray-500 dark:bg-gray-900"
                     @click="close()"
                  >
                     {{ $t("menu.cancel") }}
                  </button>
               </template> -->

               <slot name="cancel-button">
                  <button
                     class="px-4 py-1 text-sm capitalize bg-gray-300 rounded-full hover:bg-gray-500 dark:bg-gray-900"
                     @click="close()"
                  >
                     {{ $t("menu.cancel") }}
                  </button>
               </slot>
            </footer>
         </div>
      </div>

      <!-- background -->
      <div
         class="fixed top-0 left-0 z-40 w-screen h-screen bg-black bg-opacity-75 opacity-75"
      ></div>
   </div>
</template>

<script>
export default {
   name: "Modal",
   props: {
      max_width: {
         default: 1200,
      },
   },
   methods: {
      close() {
         this.$store.commit("modal/set", [false]);
         // this.$parent.close();
      },
   },
};
</script>