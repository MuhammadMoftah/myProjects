<template>
   <section
      class="flex items-center w-full h-full bg-red-600"
      :class="$store.state.lang.rtl ? 'text-right' : ''"
   >
      <section class="w-1/2">
         <div class="flex flex-col w-1/2 ml-auto">
            <div class="self-center w-1/2 mb-20">
               <img src="~/assets/logo.png" style="margin: auto" />
            </div>

            <h1 class="mb-4 text-2xl">{{ $t("login.welcome") }}</h1>
            <!-- message forget -->
            <article
               class="px-4 py-3 mb-4 text-sm font-bold text-yellow-500 bg-orange-100 border-l-4 border-yellow-500 shadow-md"
               role="alert"
               v-if="forget == true"
            >
               <p>{{ $t("login.typo") }}?</p>
               <p>
                  {{ $t("login.did_you") }}
                  <a
                     href="/login/forget-credential"
                     class="underline hover:text-yellow-700"
                     >{{ $t("login.forget_credentials") }}?</a
                  >
               </p>
            </article>

            <!-- username -->
            <div class="mb-6">
               <label>{{ $t("login.username") }}</label>

               <div class="relative w-full rounded">
                  <input
                     :class="[
                        'w-full py-2 px-3 leading-tight bg-red-700 rounded border border-red-700 focus:outline-none focus:border-red-500',
                        { 'border-green-500': validEmail(form.email) },
                        $store.state.lang.rtl ? 'text-right' : '',
                     ]"
                     type="email"
                     v-model="form.email"
                     @input="validEmail(form.email)"
                     @keyup.enter="$refs.password.focus()"
                     autocomplete="email"
                  />
                  <span
                     class="absolute inset-y-0 flex items-center px-2 text-green-500 pointer-events-none"
                     :class="$store.state.lang.rtl ? 'left-0' : 'right-0'"
                  >
                     <font-awesome-icon
                        v-if="validEmail(form.email)"
                        :icon="['fas', 'check']"
                     />
                  </span>
               </div>
            </div>

            <!-- password -->
            <div class="mb-6">
               <label>{{ $t("login.password") }}</label>
               <div class="relative w-full rounded">
                  <input
                     :class="[
                        'w-full py-2 px-3 leading-tight bg-red-700 rounded border border-red-700 focus:outline-none focus:border-red-500',
                        { 'border-green-500': validEmail(form.email) },
                        $store.state.lang.rtl ? 'text-right' : '',
                     ]"
                     type="password"
                     ref="password"
                     v-model="form.password"
                     @focus="active = true"
                     @blur="active = false"
                     @keyup.enter="signin"
                     autocomplete="current-password"
                  />
                  <span
                     class="absolute inset-y-0 right-0 flex items-center px-2 text-green-500 pointer-events-none"
                  >
                     <font-awesome-icon
                        v-if="form.password.length >= 8"
                        :icon="['fas', 'check']"
                     />
                  </span>
               </div>
            </div>

            <!-- forget password -->
            <!-- <a class="text-red-300" href="/login/forgot-credentials"
                  >I forget my username or password</a
               > -->

            <nav class="flex justify-end my-3">
               <button
                  class="px-4 py-2 font-bold text-red-600 transition duration-200 ease-in-out transform bg-white rounded shadow hover:shadow-lg hover:bg-gray-200 justify-self-end"
                  @click="signin"
               >
                  {{ $t("login.enter") }}
                  <font-awesome-icon
                     v-show="loading === true"
                     class="text-red-600 fa-spin"
                     :icon="['fad', 'spinner-third']"
                  />
               </button>
            </nav>
         </div>
      </section>

      <section
         class="flex flex-col justify-center w-1/2 h-full bg-red-600 image"
      ></section>
   </section>
</template>

<script>
export default {
   name: "login",
   layout: "login",
   middleware: ["redirectIfAuthenticated"],
   head() {
      return {
         link: [
            {
               //Cairo font
               rel: "stylesheet",
               href: this.$store.state.lang.rtl ? this.fontLink : "",
            },
         ],
      };
   },
   data() {
      return {
         form: {
            email: "",
            password: "",
         },
         forget: false,
         active: false,
         loading: false,
         fontLink:
            "https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800&display=swap",
      };
   },
   methods: {
      async signin() {
         try {
            this.loading = true;
            const user = await this.$auth.loginWith("local", {
               data: this.form,
            });
            this.forget = false;
            this.$store.commit("authh/storeLogin");
            this.$router.push("/manager");
         } catch (e) {
            this.loading = false;
            this.forget = true;
            this.error = e.response;
         }
      },
      validEmail(email) {
         var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

         return re.test(email);
      },
   },
};
</script>

<style scoped>
.image {
   /* background-color: #d3d0c9; */
   background-image: url("~assets/login3.jpg");
   background-size: cover;
   background-position: center center;
   clip-path: polygon(30% 0, 100% 0, 100% 100%, 0% 100%);
}
</style>