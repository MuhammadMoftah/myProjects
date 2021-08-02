import Vue from "vue";
import axios from "axios";

// var domain = "";
// if (window.location.protocol.includes("https")) {
//   domain = `https://${window.location.hostname}/api/`;
// } else {
//   domain = `http://${window.location.hostname}/api/`;
// }
axios.defaults.baseURL = "http://smu.com/api/v1/mgr";

Vue.prototype.$axios = axios;
