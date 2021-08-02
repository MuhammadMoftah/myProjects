<template>
  <section>
    <div
      class="fixed top-0 left-0 z-50 w-full h-full bg-black opacity-75"
      @click="$store.dispatch('edit/closeEdit')"
    ></div>
    <transition name="slide-fade">
      <section
        class="w-full h-screen max-h-full p-3 overflow-auto bg-white border border-gray-400 rounded md:w-1/2 edit"
        :class="$store.state.lang.rtl ? 'left-0' : 'right-0'"
        v-if="slideEdit"
      >
        <div class="flex items-center justify-between mb-3">
          <aside class="flex items-center">
            <font-awesome-icon class="mx-1" :icon="['fas', 'edit']" />
            <p class="font-bold">{{ $t("menu.edit_item") }}</p>
          </aside>
          <button
            class="w-6 h-6 text-white bg-gray-600 rounded-full"
            @click="$store.dispatch('edit/closeEdit')"
          >
            X
          </button>
        </div>

        <p class="text-center text-gray-500" v-if="!dish">
          {{ $t("menu.no_item") }}
        </p>
        <div class="edit-body">
          <DishToEdit />
        </div>
      </section>
    </transition>
  </section>
</template>

<script>
import DishToEdit from "~/components/products/edit/DishToEdit";
export default {
  name: "SideBarEdit",
  components: {
    DishToEdit,
  },
  data: () => ({
    slideEdit: false,
    dish: [],
  }),
  fetch() {
    this.slideEdit = true;
    this.dish = this.$store.state.edit.data;
  },
};
</script>

<style>
.edit .edit-line {
  height: calc(100% - 48px);
  left: 119.5px;
  top: 45px;
}
.edit {
  height: 100vh;
  z-index: 999;
  position: fixed;
  top: 0px;
  bottom: 0;

  margin: auto;
}
.edit-wrapper {
  height: 84vh;
  overflow: auto;
}

.slide-fade-enter-active {
  transition: all 0.3s ease-out;
}
.slide-fade-leave-active {
  transition: all 0.1s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-enter,
.slide-fade-leave-to {
  transform: translateX(300px);
  opacity: 0;
}
</style>