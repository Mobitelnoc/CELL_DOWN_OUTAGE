<?php

include "model.php";

if (isset($_POST['outage'])) {

    if (isset($_POST['clear_vendor']) && isset($_POST['clear_type']) && isset($_POST['clear_id']) && isset($_POST['clear_date']) && isset($_POST['clear_site']) && isset($_POST['clear_cell'])
&& isset($_POST['clear_region']) && isset($_POST['clear_repoto']) && isset($_POST['clear_repoby']) && isset($_POST['clear_remarks']) && isset($_POST['clear_time'])) {

        if (!empty($_POST['clear_vendor']) && !empty($_POST['clear_type']) && !empty($_POST['clear_id'])
      &&!empty($_POST['clear_date']) && !empty($_POST['clear_site']) && !empty($_POST['clear_cell'])
    && !empty($_POST['clear_region']) && !empty($_POST['clear_repoto']) && !empty($_POST['clear_repoby']) && !empty($_POST['clear_remarks'])) {

            $data['clear_id'] = $_POST['clear_id'];
            $data['clear_vendor'] = $_POST['clear_vendor'];
            $data['clear_type'] = $_POST['clear_type'];
            $data['clear_date']  = $_POST['clear_date'];
            $data['clear_site']  = $_POST['clear_site'];
            $data['clear_cell']  = $_POST['clear_cell'];
            $data['clear_region']  = $_POST['clear_region'];
            $data['clear_repoto']  = $_POST['clear_repoto'];
            $data['clear_repoby']  = $_POST['clear_repoby'];
            $data['clear_remarks']  = $_POST['clear_remarks'];
            $data['clear_time']  = $_POST['clear_time'];

            $model = new Model();

            $outage = $model->outage($data);


        } else {
            echo "
            <script>alert('empty fields')</script>
            ";
        }
    }
}
