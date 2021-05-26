<?php

include 'model.php';

$clear_id = $_POST['clear_id'];

$model = new Model();

$row = $model->clear($clear_id);

if (!empty($row)) { ?>

    <form id="form" action="post">
        <div>
            <input type="hidden" id="clear_id" value="<?php echo $row['id'] ?>">
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="">Remarks</label>
              <input name="remarks" id="clear_remarks" class="form-control" value="">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="">Cleared Time</label>
              <input name="cleartime" id="clear_time" class="form-control" value="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
                <label for="">Vendor</label>
                <input type="text" id="clear_vendor" class="form-control" value="<?php echo $row['vendor']; ?>">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
                <label for="">Type</label>
                <input name="type" id="clear_type"class="form-control" value="<?php echo $row['type']; ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="">Date</label>
              <input name="date" id="clear_date" class="form-control"  value="<?php echo $row['occured_date'];?>">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="">Site</label>
              <input name="site" id="clear_site" class="form-control" value="<?php echo $row['site_name'];?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="">Cell</label>
              <input name="cell" id="clear_cell" class="form-control" value="<?php echo $row['down_cell_id'];?>">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="">Region</label>
              <input name="region" id="clear_region" class="form-control" value="<?php echo $row['region'];?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="">Repo To</label>
              <input name="repoto" id="clear_repoto" class="form-control" value="<?php echo $row['reported_to'];?>">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="">Repo By</label>
              <input name="repoby" id="clear_repoby" class="form-control" value="<?php echo $row['reported_by'];?>">
            </div>
          </div>
        </div>



    </form>
    <script type="text/javascript">
      $(function () {
        $('#clear_time').datetimepicker({
          format:'YYYY-MM-DD HH:mm'
        });
        $('#clear_date').datetimepicker({
          format:'YYYY-MM-DD HH:mm'
        });
      });
    </script>
<?php

}

?>
