<template>
  <div>
    <h1>login</h1>
     <Cov msg="Welcome to Your Vue.js App" />
  </div>
</template>


<script>
// @ is an alias to /src
import Cov from "@/components/LoginForm.vue";

export default {
  name: "Home",
  components: {
    Cov,
  },
};
</script>




<style scoped>

</style>