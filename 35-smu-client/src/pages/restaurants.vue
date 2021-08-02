<template>
   <q-page class="q-pa-sm row items-start q-col-gutter-md">
      <q-card
         class="my-card col-12 col-sm-6 col-md-4 q-my-none"
         v-for="n in 10"
         :key="n"
         flat
         @click="$router.push('/')"
      >
         <q-img src="https://cdn.quasar.dev/img/parallax2.jpg" :ratio="3.5" />

         <div class="border1 q-px-sm">
            <q-img
               src="https://cdn.quasar.dev/img/parallax2.jpg"
               style="width: 60px; border-radius: 50%; margin-top: -35px"
               class="q-mx-auto block"
               :ratio="1"
            />

            <p class="text-bold q-my-none" style="margin-top: -22px">
               <span class="text-orange-8 roboto">
                  <q-icon size="xs" name="star" /> 4/5
               </span>
               <span class="text-grey-7"> (1.5k) </span>
            </p>
            <p class="text-bold text-h6 q-my-none">Bracio Resturant</p>
            <p class="text-grey-8 q-my-none">
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
               architecto est mollitia excepturi
            </p>
            <div class="row">
               <div class="col-4">
                  <div
                     class="text-grey-7 text-bold q-py-sm text-caption roboto"
                  >
                     <q-icon name="alarm" size="xs"></q-icon>

                     35 min
                  </div>
               </div>
               <div class="col-4">
                  <div
                     class="text-grey-7 text-bold q-py-sm text-caption roboto"
                  >
                     <q-icon name="moped" size="xs"></q-icon>

                     15 EGP
                  </div>
               </div>
               <div class="col-4">
                  <div
                     class="text-grey-7 text-bold q-py-sm text-caption roboto"
                  >
                     <q-icon name="receipt" size="xs"></q-icon>

                     60 EGP
                  </div>
               </div>
            </div>
         </div>
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
<style  >
</style>