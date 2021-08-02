export const state = () => ({
   show: false,
   error: [],
   errors: [],
   tableNotis: []
})

export const mutations = {
   // hide all kind of Noti
   hide(state) {
      state.show = false
   },
   // Handling Errors
   pushError(state, payload) {
      if (!payload) {
         var payload = {}
         if (!payload.head) payload.head = "Error! "
         if (!payload.body) payload.body = "Something seriously seriously seriously bad happened."

      } else {
         if (!payload.head) payload.head = "Error! "
         if (!payload.body) payload.body = "Something seriously seriously seriously bad happened."
      }
      state.show = true
      state.errors.push(payload)
   },
   shiftError(state) {
      state.errors.shift()
      if (state.errors.length == 0) {
         state.show = false
      }
   },
   // Handling Tables Notifications
   pushTableNoti(state, payload) {
      if (!payload) {
         var payload = {}
         if (!payload.head) payload.head = "Alert! "
         if (!payload.body) payload.body = "Table has been scanned"

      } else {
         if (!payload.head) payload.head = "Alert! "
         if (!payload.body) payload.body = "Table has been scanned"
      }
      state.show = true
      state.tableNotis.push(payload)
   },
   shiftTableNoti(state) {
      state.tableNotis.shift()
      if (state.tableNotis.length == 0) {
         state.show = false
      }
   }

}

export const actions = {
   // Handling Errors
   pushError({ commit }, payload) {
      commit('pushError', payload)
      setTimeout(() => {
         commit('shiftError')
      }, 3000)
   },
   // Handling Alerts
   pushTableNoti({ commit }, payload) {
      commit('pushTableNoti', payload)
      setTimeout(() => {
         commit('shiftTableNoti')
      }, 3000)
   }
}
