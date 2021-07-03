import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

import BootstrapVueCss from "bootstrap/dist/css/bootstrap.min.css";
import bundle from "bootstrap/dist/js/bootstrap";

createApp(App)
  .use(store)
  .use(router)
  .use(BootstrapVueCss)
  .use(bundle)
  .mount("#app");
