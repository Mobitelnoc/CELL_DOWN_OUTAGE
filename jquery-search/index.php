<?php
$hostname="localhost";
$dbname="smallcelloutage";
$username="root";
$password="";

$conn=mysqli_connect($hostname,$username,$password,$dbname);

if(mysqli_connect_errno()){
  echo "Connection Failed".mysqli_connect_error();
}

$result=mysqli_query($conn,"SELECT * FROM sitelist");
echo "<center>";
echo "<select id='searchddl'>";
echo "<option>--search Site</option>";
while($row=mysqli_fetch_array($result)){
  echo "<option>$row[site_name]</option>";
}
echo "</select>";
echo "</center>";
mysqli_close($conn);
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet"/>


<script>
$("#searchddl").chosen();

</script>
