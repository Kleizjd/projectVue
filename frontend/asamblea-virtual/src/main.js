import Vue from 'vue'
import App from './App.vue'
import router from './router'
import bootstrap from 'bootstrap'
import { popper } from '@popperjs/core'
import { BootstrapVue, IconsPlugin,BTable, BButton, BFormInput } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import "./assets/main.css";

Vue.component('b-table', BTable);
Vue.component('b-button', BButton);
Vue.component('b-form-input', BFormInput);
new Vue({
  router,
  popper,
  BootstrapVue,
  IconsPlugin,
  bootstrap,
  render: (h) => h(App)
}).$mount('#app')