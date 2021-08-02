<template>
  <section>
    <nav class="w-full px-4 py-2 bg-white border-b">
      <div class="flex items-center justify-between">
        <aside class="flex items-center">
          <button
            class="px-2 py-1 mx-1 my-1 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-200"
            @click="
              $store.commit('modal/set', [
                'CreateMenu',
                $t('menu.new_course'),
                $t('menu.add_cource'),
                null,
              ])
            "
            v-if="false"
          >
            <font-awesome-icon :icon="['fal', 'plus']" class="" />
            <font-awesome-icon :icon="['fal', 'burger-soda']" class="" />
            {{ $t("menu.new_course") }}
          </button>
        </aside>

        <button
          class="px-2 py-1 my-1 text-sm text-blue-500 capitalize border border-blue-200 rounded hover:bg-blue-200"
          @click="
            $store.commit('modal/set', [
              'CreateMenu',
              $t('menu.new_course'),
              $t('menu.add_cource'),
              null,
            ])
          "
        >
          <font-awesome-icon :icon="['fas', 'plus']" />
          <span class="font-bold"> {{ $t("create_menu") }} </span>
        </button>
      </div>
    </nav>
    <div class="flex flex-wrap w-full">
      <div class="p-4" v-for="menu in menus" :key="menu.id">
        <MenuBox :menu="menu" @deleteMenu="openDeleteModal" />
      </div>
    </div>

    <!-- delete modal -->
    <Modal max_width="500" v-if="menu.id">
      <div slot="modal-header" class="font-bold text-gray-700 capitalize">
        {{ $t("delete") }}
        <span class="text-red-500"> {{ menu.name }} </span>
      </div>
      <div class="font-bold">{{ $t("delete_menu_warning") }} ?!</div>
      <div slot="close-icon">
        <button
          class="flex items-center justify-center mx-3 hover:text-blue-500"
          aria-label="close"
          @click="close()"
        >
          <font-awesome-icon :icon="['fad', 'times-circle']" />
        </button>
      </div>
      <div slot="confirm-button">
        <!-- loading button -->
        <button
          class="w-24 px-4 py-1 mx-2 text-sm text-white capitalize bg-gray-400 rounded-full cursor-default"
          v-if="loader === 'delete'"
        >
          <font-awesome-icon :icon="['fad', 'spinner']" class="fa-spin" />
        </button>
        <button
          v-else
          class="px-4 py-1 mx-2 text-sm text-white capitalize bg-red-500 rounded-full hover:bg-red-600"
          @click="deleteMenu(menu)"
        >
          {{ $t("delete") }}
        </button>
      </div>
      <div slot="cancel-button">
        <button
          class="px-4 py-1 text-sm capitalize bg-gray-300 rounded-full hover:bg-gray-500 dark:bg-gray-900"
          @click="closeDelete()"
        >
          {{ $t("menu.cancel") }}
        </button>
      </div>
    </Modal>
    <CreateMenu />
  </section>
</template>

<script>
import CreateMenu from "~/components/menus/CreateMenu";
import MenuBox from "~/components/menus/MenuBox";

export default {
  name: "menus",
  middleware: ["redirectIfGuest"],
  components: { CreateMenu, MenuBox },
  mounted() {},
  fetch() {
    // set route name
    this.$store.commit("locales/setRouteName", "menus");

    //get menus and store it
    this.$store.dispatch("menus/refreshMenus");
  },
  activated() {
    this.$fetch();
  },

  data() {
    return {
      menu: {},
      loader: "",
    };
  },
  computed: {
    menus() {
      if (this.$store.state.menus.list.length) {
        return this.$store.state.menus.list;
      }
      return this.$store.state.menus.list;
    },
  },
  methods: {
    openDeleteModal(menu) {
      this.menu = { ...menu };
    },
    deleteMenu(menu) {
      this.loader = "delete";
      this.$axios
        .delete(`menus/${menu.slug}`)
        .then(() => {
          this.$store.dispatch("menus/refreshMenus");
          this.closeDelete();
          this.loader = "";
        })
        .catch((e) => {
          this.$store.dispatch("noti/pushError", {
            body: e.response.data.data.message,
          });
          this.closeDelete();
          this.loader = "";
        });
    },
    closeDelete() {
      this.menu = {};
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
