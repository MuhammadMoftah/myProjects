<template>
   <div>
      <transition name="fade">
         <Modal v-if="$store.state.modal.show" max_width="800">
            <!-- header -->
            <template slot="modal-header">
               <span> {{ $store.state.modal.header }} </span>
            </template>

            <!-- content -->
            <section class="flex flex-wrap items-center font-bold text-black">
               <div class="flex flex-col w-1/2 p-2 capitalize">
                  <label for="optiongroup">
                     <font-awesome-icon
                        :icon="['fal', 'burger-soda']"
                        class=""
                     />
                     {{ $t("menu.select_option_group") }}
                  </label>

                  <select
                     required
                     name="optiongroup"
                     v-model="optiontype"
                     id="optiongroup"
                     class="p-2 capitalize bg-white border rounded"
                  >
                     <option
                        v-for="(type, i) in types"
                        :key="'type' + i"
                        :value="type"
                     >
                        {{ type.name }}
                     </option>
                  </select>
               </div>

               <div class="flex flex-col w-1/2 p-2 capitalize">
                  <label for="types">
                     <font-awesome-icon
                        :icon="['fal', 'hamburger']"
                        class="mx-1 capitalize"
                     />
                     {{ $t("menu.option_name") }}
                  </label>

                  <input
                     type="text"
                     v-model="optionName"
                     class="h-12 p-4 border rounded"
                     required
                  />
               </div>

               <div class="flex flex-col w-1/2 p-2">
                  <label for="types">
                     {{ $t("menu.price") }}
                     <small
                        class="ml-2 italic font-normal text-gray-800 capitalize"
                        >{{ $t("menu.have_price") }}
                     </small>
                  </label>
                  <currency-input
                     v-model="optionPrice"
                     class="p-2 border rounded"
                     :currency="currency"
                     :locale="iso"
                     :placeholder="'Price'"
                     auto-decimal-mode
                     value-as-integer
                  />
               </div>
            </section>

            <!-- footer -->
            <template slot="confirm-button">
               <button
                  class="px-4 py-1 mx-1 text-sm text-white bg-green-400 rounded-full hover:bg-green-500"
                  @click="newoption()"
                  :disabled="!activeButton"
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
   name: "CreateOption",
   data() {
      return {
         types: this.$store.state.products.types,
         optionName: "",
         optionPrice: 0,
         optiontype: null,
         optionIncremental: true,
         //currency setting
         iso: this.$store.state.lang.rtl ? "ar-EG" : "en-EG",
         currency: "EGP",
      };
   },
   computed: {
      activeButton() {
         if (this.optiontype && this.optionName) {
            return true;
         }
         return false;
      },
   },
   methods: {
      newoption() {
         this.$store
            .dispatch("products/createOption", {
               name: this.optionName,
               price: parseInt(this.optionPrice),
               type_id: this.optiontype.id,
               incremental: this.optiontype.incremental,
            })
            .then(() => {
               this.optionName = "";
               this.optionPrice = 0;
               this.optiontype = null;
               this.optionIncremental = true;
            })
            .catch((e) => {
               this.$store.dispatch("noti/pushError", {
                  body: e.response.data.data.message,
               });
            });

         this.$store.commit("modal/set", [false]);
      },
   },
   watch: {
      optionPrice() {
         if (this.optionPrice < 0) {
            this.optionPrice = 0;
         } else if (!this.optionIncremental) {
            if (this.optionPrice < 1) {
               this.optionPrice = 1;
            }
         }
      },
      optionIncremental() {
         if (!this.optionIncremental) {
            if (this.optionPrice < 1) {
               this.optionPrice = 1;
            }
         }
      },
   },
};
</script>

<style>
</style>