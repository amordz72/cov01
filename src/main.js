import "./plugins/axios";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import "./plugins/bootstrap-vue";
// .use(bootsrabCss)import bootsrabCss from "./plugins/bootstrap-vue";
createApp(App).use(store).use(router).mount("#app");
