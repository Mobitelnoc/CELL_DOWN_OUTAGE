<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phptemplates";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query="SELECT MAX( id ) AS max FROM `employees`" ;

$sql= mysqli_query( $conn,$query);
$res = mysqli_fetch_array( $sql);
$highestValue = $res['max'];

echo $highestValue;

$insert = "INSERT INTO employees (id, name, address, salary) VALUES (($highestValue+1), 'Bihan','Sri Lanka',56000)";

if (mysqli_query($conn, $insert)) {
  echo " New record created successfully";
} else {
  echo "Error: " . $insert . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>
