<template>
   <section
      class="fixed top-0 right-0 p-5 pt-10 mx-auto mt-24 bg-black bg-opacity-50 rounded"
      :class="errors.length ? 'left-0' : ''"
      style="width: max-content; min-width: 350px; z-index: 9999"
   >
      <span
         class="absolute top-0 bottom-0 right-0 px-4 py-3"
         style="z-index: 9999"
         @click="$store.commit('noti/hide')"
      >
         <svg
            class="w-6 h-6 text-sm text-red-500 border border-red-500 rounded-full fill-current"
            role="button"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
         >
            <path
               d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
            />
         </svg>
      </span>
      <transition-group
         name="slide-fade"
         tag="div"
         v-if="errors.length"
         mode="out-in"
      >
         <div
            class="relative px-8 py-3 mx-auto my-1 text-red-700 bg-red-100 border border-red-400 rounded"
            role="alert"
            style="width: max-content; max-width: 650px"
            v-for="(e, i) in errors"
            :key="'error' + i"
         >
            <strong class="font-bold">{{ e.head }}</strong>
            <span class="block px-1 sm:inline"> {{ e.body }}</span>
         </div>
      </transition-group>

      <!-- Table Notification -->
      <transition-group name="slide-fade" tag="div" v-if="tableNotis.length">
         <div
            style="min-width: 350px"
            class="px-4 py-3 my-2 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md"
            role="alert"
            v-for="(n, i) in tableNotis"
            :key="'noti' + i"
         >
            <div class="flex">
               <div class="py-1">
                  <svg
                     class="w-6 h-6 mr-4 text-teal-500 fill-current"
                     xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20"
                  >
                     <path
                        d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"
                     />
                  </svg>
               </div>
               <div>
                  <p class="font-bold">{{ n.head }}</p>
                  <p class="text-sm">
                     {{ n.body }}
                  </p>
               </div>
            </div>
         </div>
      </transition-group>
   </section>
</template>

<script>
export default {
   computed: {
      errors() {
         if (this.$store.state.noti.errors.length)
            return this.$store.state.noti.errors;
         return [];
      },
      tableNotis() {
         if (this.$store.state.noti.tableNotis.length)
            return this.$store.state.noti.tableNotis;
         return [];
      },
   },
};
</script>

<style scoped>
/* durations and timing functions.              */
.slide-fade-enter-active {
   transition: all 0.3s ease;
}
.slide-fade-leave-active {
   /* transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1); */
   transition: all 0.8s ease;
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
   transform: translateX(50px);
   opacity: 0;
}
</style>