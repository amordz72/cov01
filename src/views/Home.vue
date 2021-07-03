<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png" />
    <Cov msg="Welcome to Your Vue.js App" />
    <button class="btn btn-primary" @click="get">primary</button>
  </div>
</template>

<script>
// @ is an alias to /src
import Cov from "@/components/Cov.vue";

export default {
  name: "Home",
  components: {
    Cov,
  },
  methods: {
    get: function () {
      alert("gg");
    },
  },
};
</script>

<style scoped>
.home img {
  width: 50px;
  height: 50px;
}
</style>
