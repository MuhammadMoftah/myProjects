<template>
   <div
      class="flex course-container"
      @scroll="scrollHandler($event)"
      ref="courses"
      style="scroll-behavior: smooth"
   >
      <section class="w-full px-1">
         <nav class="w-full pt-3 pb-2 bg-white border-b">
            <div class="flex items-center justify-between -mx-1">
               <aside class="flex items-center">
                  <button
                     class="px-2 py-1 mx-1 my-1 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-200"
                     @click="
                        $store.commit('modal/set', [
                           'CreateCourse',
                           $t('menu.new_course'),
                           $t('menu.add_cource'),
                           null,
                        ])
                     "
                  >
                     <font-awesome-icon :icon="['fal', 'plus']" class="" />
                     <font-awesome-icon
                        :icon="['fal', 'burger-soda']"
                        class=""
                     />
                     {{ $t("menu.new_course") }}
                  </button>

                  <button
                     class="px-2 py-1 mx-1 my-1 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-200"
                     @click="
                        $store.commit('modal/set', [
                           'CreateDish',
                           $t('menu.new_dish'),
                           $t('menu.add_dish'),
                           null,
                        ])
                     "
                  >
                     <font-awesome-icon :icon="['fal', 'plus']" class="" />
                     <font-awesome-icon
                        :icon="['fal', 'cheeseburger']"
                        class=""
                     />
                     {{ $t("menu.new_dish") }}
                  </button>

                  <button
                     class="w-32 px-2 py-1 mx-2 text-sm font-bold text-orange-500 border border-orange-500 rounded hover:bg-orange-200"
                     v-if="$store.state.products.generalOffers == 1"
                     @click="setGlobalOffers(false)"
                     :disabled="loading === 'generalOffers'"
                  >
                     <template v-if="loading === 'generalOffers'">
                        <font-awesome-icon
                           :icon="['fas', 'spinner']"
                           class="fa-spin"
                        />
                     </template>
                     <template v-else>
                        <font-awesome-icon :icon="['fas', 'flame']" />
                        {{ $t("menu.offers_on") }}
                     </template>
                  </button>

                  <button
                     :disabled="loading === 'generalOffers'"
                     class="w-32 px-2 py-1 mx-2 text-sm font-bold text-gray-500 border border-gray-500 rounded hover:bg-gray-200"
                     @click="setGlobalOffers(true)"
                     v-else
                  >
                     <template v-if="loading == 'generalOffers'">
                        <font-awesome-icon
                           :icon="['fas', 'spinner']"
                           class="fa-spin"
                        />
                     </template>
                     <template v-else>
                        {{ $t("menu.offers_off") }}
                     </template>
                  </button>
               </aside>

               <button
                  @click="isOpen = !isOpen"
                  class="px-2 py-1 mx-2 my-1 text-sm text-gray-600 border rounded hover:bg-gray-200"
               >
                  <font-awesome-icon :icon="['fas', 'bars']" class="" />
                  <span class="font-bold">Options</span>
               </button>
            </div>
         </nav>

         <main class="flex flex-wrap w-full">
            <div
               v-for="course in courses"
               :key="course.slug"
               class="w-full sm:w-2/4 lg:w-1/3 xl:w-1/4"
            >
               <Course :course="course" :dishes="course.products" />
            </div>
            <div class="flex items-center justify-center w-full h-32">
               <font-awesome-icon
                  v-if="loading && nextPage"
                  :icon="['fad', 'spinner']"
                  class="text-red-600 fa-4x fa-spin"
               />
            </div>
         </main>
      </section>

      <div
         v-if="false"
         class="fixed bottom-0 z-30 hidden w-1/4 h-full px-4 pt-8 overflow-auto transition-all duration-300 ease-in-out transform bg-gray-200 shadow xl:block"
         :class="$store.state.lang.rtl ? 'left-0' : 'right-0'"
         style="min-width: 320px; max-width: 23vw"
      >
         <SideOptions :types="types" />
      </div>

      <!-- Side options Mobileview -->
      <section>
         <aside
            class="fixed top-0 z-30 w-1/4 h-full px-4 pt-4 overflow-auto transition-all duration-300 ease-in-out transform bg-gray-200 shadow"
            style="min-width: 320px; max-width: 400px"
            :class="
               isOpen && !$store.state.lang.rtl
                  ? 'right-0 '
                  : !isOpen && !$store.state.lang.rtl
                  ? 'right-0 translate-x-full'
                  : isOpen && $store.state.lang.rtl
                  ? 'left-0 '
                  : 'left-0 -translate-x-full'
            "
         >
            <SideOptions :types="types" />
         </aside>
         <div
            v-if="isOpen === true"
            @click="isOpen = false"
            class="fixed top-0 left-0 z-20 w-full h-full transform bg-gray-900 bg-opacity-50"
         ></div>
      </section>

      <!-- edit side bar -->
      <SideBarEdit v-if="$store.state.edit.show" />

      <!-- modals -->
      <component :is="$store.state.modal.show"></component>
   </div>
</template>

<script>
import CreateCourse from "~/components/forms/CreateCourse";
import CreateDish from "~/components/forms/CreateDish";
import CreateType from "~/components/forms/CreateType";
import CreateOption from "~/components/forms/CreateOption";
import SideBarEdit from "~/components/products/edit/SideBarEdit";
import SideOptions from "~/components/products/edit/SideOptions";
import Course from "~/components/products/Course";

export default {
   name: "products",
   middleware: ["redirectIfGuest"],
   components: {
      CreateCourse,
      CreateDish,
      CreateType,
      CreateOption,
      SideBarEdit,
      SideOptions,
      Course,
   },
   async mounted() {
      //Set Global Header
      this.$axios.setHeader("X-SMU-LOCALE", this.$store.state.lang.code);
      // const courses = await this.$store.dispatch("products/getCourses");
      // this.nextPage = courses.data.links.next;
      await this.$store.dispatch("products/getTypes");

      //get General offers information
      await this.$store.dispatch("products/getOffers");
   },
   fetch() {
      // set route name
      this.$store.commit("locales/setRouteName", "menus");

      // get clicked menu details and store it as active menu
      this.getMenu();
   },
   fetchOnServer: false,
   activated() {
      this.$fetch();
   },

   data() {
      return {
         noti: false,
         generalOffers: "",
         isOpen: false,
         loading: false,
         nextPage: false,
      };
   },
   methods: {
      getMenu() {
         this.$store
            .dispatch("products/getCourses", this.$route.params.slug)
            .then((res) => {
               //Store menu as an Active Menu
               this.$store.commit("products/setActiveMenu", res.data.menu);
            })
            .catch((err) => {
               this.$router.push("/manager/menus");

               this.$store.dispatch("noti/pushError", {
                  body: err.response.data.error,
               });
            });
      },
      scrollHandler(event) {
         const element = event.srcElement;
         const x = element.scrollHeight - element.offsetHeight;
         if (element.scrollTop >= x && this.nextPage !== null) {
            this.fetchNextCourses();
         }
      },
      fetchNextCourses() {
         this.loading = true;
         this.$axios.$get(this.nextPage).then((res) => {
            this.$store.commit("products/pushToStore", res.data);
            this.nextPage = res.links.next;
            this.loading = null;
         });
      },

      async setGlobalOffers(offers) {
         this.loading = "generalOffers";
         await this.$axios
            .put("/settings/offer", {
                     value: offers
                })
            .then((res) => {
               // this.$store.dispatch("products/getOffers");
               this.$store.commit("products/setOffers", res.data.data.value);
               this.loading = false;
            })
            .catch((e) => {
               this.$store.dispatch("noti/pushError", {
                  body: e.response.data.data.message,
               });
               this.loading = false;
            });
      },
   },
   computed: {
      types() {
         return this.$store.state.products.types;
      },
      courses() {
         return this.$store.getters["products/getCourses"];
      },
   },
   watch: {
      isOpen: {
         immediate: true,
         handler(isOpen) {
            if (process.client) {
               if (isOpen)
                  document.body.style.setProperty("overflow", "hidden");
               else document.body.style.removeProperty("overflow");
            }
         },
      },
   },
};
</script>

<style >
.fade-enter-active,
.fade-leave-active {
   transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
   opacity: 0;
}
</style>
