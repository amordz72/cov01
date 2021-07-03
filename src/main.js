import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

import BootstrapVueCss from "bootstrap/dist/css/bootstrap.min.css";
import bootstrap from "bootstrap/dist/js/bootstrap";
import jq from "jquery/dist/jquery";

createApp(App)
  .use(store)
  .use(router)
  .use(BootstrapVueCss)
  .use(bootstrap)
  .use(jq)
  .mount("#app");
