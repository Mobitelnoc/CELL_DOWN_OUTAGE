<?php

/**
 * Connect to MySQL using PDO.
 */
$user = 'root';
$password = '';
$server = 'localhost';
$database = 'smallcelloutage';
$pdo = new PDO("mysql:host=$server;dbname=$database", $user, $password);

//Query our MySQL table
$sql = "SELECT  `type`,
                `site_name`,
                `region`,
                `reported_to`,
                `reported_by`,
                `occured_time`,
                `reported_time`,
                `cleared_date`,
                `reason_for_fault`,
                `tx_reported_to`,
                `duration`,
                `clearedreason` FROM current_outage_table Where status='1'";
$stmt = $pdo->query($sql);

//Retrieve the data from our table.
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

//The name of the Excel file that we want to force the
//browser to download.
$filename = 'outage '.date("l jS \of F Y h:i:s A").'.xls';

//Send the correct headers to the browser so that it knows
//it is downloading an Excel file.
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");

//Define the separator line
$separator = "\t";

//If our query returned rows
if(!empty($rows)){

    //Dynamically print out the column names as the first row in the document.
    //This means that each Excel column will have a header.
    echo implode($separator, array_keys($rows[0])) . "\n";

    //Loop through the rows
    foreach($rows as $row){

        //Clean the data and remove any special characters that might conflict
        foreach($row as $k => $v){
            $row[$k] = str_replace($separator . "$", "", $row[$k]);
            $row[$k] = preg_replace("/\r\n|\n\r|\n|\r/", " ", $row[$k]);
            $row[$k] = trim($row[$k]);
        }

        //Implode and print the columns out using the
        //$separator as the glue parameter
        echo implode($separator, $row) . "\n";
    }
}

 ?>
