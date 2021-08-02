<template>
   <section class="flex justify-center" style="height: 90vh">
      <div id="wave"></div>

      <div
         class="q-gutter-y-md column rounded"
         style="max-width: 350px; width: 100%"
      >
         <img
            class="q-mx-auto rounded q-my-lg"
            width="120px"
            src="~/assets/imgs/smu-2.svg"
            alt=""
         />
         <p class="text-h4 no-margin text-bold q-px-md">
            Let's start with login!
         </p>
         <q-form @submit="login" class="q-gutter-md q-px-md">
            <q-input
               color="red-4"
               v-model="account.email"
               aria-autocomplete="off"
               placeholder="User Name"
               bg-color="white"
               filled
            >
            </q-input>

            <q-input
               color="red-4"
               type="password"
               aria-autocomplete="off"
               bg-color="white"
               v-model="account.password"
               placeholder="Password"
               filled
            >
            </q-input>
            <div>
               <q-btn
                  label="Login"
                  type="submit"
                  color="red-6"
                  unelevated
                  class="q-my-sm q-py-xs full-width"
                  :loading="loading"
               />
            </div>
         </q-form>
      </div>
   </section>
</template>

<script>
export default {
   data() {
      return {
         loading: false,
         account: {
            email: "cafe@o-smu.com",
            password: "cafe123",
         },
      };
   },
   methods: {
      login() {
         this.loading = true;

         this.$axios
            .post("/login", this.account)
            .then((res) => {
               this.$axios.defaults.headers.common[
                  "Authorization"
               ] = `Bearer ${res.data.data.access_token}`;

               this.$q.sessionStorage.set("token", res.data.data.access_token);
               setTimeout(() => {
                  this.$router.push("/");
                  this.loading = false;
               }, 500);
            })
            .catch(() => {
               this.loading = false;
            });
      },
   },
};
</script>

<style scoped>
#wave {
   position: fixed;
   top: -180px;
   left: -100px;
   height: 70px;
   width: 100%;
   z-index: -1;
   /* background: #f0d3d3; */
}

#wave:after {
   content: "";
   display: block;
   position: absolute;
   border-radius: 87% 75%;
   width: 120%;
   height: 400px;
   background: #ff8f8f61;
   left: 55px;
   top: 11px;
}
</style>