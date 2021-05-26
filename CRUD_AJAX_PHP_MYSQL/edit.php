<?php

include 'model.php';

$edit_id = $_POST['edit_id'];

$model = new Model();

$row = $model->edit($edit_id);

if (!empty($row)) { ?>

    <form id="form" action="post">
        <div>
            <input type="hidden" id="edit_id" value="<?php echo $row['id'] ?>">
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
                <label for="">Vendor</label>
                <input type="text" id="edit_vendor" class="form-control" value="<?php echo $row['vendor']; ?>">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
                <label for="">Type</label>
                <input name="type" id="edit_type"class="form-control" value="<?php echo $row['type']; ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="">Date</label>
              <input name="date" id="edit_date" class="form-control"  value="<?php echo $row['occured_date'];?>">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="">Site</label>
              <input name="site" id="edit_site" class="form-control" value="<?php echo $row['site_name'];?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="">Cell</label>
              <input name="cell" id="edit_cell" class="form-control" value="<?php echo $row['down_cell_id'];?>">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="">Region</label>
              <input name="region" id="edit_region" class="form-control" value="<?php echo $row['region'];?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="">Repo To</label>
              <input name="repoto" id="edit_repoto" class="form-control" value="<?php echo $row['reported_to'];?>">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="">Repo By</label>
              <input name="repoby" id="edit_repoby" class="form-control" value="<?php echo $row['reported_by'];?>">
            </div>
          </div>
        </div>


    </form>

    <script type="text/javascript">
      $(function () {
        $('#edit_date').datetimepicker({
          format:'YYYY-MM-DD HH:mm'
        });
      });
    </script>
<?php

}

?>
