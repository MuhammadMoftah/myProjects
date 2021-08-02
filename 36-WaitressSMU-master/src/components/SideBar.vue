<template>
   <section>
      <q-img
         class="absolute-top bg-black"
         src="https://image.freepik.com/free-photo/card-soft-template-paper-report_1258-167.jpg"
         style="height: 150px"
      >
         <div class="absolute-bottom bg-transparent">
            <q-avatar size="56px" class="q-mb-sm">
               <img src="https://cdn.quasar.dev/img/boy-avatar.png" />
            </q-avatar>
            <div class="text-weight-bold">Muhammad Moftah</div>
            <div>@RehanaResturant</div>
         </div>
      </q-img>

      <q-list style="margin-top: 150px">
         <q-item-label header class="text-grey-8"> Go to </q-item-label>
         <q-item clickable to="/" exact>
            <q-item-section avatar>
               <q-icon :name="'deck'" />
            </q-item-section>

            <q-item-section>
               <q-item-label>Tables</q-item-label>
            </q-item-section>
         </q-item>
         <q-item clickable to="/somepage" exact>
            <q-item-section avatar>
               <q-icon :name="'label'" />
            </q-item-section>

            <q-item-section>
               <q-item-label>SomePage</q-item-label>
            </q-item-section>
         </q-item>
      </q-list>
      <div class="q-mx-xl absolute" style="bottom: 50px; left: 0; right: 0">
         <q-btn
            outline
            color="grey-9"
            icon="logout"
            class="text-bold full-width"
            label="Logout"
            @click="logout"
         />
      </div>
   </section>
</template>

<script>
export default {
   name: "SideBar",
   methods: {
      logout() {
         this.$axios.post("/account/logout");
         this.$q.sessionStorage.set("token", null);
         this.$router.push("/login");
      },
   },
};
</script>
