<template>
   <section class="flex flex-col w-full p-1 px-1 my-2 mb-20" z>
      <span
         class="relative h-24 mb-1 overflow-hidden rounded"
         v-if="!editImage"
      >
         <img
            v-if="previewImg"
            class="object-cover w-full h-24"
            :src="previewImg"
            alt=""
         />
         <img
            v-else-if="!previewImg && course.media[0]"
            class="object-cover w-full h-24"
            :src="course.media[0].url"
            alt=""
         />
         <img
            :src="require('~/assets/cover.jpg')"
            v-else
            class="object-cover w-full h-24"
         />

         <button
            class="absolute top-0 right-0 px-2 py-1 m-2 text-center bg-white rounded-full shadow opacity-75 hover:bg-blue-400 hover:text-white hover:opacity-100"
            @click="editImage = true"
         >
            <font-awesome-icon :icon="['fal', 'pencil-alt']" />
         </button>
      </span>

      <span class="relative" v-if="editImage">
         <label
            class="flex flex-col items-center h-24 px-4 py-3 mb-1 tracking-wide text-blue-500 uppercase bg-white border rounded-lg shadow-lg cursor-pointer border-blue hover:bg-blue-500 hover:text-white"
         >
            <font-awesome-icon
               v-if="loading === 'img'"
               :icon="['fad', 'spinner']"
               class="mt-5 mb-2 fa-2x fa-spin"
            />

            <template v-else>
               <font-awesome-icon
                  :icon="['fas', 'cloud-upload-alt']"
                  class="mt-3 mb-2 text-xl"
               />
               <span class="text-xs leading-normal">
                  {{ $t("menu.selecte_image") }}
               </span>
            </template>

            <input
               type="file"
               ref="file"
               accept="image/*"
               @change="uploadImage()"
               class="hidden"
            />
         </label>

         <button
            class="absolute top-0 right-0 px-2 py-0 m-2 text-sm text-blue-500 bg-white border border-blue-400 rounded-full shadow hover:bg-blue-400 hover:text-white"
            @click="editImage = false"
         >
            <font-awesome-icon :icon="['fal', 'times']" />
         </button>
      </span>

      <div
         class="flex items-center justify-between w-full mb-2 text-3xl tracking-wide capitalize border-b-2"
      >
         <div>
            <input
               type="text"
               class="w-3/4 px-1 text-xl font-bold capitalize bg-white rounded"
               v-model="updatedCourse.name"
               :disabled="!edit"
               :class="edit ? 'border' : ''"
            />
         </div>

         <!-- actions -->
         <div class="flex justify-end text-base">
            <template v-if="edit">
               <button
                  class="px-2 py-1 ml-2 text-center text-green-500 rounded hover:bg-green-200"
                  @click="(edit = !edit), updateCourse()"
               >
                  <font-awesome-icon :icon="['fal', 'check']" class="" />
               </button>
            </template>

            <button
               class="px-2 py-1 ml-2 text-center text-blue-600 rounded hover:bg-blue-200"
               @click="edit = !edit"
               v-else
            >
               <font-awesome-icon :icon="['fal', 'pencil-alt']" class="" />
            </button>
            <button
               class="px-2 py-1 ml-2 text-center text-red-600 rounded hover:bg-red-200"
               @click="showDelete()"
               v-if="!deleteCourse"
            >
               <font-awesome-icon :icon="['fal', 'trash-alt']" />
            </button>
            <transition name="slide-fade">
               <button
                  class="px-2 py-1 ml-2 text-sm font-bold text-center text-orange-600 rounded hover:bg-orange-200"
                  @click="deleteCourseF()"
                  v-if="deleteCourse && updatedCourse"
                  :disabled="loading === 'delete'"
               >
                  <template v-if="loading === 'delete'">
                     <font-awesome-icon
                        class="mx-2 fa-spin"
                        :icon="['fal', 'spinner']"
                     />
                  </template>
                  <template v-else>
                     <font-awesome-icon
                        class="mx-2"
                        :icon="['fal', 'exclamation-circle']"
                     />
                     Delete {{ updatedCourse.name }}
                  </template>
               </button>
            </transition>
         </div>
      </div>

      <div class="px-1 border-b shadow-md last:border-b-0 categ">
         <div v-for="dish in dishes" :key="dish.slug">
            <Dish :dish="dish" />
         </div>
      </div>
   </section>
</template>

<script>
import Dish from "~/components/products/Dish";
export default {
   name: "Course",
   components: { Dish },
   props: {
      course: Object,
      dishes: Array,
   },
   fetch() {
      this.updatedCourse = { ...this.course };
   },
   data() {
      return {
         edit: false,
         editImage: false,
         deleteCourse: false,
         previewImg: null,
         loading: null,
         updatedCourse: {},
      };
   },
   methods: {
      showDelete() {
         this.deleteCourse = true;
         setTimeout(() => {
            this.deleteCourse = false;
         }, 4000);
      },
      async getDishes() {
         await this.$axios
            .get(`categories/${this.course.slug}`)
            .then((response) => {
               this.dishes = response.data.data.products;
            })
            .catch((err) => {
               this.$store.dispatch("noti/pushError", {
                  body: err.response.data.data.message,
               });
            });
      },

      updateCourse() {
         const menuSlug = this.$store.state.products.activeMenu.slug;
         this.$axios
            .put(
               `menus/${menuSlug}/categories/${this.course.slug}`,
               this.updatedCourse
            )
            .then((response) => {
               this.updatedCourse = response.data.data;
            })
            .catch((err) => {
               this.updatedCourse = { ...this.course };
               for (const error in err.response.data.errors) {
                  this.$store.dispatch("noti/pushError", {
                     body: err.response.data.errors[error][0],
                  });
               }
            });
      },
      async deleteCourseF() {
         this.loading = "delete";
         const res = await this.$store
            .dispatch("products/deleteCourse", this.updatedCourse.slug)
            .then((res) => {
               this.$store.commit(
                  "products/deleteCourse",
                  this.updatedCourse.slug
               );
               this.loading = false;
            })
            .catch((err) => {
               this.$store.dispatch("noti/pushError", {
                  body: err.response.data.data?.message,
               });
               this.loading = false;
            });
      },

      uploadImage() {
         this.loading = "img";
         let file = this.$refs.file.files[0];

         if (file.size > 1000000) {
            this.$store.dispatch("noti/pushError", {
               body: "Image larger than 1 mb",
            });
            this.loading = null;
            this.editImage = false;
            return;
         }

         let formData = new FormData();
         if (file) {
            formData.append("file", file);
         }

         const menuSlug = this.$store.state.products.activeMenu.slug;
         const headers = {
            headers: {
               "Content-Type": "multipart/form-data",
               accept: "application/json",
            },
         };
         this.$axios
            .post(
               `menus/${menuSlug}/categories/${this.course.slug}?_method=put`,
               formData,
               headers
            )
            .then((response) => {
               this.loading = null;
               this.editImage = false;
               this.previewImg = URL.createObjectURL(file);
               // this.$store.dispatch("products/getCourses");
            })
            .catch((err) => {
               this.$store.dispatch("noti/pushError", {
                  body: err.response.data.data.message,
               });
            });
      },
   },
};
</script>

<style scoped>
.categ {
   height: 450px;
   overflow-y: auto;
}
.categ::-webkit-scrollbar {
   width: 4px;
}
/* Enter and leave animations can use different */
/* durations and timing functions.              */
.slide-fade-enter-active {
   transition: all 0.2s ease;
}
.slide-fade-leave-active {
   transition: all 0.5s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
   transform: translateY(20px);
   opacity: 0;
}
</style>
