<template>
  <div>
    <div
      class="flex items-center justify-between w-full mt-4 mb-2 tracking-wide uppercase border-b-4"
    >
      <h3 class="text-lg font-bold" v-if="edit != type.slug">
        {{ type.name }}
        <font-awesome-icon
          class="mx-1"
          v-tooltip="'Multiselect: ' + type.multi_select"
          :class="{
            'text-gray-400': type.multi_select === false,
            'text-green-500': type.multi_select === true,
          }"
          :icon="['fal', 'ballot-check']"
        />
        <font-awesome-icon
          class="mx-1"
          v-tooltip="'Incremental: ' + type.incremental"
          :class="{
            'text-gray-400': type.incremental === false,
            'text-orange-500': type.incremental === true,
          }"
          :icon="['fal', 'layer-plus']"
        />
      </h3>
      <span class="flex" v-if="edit === type.slug">
        <input type="text" v-model="newType.name" class="w-32 px-2 rounded" />

        <button
          class="items-center justify-cent+er px-2 py-1 mx-1 rounded cursor-pointer hover:bg-gray-300"
          :class="{
            'text-gray-400': newType.multi_select === false,
            'text-green-500': newType.multi_select === true,
          }"
          v-tooltip="'Multiselect: ' + newType.multi_select"
          @click="
            newType.multi_select = !newType.multi_select;
            newType.incremental = newType.multi_select
              ? true
              : newType.incremental;
          "
        >
          <font-awesome-icon :icon="['fal', 'ballot-check']" />
        </button>
        <button
          class="items-center justify-center px-2 py-1 mx-1 rounded cursor-pointer hover:bg-gray-300"
          :class="{
            'text-gray-400': newType.incremental === false,
            'text-orange-500': newType.incremental === true,
          }"
          v-tooltip="'Incremental: ' + newType.incremental"
          @click="
            newType.incremental = !newType.incremental;
            newType.multi_select = !newType.incremental
              ? false
              : newType.multi_select;
          "
        >
          <font-awesome-icon :icon="['fal', 'layer-plus']" />
        </button>
      </span>

      <!-- actions -->
      <div class="relative w-24 text-base">
        <template v-if="edit === type.slug">
          <button
            class="px-2 py-1 mx-2 text-center text-green-500 rounded hover:bg-green-200"
            @click="updateType(type.slug, newType), (edit = !edit)"
          >
            <font-awesome-icon :icon="['fal', 'check']" class="mx-1" />
          </button>
          <button
            class="px-2 py-1 ml-1 text-center text-red-600 rounded hover:bg-red-200"
            @click="edit = !edit"
          >
            X
          </button>
        </template>
        <template v-else>
          <button
            class="w-8 h-8 py-1 ml-1 text-center text-blue-600 rounded hover:bg-blue-200"
            @click="(edit = type.slug), (newType = { ...type })"
            :disabled="loading === type.slug"
          >
            <font-awesome-icon
              v-if="loading === type.slug"
              :icon="['fad', 'spinner']"
              class="fa-spin"
            />
            <font-awesome-icon v-else :icon="['fal', 'pencil-alt']" />
          </button>

          <button
            class="px-2 py-1 text-center text-red-600 rounded hover:bg-red-200"
            :disabled="loading === 'deletetype'"
          >
            <font-awesome-icon
              v-if="loading === 'deletetype'"
              :icon="['fad', 'spinner']"
              class="mx-1 fa-spin"
            />
            <font-awesome-icon
              v-else
              :icon="['fal', 'trash-alt']"
              class="mx-1"
              @click="deleteType(type.slug)"
            />
          </button>
        </template>
      </div>
    </div>

    <section
      class="flex items-center justify-between py-1 text-sm capitalize border-b last:border-b-0 group"
      v-for="(option, i) in type.options"
      :key="'option_' + i"
    >
      <!-- option -->
      <div class="flex flex-col w-2/5 py-1">
        <input
          type="text"
          v-model="newOption.name"
          v-if="edit === option.id"
          class="px-1 mr-2 border rounded"
        />
        <p v-else class="overflow-hidden truncate" v-tooltip="option.name">
          {{ option.name }}
        </p>
      </div>

      <!-- price -->
      <div class="flex flex-col w-2/5 py-1">
        <span v-if="edit === option.id" class="flex items-center">
          <!-- <input
                  type="text"
                  v-model.number="newOption.price"
                  class="w-3/4 border rounded"
               /> -->
          <currency-input
            v-model="newOption.price"
            class="w-32 px-2 rounded"
            :currency="currency"
            :locale="iso"
            :placeholder="'Price'"
            auto-decimal-mode
            value-as-integer
          />
        </span>
        <span v-else class="flex items-center justify-between">
          <p class="w-3/4">
            {{ currencyFormatter(option.price) }}
          </p>
        </span>
      </div>

      <!-- actions -->
      <div class="relative w-24 text-center">
        <template v-if="edit === option.id">
          <button
            class="px-2 py-1 text-center text-green-500 rounded hover:bg-green-200"
            @click="updateOption(option.slug, newOption), (edit = !edit)"
          >
            <font-awesome-icon :icon="['fal', 'check']" class="mx-1" />
          </button>
          <button
            class="px-2 py-1 ml-1 text-center text-red-600 rounded hover:bg-red-200"
            @click="edit = !edit"
          >
            X
          </button>
        </template>

        <template v-else>
          <button
            class="px-1 py-1 ml-1 text-center text-blue-600 rounded hover:bg-blue-200"
            @click="(edit = option.id), (newOption = { ...option })"
            :disabled="loading === 'editOption' + option.slug"
          >
            <font-awesome-icon
              v-if="loading === 'editOption' + option.slug"
              :icon="['fal', 'spinner']"
              class="mx-1 fa-spin"
            />
            <font-awesome-icon
              v-else
              :icon="['fal', 'pencil-alt']"
              class="mx-1"
            />
          </button>

          <button
            class="px-1 py-1 text-center text-red-600 rounded hover:bg-red-200"
            @click="deleteOption(option.slug)"
            :disabled="loading === option.slug"
          >
            <font-awesome-icon
              v-if="loading === option.slug"
              :icon="['fad', 'spinner']"
              class="fa-spin"
            />
            <font-awesome-icon
              v-else
              :icon="['fal', 'trash-alt']"
              class="mx-1"
            />
          </button>
        </template>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "Type",
  props: {
    type: Object,
  },
  data() {
    return {
      edit: false,
      newOption: [],
      newType: {},
      loading: "",

      //currency setting
      iso: this.$store.state.lang.rtl ? "ar-EG" : "en-EG",
      currency: "EGP",
    };
  },
  mounted() {},
  methods: {
    updateOption(slug, data) {
      this.loading = "editOption" + slug;
      this.$axios
        .put(`options/${slug}`, data)
        .then((response) => {
          this.$store.dispatch("products/getTypes");
          this.loading = "";
        })
        .catch((err) => {
          this.loading = "";

          for (const error in err.response.data.errors) {
            this.$store.dispatch("noti/pushError", {
              body: err.response.data.errors[error][0],
            });
          }
        });
    },
    deleteOption(slug) {
      this.loading = slug;
      this.$axios
        .$delete(`options/${slug}`)
        .then((response) => {
          this.$store.dispatch("products/getTypes");
          this.loading = false;
        })
        .catch((e) => {
          this.loading = false;
          this.$store.dispatch("noti/pushError", {
            body: e.response.data.data.message,
          });
        });
    },

    updateType(slug, data) {
      this.loading = slug;
      this.$axios
        .put(`types/${slug}`, data)
        .then((response) => {
          this.$store.dispatch("products/getTypes");
          this.loading = "";
        })
        .catch((e) => {
          this.loading = "";
          this.$store.dispatch("noti/pushError", {
            body: e.response.data.data.message,
          });
        });
    },
    deleteType(slug) {
      this.loading = "deletetype";
      this.$axios
        .$delete(`types/${slug}`)
        .then((response) => {
          this.loading = false;
          this.$store.dispatch("products/getTypes");
        })
        .catch((e) => {
          this.loading = false;
          this.$store.dispatch("noti/pushError", {
            body: e.response.data.data.message,
          });
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
  },
};
</script>

<style>
</style>