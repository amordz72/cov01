const app = {
  data() {
    return {
      users: "",
      username: "",
      name: "",
      email: "",
    };
  },
  methods: {
    allRecords: function () {
      axios
        .post("ajaxfile.php", {
          request: 1,
        })
        .then(function (response) {
          app.users = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    addRecord: function () {
      if (this.username != "" && this.name != "" && this.email != "") {
        axios
          .post("ajaxfile.php", {
            request: 2,
            username: this.username,
            name: this.name,
            email: this.email,
          })
          .then(function (response) {
            // Fetch records
            app.allRecords();

            // Empty values
            app.username = "";
            app.name = "";
            app.email = "";

            alert(response.data);
          })
          .catch(function (error) {
            console.log(error);
          });
      } else {
        alert("Fill all fields.");
      }
    },
    updateRecord: function (index, id) {
      // Read value from Textbox
      var name = this.users[index].name;
      var email = this.users[index].email;

      if (name != "" && email != "") {
        axios
          .post("ajaxfile.php", {
            request: 3,
            id: id,
            name: name,
            email: email,
          })
          .then(function (response) {
            alert(response.data);
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    },
    deleteRecord: function (index, id) {
      axios
        .post("ajaxfile.php", {
          request: 4,
          id: id,
        })
        .then(function (response) {
          // Remove index from users
          app.users.splice(index, 1);
          alert(response.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
  created: function () {
    this.allRecords();
  },
};
Vue.createApp(app).mount("#myapp");
