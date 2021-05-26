<!doctype html>
<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="sweetalert/sweetalert2/dist/sweetalert2.min.css">

  <title>PHP AJAX</title>
</head>

<body>
  <div class="container-fluid m-2">
    <div class="row">
      <div class="col-md-12 mt-5">
        <h1 class="text-center">CELL DOWN OUTAGE</h1>
        <hr style="height: 1px; color: black; background-color: black;">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 mx-auto">
        <form id="form" action="post">
          <div id="result"></div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="">Vendor</label>
                <select class="form-control" id="vendor">
                      <option>Huawei</option>
                      <option>ZTE</option>
                    </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="">Type</label>
                <select class="form-control" id="type">
                      <option>2G-900</option>
                      <option>2G-1800</option>
                      <option>3G</option>
                      <option>4G-L1800</option>
                      <option>4G-L850</option>
                    </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="">Date</label>
                <input name="date" type="text" id="date" class="form-control">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="">Site</label>
                <input name="site" id="site" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="">Cell</label>
                <input name="cell" id="cell" class="form-control">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="">Region</label>
                <input name="region" id="region" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="">Repo To</label>
                <input name="repoto" id="repoto" class="form-control">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="">Repo By</label>
                <input name="repoby" id="repoby" class="form-control">
              </div>
            </div>
          </div>


          <div class="form-group">
            <button type="submit" id="submit" class="btn btn-outline-primary">Submit</button>
          </div>
        </form>
      </div>

      <div class="col-md-8">
        <div class="col-md-12 mt-1">
          <div id="show"></div>
          <div id="fetch"></div>
        </div>
    </div>

    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Datos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="read_data"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Editar Modal -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Datos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="edit_data"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="update">Update</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Clear Modal -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Clear Outage</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="clear_data"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="outage">Clear</button>
        </div>
      </div>
    </div>
  </div>

  <script src="jquery/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="popper/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="moment/node_modules/moment/min/moment.min.js"></script>
  <script src="datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <script src="sweetalert/sweetalert2/dist/sweetalert2.min.js" charset="utf-8"></script>

  <script>


    $(document).on("click", "#submit", function(e) {
      e.preventDefault();
      var vendor = $("#vendor").val();
      var type = $("#type").val();
      var date = $("#date").val();
      var site = $("#site").val();
      var cell = $("#cell").val();
      var region = $("#region").val();
      var repoto = $("#repoto").val();
      var repoby = $("#repoby").val();
      var submit = $("#submit").val();

      $.ajax({
        url: "insert.php",
        type: "post",
        data: {
          vendor: vendor,
          type: type,
          date: date,
          site: site,
          cell: cell,
          region:region,
          repoto:repoto,
          repoby:repoby,
          submit: submit
        },
        success: function(data) {
          fetch();
          $("#result").html(data);
        }
      })

      $("#form")[0].reset();
    });

    //Fetch records

    function fetch() {

      $.ajax({
        url: "fetch.php",
        type: "post",
        success: function(data) {
          $("#fetch").html(data);
        }
      });
    }
    fetch();

    $(document).on("click", "#del", function(e) {
      e.preventDefault();

      if (
        Swal.fire({
          position: 'bottom-start',
          icon: 'success',
          title: 'Your work has been saved',
          showConfirmButton: false,
          timer: 1500
        })
      ) {
        var del_id = $(this).attr("value");

        $.ajax({
          url: "del.php",
          type: "post",
          data: {
            del_id: del_id
          },
          success: function(data) {
            fetch();
            $("#show").html(data);
          }
        });
      } else {
        return false;
      }

    });

    //leer datos

    $(document).on("click", "#read", function(e) {
      e.preventDefault();

      var read_id = $(this).attr("value");

      $.ajax({
        url: "read.php",
        type: "post",
        data: {
          read_id: read_id
        },
        success: function(data) {
          $("#read_data").html(data);
        }
      })
    });

    //Editar
    $(document).on("click", "#edit", function(e) {
      e.preventDefault();

      var edit_id = $(this).attr("value");

      $.ajax({
        url: "edit.php",
        type: "post",
        data: {
          edit_id: edit_id
        },

        success: function(data) {
          $("#edit_data").html(data);
        }
      });
    });

    //update

    $(document).on("click", "#update", function(e){
      e.preventDefault();

      var edit_vendor = $("#edit_vendor").val();
      var edit_type = $("#edit_type").val();
      var edit_date = $("#edit_date").val();
      var edit_site = $("#edit_site").val();
      var edit_cell = $("#edit_cell").val();
      var edit_region = $("#edit_region").val();
      var edit_repoto = $("#edit_repoto").val();
      var edit_repoby = $("#edit_repoby").val();
      var update = $("#update").val();
      var edit_id = $("#edit_id").val();


      $.ajax({
        url: "update.php",
        type: "post",
        data:{
          edit_id:edit_id,
          edit_vendor:edit_vendor,
          edit_type:edit_type,
          edit_date:edit_date,
          edit_site:edit_site,
          edit_cell:edit_cell,
          edit_region:edit_region,
          edit_repoto:edit_repoto,
          edit_repoby:edit_repoby,
          update:update
        },
        success: function(data){
          fetch();
          $("#show").html(data);
        }
      });
    });

    //Clear
    $(document).on("click", "#clear", function(e) {
      e.preventDefault();

      var clear_id = $(this).attr("value");

      $.ajax({
        url: "clear.php",
        type: "post",
        data: {
          clear_id: clear_id
        },

        success: function(data) {
          $("#clear_data").html(data);
        }
      });
    });

    //outage

    $(document).on("click", "#outage", function(e){
      e.preventDefault();

      var clear_vendor = $("#clear_vendor").val();
      var clear_type = $("#clear_type").val();
      var clear_date = $("#clear_date").val();
      var clear_site = $("#clear_site").val();
      var clear_cell = $("#clear_cell").val();
      var clear_region = $("#clear_region").val();
      var clear_repoto = $("#clear_repoto").val();
      var clear_repoby = $("#clear_repoby").val();
      var clear_remarks = $("#clear_remarks").val();
      var clear_time = $("#clear_time").val();
      var outage = $("#outage").val();
      var clear_id = $("#clear_id").val();


      $.ajax({
        url: "outage.php",
        type: "post",
        data:{
          clear_id:clear_id,
          clear_vendor:clear_vendor,
          clear_type:clear_type,
          clear_date:clear_date,
          clear_site:clear_site,
          clear_cell:clear_cell,
          clear_region:clear_region,
          clear_repoto:clear_repoto,
          clear_repoby:clear_repoby,
          clear_remarks:clear_remarks,
          clear_time:clear_time,
          outage:outage
        },
        success: function(data){
          fetch();
          $("#show").html(data);
        }
      });
    });
  </script>

  <script type="text/javascript">
    $(function () {
      $('#date').datetimepicker({
        format:'YYYY-MM-DD HH:mm'
      });
    });
  </script>
</body>

</html>
