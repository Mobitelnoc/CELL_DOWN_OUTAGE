<?php
$connect = mysqli_connect("localhost", "root", "", "smallcelloutage");
$sql = "SELECT * from current_outage_table Where status='1'";
$result = mysqli_query($connect, $sql);
?>
<html>
 <head>
  <title>Export MySQL data to Excel in PHP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 </head>
 <body>
  <div class="container">
   <br />
   <br />
   <br />
   <div class="table-responsive">
    <h2 align="center">Export MySQL data to Excel in PHP</h2><br />
    <table class="table table-bordered">
     <tr>
       <th>Type</th>
       <th>Site Name</th>
       <th>Region</th>
       <th>Reported To</th>
       <th>Reported By</th>
       <th>Occured Time</th>
       <th>Reported Time</th>
       <th>Cleared Date</th>
       <th>Reason</th>
       <th>TX Reported To</th>
       <th>Duration</th>
       <th>Cleared Reason</th>
      </tr>
     <?php
     while($row = mysqli_fetch_array($result))
     {
        echo '
       <tr>
       <td>'.$row["type"].'</td>
       <td>'.$row["site_name"].'</td>
       <td>'.$row["region"].'</td>
       <td>'.$row["reported_to"].'</td>
       <td>'.$row["reported_by"].'</td>
       <td>'.$row["occured_time"].'</td>
       <td>'.$row["reported_time"].'</td>
       <td>'.$row["cleared_date"].'</td>
       <td>'.$row["reason_for_fault"].'</td>
       <td>'.$row["tx_reported_to"].'</td>
       <td>'.$row["duration"].'</td>
       <td>'.$row["clearedreason"].'</td>
       </tr>
        ';
     }
     ?>
    </table>
    <br />
    <form method="post" action="export-new.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>
  </div>
 </body>
</html>
