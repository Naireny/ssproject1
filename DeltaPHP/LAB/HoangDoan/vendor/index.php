<?php
//including the database connection file
include_once("config.php");


/* 

READ
READ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
use the table name from the Tables.html page to query the database. Now this page is flexiable becuase it can bring up any table
passed to it using GIT

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Read the selected Category from the database
    $tableName= $_GET['tableName'];
    $result = $dbConn->query("SELECT * FROM $tableName ORDER BY Title");
    
    */
            

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM vendors ORDER BY VendorID ASC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Vendor ID</td>
		<td>Name</td>
		<td>Phone</td>
		<td>Contact</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['VendorID']."</td>";
		echo "<td>".$row['Name']."</td>";
		echo "<td>".$row['Phone']."</td>";	
		echo "<td>".$row['Contact']."</td>";	
 		echo "<td><a href=\"edit.php?vendorID=$row[VendorID]\">Edit</a> | <a href=\"delete.php?vendorID=$row[VendorID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>