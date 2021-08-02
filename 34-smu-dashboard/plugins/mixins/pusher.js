import Vue from "vue";

const PusherJs = require("pusher-js");

const pusher = {
  install(Vue, Options) {
    const url = new URL(window.location.origin);
    Vue.mixin({
      computed: {
        pusherChannel: {
          get: function() {
            const pusher = new PusherJs(
              "eBcuPKNWBnfYkZQae6kOTzskBEoOFv3VTr7hTQGlWAiliopM7iOpeSaKMIg2",
              {
                wsHost: url.hostname,
                wsPort: 443,
                wssPort: 443,
                forceTLS: false,
                enabledTransports: ["ws", "flash"]
              }
            );
            return pusher.subscribe(url.hostname);
          },
          set: function() {}
        }
      }
    });
  }
};

Vue.use(pusher);
