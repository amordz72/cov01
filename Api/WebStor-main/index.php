<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHP Insert Update Delete with Vue.js</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <style>
    .modal-mask {
      position: fixed;
      z-index: 9998;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, .5);
      display: table;
      transition: opacity .3s ease;
    }

    .modal-wrapper {
      display: table-cell;
      vertical-align: middle;
    }
  </style>
</head>

<body>
  <div class="container" id="crudApp">
    <br />
    <h3 align="center">Delete or Remove Data From Mysql using Vue.js with PHP</h3>
    <br />
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-6">
            <h3 class="panel-title">Sample Data</h3>
          </div>
          <div class="col-md-6" align="right">
            <input type="button" class="btn btn-success btn-xs" @click="openModel" value="Add" />
          </div>
        </div>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            <tr v-for="row in allData">
              <td>{{ row.usId }}</td>
              <td>{{row.usName }}</td>
              <td><button type="button" name="edit" class="btn btn-primary btn-xs edit" @click="fetchData(row.usId)">Edit</button></td>
              <td><button type="button" name="delete" class="btn btn-danger btn-xs delete" @click="deleteData(row.usId)">Delete</button></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div v-if="myModel">
      <transition name="model">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" @click="myModel=false"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">{{ dynamicTitle }}</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Enter First Name</label>
                    <input type="text" class="form-control" v-model="usName" />
                  </div>
                  <div class="form-group">
                    <label>Enter Last Name</label>
                    <input type="text" class="form-control" v-model="tyNum" />
                  </div>
                  <br />
                  <div align="center">
                    <input type="hidden" v-model="hiddenId" />
                    <input type="button" class="btn btn-success btn-xs" v-model="actionButton" @click="submitData" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>
  </div>
</body>

</html>



<script>
  var application = new Vue({
    el: '#crudApp',
    data: {
      allData: '',
      myModel: false,
      actionButton: 'Insert',
      dynamicTitle: 'Add Data',
    },
    methods: {
      fetchAllData: function() {
        axios.post('action.php', {
          action: 'fetchall'
        }).then(function(response) {
          application.allData = response.data;
        });
      },
      openModel: function() {
        application.usName = '';
        application.tyNum = '';
        application.actionButton = "Insert";
        application.dynamicTitle = "Add Data";
        application.myModel = true;
      },
      submitData: function() {
        if (application.usName != '' && application.tyNum != '') {
          if (application.actionButton == 'Insert') {
            axios.post('action.php', {
              action: 'insert',
              firstName: application.usName,
              lastName: application.tyNum
            }).then(function(response) {
              application.myModel = false;
              application.fetchAllData();
              application.usName = '';
              application.tyNum = '';
              alert(response.data.message);
            });
          }
          if (application.actionButton == 'Update') {
            axios.post('action.php', {
              action: 'update',
              firstName: application.usName,
              lastName: application.tyNum,
              hiddenId: application.hiddenId
            }).then(function(response) {
              application.myModel = false;
              application.fetchAllData();
              application.usName = '';
              application.tyNum = '';
              application.hiddenId = '';
              alert(response.data.message);
            });
          }
        } else {
          alert("Fill All Field");
        }
      },
      fetchData: function(id) {
        axios.post('action.php', {
          action: 'fetchSingle',
          id: id
        }).then(function(response) {
          application.usName = response.data.usName;
          application.tyNum = response.data.tyNum;
          application.hiddenId = response.data.id;
          application.myModel = true;
          application.actionButton = 'Update';
          application.dynamicTitle = 'Edit Data';
        });
      },
      deleteData: function(id) {
        if (confirm("Are you sure you want to remove this data?")) {
          axios.post('action.php', {
            action: 'delete',
            id: id
          }).then(function(response) {
            application.fetchAllData();
            alert(response.data.message);
          });
        }
      }
    },
    created: function() {
      this.fetchAllData();
    }
  });
</script>