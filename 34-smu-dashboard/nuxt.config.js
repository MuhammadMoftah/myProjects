export default {
  /*
   ** Nuxt rendering mode
   ** See https://nuxtjs.org/api/configuration-mode
   */
  // mode: "universal",
  ssr: true,
  // ssr: false,
  /*
   ** Nuxt target
   ** See https://nuxtjs.org/api/configuration-target
   */
  target: "server",
  // target: "static",
  /*
   ** Headers of the page
   ** See https://nuxtjs.org/api/configuration-head
   */

  head: {
    title: process.env.npm_package_name || "",
    meta: [
      { charset: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      {
        hid: "description",
        name: "description",
        content: process.env.npm_package_description || ""
      }
    ],
    link: [{ rel: "icon", type: "image/x-icon", href: "/favicon.ico" }]
  },
  /*
   ** Global CSS
   */
  css: ["@/assets/css/custom.css"],

  /*
   ** Plugins to load before mounting the App
   ** https://nuxtjs.org/guide/plugins
   */
  plugins: [
    "~/plugins/mixins/currencyFormatter.js",
    "~/plugins/tooltip",
    { src: "~/plugins/mixins/pusher", ssr: false }
  ],
  /*
   ** Auto import components
   ** See https://nuxtjs.org/api/configuration-components
   */
  components: true,
  /*
   ** Nuxt.js dev-modules
   */
  buildModules: [
    // Doc: https://github.com/nuxt-community/nuxt-tailwindcss
    "@nuxtjs/tailwindcss"
  ],
  /*
   ** Nuxt.js modules
   */
  modules: [
    // Doc: https://axios.nuxtjs.org/usage
    "@nuxtjs/axios",
    "@nuxtjs/pwa",
    "@nuxtjs/auth-next",
    [
      "nuxt-fontawesome",
      {
        //https://github.com/FortAwesome/vue-fontawesome
        imports: [
          {
            set: "@fortawesome/pro-solid-svg-icons",
            icons: ["fas"]
          },
          {
            set: "@fortawesome/pro-light-svg-icons",
            icons: ["fal"]
          },
          {
            set: "@fortawesome/pro-duotone-svg-icons",
            icons: ["fad"]
          }
        ]
      }
    ],
    [
      "nuxt-i18n",
      {
        locales: [
          {
            code: "ar",
            file: "ar-EG.js",
            name: "Arabic",
            dir: "rtl"
          },
          {
            code: "en",
            file: "en-US.js",
            name: "English",
            dir: "ltr"
          },
          {
            code: "fr",
            file: "fr-FR.js",
            name: "French",
            dir: "ltr"
          },
          {
            code: "nl",
            file: "nl-NL.js",
            name: "Dutch",
            dir: "ltr"
          }
        ],
        lazy: true,
        langDir: "lang/",
        defaultLocale: "en"
      }
    ]
  ],

  /*
   ** Authentication configuration
   */
  auth: {
    redirect: {
      login: "/manager/login",
      logout: "/manager/login",
      home: "/manager"
    },
    rewriteRedirects: false,
    strategies: {
      local: {
        scheme: "refresh",
        token: {
          property: "data.access_token",
          maxAge: 1800
        },
        refreshToken: {
          property: "data.refresh_token",
          data: "data.refresh_token",
          maxAge: 60 * 60 * 24 * 30
        },
        user: {
          property: "data",
          autoFetch: true
        },
        endpoints: {
          login: { url: "login", method: "post" },
          user: { url: "account/me", method: "get" },
          refresh: { url: "refresh", method: "post" },
          logout: { url: "account/logout", method: "post" }
        }
      }
    }
  },
  /*
   *
   ** Axios module configuration
   ** See https://axios.nuxtjs.org/options
   */
  axios: {
    // baseURL: "http://cafe.smu.com/api/v1/mgr/"
    // baseURL: "https://demo.o-smu.com/api/v1/mgr/"
    baseURL: "https://o-smu.dev/api/v1/mgr/"
  },
  /*
   ** Content module configuration
   ** See https://content.nuxtjs.org/configuration
   */
  content: {},
  /*
   ** Build configuration
   ** See https://nuxtjs.org/api/configuration-build/
   */
  build: {},

  router: {
    linkExactActiveClass: "bg-red-700"
    // middleware: ['i18n']
  }
};
