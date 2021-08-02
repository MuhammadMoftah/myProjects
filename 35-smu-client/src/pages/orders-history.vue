<template>
   <q-page class="q-px-md row">
      <q-card
         class="my-card col-12 col-sm-6 col-md-4 q-my-sm"
         flat
         bordered
         v-for="n in 10"
         :key="n"
         @click="$router.push('/receipt')"
      >
         <q-card-section horizontal class="bg-grey-1">
            <q-card-section
               :style="
                  $t('dir') === 'rtl'
                     ? 'border-left:1px solid #e5e5e5'
                     : 'border-right:1px solid #e5e5e5'
               "
            >
               <q-img
                  style="border-radius: 5%; width: 100px; height: 100px"
                  class="rounded-borders bg-grey-3 shadow-2"
                  src="https://image.freepik.com/free-vector/burger-logo-design_9845-25.jpg"
               />
            </q-card-section>
            <q-card-section class="q-py-sm col">
               <div class="text-h5 q-mt-sm q-mb-xs text-blue-grey-9 text-bold">
                  Sofia Resturant
               </div>
               <div class="text-blue-grey-6 text-bold">
                  22 November 2020 at 15:35
               </div>
               <div class="text-bold text-primary q-mt-lg">146 EGP</div>
            </q-card-section>
         </q-card-section>
      </q-card>
   </q-page>
</template>

<script>
export default {
   name: "PageIndex",
   Layout: "MenuLayout",
   mounted() {},
   data: () => ({}),
   methods: {},
};
</script>
<style scoped>
* {
   font-family: "Roboto" !important;
}
</style>