<template>
   <section>
      <Modal v-if="$store.state.modal.show" max_width="900">
         <!-- header -->
         <div slot="modal-header" class="capitalize">
            {{ $t("create_menu") }}
         </div>

         <!-- content -->
         <section
            class="flex font-bold text-black"
            style="min-height: 250px"
            v-if="page === 1"
         >
            <nav
               class="flex flex-wrap items-center justify-around w-full mt-6 -mx-2"
            >
               <div>
                  <input
                     id="blank"
                     class="hidden branch-input"
                     type="radio"
                     name="branch"
                     value="blank"
                     v-model="selectedType"
                  />
                  <label
                     for="blank"
                     class="relative flex flex-col items-center justify-center w-40 h-40 mx-2 my-1 text-sm font-bold text-gray-600 capitalize truncate border border-gray-100 rounded shadow-lg cursor-pointer hover:bg-gray-200"
                  >
                     <font-awesome-icon
                        :icon="['fas', 'clipboard']"
                        class="mb-4 text-5xl"
                     />
                     Blank Menu
                  </label>
               </div>

               <div>
                  <input
                     id="copy"
                     class="hidden branch-input"
                     type="radio"
                     name="branch"
                     value="copy"
                     v-model="selectedType"
                  />
                  <label
                     for="copy"
                     class="relative flex flex-col items-center justify-center w-40 h-40 mx-2 my-1 text-sm font-bold text-gray-600 capitalize truncate border border-gray-100 rounded shadow-lg cursor-pointer hover:bg-gray-200"
                  >
                     <font-awesome-icon
                        :icon="['fas', 'copy']"
                        class="mb-4 text-5xl"
                     />
                     Copy menu
                  </label>
               </div>

               <div>
                  <input
                     id="custom"
                     class="hidden branch-input"
                     type="radio"
                     name="branch"
                     value="custom"
                     v-model="selectedType"
                  />
                  <label
                     for="custom"
                     class="relative flex flex-col items-center justify-center w-40 h-40 mx-2 my-1 text-sm font-bold text-gray-600 capitalize truncate border border-gray-100 rounded shadow-lg cursor-pointer hover:bg-gray-200"
                  >
                     <font-awesome-icon
                        :icon="['fas', 'abacus']"
                        class="mb-4 text-5xl"
                     />
                     Custom Menu
                  </label>
               </div>
            </nav>
         </section>

         <!-- create blank menu -->
         <section v-if="page === 'blank'">
            <BlankMenu @blankMenuData="blankMenu = $event" />
         </section>

         <!-- copy  menu -->
         <section v-if="page === 'copy'">
            <CopyMenu @copiedMenuData="copiedMenu = $event" />
         </section>

         <!-- footer -->
         <template slot="confirm-button">
            <button
               v-if="selectedType === 'blank' && page === 1"
               class="px-4 py-1 mx-1 text-sm text-white capitalize bg-green-400 rounded-full hover:bg-green-500"
               @click="page = 'blank'"
            >
               {{ $t("next") }}

               <font-awesome-icon
                  :icon="['fas', 'chevron-right']"
                  class="mx-1 text-xs"
               />
            </button>

            <!-- create blank menu button -->
            <button
               v-if="page === 'blank' && !loading"
               class="px-4 py-1 mx-1 text-sm font-bold text-white capitalize bg-green-400 rounded-full hover:bg-green-500"
               @click="createBlankMenu()"
            >
               {{ $t("create") }}
               <font-awesome-icon
                  v-if="loading === 'nextbutton'"
                  :icon="['fad', 'spinner']"
                  class="fa-spin"
               />
               <font-awesome-icon
                  v-else
                  :icon="['fas', 'plus']"
                  class="mx-1 text-xs"
               />
            </button>

            <!-- create duplicated menu  -->
            <button
               v-if="page === 'copy' && !loading"
               class="px-4 py-1 mx-1 text-sm font-bold text-white capitalize bg-green-400 rounded-full hover:bg-green-500"
               @click="createCopiedMenu()"
            >
               {{ $t("create") }}
               <font-awesome-icon
                  v-if="loading === 'nextbutton'"
                  :icon="['fad', 'spinner']"
                  class="fa-spin"
               />
               <font-awesome-icon
                  v-else
                  :icon="['fas', 'plus']"
                  class="mx-1 text-xs"
               />
            </button>
            <button
               v-if="selectedType === 'custom'"
               class="px-4 py-1 mx-1 text-sm text-white capitalize bg-green-400 rounded-full hover:bg-green-500"
               @click="
                  $router.push(localePath('/manager/menus/custom')),
                     $store.commit('modal/set', [null])
               "
            >
               {{ $t("custom") }}

               <font-awesome-icon
                  :icon="['fas', 'cog']"
                  class="mx-1 text-xs fa-spin"
               />
            </button>
            <button
               v-if="selectedType === 'copy' && page === 1"
               class="px-4 py-1 mx-1 text-sm text-white capitalize bg-green-400 rounded-full hover:bg-green-500"
               @click="page = 'copy'"
               :disabled="loading === 'nextbutton'"
            >
               {{ $t("next") }}

               <font-awesome-icon
                  :icon="['fas', 'chevron-right']"
                  class="mx-1 text-xs"
               />
            </button>

            <button
               class="w-24 px-4 py-1 mx-1 text-sm font-bold text-white capitalize bg-green-400 rounded-full hover:bg-green-500"
               disabled
               v-if="loading === 'createMenu'"
            >
               <font-awesome-icon :icon="['fad', 'spinner']" class="fa-spin" />
            </button>
         </template>
      </Modal>
   </section>
</template>

<script>
import BlankMenu from "~/components/menus/BlankMenu";
import CopyMenu from "~/components/menus/CopyMenu";

export default {
   components: {
      BlankMenu,
      CopyMenu,
   },
   data() {
      return {
         page: 1,
         loading: "",
         selectedType: "",
         blankMenu: { name: "", file: "" },
         copiedMenu: { name: "", file: "" },
      };
   },
   methods: {
      createBlankMenu() {
         this.loading = "createMenu";
         const payload = new FormData();
         payload.append("name", this.blankMenu.name);
         if (this.blankMenu.file) {
            payload.append("file", this.blankMenu.file);
         }
         this.$axios
            .post("/menus", payload)
            .then(() => {
               this.$store.commit("modal/set", [null]);
               //get menus and store it
               this.$store.dispatch("menus/refreshMenus");
               this.loading = "";
            })
            .catch((err) => {
               for (const error in err.response.data?.errors) {
                  this.$store.dispatch("noti/pushError", {
                     body: err.response.data.errors[error][0],
                  });
               }
               this.$store.commit("modal/set", [null]);
               this.loading = "";
            });
      },
      createCopiedMenu() {
         this.loading = "createMenu";
         const payload = new FormData();
         payload.append("name", this.copiedMenu.name);

         if (this.copiedMenu.file) {
            payload.append("file", this.copiedMenu.file);
         }
         this.$axios
            .post("/menus/" + this.copiedMenu.slug + "/duplicate", payload)
            .then(() => {
               this.$store.commit("modal/set", [null]);
               //get menus and store it
               this.$store.dispatch("menus/refreshMenus");

               this.loading = "";
            })
            .catch((err) => {
               for (const error in err.response.data?.errors) {
                  this.$store.dispatch("noti/pushError", {
                     body: err.response.data.errors[error][0],
                  });
               }
               this.$store.commit("modal/set", [null]);
               this.loading = "";
            });
      },
   },
};
</script>

<style>
.branch-input:checked + label {
   @apply border-red-200;
   @apply bg-red-200;
   @apply text-red-500;
}
</style>