<template>
   <div>
      <transition name="fade">
         <Modal v-if="$store.state.modal.show" max_width="500">
            <!-- header -->
            <template slot="modal-header">
               {{ $store.state.modal.header }}
            </template>

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
                  for="crouseimage"
                  class="self-end px-2 py-1 my-1 text-sm font-bold text-center text-blue-600 border border-blue-600 rounded cursor-pointer hover:bg-blue-200"
               >
                  {{ $t("menu.change_photo") }}
               </label>

               <input
                  type="file"
                  hidden
                  accept="image/*"
                  name=""
                  id="crouseimage"
                  ref="crouseimage"
                  @change="prevImage()"
               />
            </div>

            <!-- content -->
            <input
               type="text"
               v-model="courseName"
               class="w-full p-2 m-2 border rounded"
               placeholder="Course Name"
            />

            <!-- footer -->
            <template slot="confirm-button">
               <!-- loading button -->
               <button
                  class="w-24 px-4 py-1 mx-2 text-sm text-white capitalize bg-gray-400 rounded-full cursor-default"
                  v-if="loader"
               >
                  <font-awesome-icon
                     :icon="['fad', 'spinner']"
                     class="fa-spin"
                  />
               </button>
               <button
                  class="px-4 py-1 mx-1 text-sm text-white bg-green-400 rounded-full hover:bg-green-500"
                  @click="newCourse()"
                  v-else
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
   name: "CreateCourse",
   data() {
      return {
         courseName: "",
         previewImg: null,
         imgToUpload: null,
         loader: "",
      };
   },
   methods: {
      scrollDown() {
         let element = this.$parent.$el;
         element.scrollTop = element.scrollHeight;
      },
      scrollTop() {
         let element = this.$parent.$el;
         element.scrollTop = 0;
      },
      prevImage() {
         this.imgToUpload = this.$refs.crouseimage.files[0];
         if (this.imgToUpload.size > 1000000) {
            this.$store.dispatch("noti/pushError", {
               body: "Image larger than 1 mb",
            });
            return;
         }
         this.previewImg = URL.createObjectURL(this.imgToUpload);
      },

      newCourse() {
         this.loader = true;
         let formData = new FormData();
         if (this.imgToUpload) {
            formData.append("file", this.imgToUpload);
         }
         formData.append("name", this.courseName);
         this.$store
            .dispatch("products/createCourse", formData)
            .then((res) => {
               this.scrollTop();
               this.$store.commit("modal/set", [false]);
               this.loader = false;
            })
            .catch((err) => {
               for (const error in err.response.data.errors) {
                  this.$store.dispatch("noti/pushError", {
                     body: err.response.data.errors[error][0],
                  });
               }
               this.loader = false;
            });
      },
   },
};
</script>

<style>
</style>