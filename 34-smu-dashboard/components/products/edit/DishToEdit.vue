<template>
   <div class="py-5">
      <!-- publish -->
      <span class="px-3">
         <label for="toggle" class="inline px-2 text-gray-700 cursor-pointer">
            {{ $t("menu.publish") }}
         </label>
         <div class="flex items-center justify-between px-5">
            <div
               class="relative inline-block w-10 mr-2 align-middle select-none"
            >
               <input
                  type="checkbox"
                  name="toggle"
                  v-model="updatedDish.published"
                  id="toggle"
                  class="absolute block w-6 h-6 bg-white border-4 rounded-full appearance-none cursor-pointer toggle-checkbox"
               />
               <label
                  for="toggle"
                  class="block h-6 overflow-hidden transition duration-300 ease-in bg-gray-300 rounded-full cursor-pointer toggle-label"
               ></label>
            </div>

            <!-- delete dish -->
            <section>
               <button
                  v-if="!confirmDelete"
                  class="block px-2 py-1 my-1 text-xs font-bold text-center text-red-600 border border-red-600 rounded cursor-pointer hover:bg-red-200"
                  @click="confirmDelete = true"
               >
                  {{ $t("menu.delete_dish") }}
               </button>

               <button
                  v-else
                  class="block px-2 py-1 my-1 text-xs font-bold text-center text-orange-500 border border-orange-500 rounded cursor-pointer hover:bg-orange-100"
                  @click="deleteDish()"
               >
                  <template v-if="loading === 'delete'">
                     <font-awesome-icon
                        class="mx-2 fa-spin"
                        :icon="['fas', 'spinner']"
                     />
                  </template>
                  <template v-else>
                     {{ $t("menu.confirm_delete") }}
                  </template>
               </button>
            </section>
         </div>
      </span>
      <section
         :class="{ 'pointer-events-none opacity-50': !updatedDish.published }"
      >
         <span class="flex items-center justify-between px-3">
            <!-- name & edit -->
            <div class="flex flex-col items-start w-full py-1">
               <!-- name -->
               <span class="flex flex-col items-center mt-4" v-if="updatedDish">
                  <img
                     :src="updatedDish.media[0].url"
                     :alt="updatedDish.media.name"
                     v-if="updatedDish.media.length && !previewImg"
                     class="block object-cover w-32 h-32 rounded"
                  />
                  <img
                     :src="previewImg"
                     v-else-if="previewImg"
                     class="block object-cover w-32 h-32 p-1 rounded"
                  />
                  <img
                     :src="require('~/assets/dish.jpg')"
                     v-else
                     class="block object-cover w-32 h-32 p-1 rounded"
                  />

                  <label
                     for="image"
                     class="block px-2 py-1 my-1 text-sm font-bold text-center text-blue-600 border border-blue-600 rounded cursor-pointer hover:bg-blue-200"
                  >
                     {{ $t("menu.change_photo") }}
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
               </span>

               <!-- Edit -->
               <section class="flex flex-wrap w-full text-black" v-if="edit">
                  <div class="flex flex-col w-1/2 p-1" v-if="updatedDish">
                     <label for="courses" class="p-1">
                        <font-awesome-icon
                           :icon="['fal', 'burger-soda']"
                           class=""
                        />
                        {{ $t("menu.select_course") }}
                     </label>

                     <select
                        name="courses"
                        v-model="updatedDish.category_id"
                        id="courses"
                        class="h-10 px-2 bg-white border rounded cursor-pointer"
                     >
                        <option
                           v-for="(course, i) in courses"
                           :key="'course' + i"
                           :value="course.id"
                        >
                           {{ course.name }}
                        </option>
                     </select>
                  </div>

                  <div class="flex flex-col w-1/2 p-1" v-if="updatedDish">
                     <label for="courses" class="p-1 capitalize">
                        <font-awesome-icon
                           :icon="['fal', 'burger-soda']"
                           class=""
                        />
                        {{ $t("select_kitchen") }}
                     </label>

                     <select
                        name="kitchen"
                        v-model="updatedDish.kitchen_id"
                        id="kitchen"
                        class="h-10 px-2 bg-white border rounded cursor-pointer"
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

                  <div class="flex flex-col w-1/2 p-1">
                     <label for="courses" class="p-1">
                        <font-awesome-icon
                           :icon="['fal', 'hamburger']"
                           class=""
                        />
                        {{ $t("menu.dish_name") }}
                     </label>

                     <input
                        type="text"
                        v-model="updatedDish.name"
                        class="h-10 p-2 border rounded"
                     />
                  </div>

                  <div class="flex flex-col w-1/2 p-1">
                     <label for="courses" class="p-1">{{
                        $t("menu.price")
                     }}</label>

                     <currency-input
                        v-model="updatedDish.price"
                        class="p-2 border rounded"
                        :currency="currency"
                        :locale="iso"
                        auto-decimal-mode
                        value-as-integer
                     />
                  </div>

                  <div
                     class="flex flex-col w-1/2 p-1"
                     :class="updatedDish.sale_price ? '' : 'opacity-50 '"
                  >
                     <label for="courses" class="p-1">
                        <font-awesome-icon
                           :icon="['fas', 'fire']"
                           class="text-orange-500"
                        />
                        {{ $t("menu.add_sale") }}
                        <div
                           class="relative inline-block w-10 mr-2 align-middle select-none"
                        >
                           <input
                              type="checkbox"
                              name="toggle"
                              v-model="updatedDish.sale_price"
                              id="sale"
                              class="absolute block w-6 h-6 bg-white border-4 rounded-full appearance-none cursor-pointer toggle-checkbox"
                           />

                           <label
                              for="sale"
                              class="block h-6 overflow-hidden transition duration-300 ease-in bg-gray-300 rounded-full cursor-pointer toggle-label"
                           ></label>
                        </div>
                     </label>

                     <currency-input
                        v-model="updatedDish.sale_price"
                        class="p-2 border rounded"
                        :class="
                           updatedDish.sale_price ? '' : 'pointer-events-none'
                        "
                        :placeholder="$t('menu.sale_price')"
                        :currency="currency"
                        :locale="iso"
                        auto-decimal-mode
                        value-as-integer
                     />
                  </div>

                  <div class="relative flex flex-col w-1/2 p-1">
                     <label for="courseDescription" class="p-1">
                        {{ $t("menu.description") }}
                     </label>
                     <textarea
                        id="courseDescription"
                        v-model="updatedDish.description"
                        class="p-2 border rounded"
                        style="height: 73px; resize: none"
                        maxlength="255"
                     ></textarea>
                     <span
                        class="flex justify-end px-1 font-light"
                        v-if="updatedDish.description"
                        :class="
                           updatedDish.description.length === 255
                              ? 'font-bold text-green-500'
                              : ''
                        "
                     >
                        {{ updatedDish.description.length }}/255
                     </span>
                  </div>
               </section>

               <!-- variants -->
            </div>
         </span>

         <div
            class="w-full px-3 text-gray-600"
            v-if="updatedDish && updatedDish.variations"
         >
            <EditOptionsToProduct
               ref="add_options"
               class="w-full text-black"
               :dishId="dish.id"
               :dishVars="updatedDish.variations"
               :is_sale="updatedDish.sale_price"
               :mainPrice="updatedDish.price"
            />
         </div>
      </section>
      <!-- actions -->
      <div
         class="flex items-start w-full mt-4 ml-2 text-base border-red-400 border-top"
      >
         <button
            class="w-32 px-2 py-1 mx-2 my-1 text-sm font-bold text-blue-600 border border-blue-600 rounded hover:bg-blue-200"
            @click="updateDish()"
            v-if="edit"
            :disabled="loading === 'save'"
         >
            <template v-if="loading === 'save'">
               <font-awesome-icon
                  class="mx-2 fa-spin"
                  :icon="['fas', 'spinner']"
               />
            </template>
            <template v-else>
               <font-awesome-icon :icon="['fal', 'check']" class="" />
               {{ $t("menu.save") }}
            </template>
         </button>
         <button
            class="px-2 py-1 mx-2 my-1 text-sm text-gray-600 border border-gray-600 rounded hover:bg-gray-200"
            @click="$store.dispatch('edit/closeEdit')"
            v-if="edit"
         >
            <font-awesome-icon :icon="['fal', 'times']" class="" />
            {{ $t("menu.close") }}
         </button>
      </div>
   </div>
</template>

<script>
import EditOptionsToProduct from "~/components/products/EditOptionsToProduct";
export default {
   name: "DishToEdit",
   components: {
      EditOptionsToProduct,
   },
   fetch() {
      this.dish = this.$store.state.edit.data;
      this.updatedDish = { ...this.dish };
   },
   data() {
      return {
         dish: "",
         courses: this.$store.state.products.courses,
         kitchens: this.$store.state.me.kitchens,
         updatedDish: {
            // category_id: this.dish.category_id,
            // name: this.dish.name,
            // slug: this.dish.slug,
            // price: this.dish.price,
            // description: this.dish.description,
            // variations: this.dish.variations,
            // published:true
         },
         loading: "",
         edit: true,
         editImage: false,
         previewImg: null,
         confirmDelete: false,
         // currency settings
         iso: this.$store.state.lang.rtl ? "ar-EG" : "en-EG",
         currency: "EGP",
         currencyDisplay: "code",
      };
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
         let formData = new FormData();
         formData.append("file", file);
         this.previewImg = URL.createObjectURL(file);
      },
      updateDish() {
         this.loading = "save";
         const menuSlug = this.$store.state.products.activeMenu.slug;
         const dish = this.$store.state.edit.data;

         const headers = {
            headers: {
               "Content-Type": "multipart/form-data",
               accept: "application/json",
            },
         };

         if (this.updatedDish.sale_price == false) {
            this.updatedDish.sale_price = 0;
         }
          if (this.updatedDish.description == null) {
            this.updatedDish.description = '';
         }
         let formData = new FormData();
         if (this.previewImg) {
            formData.append("file", this.$refs.file.files[0]);
         }
         // this.updatedDish.published = 1;
         if (this.updatedDish.published) {
            this.updatedDish.published = 1;
         } else {
            this.updatedDish.published = 0;
         }

         for (let n in this.updatedDish) {
            formData.append(n, this.updatedDish[n]);
         }

         this.$axios
            .post(
               `menus/${menuSlug}/categories/${dish.category_slug}/products/${dish.slug}?_method=put`,
               formData,
               headers
            )
            .then((res) => {
               if (res.data.data.category_id == dish.category_id) {
                  this.$store.commit("products/editSingleDish", res.data.data);
               } else {
                  this.$store.commit(
                     "products/deleteSingleDish",
                     res.data.data
                  );
                  this.$store.commit("products/addSingleDish", res.data.data);
               }

               this.$refs.add_options.addVariations();
               this.$store.dispatch("edit/closeEdit");
               this.$store.dispatch("products/getTypes");

               this.loading = "";
            })
            .catch((err) => {
               for (const error in err.response.data.errors) {
                  this.$store.dispatch("noti/pushError", {
                     body: err.response.data.errors[error][0],
                  });
               }
               this.loading = "";
            });
      },
      uploadImage() {
         const menuSlug = this.$store.state.products.activeMenu.slug;
         const dish = this.$store.state.edit.data;
         if (!this.previewImg) {
            return;
         }
         let file = this.$refs.file.files[0];
         let formData = new FormData();
         formData.append("file", file);

         const headers = {
            headers: {
               "Content-Type": "multipart/form-data",
               accept: "application/json",
            },
         };
         this.$axios
            .put(
               `menus/${menuSlug}/categories/${dish.category_slug}/products/${dish.slug}`,
               formData,
               headers
            )
            .then((response) => {
               const payload = {
                  dish: this.dish,
                  image: this.previewImg,
               };
               this.$store.commit("products/editDishImage", payload);
               this.editImage = false;
            })
            .catch((e) => {
               this.$store.dispatch("noti/pushError", {
                  body: e.response.data.data.message,
               });
            });
      },
      deleteDish() {
         this.loading = "delete";
         const menuSlug = this.$store.state.products.activeMenu.slug;

         this.$axios
            .delete(
               `menus/${menuSlug}/categories/${this.dish.category_slug}/products/${this.dish.slug}`
            )
            .then(() => {
               this.$store.commit("products/deleteSingleDish", this.dish);
               // this.$store.dispatch("products/getCourses");
               this.$store.dispatch("edit/closeEdit");
               //  this.$store.dispatch("products/getTypes");

               this.loading = "";
            })
            .catch((err) => {
               for (const error in err.response.data.errors) {
                  this.$store.dispatch("noti/pushError", {
                     body: err.response.data.errors[error][0],
                  });
                  this.loading = "";
               }
            });
      },

      currencyFormatter(number) {
         if (number) {
            return new Intl.NumberFormat(this.iso, {
               style: "currency",
               currency: this.currency,
               // currencyDisplay: this.currencyDisplay,
            }).format(number / 100);
         }

         return "";
      },
      deleteOption(id) {
         this.$axios.delete(`variations/${id}`).then(() => {
            this.$axios.get(`products/${this.updatedDish.slug}`).then((res) => {
               this.$store.dispatch("edit/openEdit", res.data.data);
               this.$fetch();
            });
            this.$store.dispatch("products/getCourses");
         });
      },
   },
};
</script>

<style>
</style>
