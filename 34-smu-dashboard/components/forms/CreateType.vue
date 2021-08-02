<template>
   <div>
      <transition name="fade">
         <Modal v-if="$store.state.modal.show" max_width="400">
            <!-- header -->
            <template slot="modal-header">
               {{ $store.state.modal.header }}
            </template>
            <!-- content -->
            <input
               type="text"
               v-model="typeName"
               class="p-2 m-2 border rounded"
               placeholder="Extra's"
            />
            <div class="px-2 mx-1">
               <div
                  class="relative inline-block w-10 mr-2 align-middle transition duration-200 ease-in select-none"
               >
                  <input
                     type="checkbox"
                     name="toggle"
                     id="toggle"
                     v-model="multi_select"
                     @change="
                        incremental = multi_select ? multi_select : incremental
                     "
                     class="absolute block w-6 h-6 bg-white border-4 rounded-full appearance-none cursor-pointer toggle-checkbox"
                     :v-tooltip="$t('menu.note_multi_select')"
                  />
                  <label
                     for="toggle"
                     class="block h-6 overflow-hidden bg-gray-300 rounded-full cursor-pointer toggle-label"
                  ></label>
               </div>
               <label
                  for="toggle"
                  :v-tooltip="$t('menu.note_multi_select')"
                  class="text-xs text-gray-700"
                  >{{ $t("menu.multi_select") }}.</label
               >
               <div
                  class="relative inline-block w-10 mr-2 align-middle transition duration-200 ease-in select-none"
               >
                  <input
                     type="checkbox"
                     name="incremental"
                     id="incremental"
                     v-model="incremental"
                     @change="
                        multi_select = incremental ? multi_select : incremental
                     "
                     class="absolute block w-6 h-6 bg-white border-4 rounded-full appearance-none cursor-pointer toggle-checkbox"
                     :v-tooltip="$t('menu.note_multi_select')"
                  />
                  <label
                     for="incremental"
                     class="block h-6 overflow-hidden bg-gray-300 rounded-full cursor-pointer toggle-label"
                  ></label>
               </div>
               <label
                  for="incremental"
                  :v-tooltip="$t('menu.note_multi_select')"
                  class="text-xs text-gray-700"
                  >{{ $t("menu.incremental_price") }}.</label
               >
            </div>

            <!-- footer -->
            <template slot="confirm-button">
               <button
                  class="px-4 py-1 mx-1 text-sm text-white bg-green-400 rounded-full hover:bg-green-500"
                  @click="newType()"
               >
                  {{ $store.state.modal.confirm_button_text }}
               </button>
            </template>
         </Modal>
      </transition>
   </div>
</template>

<script>
export default {
   name: "CreateType",
   data() {
      return {
         typeName: "",
         multi_select: true,
         incremental: true,
      };
   },
   methods: {
      newType() {
         this.$store
            .dispatch("products/createType", {
               name: this.typeName,
               multi_select: this.multi_select,
               incremental: this.incremental,
            })
            .then(() => {})
            .catch((e) => {
               this.$store.dispatch("noti/pushError", {
                  body: e.response.data.data.message,
               });
            });

         this.$store.commit("modal/set", [false]);
      },
   },
};
</script>

<style>
/* CHECKBOX TOGGLE SWITCH */
/* @apply rules for documentation, these do not work as inline style */
.toggle-checkbox:checked {
   @apply: right-0 border-green-400;
   right: 0;
   border-color: #68d391;
}
.toggle-checkbox:checked + .toggle-label {
   @apply: bg-green-400;
   background-color: #68d391;
}
</style>
