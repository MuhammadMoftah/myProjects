export default function ({ isHMR, app, store, route, params, req, error, redirect, $auth }) {
   if (isHMR) { // ignore if called from hot module replacement
      return;
   }

   if (req) {
      if (route.name) {
         // $auth.$storage.removeUniversal("locate")

         let locale = $auth.$storage.getUniversal("locale")

         // // check if the locale cookie is set
         // if (req.headers.cookie) {
         //    const cookies = req.headers.cookie.split('; ').map(stringCookie => stringCookie.split('='));
         //    const cookie = cookies.find(cookie => cookie[0] === 'locale');

         //    if (cookie) {
         //       locale = cookie[1];
         //    }
         // }

         // let lang = localStorage.getItem("locale")
         // context.app.context.app.$cookies.get('token')

         // if (lang) {
         //    locale = lang
         // }
         // if the locale cookie is not set, fallback to accept-language header
         if (!locale) {
            // locale = req.headers['accept-language'].split(',')[0].toLocaleLowerCase().substring(0, 2);
            locale = 'en'
         }

         // console.log('locale is:', locale);

         store.commit('locales/SET_LANG', locale);
         app.i18n.locale = store.state.locales.locale;
      }
   }
};
