<template>
  <section
    class="fixed bottom-0 left-0 z-40 flex items-center justify-center w-full h-full bg-black bg-opacity-75"
    v-if="open"
  >
    <div class="w-full max-w-5xl p-4 py-10 bg-white rounded shadow">
      <h3
        class="w-full text-2xl font-bold tracking-wide text-center text-gray-700 capitalize"
      >
        {{ $t("choose_branch") }}
      </h3>

      <nav class="flex flex-wrap justify-center my-12 -mx-2">
        <div v-for="branch in branches" :key="branch.id">
          <input
            :id="branch.id"
            class="hidden branch-input"
            type="radio"
            name="branch"
            :value="branch.id"
            v-model="selectedBranch"
            @change="selectBranch(selectedBranch)"
          />
          <label
            :for="branch.id"
            class="relative flex items-center justify-center w-40 h-24 mx-2 my-1 text-sm font-bold text-gray-600 capitalize truncate border border-gray-100 rounded shadow-lg cursor-pointer hover:bg-gray-200"
          >
            {{ branch.name }}
          </label>
        </div>
      </nav>
      <button
        class="block h-10 px-32 mx-auto mt-4 font-bold text-white capitalize bg-red-500 rounded hover:bg-red-400"
        @click="$store.commit('me/branchesModal', false)"
      >
        {{ $t("choose") }}
      </button>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      selectedBranch: false,
      open: true,
    };
  },
  created() {
    if (this.$auth.$storage.getUniversal("selectedBranch")) {
      this.getOldBranch();
    }
  },
  methods: {
    getOldBranch() {
      this.selectedBranch =
        this.$auth.$storage.getUniversal("selectedBranch") ?? "";
      this.$axios.defaults.headers.common["X-SMU-BRANCH"] = this.selectedBranch;
    },
    selectBranch(branch) {
      this.$auth.$storage.setUniversal("selectedBranch", branch);
      this.$axios.defaults.headers.common = {
        "X-SMU-BRANCH": this.selectedBranch,
      };
      this.$router.go();
    },
  },
  computed: {
    branches() {
      return this.$store.getters["me/branches"];
    },
  },
};
</script>


<style scoped>
.branch-input:checked + label {
  @apply bg-red-200;
  @apply text-red-600;
}
</style>