<?php
//export.php
$connect = mysqli_connect("localhost", "root", "", "smallcelloutage");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM current_outage_table WHERE status='1' ";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">
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
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
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
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
