<template>
   <div>
      <transition name="fade">
         <Modal v-if="$store.state.modal.show">
            <!-- header -->
            <template slot="modal-header">
               <span
                  class="p-1 mr-2 text-sm text-white bg-red-500 rounded-full"
               >
                  <span class="font-bold">{{ page }}</span> / 2
               </span>
               {{ $store.state.modal.header }}
            </template>

            <!-- content -->
            <template v-if="page === 1">
               <div class="flex w-full m-2">
                  <img
                     :src="previewImg"
                     v-if="previewImg"
                     class="block object-cover w-32 h-32 p-1 rounded"
                  />
                  <img
                     :src="require('~/assets/dish.jpg')"
                     v-else
                     class="block object-cover w-32 h-32 p-1 rounded"
                  />
                  <label
                     for="image"
                     class="self-end px-2 py-1 my-1 text-sm font-bold text-center text-blue-600 border border-blue-600 rounded cursor-pointer hover:bg-blue-200"
                     >{{ $t("menu.change_photo") }}
                  </label>

                  <input
                     type="file"
                     hidden
                     accept="image/*"
                     name=""
                     id="image"
                     ref="file"
                     @change="prevImage()"
                  />
               </div>
               <section class="flex font-bold text-black">
                  <div class="flex flex-col w-1/3 m-2">
                     <label for="courses">
                        <font-awesome-icon
                           :icon="['fal', 'burger-soda']"
                           class=""
                        />
                        {{ $t("menu.select_course") }}
                     </label>

                     <select
                        name="courses"
                        v-model="dishCourseId"
                        id="courses"
                        class="p-2 bg-white border rounded"
                     >
                        <option
                           v-for="(course, i) in courses"
                           :key="'course' + i"
                           :value="course.slug"
                        >
                           {{ course.name }}
                        </option>
                     </select>
                  </div>

                  <div class="flex flex-col w-1/3 m-2 capitalize">
                     <label for="kitchen">
                        <font-awesome-icon
                           :icon="['fal', 'burger-soda']"
                           class=""
                        />
                        {{ $t("select_kitchen") }}
                     </label>
                     <select
                        name="courses"
                        v-model="kitchenID"
                        id="kitchen"
                        class="p-2 bg-white border rounded"
                     >
                        <option
                           v-for="kitchen in kitchens"
                           :key="kitchen.id"
                           :value="kitchen.id"
                        >
                           {{ kitchen.name }}
                        </option>
                     </select>
                  </div>

                  <div class="flex flex-col w-1/3 m-2">
                     <label for="courses">
                        <font-awesome-icon
                           :icon="['fal', 'hamburger']"
                           class=""
                        />
                        {{ $t("menu.dish_name") }}
                     </label>

                     <input
                        type="text"
                        v-model="dishName"
                        class="p-2 border rounded"
                        maxlength="255"
                     />
                  </div>

                  <div class="flex flex-col w-1/3 m-2">
                     <label for="courses">{{ $t("menu.price") }}</label>
                     <currency-input
                        v-model="dishPrice"
                        class="p-2 border rounded"
                        :currency="currency"
                        :locale="iso"
                        :placeholder="'Price'"
                        auto-decimal-mode
                        value-as-integer
                     />
                  </div>
               </section>

               <div class="flex flex-col m-2 font-bold text-black">
                  <label for="courseDescription"
                     >{{ $t("menu.about_your_dish") }}
                  </label>
                  <textarea
                     id="courseDescription"
                     v-model="dishDescription"
                     class="p-2 border rounded"
                     maxlength="255"
                  ></textarea>
                  <span
                     class="flex justify-end px-1 font-light"
                     :class="
                        dishDescription.length === 255
                           ? 'font-bold text-green-500'
                           : ''
                     "
                  >
                     {{ dishDescription.length }}/255
                  </span>
               </div>
            </template>

            <section v-if="page === 2">
               <AddOptionsToProduct
                  ref="add_options"
                  class="w-full text-black"
                  :dishId="dishId"
                  :dishVars="dishVariations"
                  :dish="dish"
                  :is_sale="false"
               />
            </section>

            <!-- footer -->
            <template slot="confirm-button">
               <button
                  v-if="page === 1"
                  class="px-4 py-1 mx-1 text-sm text-white bg-green-400 rounded-full hover:bg-green-500"
                  @click="newDish()"
                  :disabled="loading === 'nextbutton'"
               >
                  {{ $t("menu.create_dish") }}
                  <font-awesome-icon
                     v-if="loading === 'nextbutton'"
                     :icon="['fad', 'spinner']"
                     class="fa-spin"
                  />
                  <font-awesome-icon
                     v-else
                     :icon="['fal', 'chevron-right']"
                     class="mx-1 text-xs"
                  />
               </button>
               <button
                  v-if="page === 2"
                  class="px-4 py-1 mx-1 text-sm text-white bg-green-400 rounded-full hover:bg-green-500"
                  @click="addOptions()"
               >
                  {{ $t("menu.add_option") }}
                  <font-awesome-icon class="mx-1 text-xs" />
               </button>
               <button
                  v-if="page === 2"
                  class="px-4 py-1 text-sm capitalize bg-gray-300 rounded-full hover:bg-gray-500 dark:bg-gray-900"
                  @click="$store.commit('modal/set', [false])"
               >
                  {{ $t("menu.skip") }}
                  <font-awesome-icon class="mx-1 text-xs" />
               </button>
            </template>
         </Modal>
      </transition>
   </div>
</template>

<script>
import AddOptionsToProduct from "~/components/products/AddOptionsToProduct";
export default {
   name: "CreateDish",
   components: {
      AddOptionsToProduct,
   },
   data() {
      return {
         page: 1,
         courses: this.$store.state.products.courses,
         dish: "",
         dishId: null,
         previewImg: null,
         dishName: "",
         dishDescription: "",
         dishPrice: 0,
         dishCourseId: null,
         kitchenID: this.$store.state.me.kitchens[0].id,
         dishVariations: "",
         loading: "",

         //currency setting
         iso: this.$store.state.lang.rtl ? "ar-EG" : "en-EG",
         currency: "EGP",
      };
   },
   mounted() {
      this.getTypes();
   },
   methods: {
      prevImage() {
         let file = this.$refs.file.files[0];
         if (file.size > 1000000) {
            this.$store.dispatch("noti/pushError", {
               body: "Image larger than 1 mb",
            });
            return;
         }

         this.previewImg = URL.createObjectURL(file);
      },
      async getTypes() {
         await this.$axios
            .get(`types?per_page=100`)
            .then((response) => {
               this.$store.commit("products/storeTypes", response.data.data);
            })
            .catch((e) => {
               this.$store.dispatch("noti/pushError", {
                  body: e.response.data.data.message,
               });
            });
      },
      uploadImage(dishData) {
         let file = this.$refs.file.files[0];
         this.previewImg = URL.createObjectURL(file);
         let formData = new FormData();
         formData.append("file", file);

         this.$axios
            .post(`products/${dishData.slug}/media`, formData, {
               headers: {
                  "Content-Type": "multipart/form-data",
               },
            })
            .then((response) => {
               const payload = {
                  dish: dishData,
                  image: this.previewImg,
               };
               this.$store.commit("products/addDishImage", payload);
            })
            .catch((e) => {
               this.$store.dispatch("noti/pushError", {
                  body: e.response.data.data.message,
               });
            });
      },
      async newDish() {
         const MenuSlug = this.$store.state.products.activeMenu.slug;
         let file = this.$refs.file.files[0];
         this.loading = "nextbutton";

         let formData = new FormData();
         if (file) {
            formData.append("file", file);
         }
         formData.append("name", this.dishName);
         formData.append("price", parseInt(this.dishPrice));
         formData.append("description", this.dishDescription);
         formData.append("kitchen_id", this.kitchenID);

         await this.$axios
            .post(
               `menus/${MenuSlug}/categories/${this.dishCourseId}/products`,
               formData
            )
            .then((res) => {
               this.dishId = res.data.data.id;
               this.dishVariations = res.data.data.variations;
               this.dish = res.data.data;

               this.page = 2;
               this.loading = false;
               this.$store.commit("products/addSingleDish", res.data.data);
            })
            .catch((err) => {
               this.loading = false;
               for (const error in err.response?.data.errors) {
                  this.$store.dispatch("noti/pushError", {
                     body: err.response.data.errors[error][0],
                  });
               }
            });
      },
      addOptions() {
         this.$refs.add_options.addVariations();
         this.$store.commit("modal/set", [false]);
      },
   },
   computed: {
      kitchens() {
         return this.$store.state.me.kitchens;
      },
   },
};
</script>

<style scoped>
>>> footer button:last-child {
   display: none;
}
</style>