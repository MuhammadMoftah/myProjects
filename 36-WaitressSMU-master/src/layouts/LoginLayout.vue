<template>
   <q-layout view="lHh Lpr lFf">
      <q-page-container>
         <router-view />
      </q-page-container>
   </q-layout>
</template>

<script>
export default {
   name: "LoginLayout",
   created() {
      //get user and redirect him if Authorizated
      this.getUser();
   },
   methods: {
      getUser() {
         const token = this.$q.sessionStorage.getItem("token");
         const headers = {
            headers: {
               Authorization: `Bearer ${token}`,
            },
         };
         this.$axios
            .get("account/me", headers)
            .then((res) => {
               this.$store.commit("me/setMe", res.data.data);
               this.$router.push("/");
            })
            .catch((err) => {});
      },
   },
};
</script>
