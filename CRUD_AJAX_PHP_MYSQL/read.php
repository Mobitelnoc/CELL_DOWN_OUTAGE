<?php
include 'model.php';

$read_id = $_POST['read_id'];

$model = new Model();

$row = $model->read($read_id);

if (!empty($row)) { ?>

    <p>Vendor - <?php echo $row['vendor']; ?></p>

    <p>Type - <?php echo $row['type']; ?></p>


  <?php
}

    ?>
