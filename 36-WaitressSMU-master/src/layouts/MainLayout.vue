<template>
   <q-layout view="lHh Lpr lFf">
      <q-drawer
         v-model="drawerOpen"
         show-if-above
         bordered
         content-class="bg-grey-1"
      >
         <SideBar />
      </q-drawer>

      <q-page-container class="q-px-xs">
         <router-view />
      </q-page-container>
   </q-layout>
</template>

<script>
import SideBar from "components/SideBar";

export default {
   name: "MainLayout",
   components: { SideBar },
   data() {
      return {
         drawerOpen: false,
      };
   },
   created() {
      //global bus for Main Drawer
      this.$root.$on("toggleDrawer", this.toggleDrawer);
      //set global token and error handling
      this.setGlobalHandling();
      this.getUser();
      this.getCategories();
      this.getDishes();
   },
   methods: {
      toggleDrawer() {
         this.drawerOpen = !this.drawerOpen;
      },

      setGlobalHandling() {
         const token = this.$q.sessionStorage.getItem("token");
         this.$axios.defaults.headers.common[
            "Authorization"
         ] = `Bearer ${token}`;

         //global error handling
         this.$axios.interceptors.response.use(null, (error) => {
            if (
               error.response.status === 400 ||
               error.response.status === 401
            ) {
               this.$router.push("/login");

               return Promise.reject(error);
            }

            // if has response show the error
            if (error.response) {
               this.$q.notify({
                  message: error.response.data.message,
               });
            }
            return Promise.reject(error);
         });
      },
      getUser() {
         this.$axios
            .get("account/me")
            .then((res) => {
               this.$store.commit("me/setMe", res.data.data);
            })
            .catch(() => {
               this.$q.sessionStorage.set("token", null);
               this.$router.push("/login");
            });
      },
      getCategories() {
         this.$axios.get("/categories").then((res) => {
            this.$store.commit("general/storeCategories", res.data.data);
         });
      },
      getDishes() {
         this.$axios.get("/products?per_page=50000").then((res) => {
            this.$store.commit("general/storeDishes", res.data.data);
         });
      },
   },
};
</script>

<style >
.q-notifications {
   margin-top: 200px !important;
}
</style>