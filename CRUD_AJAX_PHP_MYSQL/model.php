<?php
class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "celldownmanager";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=$this->server;dbname=$this->db",
                $this->username,
                $this->password
            );
        } catch (PDOException $e) {
            echo "conexion fallida" . $e->getMessage();
        }
    }

    public function insert()
    {
        if (isset($_POST['submit'])) {

            if (isset($_POST['vendor']) && isset($_POST['type']) && isset($_POST['date']) && isset($_POST['site']) && isset($_POST['cell']) && isset($_POST['region'])
            && isset($_POST['repoto']) && isset($_POST['repoby'])) {

                if (!empty($_POST['vendor']) && !empty($_POST['type']) && !empty($_POST['date']) && !empty($_POST['site']) && !empty($_POST['cell'])
                && !empty($_POST['region']) && !empty($_POST['repoto']) && !empty($_POST['repoby']) ) {

                    $vendor = $_POST['vendor'];
                    $type = $_POST['type'];
                    $date = $_POST['date'];
                    $site = $_POST['site'];
                    $cell = $_POST['cell'];
                    $region=$_POST['region'];
                    $repoto=$_POST['repoto'];
                    $repoby=$_POST['repoby'];


                    $query = "INSERT INTO cell_outage_manager(vendor, type, occured_date, site_name,down_cell_id,region,reported_to,reported_by) VALUES('$vendor', '$type','$date','$site','$cell','$region','$repoto','$repoby')";
                    if ($sql = $this->conn->exec($query)) {
                        echo '
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                       Record added successfully
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                       ';
                    } else {
                        echo '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                       Failed to add record
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                        ';
                    }
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                       empty fields
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>';
                }
            }
        }
    }

    public function fetch(){
        $data = null;
        $stmt = $this->conn->prepare("SELECT * FROM cell_outage_manager WHERE status =0");
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }

    public function del($del_id){
        $query = "DELETE FROM cell_outage_manager WHERE id = '$del_id' ";
        if ($sql = $this->conn->exec($query)) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Record delete
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            not delete
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }

    public function read($read_id){
      $data = null;

      $stmt = $this->conn->prepare("SELECT * FROM cell_outage_manager WHERE id='$read_id' ");

      $stmt->execute();

      $data = $stmt->fetch();

      return $data;
    }

    public function edit($edit_id){
      $data = null;

      $stmt = $this->conn->prepare("SELECT * FROM cell_outage_manager WHERE id='$edit_id'");

      $stmt->execute();

      $data = $stmt->fetch();

      return $data;
    }

    public function update($data){
      $query = "UPDATE cell_outage_manager SET

      vendor = '$data[edit_vendor]',
      type  = '$data[edit_type]',
      occured_date = '$data[edit_date]',
      site_name = '$data[edit_site]',
      down_cell_id = '$data[edit_cell]',
      region = '$data[edit_region]',
      reported_to = '$data[edit_repoto]',
      reported_by = '$data[edit_repoby]'

      WHERE id='$data[edit_id]'";

      if ($sql = $this->conn->exec($query)) {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Record update successfully
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <script>$("#exampleModal1").modal("hide")<script>
        ';
      }else {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to update
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        ';
      }
    }

    public function clear($clear_id){
      $data = null;

      $stmt = $this->conn->prepare("SELECT * FROM cell_outage_manager WHERE id='$clear_id'");

      $stmt->execute();

      $data = $stmt->fetch();

      return $data;
    }

    public function outage($data){
      $query = "UPDATE cell_outage_manager SET

      vendor = '$data[clear_vendor]',
      type  = '$data[clear_type]',
      occured_date = '$data[clear_date]',
      site_name = '$data[clear_site]',
      down_cell_id = '$data[clear_cell]',
      region = '$data[clear_region]',
      reported_to = '$data[clear_repoto]',
      reported_by = '$data[clear_repoby]',
      remarks = '$data[clear_remarks]',
      cleared_time = '$data[clear_time]',
      status = 1

      WHERE id='$data[clear_id]'";

      if ($sql = $this->conn->exec($query)) {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Record update successfully
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <script>$("#exampleModal2").modal("hide")<script>
        ';
      }else {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to update
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        ';
      }
    }
}
