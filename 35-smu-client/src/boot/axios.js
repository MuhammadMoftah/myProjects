import Vue from "vue";
import axios from "axios";
import "clientjs";
// axios.defaults.baseURL = "http://o-smu.com/api/";

let client = new ClientJS();
axios.defaults.headers.common["Accept"] = "application/json";
axios.defaults.headers.common["x-smufb"] = client.getFingerprint();

// var domain = "";
// if (window.location.protocol.includes("https")) {
//   domain = `https://${window.location.hostname}/api/`;
// } else {
//   domain = `http://${window.location.hostname}/api/`;
// }

axios.defaults.baseURL = domain;


// for staging data 
// var domain = 'https://demo.o-smu.dev/api'
// var domain = 'https://ramon.o-smu.com/api'
var domain = 'https://demo.o-smu.com/api'
axios.defaults.baseURL = domain;
Vue.prototype.$axios = axios;
