<template>
  <section class="flip-card" :class="editable ? 'do_flip' : ''">
    <div class="flip-card-inner" :class="editable ? 'do_flip' : ''">
      <div class="overflow-hidden rounded shadow-lg flip-card-front">
        <img
          class="object-cover w-full h-56 cursor-pointer"
          v-if="menu.media[0]"
          :src="menu.media[0].url"
          @dblclick="$router.push(localePath('/manager/menus/' + menu.slug))"
          alt="menu image"
        />
        <img
          class="object-cover w-full h-56 cursor-pointer"
          v-else
          :src="require('assets/cover.jpg')"
          @dblclick="$router.push(localePath('/manager/menus/' + menu.slug))"
          alt="menu image"
        />
        <div class="flex items-center justify-between p-4">
          <div class="text-xl font-bold">{{ menu.name }}</div>
          <aside
            class="relative flex"
            @click="menuOptions = true"
            @mouseleave="menuOptions = false"
            @keydown.enter="menuOptions = !menuOptions"
          >
            <div
              class="flex items-center justify-center w-8 h-8 text-xs text-center text-gray-600 rounded-full cursor-pointer hover:bg-gray-200"
            >
              <font-awesome-icon :icon="['fas', 'ellipsis-v']" class="" />
            </div>
            <transition
              enter-active-class="transition duration-300 ease-out transform"
              enter-class="scale-95 -translate-y-3 opacity-0"
              enter-to-class="scale-100 translate-y-0 opacity-100"
              leave-active-class="transition duration-150 ease-in transform"
              leave-class="translate-y-0 opacity-100"
              leave-to-class="-translate-y-3 opacity-0"
            >
              <div
                v-show="menuOptions"
                class="absolute text-center"
                :class="$t('dir') === 'rtl' ? 'left-0 ' : 'right-0'"
                style="min-width: 170px"
              >
                <div
                  class="relative bg-white border border-gray-200 rounded-md shadow-xl"
                >
                  <div class="relative">
                    <button
                      class="block w-full px-4 py-2 text-xs font-bold text-gray-800 capitalize bg-transparent md:mt-0 hover:bg-gray-200 focus:outline-none"
                      @click="
                        $router.push(localePath('/manager/menus/' + menu.slug))
                      "
                    >
                      {{ $t("open") }}
                    </button>
                    <button
                      class="block w-full px-4 py-2 text-xs font-bold text-gray-800 capitalize bg-transparent border-t md:mt-0 hover:bg-gray-200 focus:outline-none"
                      @click="editable = true"
                    >
                      {{ $t("edit") }}
                    </button>
                    <button
                      class="block w-full px-4 py-2 text-xs font-bold text-red-500 capitalize whitespace-no-wrap border-t hover:bg-red-200 focus:outline-none hover:border-red-200"
                      @click="$emit('deleteMenu', menu)"
                    >
                      <font-awesome-icon :icon="['fas', 'trash']" />
                      {{ $t("delete") }}
                    </button>
                  </div>
                </div>
              </div>
            </transition>
          </aside>
        </div>
        <div class="px-4 pb-2 -mx-2">
          <span
            class="block px-3 mb-2 text-xs font-bold text-gray-600 capitalize"
          >
            {{ $t("branches") }}:
          </span>
          <span
            v-for="branch in menu.branches"
            :key="branch.id"
            class="inline-block px-3 py-1 mx-2 mb-2 text-xs font-semibold text-gray-700 capitalize bg-gray-200 rounded"
          >
            {{ branch.name }}
          </span>
        </div>
      </div>
      <div
        class="overflow-hidden rounded shadow-lg flip-card"
        :class="!editable ? 'flip-card-back' : ''"
      >
        <span
          class="relative h-24 mb-1 overflow-hidden rounded"
          v-if="!editImage"
        >
          <img
            v-if="previewImg"
            class="object-cover w-full h-56 cursor-pointer"
            :src="previewImg"
            @click="editImage = true"
            alt=""
          />
          <img
            v-else-if="!previewImg && menu.media[0]"
            @click="editImage = true"
            class="object-cover w-full h-56 cursor-pointer"
            :src="menu.media[0].url"
            alt=""
          />
          <img
            :src="require('~/assets/cover.jpg')"
            @click="editImage = true"
            v-else
            class="object-cover w-full h-56 cursor-pointer"
          />
        </span>
        <span class="relative" v-if="editImage">
          <label
            class="flex flex-col items-center justify-center h-24 px-4 py-3 mb-1 tracking-wide text-blue-500 uppercase bg-white border rounded-lg shadow-lg cursor-pointer border-blue hover:bg-blue-500 hover:text-white"
            style="height: 63%"
          >
            <template>
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
        <div class="flex items-center justify-between p-4">
          <input
            type="text"
            name="name"
            v-model="updateMenu.name"
            @change="updateName($event)"
            required
            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
          />
        </div>
        <div class="flex items-center justify-between px-4">
          <button
            class="px-2 py-1 my-1 text-sm text-blue-500 capitalize border border-blue-200 rounded hover:bg-blue-200"
            @click="editMenu()"
          >
            <span class="font-bold"> {{ $t("update_menu") }} </span>
          </button>
          <button
            class="px-2 py-1 my-1 text-sm text-blue-500 capitalize border border-blue-200 rounded hover:bg-blue-200"
            @click="editable = !editable"
          >
            <font-awesome-icon :icon="['fas', 'undo-alt']" />
          </button>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  props: ["menu"],
  data() {
    return {
      menuOptions: false,
      loader: "",
      editable: false,
      updateMenu: { name: "", file: "" },
      editImage: false,
      previewImg: null,

      // flip: false
    };
  },
  mounted() {
    this.updateMenu = { ...this.menu };
  },
  methods: {
    uploadImage() {
      let file = this.$refs.file.files[0];
      if (file.size > 1000000) {
        this.$store.dispatch("noti/pushError", {
          body: "Image larger than 1 mb",
        });
        this.loading = null;
        this.editImage = false;
        return;
      }
      this.updateMenu.file = file;
      this.editImage = false;
      this.previewImg = URL.createObjectURL(file);
    },
    updateName(e) {
      this.updateMenu.name = e.target.value;
    },
    editMenu() {
      const headers = {
        headers: {
          "Content-Type": "multipart/form-data",
          accept: "application/json",
        },
      };
      const payload = new FormData();
      payload.append("name", this.updateMenu.name);
      if (this.updateMenu.file) {
        payload.append("file", this.updateMenu.file);
      }
      this.$axios
        .post(
          "/menus/" + this.updateMenu.slug + "?_method=put",
          payload,
          headers
        )
        .then(() => {
          this.$store.commit("modal/set", [null]);
          //get menus and store it
          this.$store.dispatch("menus/refreshMenus");
          this.editable = false;
        })
        .catch((err) => {
          for (const error in err.response.data?.errors) {
            this.$store.dispatch("noti/pushError", {
              body: err.response.data.errors[error][0],
            });
          }
          this.$store.commit("modal/set", [null]);
        });
    },
  },
};
</script>
<style scoped>
.flip-card {
  width: 22rem;
  height: 22rem;
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}
/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}
/* Do an horizontal flip when you move the mouse over the flip box container */
/* .flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
} */
.do_flip {
  transform: rotateY(180deg);
}
/* Position the front and back side */
.flip-card-front,
.flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden; /* Safari */
  backface-visibility: hidden;
}
/* Style the front side (fallback if image is missing) */
/* Style the back side */
.flip-card-back {
  transform: rotateY(180deg);
}
</style>