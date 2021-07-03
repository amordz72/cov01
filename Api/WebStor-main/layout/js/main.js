const Counter = {
  data() {
    return {
      counter: 0,
    };
  },
  //   mounted() {
  //       var url="https://jsonplaceholder.typicode.com/users";
  //       var url2="https://api.coindesk.com/v1/bpi/currentprice.json";

  //     axios
  //       .get(url)
  //       .then((response) => (this.info = response.data.GBP));
  //   },
  method() {
    function getData() {
      axios
        .get("https://api.coindesk.com/v1/bpi/currentprice.json")
        .then((response) => (this.info = response.data.bpi));
    }
  },
};

Vue.createApp(Counter).mount("#counter");

const app = {
  data() {
    return {
      info: null,
    };
  },
  mounted() {
    var url = "https://jsonplaceholder.typicode.com/users";
    var url2 = "https://api.coindesk.com/v1/bpi/currentprice.json";
    axios.get(url).then((response) => (this.info = response.data[0].name));
  },
  method: {
    // getData() {
    //   axios
    //     .get("https://api.coindesk.com/v1/bpi/currentprice.json")
    //     .then((response) => (this.info = response.data.bpi));
    // },
    reset() {
      this.info = [];
    },
  },
};
Vue.createApp(app).mount("#app");
