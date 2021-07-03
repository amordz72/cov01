import "./plugins/axios";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import bootsrabCss from "./plugins/bootstrap-vue";
import bootsrabJs from "./plugins/bootstrap-vue";
import popper from "./plugins/popper-vue";

createApp(App).use(store).
use(router).
use(bootsrabCss).
use(bootsrabJs).
mount("#app");
