<?php
include 'model.php';

$model = new Model();

$rows = $model->fetch();
?>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Vendor</th>
            <th>Type</th>
            <th>Date</th>
            <th>Name</th>
            <th>Cell</th>
            <th>Region</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
        <?php

$i = 1;
        if (!empty($rows)) {
            foreach ($rows as $row) { ?>

                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['vendor']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['occured_date']; ?></td>
                    <td><?php echo $row['site_name']; ?></td>
                    <td><?php echo $row['down_cell_id']; ?></td>
                    <td><?php echo $row['region']; ?></td>
                    <td>
                        <a href="" id="read" class="badge badge-info" value="<?php echo $row['id'] ?> " title="<?php echo $row['reported_to'] ?>" data-toggle="modal" data-target="#exampleModal"><span class='fa fa-eye'></span></a>
                        <a href="" id="clear" class="badge badge-success" value="<?php echo $row['id'] ?> " title="<?php echo $row['reported_to'] ?>" data-toggle="modal" data-target="#exampleModal2"><span class='fa fa-check-circle'></span></a>
                        <a href="" id="del" class="badge badge-danger" value="<?php echo $row['id'] ?>"><span class='fa fa-trash'></span></a>
                        <a href="" id="edit" class="badge badge-warning" value="<?php echo $row['id'] ?>" data-toggle="modal" data-target="#exampleModal1"><span class='fa fa-edit'></span></a>
                    </td>
                </tr>

        <?php
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                       no data
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>';
        }
        ?>
    </tbody>
</table>
