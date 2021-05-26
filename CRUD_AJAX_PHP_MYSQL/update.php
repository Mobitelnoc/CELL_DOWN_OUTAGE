<?php

include "model.php";

if (isset($_POST['update'])) {

    if (isset($_POST['edit_vendor']) && isset($_POST['edit_type']) && isset($_POST['edit_id']) && isset($_POST['edit_date']) && isset($_POST['edit_site']) && isset($_POST['edit_cell'])
&& isset($_POST['edit_region']) && isset($_POST['edit_repoto']) && isset($_POST['edit_repoby'])) {

        if (!empty($_POST['edit_vendor']) && !empty($_POST['edit_type']) && !empty($_POST['edit_id'])
      &&!empty($_POST['edit_date']) && !empty($_POST['edit_site']) && !empty($_POST['edit_cell'])
    && !empty($_POST['edit_region']) && !empty($_POST['edit_repoto']) && !empty($_POST['edit_repoby'])) {

            $data['edit_id'] = $_POST['edit_id'];
            $data['edit_vendor'] = $_POST['edit_vendor'];
            $data['edit_type'] = $_POST['edit_type'];
            $data['edit_date']  = $_POST['edit_date'];
            $data['edit_site']  = $_POST['edit_site'];
            $data['edit_cell']  = $_POST['edit_cell'];
            $data['edit_region']  = $_POST['edit_region'];
            $data['edit_repoto']  = $_POST['edit_repoto'];
            $data['edit_repoby']  = $_POST['edit_repoby'];

            $model = new Model();

            $update = $model->update($data);


        } else {
            echo "
            <script>alert('empty fields')</script>
            ";
        }
    }
}
