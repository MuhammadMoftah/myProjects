<template>
  <!-- Add Item Modal -->
  <Modal max_width="800">
    <!-- header -->
    <div class="capitalize" slot="modal-header">
      {{ $t("add_address") }}
    </div>

    <section class="flex flex-wrap font-bold text-black capitalize">
      <div class="flex flex-col w-1/3 p-2">
        <label for="courses capitalize">
          {{ $t("address_type") }}
        </label>

        <input type="address" class="input" v-model="add.name" />
      </div>

      <div class="flex flex-col w-1/3 p-2 capitalize">
        <label>
          {{ $t("house_no") }}
        </label>
        <input type="address" class="input" v-model="add.number" />
      </div>

      <div class="flex flex-col w-1/3 p-2 capitalize">
        <label>
          {{ $t("street") }}
        </label>
        <input type="address" class="input" v-model="add.street" />
      </div>

      <div class="flex flex-col w-1/3 p-2 capitalize">
        <label>
          {{ $t("city") }}
        </label>
        <input type="address" class="input" v-model="add.city" />
      </div>

      <div class="flex flex-col w-1/3 p-2 capitalize">
        <label>
          {{ $t("country") }}
        </label>
        <input type="address" class="input" v-model="add.country" />
      </div>

      <div class="flex flex-col w-1/3 p-2 capitalize">
        <label>
          {{ $t("region") }}
        </label>
        <input type="address" class="input" v-model="add.region" />
      </div>

      <div class="flex flex-col w-1/3 p-2 capitalize" v-if="false">
        <label>
          {{ $t("zip") }}
        </label>
        <input type="address" class="input" v-model="add.zip_code" />
      </div>
    </section>

    <!-- footer -->
    <template slot="confirm-button">
      <button
        class="w-24 px-4 py-1 mx-2 text-sm text-white capitalize bg-gray-400 rounded-full cursor-default"
        v-if="false"
      >
        <font-awesome-icon :icon="['fad', 'spinner']" class="fa-spin" />
      </button>
      <button
        v-else
        class="px-4 py-1 mx-1 text-sm text-white capitalize bg-blue-500 rounded-full hover:bg-blue-400"
        @click="sendAddress()"
      >
        {{ $store.state.modal.confirm_button_text }}
      </button>
    </template>
    <template slot="cancel-button">
      <button
        class="px-4 py-1 mx-1 text-sm text-white capitalize bg-gray-500 rounded-full hover:bg-gray-600"
        @click="cancel()"
      >
        {{ $t("menu.cancel") }}
      </button>
    </template>
  </Modal>
</template>

<script>
export default {
  data() {
    return {
      add: {},
    };
  },
  methods: {
    sendAddress() {
      this.$emit("sendAddress", this.add);
      this.$store.commit("modal/set", []);
    },

    cancel() {
      this.$store.commit("modal/set", []);
      Object.assign(this.$data, this.$options.data());
    },
  },
};
</script>

<style>
</style>