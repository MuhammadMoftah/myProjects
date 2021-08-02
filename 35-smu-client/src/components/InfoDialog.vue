<template>
   <q-dialog
      v-model="open"
      transition-show="slide-up"
      transition-hide="slide-down"
      position="bottom"
      :dir="$t('dir')"
      @hide="$parent.$parent.info = false"
   >
      <q-toolbar class="bg-white no-border-radius">
         <q-toolbar-title>
            {{ $t("about") + " " + settings.title }}
         </q-toolbar-title>
         <q-btn
            flat
            round
            dense
            icon="close"
            padding="0"
            @click="$parent.$parent.info = false"
         />
      </q-toolbar>
      <q-card class="no-border-radius items-container" style="height: 100vh">
         <div class="q-px-sm q-pt-lg">
            <p
               class="flex justify-between text-bold text-body1 no-margin text-blue-grey-10 text-capitalize"
            >
               <span>{{ settings.title }}</span>
            </p>
            <p
               class="flex justify-between text-grey-7 no-margin q-pb-sm"
               style="border-bottom: 1px solid #ededed"
            >
               <span>{{ settings.description }}</span>
            </p>
            <p
               class="flex items-center text-grey-10 q-py-sm no-margin"
               style="border-bottom: 1px solid #ededed"
            >
               <q-icon
                  name="place"
                  size="xs"
                  class="text-bold"
                  color="blue-grey-9"
               ></q-icon>
               <span class="text-bold text-grey-7 q-mx-md">
                  {{ settings.address }}
               </span>
            </p>
            <p
               v-if="false"
               class="flex items-center text-grey-10 q-py-sm no-margin"
               style="border-bottom: 1px solid #ededed"
            >
               <q-icon
                  color="blue-grey-9"
                  name="mail"
                  size="xs"
                  class="text-bold"
               ></q-icon>
               <span class="text-bold text-grey-7 q-mx-md">
                  {{ settings.email }}
               </span>
            </p>
            <p
               class="flex items-center text-grey-10 q-py-sm no-margin"
               style="border-bottom: 1px solid #ededed"
            >
               <q-icon
                  color="blue-grey-9"
                  name="phone"
                  size="xs"
                  class="text-bold"
               ></q-icon>
               <span class="text-bold text-grey-7 q-mx-md">
                  {{ settings.phone }}
               </span>
            </p>
         </div>
      </q-card>
   </q-dialog>
</template>

<script>
import BasketItem from "components/BasketItem";
export default {
   components: {
      BasketItem,
   },
   props: {
      open: {
         default: false,
         type: Boolean,
      },
   },
   data: () => ({}),
   computed: {
      settings() {
         if (this.$store.state.general.info) {
            return this.$store.state.general.info;
         }
         return this.$q.localStorage.getItem("settings");
      },
   },
};
</script>

<style scoped>
.items-container {
   height: 75vh !important;
   width: 100%;
   padding-bottom: 150px;
}
.basket-item {
   position: relative;
}
</style>