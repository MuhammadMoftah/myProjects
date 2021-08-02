export const state = () => ({
   rtl: false,
   code:'en'

});


export const mutations = {
   rtl(state) {
      state.rtl = true
   },
   ltr(state) {
      state.rtl = false
   },

   setDirection(state, payload) {
      // state.rtl = payload[0].dir !== 'ltr'
      state.rtl = payload === 'ar'
      state.code = payload
   },

};

export const actions = {

};
